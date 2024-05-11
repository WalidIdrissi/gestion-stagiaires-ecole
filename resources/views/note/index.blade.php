<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@include('index.menu')
<h1>note</h1>
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/3264/3264289.png">
    <title>Liste des notes</title>
</head>
<body>
    @include('index.menu')
    <h1>Liste des notes</h1>
    <br>
    <a href="{{ route('note.create') }}" class="btn btn-success start-50 position-absolute translate-middle">Ajouter une note</a>
    <br>
    @include('index.message')
    <div>
    <table class="table table-striped" style="width: 800px">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">note</th>
                <th scope="col">module</th>
                <th scope="col">stagiaire</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notes as $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->note }}</td>
                <td>{{ $value->module->libelle }}</td>
                <td>{{ $value->stagiaire->nom }} {{ $value->stagiaire->prenom }}</td>
                <td>
                    <span>
                        <form action="{{ route('note.destroy', $value->id) }}" method="POST" onsubmit="return confirm('Vous voulez supprimer oui/non ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                        &nbsp;
                        <a href="{{ route('note.edit', $value->id) }}" class="btn btn-primary">Modifier</a>
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> --}}
