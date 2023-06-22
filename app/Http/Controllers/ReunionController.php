<?php

namespace App\Http\Controllers;

use App\Http\Requests\AjouterProcesVerbalRequest;
use App\Models\Immeuble;
use App\Models\Reunion;
use App\Http\Requests\ReunionRequest;
use PDF;

class ReunionController extends Controller
{
    public function __construct(){
        $this->middleware('permission:reunion-list|reunion-create|reunion-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:reunion-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:reunion-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:reunion-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reunions = Reunion::paginate(10);
        return view('reunions.index', compact('reunions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $immeubles = Immeuble::orderBy('nom')->get();
        return view('reunions.create', compact('immeubles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ReunionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReunionRequest $request)
    {
        try{
            Reunion::create($request->all());
        }catch(\Exception $e){
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
        return redirect()->route('reunions.index')->with('success', 'Réunion créer avec succée');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reunion  $reunion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reunion = Reunion::findOrFail($id);
        return view('reunions.show', compact('reunion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reunion  $reunion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reunion = Reunion::findOrFail($id);
        $immeubles = Immeuble::orderBy('nom')->get();
        return view('reunions.edit', compact('reunion', 'immeubles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ReunionRequest  $request
     * @param  \App\Models\Reunion  $reunion
     * @return \Illuminate\Http\Response
     */
    public function update(ReunionRequest $request, $id)
    {
        try{
            $reunion = Reunion::findOrFail($id);
            $reunion->update($request->all());
        }catch(\Exception $e){
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
        return redirect()->route('reunions.index')->with('success', 'Réunion Modifié avec succée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reunion  $reunion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $reunion = Reunion::findOrFail($id);
            $reunion->delete();
        }catch(\Exception $e){
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
        return redirect()->route('reunions.index')->with('success', 'Réunion Supprimé avec succée');
    }

    public function uploadProcesVerbal(AjouterProcesVerbalRequest $request)
    {
        try{
            $reunion = Reunion::findOrFail($request->reunion_id);
            $nomFichier = uniqid() . '.' . $request->file('proces_verbal')->getClientOriginalExtension();
            $chemin = 'uploaded_files/' . $nomFichier;

            $request->file('proces_verbal')->move(public_path('uploaded_files'), $nomFichier);

            $reunion->proces_verbal = $chemin;
            $reunion->update();
        }catch(\Exception $e){
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
        return redirect()->route('reunions.index')->with('success', 'Fichier PDF téléchargé avec succès.');
    }

    public function afficherProcesVerbal($id)
    {
        try{
            $reunion = Reunion::findOrFail($id);
            $cheminPDF = public_path($reunion->proces_verbal);
        }catch(\Exception $e){
            return redirect()->back()->withErrors([$e->getMessage()]);
        }

        return response()->file($cheminPDF);
    }

    public function generatePDF()
    {
        $reunions=Reunion::get();
        $data = [
            'title' => 'GSyndic',
            'date' => date('m/d/Y'),
            'reunions' => $reunions
        ]; 
            
        $pdf = PDF::loadView('reunions.pvPDF', $data);
     
        return $pdf->download('pv.pdf');
    }
}
