<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    h1{
        text-align: center
    }
    .div1{
        display: flex;
        justify-content: center;
    }
</style>
<title>Modifier la note</title>
<h1>Modifier la note</h1>
<br>
<div class="div1">
<form action="{{ route('note.update', $note->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-stagiaire">
        <select name="module_id" id="module_id" class="form-control" placeholder="module_id">
            <option value="">Sélectionnez un module</option>
            @foreach($modules as $value)
                <option value="{{ $value->id }}" @if($note->module_id == $value->id) selected @endif >
                    {{ $value->libelle }}
                </option>
            @endforeach
        </select><br>
        <input type="text" name="note" id="note" class="form-control" value="{{ $note->note }}"><br>
        @error('note')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <select name="stagiaire_id" id="stagiaire_id" class="form-control" placeholder="stagiaire_id">
            <option value="{{ $note->stagiaire_id }}">{{ $note->stagiaire->nom }} {{ $note->stagiaire->prenom }}</option>
        </select>
    </div><br>
    <a href="javascript:history.back()" class="btn btn-secondary">Retour</a>
    <button type="submit" class="btn btn-primary">Modifier</button>
</form>
</div>
