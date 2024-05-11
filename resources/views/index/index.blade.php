<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/3264/3264289.png">
    <title>Index - Gestion de Stagiaires</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .background-image {
            margin-top: -25px;
            background-image: url('https://www.b2b-infos.com/wp-content/uploads/visuel-entreprise-certaines-deleguez-gestion.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            color: #fff;
        }
        .container {
            width: 80%;
        }
        header {
            position: absolute;
            text-align: center;
            top: 2px;
        }
        footer {
            position: absolute;
            text-align: center;
            bottom: 2px;
            padding: 2px;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 8px;
        }
    </style>
</head>
<body>
    @include('index.menu');
    <div class="background-image">
        <div class="container">
            <header>
                <h1>Gestion de Stagiaires</h1>
            </header>
            <footer>
                <p>&copy; Copyright WEBMARKO. Tous Les Droits Sont Réservés</p>
            </footer>
        </div>
    </div>
</body>
</html>
