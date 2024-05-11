<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use App\Models\Filiere;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PHPUnit\Framework\Attributes\Group;

class GroupeController extends Controller
{
    public function index()
    {
        $groupes = Groupe::all();
        return view('groupe.index', compact('groupes'));
    }
    public function create($filiere_id)
    {
        $filiere = Filiere::findOrFail($filiere_id);
        return view('groupe.create', compact('filiere'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'groupe' => 'required|string|max:255',
            'filiere_id' => 'required|integer|min:0',
        ]);
        $groupe = Groupe::create([
            'groupe' => $request->input('groupe'),
            'filiere_id' => $request->input('filiere_id', null),
        ]);
        return redirect()->route('filiere.show', $request->input('filiere_id'))->with('success','groupe créé avec succès.');
    }
    public function show(Groupe $groupe)
    {
        $filiere = Filiere::findOrFail($groupe->filiere_id);
        return view('stagiaire.show', compact('groupe', 'filiere'));
    }
    public function edit(Groupe $groupe)
    {
        $filieres = Filiere::all();
        return view('groupe.edit', compact('groupe', 'filieres'));
    }
    public function update(Request $request, Groupe $groupe)
    {
        $request->validate([
            'groupe' => 'required|string|max:255',
            'filiere_id' => 'required|integer|min:0',
        ]);
        $groupe->update([
            'groupe' => $request->groupe,
            'filiere_id' => $request->input('filiere_id'),

        ]);
        return redirect()->route('groupe.index')->with('modif', 'Le groupe a été modifié avec succès.');
    }
    public function destroy(Groupe $groupe)
    {
        $groupe->delete();
        return redirect()->route('groupe.index')->with('supp', 'Le groupe a été supprimé avec succès.');
    }
}
