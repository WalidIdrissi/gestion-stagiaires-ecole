@extends('layouts.app')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/3264/3264289.png">
    <title>Liste des modules</title>
</head>
<body>
    @include('index.menu')
    <div style="margin: 25px">
        <h2>Modules</h2><br>
        <div class="div-table">
            <a href="{{ route('module.create') }}" class="btn btn-success">Ajouter un module</a>
            <input style="width: 200px;" type="text" name="rechercher" id="rechercher" class="form-control mx-auto" placeholder="Rechercher..."><br><br><br>
            @include('index.message')
            <table class="table table-hover">
                <thead class="thead-blue">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">libelle</th>
                        <th scope="col">coefficient</th>
                        <th scope="col">mh</th>
                        <th scope="col">filiere</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($modules as $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->libelle }}</td>
                        <td>{{ $value->coef }}</td>
                        <td>{{ $value->mh }} <b>h</b></td>
                        <td>{{ $value->filiere->filiere }}</td>
                        <td>
                            <span>
                                <form action="{{ route('module.destroy', $value->id) }}" method="POST" onsubmit="return confirm('Vous voulez supprimer oui/non ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                                &nbsp;
                                <a href="{{ route('module.edit', $value->id) }}" class="btn btn-primary" style="height: 30px"><i class="fas fa-edit"></i></a>
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
