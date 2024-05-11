<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Filiere;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modules = Module::all();
        return view('module.index', compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $filieres = Filiere::all();
        return view('module.create', compact('filieres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'mh' => 'integer',
            'coef' => 'integer',
            'filiere_id' => 'required|integer|min:0',
        ]);
        $module = new Module();
        $module->module = $request->module;
        module::create($request->post());
        return redirect()->route('module.index')->with('success','module créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Module $module)
    {
        $groupe = Module::find($module);
        return view('module.show', compact('module'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Module $module)
    {
        $filieres = Filiere::all();
        return view('module.edit', compact('module', 'filieres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Module $module)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'mh' => 'integer',
            'coef' => 'integer',
            'filiere_id' => 'required|integer|min:0',
        ]);
        $module->update([
            'libelle' => $request->input('libelle'),
            'mh' => $request->input('mh'),
            'coef' => $request->input('coef'),
            'filiere_id' => $request->input('filiere_id'),
        ]);
        return redirect()->route('module.index')->with('modif', 'Le module a été modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Module $module)
    {
        $module->delete();
        return redirect()->route('module.index')->with('supp', 'Le module a été supprimé avec succès.');
    }
}
