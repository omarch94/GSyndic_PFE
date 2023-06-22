<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModifierEtatFactureRequest;
use App\Models\Charge;
use App\Models\Copropriete;
use App\Models\EtatFacture;
use App\Models\Facture;
use App\Http\Requests\FactureRequest;
use PDF;

class FactureController extends Controller
{
    public function __construct(){
        $this->middleware('permission:facture-list|facture-create|facture-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:facture-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:facture-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:facture-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $factures = Facture::paginate(10);
        $etat_factures = EtatFacture::orderBy('nom')->get();
        return view('factures.index', compact('factures', 'etat_factures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $etat_factures = EtatFacture::orderBy('nom')->get();
        $charges = Charge::orderBy('designation')->get();
        $coproprietes = Copropriete::orderBy('nom')->get();
        return view('factures.create', compact('etat_factures', 'charges', 'coproprietes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FactureRequest $request)
    {
        try{
            Facture::create($request->all());
        }catch(\Exception $e){
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
        return redirect()->route('factures.index')->with('success', 'Facture créer avec succée');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $facture = Facture::findOrFail($id);
        return view('factures.show', compact('facture'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $facture = Facture::findOrFail($id);
        $etat_factures = EtatFacture::orderBy('nom')->get();
        $charges = Charge::orderBy('designation')->get();
        $coproprietes = Copropriete::orderBy('nom')->get();
        return view('factures.edit', compact('facture', 'etat_factures', 'charges', 'coproprietes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function update(FactureRequest $request, $id)
    {
        try{
            $facture = Facture::findOrFail($id);
            $facture->update($request->all());
        }catch(\Exception $e){
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
        return redirect()->route('factures.index')->with('success', 'Facture Modifié avec succée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $facture = Facture::findOrFail($id);
            $facture->delete();
        }catch(\Exception $e){
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
        return redirect()->route('factures.index')->with('success', 'Facture Supprimé avec succée');
    }

    public function modifierEtatFacture(ModifierEtatFactureRequest $request){
        $facture = Facture::findOrFail($request->facture_id);
        $facture->etat_facture_id = $request->etat_facture_id;
        try{
            if($facture->update()){
                return redirect()->back()->with('success', 'le statut du facture a été modifié avec succée');
            }
        }catch(\Exception $e){
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }

    public function generatePDF()
    {
        $factures = Facture::get();
  
        $data = [
            'title' => 'GSyndic',
            'date' => date('m/d/Y'),
            'factures' => $factures
        ]; 
            
        $pdf = PDF::loadView('factures.facturePDF', $data);
     
        return $pdf->download('Facture.pdf');
    }
}
