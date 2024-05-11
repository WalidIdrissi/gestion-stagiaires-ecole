<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        h1 {
            text-align: center
        }

        div {
            display: flex;
            justify-content: center;
        }
    </style>
    <title>Ajouter une filière</title>
</head>
<body>
    <h1>Ajouter une filière</h1><br>
    <div>
        <form action="{{ route('filiere.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" name="filiere" id="filiere" class="form-control" placeholder="Nom filière">
            </div><br>
            @error('filiere')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <a href="javascript:history.back()" class="btn btn-secondary">Retour</a>
            <button type="submit" class="btn btn-success">Ajouter</button>
        </form>
    </div>
</body>
</html>
