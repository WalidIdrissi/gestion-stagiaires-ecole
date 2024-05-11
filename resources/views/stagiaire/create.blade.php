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
<title>Ajouter un stagiaire</title>
<h1>Ajouter un stagiaire dans {{ $groupe->groupe }}</h1>
<br>
<div class="div1">

<form action="{{ route('stagiaire.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-module">
        <input type="text" name="nom" id="nom" class="form-control" placeholder="nom"><br>
        @error('nom')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="text" name="prenom" id="prenom" class="form-control" placeholder="prenom"><br>
        @error('prenom')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="text" name="adresse" id="adresse" class="form-control" placeholder="adresse"><br>
        @error('adresse')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="text" name="ville" id="ville" class="form-control" placeholder="ville"><br>
        @error('ville')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="email" name="email" id="email" class="form-control" placeholder="email"><br>
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="photo">photo</label>
        <input type="file" name="photo" id="photo" class="form-control" placeholder="photo"><br>
        <select name="groupe_id" id="groupe_id" class="form-control" placeholder="groupe_id">
            <option value="{{ $groupe->id }}">{{ $groupe->groupe }}</option>
        </select>
    </div><br>
    <a href="javascript:history.back()" class="btn btn-secondary">Retour</a>
    <button type="submit" class="btn btn-success">Ajouter</button>
</form>
</div>

