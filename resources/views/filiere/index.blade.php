@extends('layouts.app')
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/3264/3264289.png">
    <title>Liste des filieres</title>
</head>
<body>
@include('index.menu')
<div style="margin: 25px">
<h2>Filieres</h2><br>
<div class="div-table">

<a href="{{ route('filiere.create') }}" class="btn btn-success">Ajouter une filiere</a>
<input style="width: 200px;" type="text" name="rechercher" id="rechercher" class="form-control mx-auto" placeholder="Rechercher..."><br><br><br>
@include('index.message')

<div class="card-container">
    @php
        $colors = ['#007bff','#6c757d','#28a745','#dc3545','#ffc107','#17a2b8','#6610f2','#fd7e14','#6f42c1','#45aaf2','#20c997','#adb5bd','#6c757d','#fd7e14',];
        $colorIndex = 0;
    @endphp
    @foreach($filieres as $value)
        <div class="card text-white mb-3" style="max-width: 18rem; background-color: {{ $colors[$colorIndex] }};">
            <div class="card-header">{{ $value->filiere }}</div>
            <div class="card-body">
                <span>
                    <form action="{{ route('filiere.destroy', $value->id) }}" method="POST" onsubmit="return confirm('Vous voulez supprimer oui/non ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="showSuccessMessage()"><i class="fas fa-trash"></i></button>
                    </form>&nbsp;
                    <a href="{{ route('filiere.edit', $value->id) }}" class="btn btn-primary" style="height: 30px"><i class="fas fa-edit"></i></a>&nbsp;
                    <a href="{{ route('filiere.show', $value->id) }}" class="btn btn-secondary" style="height: 30px"><i class="fas fa-users"></i></a>
                </span>
            </div>
        </div>

        @php
        $colorIndex = ($colorIndex + 1) % count($colors);
        @endphp
    @endforeach
</div>
</div>
</div>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const input = document.getElementById("rechercher");
        const cards = document.querySelectorAll(".card");

        input.addEventListener("input", function() {
            const searchTerm = input.value.toLowerCase();

            cards.forEach(function(card) {
                const cardHeader = card.querySelector(".card-header").textContent.toLowerCase();

                if (cardHeader.includes(searchTerm)) {
                    card.style.display = "block";
                } else {
                    card.style.display = "none";
                }
            });
        });
    });
</script>

