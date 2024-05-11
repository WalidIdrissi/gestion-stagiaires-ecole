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
<title>Modifier le stagiaire</title>
<h1>Modifier le stagiaire</h1>
<br>
<div class="div1">
<form action="{{ route('stagiaire.update', $stagiaire->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-stagiaire">
        <input type="text" name="nom" id="nom" class="form-control" value="{{ $stagiaire->nom }}"><br>
        @error('nom')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="text" name="prenom" id="prenom" class="form-control" value="{{ $stagiaire->prenom }}"><br>
        @error('prenom')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="text" name="adresse" id="adresse" class="form-control" value="{{ $stagiaire->adresse }}"><br>
        @error('adresse')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="text" name="ville" id="ville" class="form-control" value="{{ $stagiaire->ville }}"><br>
        @error('ville')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="email" name="email" id="email" class="form-control" value="{{ $stagiaire->email }}"><br>
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="photo">photo</label>
        <input type="file" name="photo" id="photo" class="form-control"><br>
        <select name="groupe_id" id="groupe_id" class="form-control" placeholder="groupe_id">
            <option value="">Sélectionnez un groupe</option>
            @foreach($groupes as $value)
                <option value="{{ $value->id }}" @if($stagiaire->groupe_id == $value->id) selected @endif >
                    {{ $value->groupe }}
                </option>
            @endforeach
        </select>
    </div><br>
    {{-- <a href="{{ route('stagiaire.index') }}" class="btn btn-secondary">Retour</a> --}}
    <a href="javascript:history.back()" class="btn btn-secondary">Retour</a>
    <button type="submit" class="btn btn-primary">Modifier</button>
</form>
</div>

