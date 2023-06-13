<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChargeRequest;
use App\Http\Requests\ModifierStatutChargeRequest;
use App\Models\Charge;
use App\Models\Copropriete;
use App\Models\StatutCharge;
use App\Models\TypeCharge;

class ChargeController extends Controller
{
    public function __construct(){
        $this->middleware('permission:charge-list|charge-create|charge-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:charge-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:charge-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:charge-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuts = StatutCharge::orderBy('nom')->get();
        $charges = Charge::paginate(10);
        return view('charges.index', compact('charges', 'statuts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type_charges = TypeCharge::orderBy('nom')->get();
        $coproprietes = Copropriete::orderBy('nom')->get();
        $statut_charges = StatutCharge::orderBy('nom')->get();
        return view('charges.create', compact('type_charges', 'statut_charges', 'coproprietes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ChargeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChargeRequest $request)
    {
        try{
            Charge::create($request->all());
        }catch(\Exception $e){
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
        return redirect()->route('charges.index')->with('success', 'Charge créer avec succée');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Charge  $charge
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $charge = Charge::findOrFail($id);
        return view('charges.show', compact('charge'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Charge  $charge
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $charge = Charge::findOrFail($id);
        $type_charges = TypeCharge::orderBy('nom')->get();
        $statut_charges = StatutCharge::orderBy('nom')->get();
        $coproprietes = Copropriete::orderBy('nom')->get();
        return view('charges.edit', compact('charge', 'type_charges', 'statut_charges', 'coproprietes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ChargeRequest  $request
     * @param  \App\Models\Charge  $charge
     * @return \Illuminate\Http\Response
     */
    public function update(ChargeRequest $request, $id)
    {
        try{
            $charge = Charge::findOrFail($id);
            $charge->update($request->all());
        }catch(\Exception $e){
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
        return redirect()->route('charges.index')->with('success', 'Charge Modifié avec succée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Charge  $charge
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $charge = Charge::findOrFail($id);
            $charge->delete();
        }catch(\Exception $e){
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
        return redirect()->route('charges.index')->with('success', 'Charge Supprimé avec succée');
    }

    public function modifierStatut(ModifierStatutChargeRequest $request){
        try{
            $charge = Charge::findOrFail($request->charge_id);
            $charge->statut_charge_id = $request->statut_id;
            if($charge->update()){
                return redirect()->back()->with('success', 'le statut de la charge a été modifié avec succée');
            }
        }catch(\Exception $e){
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }
}
