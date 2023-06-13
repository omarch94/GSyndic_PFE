<?php

namespace App\Http\Controllers;

use App\Models\Reclamation;
use App\Models\Resolution;
use Illuminate\Http\Request;
use App\Http\Requests\ResolutionRequest;
use Spatie\Permission\Models\Role;

class ResolutionController extends Controller
{
    public function __construct(){
        $this->middleware('permission:resolution-list|resolution-create|resolution-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:resolution-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:resolution-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:resolution-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resolutions = Resolution::paginate(10);
        return view('resolutions.index', compact('resolutions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reclamations = Reclamation::orderBy('designation')->get();
        $fournisseurs = $coproprietaires = Role::where('name', 'Fournisseur')->first()->users()->get();
        return view('resolutions.create', compact('reclamations', 'fournisseurs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResolutionRequest $request)
    {
        try{
            Resolution::create($request->all());
        }catch(\Exception $e){
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
        return redirect()->route('resolutions.index')->with('success', 'Résolution créer avec succée');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resolution  $resolution
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resolution = Resolution::findOrFail($id);
        return view('resolutions.show', compact('resolution'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resolution  $resolution
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resolution = Resolution::findOrFail($id);
        $reclamations = Reclamation::orderBy('designation')->get();
        $fournisseurs = $coproprietaires = Role::where('name', 'Fournisseur')->first()->users()->get();
        return view('resolutions.edit', compact('resolution', 'reclamations', 'fournisseurs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resolution  $resolution
     * @return \Illuminate\Http\Response
     */
    public function update(ResolutionRequest $request, $id)
    {
        try{
            $resolution = Resolution::findOrFail($id);
            $resolution->update($request->all());
        }catch(\Exception $e){
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
        return redirect()->route('resolutions.index')->with('success', 'Résolution Modifié avec succée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resolution  $resolution
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $resolution = Resolution::findOrFail($id);
            $resolution->delete();
        }catch(\Exception $e){
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
        return redirect()->route('resolutions.index')->with('success', 'Résolution Supprimé avec succée');
    }
}
