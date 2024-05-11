<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FiliereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filieres = Filiere::all();
        return view('filiere.index', compact('filieres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('filiere.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'filiere' => 'required|string|max:255',
        ]);
        $filiere = new Filiere();
        $filiere->filiere = $request->filiere;
        $filiere->save();
        return redirect()->route('filiere.index')->with('success','filiere créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Filiere $filiere)
    {
        return view('groupe.show', compact('filiere'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Filiere $filiere)
    {
        return view('filiere.edit', compact('filiere'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Filiere $filiere)
    {
        $request->validate([
            'filiere' => 'required|string|max:255',
        ]);
        $filiere->update([
            'filiere' => $request->filiere,
        ]);
        return redirect()->route('filiere.index')->with('modif', 'Le filiere a été modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Filiere $filiere)
    {
        $filiere->delete();
        return redirect()->route('filiere.index')->with('supp', 'La filiere a été supprimé avec succès.');
    }
}
