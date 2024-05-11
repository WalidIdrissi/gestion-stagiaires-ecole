@extends('layouts.app')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/3264/3264289.png">
    <title>Liste des stagiaire</title>
</head>
<body>
    @include('index.menu')
    <div style="margin: 25px">
        <h2>Stagiaires</h2>
        <h6><a href="{{ route('groupe.index') }}" style="color: rgb(100, 100, 100);text-decoration: none;">Groupe</a> / {{ $groupe->groupe }}</h6><br>
        <div class="div-table">
            <a href="{{ route('stagiaire.create', ['groupe_id' => $groupe->id]) }}" class="btn btn-success">Ajouter un stagiaire</a>
            <input style="width: 200px;" type="text" name="rechercher" id="rechercher" class="form-control mx-auto" placeholder="Rechercher..."><br><br><br>
            @include('index.message')
            <table class="table table-hover">
                <thead class="thead-blue">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">nom</th>
                        <th scope="col">prenom</th>
                        <th scope="col">adresse</th>
                        <th scope="col">ville</th>
                        <th scope="col">email</th>
                        <th scope="col">photo</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($groupe->stagiaires as $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->nom }}</td>
                        <td>{{ $value->prenom }}</td>
                        <td>{{ $value->adresse }}</td>
                        <td>{{ $value->ville }}</td>
                        <td>{{ $value->email }}</td>
                        <td><img src="{{ asset($value->photo) }}" alt="Photo de stagiaire" width="100"></td>
                        <td>
                            <span>
                                <form action="{{ route('stagiaire.destroy', $value->id) }}" method="POST" onsubmit="return confirm('Vous voulez supprimer oui/non ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                                &nbsp;
                                <a href="{{ route('stagiaire.edit', $value->id) }}" class="btn btn-primary" style="height: 30px"><i class="fas fa-edit"></i></a>
                                &nbsp;
                                <a href="{{ route('stagiaire.show', $value->id) }}" class="btn btn-secondary" style="height: 30px"><i class="fas fa-graduation-cap"></i></a>
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const input = document.getElementById("rechercher");
        const rows = document.querySelectorAll("tbody tr");

        input.addEventListener("input", function() {
            const searchTerm = input.value.toLowerCase();

            rows.forEach(function(row) {
                const Name = row.querySelector("td:nth-child(2)").textContent.toLowerCase();

                if (Name.includes(searchTerm)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });
    });
</script>
