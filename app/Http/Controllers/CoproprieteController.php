<?php

namespace App\Http\Controllers;

use App\Models\Charge;
use App\Models\Copropriete;
use App\Http\Requests\CoproprieteRequest;
use App\Models\Immeuble;
use App\Models\Ville;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class CoproprieteController extends Controller
{
    public function __construct(){
        $this->middleware('permission:copropriete-list|copropriete-create|copropriete-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:copropriete-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:copropriete-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:copropriete-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coproprietes = Copropriete::with('ville')->paginate(10);
        $villes = Ville::orderBy('nom')->get();

        return view('coproprietes.index', compact('coproprietes', 'villes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villes = Ville::orderBy('nom')->get();
        $immeubles = Immeuble::orderBy('nom')->get();
        $coproprietaires = Role::where('name', 'Copropriétaire')->first()->users()->get();
        return view('coproprietes.create', compact('villes', 'immeubles', 'coproprietaires'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CoproprieteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CoproprieteRequest $request)
    {
        try{
            Copropriete::create($request->all());
        }catch(\Exception $e){
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
        return redirect()->route('coproprietes.index')->with('success', 'Copropriété créer avec succée');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Copropriete  $copropriere
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $copropriete = Copropriete::findOrFail($id);
        return view('coproprietes.show', compact('copropriete'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Copropriete  $copropriere
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $copropriete = Copropriete::findOrFail($id);
        $villes = Ville::orderBy('nom')->get();
        $immeubles = Immeuble::orderBy('nom')->get();
        $coproprietaires = Role::where('name', 'Copropriétaire')->first()->users()->get();
        return view('coproprietes.edit', compact('copropriete', 'villes', 'immeubles', 'coproprietaires'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\CoproprieteRequest  $request
     * @param  \App\Models\Copropriete  $copropriere
     * @return \Illuminate\Http\Response
     */
    public function update(CoproprieteRequest $request, $id)
    {
        try{
            $copropriete = Copropriete::findOrFail($id);
            $copropriete->update($request->all());
        }catch(\Exception $e){
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
        return redirect()->route('coproprietes.index')->with('success', 'Copropriété Modifié avec succée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Copropriete  $copropriere
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $copropriete = Copropriete::findOrFail($id);
            $copropriete->delete();
        }catch(\Exception $e){
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
        return redirect()->route('coproprietes.index')->with('success', 'Copropriété Supprimé avec succée');
    }

    public function getCharges(Request $request){
        $coproprieteId = $request->input('copropriete_id');
        $charges = Charge::where('copropriete_id', $coproprieteId)->get();
        return response()->json(['charges' => $charges]);
    }
}
