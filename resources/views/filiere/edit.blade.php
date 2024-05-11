<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    h1{
        text-align: center
    }
    div{
        display: flex;
        justify-content: center;
    }
</style>
<title>Modifier la filiere</title>
<h1>Modifier la filiere</h1>
<br>
<div>
<form action="{{ route('filiere.update', $filiere->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <input type="text" name="filiere" id="filiere" class="form-control" value="{{ $filiere->filiere }}">
    </div><br>
    @error('filiere')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <a href="javascript:history.back()" class="btn btn-secondary">Retour</a>
    <button type="submit" class="btn btn-primary" onclick="showSuccessMessage()">Modifier</button>
</form>
</div>

