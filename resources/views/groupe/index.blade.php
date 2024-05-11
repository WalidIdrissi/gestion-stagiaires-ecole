@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/3264/3264289.png">
    <title>Liste des groupes</title>
</head>
<body>
    @include('index.menu')
    <div style="margin: 25px">
        <h2>Tous les groupes {{ App\Models\Groupe::count() }}</h2><br><br>
        <div class="div-table">
            <input type="text" name="rechercher" id="rechercher" class="form-control" placeholder="Rechercher..."><br><br><br>
            @include('index.message')
            <table class="table table-hover">
                <thead class="thead-blue">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">groupe</th>
                        <th scope="col">filiere</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($groupes as $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->groupe }}</td>
                        <td>{{ $value->filiere->filiere }}</td>
                        <td>
                            <span>
                                <form action="{{ route('groupe.destroy', $value->id) }}" method="POST" onsubmit="return confirm('Vous voulez supprimer oui/non ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="showSuccessMessage()"><i class="fas fa-trash"></i></button>
                                </form>
                                &nbsp;
                                <a href="{{ route('groupe.edit', $value->id) }}" class="btn btn-primary " style="height: 30px"><i class="fas fa-edit"></i></a>
                                &nbsp;
                                <a href="{{ route('groupe.show', $value->id) }}" class="btn btn-secondary " style="height: 30px"><i class="fas fa-user-graduate"></i></a>
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
