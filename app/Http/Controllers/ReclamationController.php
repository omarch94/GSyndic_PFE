<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModifierStatutReclamationRequest;
use App\Models\Canal;
use App\Models\Copropriete;
use App\Models\Reclamation;
use App\Models\StatutReclamation;
use App\Models\TypeReclamation;
use App\Http\Requests\ReclamationRequest;
use Illuminate\Support\Facades\Auth;

class ReclamationController extends Controller
{
    public function __construct(){
        $this->middleware('permission:reclamation-list|reclamation-create|reclamation-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:reclamation-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:reclamation-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:reclamation-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuts = StatutReclamation::orderBy('nom')->get();
        $reclamations = Reclamation::paginate(10);
        return view('reclamations.index', compact('reclamations', 'statuts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type_reclamations = TypeReclamation::orderBy('nom')->get();
        $coproprietes = Copropriete::all();
        $canals = Canal::all();

        return view('reclamations.create', compact('type_reclamations', 'coproprietes', 'canals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ReclamationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReclamationRequest $request)
    {
        try{
            $input = $request->all();
            $input['utilisateur_id'] = Auth::user()->id;
            $input['statut_reclamation_id'] = StatutReclamation::where(['nom' => 'En attente'])->first()->id;
            Reclamation::create($input);
        }catch(\Exception $e){
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
        return redirect()->route('reclamations.index')->with('success', 'Réclamation créer avec succée');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reclamation  $reclamation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reclamation = Reclamation::findOrFail($id);
        return view('reclamations.show', compact('reclamation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reclamation  $reclamation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reclamation = Reclamation::findOrFail($id);
        $type_reclamations = TypeReclamation::orderBy('nom')->get();
        $coproprietes = Copropriete::all();
        $canals = Canal::all();

        return view('reclamations.edit', compact('type_reclamations', 'coproprietes', 'canals', 'reclamation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ReclamationRequest  $request
     * @param  \App\Models\Reclamation  $reclamation
     * @return \Illuminate\Http\Response
     */
    public function update(ReclamationRequest $request, $id)
    {
        try{
            $reclamation = Reclamation::findOrFail($id);
            $input = $request->all();
            $input['utilisateur_id'] = Auth::user()->id;
            $input['statut_reclamation_id'] = StatutReclamation::where(['nom' => 'En attente'])->first()->id;
            $reclamation->update($input);
        }catch(\Exception $e){
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
        return redirect()->route('reclamations.index')->with('success', 'Réclamation Modifié avec succée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reclamation  $reclamation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $reclamation = Reclamation::findOrFail($id);
            $reclamation->delete();
        }catch(\Exception $e){
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
        return redirect()->route('reclamations.index')->with('success', 'Réclamation supprimé avec succée');
    }

    public function modifierStatut(ModifierStatutReclamationRequest $request){
        $reclamation = Reclamation::findOrFail($request->reclamation_id);
        $reclamation->statut_reclamation_id = $request->statut_id;
        try{
            if($reclamation->update()){
                return redirect()->back()->with('success', 'le statut du réclamaiton a été modifié avec succée');
            }
        }catch(\Exception $e){
            return redirect()->back()->withErrors([$e->getMessage()]);
        }

    }
}
