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
<title>Modifier le module</title>
<h1>Modifier le module</h1>
<br>
<div class="div1">
<form action="{{ route('module.update', $module->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-module">
        <input type="text" name="libelle" id="libelle" class="form-control" value="{{ $module->libelle }}"><br>
        @error('libelle')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="number" name="mh" id="mh" class="form-control" value="{{ $module->mh }}"><br>
        @error('mh')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="number" name="coef" id="coef" class="form-control" value="{{ $module->coef }}"><br>
        @error('coef')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <select name="filiere_id" id="filiere_id" class="form-control" placeholder="filiere_id">
            <option value="">Sélectionnez une filiere</option>
            @foreach($filieres as $value)
                <option value="{{ $value->id }}" @if($module->filiere_id == $value->id) selected @endif >
                    {{ $value->filiere }}
                </option>
            @endforeach
        </select>
        @error('filiere_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div><br>
    <a href="javascript:history.back()" class="btn btn-secondary">Retour</a>
    <button type="submit" class="btn btn-primary">Modifier</button>
</form>
</div>

