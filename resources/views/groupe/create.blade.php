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
<title>Ajouter un groupe</title>
<h1>Ajouter un groupe dans {{ $filiere->filiere }}</h1><br>
<div>
    <form action="{{ route('groupe.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <input type="text" name="groupe" id="groupe" class="form-control" placeholder="groupe">
        </div><br>
        @error('groupe')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <select name="filiere_id" id="filiere_id" class="form-control" placeholder="filiere_id">
                <option value="{{ $filiere->id }}">{{ $filiere->filiere }}</option>
            </select>
        </div><br>
        <a href="javascript:history.back()" class="btn btn-secondary">Retour</a>
        <button type="submit" class="btn btn-success" onclick="showSuccessMessage()">Ajouter</button>
    </form>
</div>

