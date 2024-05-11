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
<h1>Ajouter un module</h1>
<br>
<div class="div1">
<form action="{{ route('module.store') }}" method="POST">
    @csrf
    <div class="form-module">
        <input type="text" name="libelle" id="libelle" class="form-control" placeholder="Nom du libelle"><br>
        @error('libelle')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="number" name="mh" id="mh" class="form-control" placeholder="mh"><br>
        @error('mh')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="number" name="coef" id="coef" class="form-control" placeholder="coef"><br>
        @error('coef')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <select name="filiere_id" id="filiere_id" class="form-control" placeholder="filiere_id">
            <option value="">selectioner une filiere</option>
            @foreach ($filieres as $filiere)
                <option value="{{ $filiere->id }}">{{ $filiere->filiere }}</option>
            @endforeach
        </select>
        @error('filiere_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div><br>
    <a href="javascript:history.back()" class="btn btn-secondary">Retour</a>
    <button type="submit" class="btn btn-success">Ajouter</button>
</form>
</div>

