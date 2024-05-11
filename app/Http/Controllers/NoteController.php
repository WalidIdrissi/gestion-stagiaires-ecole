<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Module;
use App\Models\Stagiaire;
use App\Models\Groupe;
use App\Models\Filiere;


class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::all();
        return view('note.index', compact('notes'));
    }
    public function create($stagiaire_id)
    {
        $stagiaire = Stagiaire::findOrFail($stagiaire_id);
        $groupe = Groupe::findOrFail($stagiaire->groupe_id);
        $filiere = Filiere::findOrFail($groupe->filiere_id);
        $modules = $filiere->modules;

        return view('note.create', compact('modules', 'stagiaire'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'note' => 'numeric|min:0|max:20',
            'module_id' => 'required|integer|min:0',
            'stagiaire_id' => 'required|integer|min:0',
        ]);
        $note = new Note();
        $note->note = $request->note;
        $note->module_id = $request->module_id;
        $note->stagiaire_id = $request->stagiaire_id;

        note::create($request->all());
        return redirect()->route('stagiaire.show', $request->input('stagiaire_id'))->with('success','note créée avec succès.');
    }
    public function show(Note $note)
    {
        $note = Note::find($note);
        return view('note.show', compact('note'));
    }
    public function edit(Note $note)
    {
        $modules = $note->stagiaire->groupe->filiere->modules;
        $stagiaires=Stagiaire::all();
        return view('note.edit', compact('note', 'modules', 'stagiaires'));
    }
    public function update(Request $request, Note $note)
    {
        $request->validate([
            'note' => 'numeric|min:0|max:20',
            'module_id' => 'required|string|min:0',
            'stagiaire_id' => 'required|string|min:0',
        ]);
        $note->update([
            'note' => $request->input('note'),
            'module_id' => $request->input('module_id'),
            'stagiaire_id' => $request->input('stagiaire_id'),
        ]);
        return redirect()->route('stagiaire.show', $note->stagiaire_id)->with('modif', 'La note a été modifiée avec succès.');
    }
    public function destroy(Note $note)
    {
        $note->delete();
        $stagiaireId = $note->stagiaire_id;
        return redirect()->route('stagiaire.show', $stagiaireId)->with('supp', 'La note a été supprimée avec succès.');
    }
}
