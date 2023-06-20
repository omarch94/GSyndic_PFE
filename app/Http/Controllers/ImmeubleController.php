<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImmeubleRequest;
use App\Models\Immeuble;
use App\Models\Ville;
use Illuminate\Http\Request;
use App\Exports\ImmeublesExport;
use App\Imports\ImmeublesImport;
use Maatwebsite\Excel\Facades\Excel;
class ImmeubleController extends Controller
{
    public function __construct(){
        $this->middleware('permission:immeuble-list|immeuble-create|immeuble-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:immeuble-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:immeuble-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:immeuble-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $immeubles = Immeuble::with('ville')->paginate(10);

        return view('immeubles.index', compact('immeubles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villes = Ville::orderBy('nom')->get();
        return view('immeubles.create', compact('villes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImmeubleRequest $request)
    {
        try{
            Immeuble::create($request->all());
        }catch(\Exception $e){
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
        return redirect()->route('immeubles.index')->with('success', 'Immeuble créer avec succée');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Immeuble  $immeuble
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $immeuble = Immeuble::findOrFail($id);
        return view('immeubles.show', compact('immeuble'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Immeuble  $immeuble
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $immeuble = Immeuble::findOrFail($id);
        $villes = Ville::orderBy('nom')->get();
        return view('immeubles.edit', compact('immeuble', 'villes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Immeuble  $immeuble
     * @return \Illuminate\Http\Response
     */
    public function update(ImmeubleRequest $request, $id)
    {
        try{
            $immeuble = Immeuble::findOrFail($id);
            $immeuble->update($request->all());
        }catch(\Exception $e){
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
        return redirect()->route('immeubles.index')->with('success', 'Immeuble modifié avec succée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Immeuble  $immeuble
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $immeuble = Immeuble::findOrFail($id);
            $immeuble->delete();
        }catch(\Exception $e){
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
        return redirect()->route('immeubles.index')->with('success', 'Immeuble supprimé avec succée');
    }

    public function getImmeubles(Request $request)
    {
        $villeId = $request->input('ville_id');
        $immeubles = Immeuble::where('ville_id', $villeId)->get();
        return response()->json(['immeubles' => $immeubles]);
    }


    //
    public function export() 
    {
        return Excel::download(new ImmeublesExport, 'imeuble.xlsx');
    }
       
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new ImmeublesImport,request()->file('file'));
               
        return back();
    }
}
