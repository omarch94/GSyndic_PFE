<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\ModePaiment;
use App\Models\Paiment;
use App\Models\Reunion;
use Illuminate\Http\Request;
use App\Http\Requests\PaimentRequest;

class PaimentController extends Controller
{
    public function __construct(){
        $this->middleware('permission:paiment-list|paiment-create|paiment-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:paiment-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:paiment-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:paiment-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paiments = Paiment::paginate(10);
        return view('paiments.index', compact('paiments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mode_paiments = ModePaiment::orderBy('nom')->get();
        $factures = Facture::orderBy('numero_facture')->get();
        return view('paiments.create', compact('mode_paiments', 'factures'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaimentRequest $request)
    {
        try{
            Paiment::create($request->all());
        }catch(\Exception $e){
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
        return redirect()->route('paiments.index')->with('success', 'Paiment créer avec succée');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paiment  $paiment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paiment = Paiment::findOrFail($id);
        return view('paiments.show', compact('paiment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paiment  $paiment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paiment = Paiment::findOrFail($id);
        $mode_paiments = ModePaiment::orderBy('nom')->get();
        $factures = Facture::orderBy('numero_facture')->get();
        return view('paiments.edit', compact('paiment', 'mode_paiments', 'factures'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paiment  $paiment
     * @return \Illuminate\Http\Response
     */
    public function update(PaimentRequest $request, $id)
    {
        try{
            $paiment = Paiment::findOrFail($id);
            $paiment->update($request->all());
        }catch(\Exception $e){
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
        return redirect()->route('paiments.index')->with('success', 'Paiments Modifié avec succée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paiment  $paiment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $paiment = Paiment::findOrFail($id);
            $paiment->delete();
        }catch(\Exception $e){
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
        return redirect()->route('paiments.index')->with('success', 'Paiment Supprimé avec succée');
    }
}
