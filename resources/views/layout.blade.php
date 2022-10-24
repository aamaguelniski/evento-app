<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evento APP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid container-sm">
        <a class="navbar-brand" href="{{ url( '/' ) }}">EventoAPP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/">Página Inicial</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/participantes">Participantes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/salas">Salas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/cafes">Espaços de Café</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>

@yield( 'content' )