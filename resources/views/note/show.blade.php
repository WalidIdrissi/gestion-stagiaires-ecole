@extends('layouts.app')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/3264/3264289.png">
    <title>Liste des notes</title>
    <style>
        .div-table-container {
            width: 80%;
            white-space: nowrap;
            margin: auto;
            padding: 40px;
            border-radius: 5px;
            position: relative;
            box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.2);
            text-align: center;
            background-image: url('{{ asset("images/th.jpg") }}');
            background-size: cover;
            background-position: center;
            margin-top:20px;
        }
        /* .nom{
            position: absolute;
            top: 100px;
            left: 90px;
        }
        .prenom{
            position: absolute;
            left: 90px;
            top: 160px;
        }

        .groupe{
            position: absolute;
            top: 100px;
            right: 90px;
        }
        .session{
            position: absolute;
            right: 90px;
        }
        .total{
            position: absolute;
            left: 90px;
        }
        .admi{
            position: absolute;
            right: 90px;
        } */

    </style>
</head>
<body>
    @include('index.menu')
    <div style="margin: 25px">
        <h2>Notes</h2>
        <h6><a href="{{ route('stagiaire.index') }}" style="color: rgb(100, 100, 100);text-decoration: none;">Stagiaire</a> / {{ $stagiaire->nom }} {{ $stagiaire->prenom }}</h6><br>

        <a href="javascript:history.back()" class="btn btn-secondary" style="margin-left: 100px">Retour</a>
        <button onclick="printContent()" style="margin-left: 5px" class="btn btn-primary">Imprimer</button><br><br>

        <div class="div-table-container">
            <div>
                <a href="{{ route('note.create', ['stagiaire_id' => $stagiaire->id]) }}" class="btn btn-success">Ajouter une note</a>
                <input style="width: 200px;" type="text" name="rechercher" id="rechercher" class="form-control mx-auto" placeholder="Rechercher..."><br><br><br>
            </div>
            <div id="printContent">
            <div style="margin-bottom: 15px;">

                <div class="nom_prenom" style="margin: 25px; display: flex; justify-content: space-between;">
                    <h5 class="nom">Nom: <b>{{ $stagiaire->nom }}</b></h5>
                    <h5 class="groupe">Groupe: <b>{{ $groupe->groupe }}</b></h5>
                </div>
                <div style="margin: 25px; display: flex; justify-content: space-between;">
                    <h5 class="prenom">Prénom: <b>{{ $stagiaire->prenom }}</b></h5>
                    <h5 class="session">Session: {{ \Carbon\Carbon::now()->locale('fr_FR')->isoFormat('MMMM YYYY') }}</h5>
                </div>

            </div>
            @include('index.message')
                <table class="table table-hover" style="width: 800px" >
                    <thead class="thead-blue">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">module</th>
                            <th scope="col">note/20</th>
                            <th scope="col">coefficient</th>
                            <th scope="col">coefficient*note</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total = 0;
                            $total_coef = 0;
                        @endphp
                        @if($stagiaire && $stagiaire->notes)
                            @foreach($stagiaire->notes as $key => $value)
                            @php
                                $product = $value->note * $value->module->coef;
                                $total += $product;
                                $total_coef += $value->module->coef;
                            @endphp
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $value->module->libelle }}</td>
                            <td>{{ $value->note }}</td>
                            <td>{{ $value->module->coef }}</td>
                            <td>{{ $value->note * $value->module->coef }}</td>
                            <td>
                                <span>
                                    <form action="{{ route('note.destroy', $value->id) }}" method="POST" onsubmit="return confirm('Vous voulez supprimer oui/non ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" style="height: 30px"><i class="fas fa-trash"></i></button>
                                    </form>
                                    &nbsp;
                                    <a href="{{ route('note.edit', $value->id) }}" class="btn btn-primary" style="height: 30px"><i class="fas fa-edit"></i></a>
                                </span>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>

                <div style="margin-bottom: 5%">
                    @if($total_coef > 0)
                        @php
                            $weighted_total = $total / $total_coef;
                            $weighted_total_formatted = number_format($weighted_total, 2);
                        @endphp
                        <h5 class="total">moyenne de passage : <b>{{ $weighted_total_formatted }}</b></h5>
                    @endif
                    <h5 class="admi">
                        décision :
                        @if(isset($weighted_total))
                        @if($weighted_total >= 10)
                           <b>admi</b>
                        @else
                           <b>non admi</b>
                        @endif
                        @endif
                    </h5>
                </div>
            </div>
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

    function printContent() {
        var content = document.getElementById('printContent').innerHTML;
        var printWindow = window.open('', '_blank');
        printWindow.document.open();
        printWindow.document.write(content);
        printWindow.document.close();
        printWindow.print();
    }

</script>
