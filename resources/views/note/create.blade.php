<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    h1{
        text-align: center
    }
    .div1{
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
<title>Ajouter une note</title>
<h1>Ajouter une note {{ $stagiaire->nom }} {{ $stagiaire->prenom }}</h1>
<br>
<div class="div1">
<form action="{{ route('note.store') }}" method="POST">
    @csrf
    <div class="form-module">
        <select name="module_id" id="module_id" class="form-control" placeholder="module_id">
            <option value="">Sélectionnez un module</option>
            @foreach($modules as $value)
                <option value="{{ $value->id }}">{{ $value->libelle }}</option>
            @endforeach
        </select><br>
        <input type="text" name="note" id="note" class="form-control" placeholder="note"><br>
        @error('note')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <select name="stagiaire_id" id="stagiaire_id" class="form-control" placeholder="stagiaire_id">
            <option value="{{ $stagiaire->id }}">{{ $stagiaire->nom }} {{ $stagiaire->prenom }}</option>
        </select>
    </div><br>
    <a href="javascript:history.back()" class="btn btn-secondary">Retour</a>
    <button type="submit" class="btn btn-success">Ajouter</button>
</form>
</div>

