<?php

namespace App\Http\Controllers;
use App\Models\Groupe;
use App\Models\Stagiaire;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class StagiaireController extends Controller
{
    public function index()
    {
        $stagiaires = Stagiaire::all();
        return view('stagiaire.index', compact('stagiaires'));
    }
    public function create($groupe_id)
    {
        $groupe = Groupe::findOrFail($groupe_id);
        return view('stagiaire.create', compact('groupe'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'email' => 'required|email|unique:stagiaires,email',
            'photo' => 'nullable|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'groupe_id' => 'required|integer|min:0',
        ]);

        $filename = null;
        $path = 'uploads/photo';
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move($path, $filename);
        }

        $stagiaire = Stagiaire::create([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'adresse' => $request->input('adresse'),
            'ville' => $request->input('ville'),
            'email' => $request->input('email'),
            'photo' => $filename ? $path . '/' . $filename : null,
            'groupe_id' => $request->input('groupe_id'),//, null
        ]);
        return redirect()->route('groupe.show', $request->input('groupe_id'))->with('success', 'Stagiaire créé avec succès.');
    }

    public function show(Stagiaire $stagiaire)
    {
        $notes = $stagiaire->notes;
        $groupe = Groupe::findOrFail($stagiaire->groupe_id);
        return view('note.show', compact('stagiaire', 'notes', 'groupe'));
    }
    public function edit(Stagiaire $stagiaire)
    {
        $groupes = Groupe::all();
        return view('stagiaire.edit', compact('stagiaire', 'groupes'));
    }
    public function update(Request $request, Stagiaire $stagiaire)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'email' => 'required|email|unique:stagiaires,email,'.$stagiaire->id,
            'photo' => 'nullable|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'groupe_id' => 'required|string|max:255',
        ]);

        $photoPath = $stagiaire->photo;
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'uploads/photo';
            $file->move($path, $filename);
            $photoPath = $path . '/' . $filename;
        }

        $stagiaire->update([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'adresse' => $request->input('adresse'),
            'ville' => $request->input('ville'),
            'email' => $request->input('email'),
            'photo' => $photoPath,
            'groupe_id' => $request->input('groupe_id'),
        ]);

        return redirect()->route('groupe.show', $stagiaire->groupe_id)->with('modif', 'Le stagiaire a été modifié avec succès.');
    }

    public function destroy(Stagiaire $stagiaire)
    {
        $stagiaire->delete();
        $groupeId = $stagiaire->groupe_id;
        return redirect()->route('groupe.show', $groupeId)->with('supp', 'Le stagiaire a été supprimé avec succès.');
    }
}
