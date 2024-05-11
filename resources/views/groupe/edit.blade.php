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
<title>Modifier le groupe</title>
<h1>Modifier le groupe</h1>
<br>
<div>
<form action="{{ route('groupe.update', $groupe->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <input type="text" name="groupe" id="groupe" class="form-control" value="{{ $groupe->groupe }}">
    </div><br>
    @error('groupe')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
        <select name="filiere_id" id="filiere_id" class="form-control" placeholder="filiere_id">
            <option value="">Sélectionnez une filière</option>
            @foreach($filieres as $value)
                <option value="{{ $value->id }}" @if($groupe->filiere_id == $value->id) selected @endif >
                    {{ $value->filiere }}
                </option>
            @endforeach
        </select>
    </div><br>
    <a href="javascript:history.back()" class="btn btn-secondary">Retour</a>
    <button type="submit" class="btn btn-primary" onclick="showSuccessMessage()">Modifier</button>
</form>
</div>

