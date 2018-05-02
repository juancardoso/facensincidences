<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>"/>
        <link href="<?= base_url('css/signin.css') ?>" rel="stylesheet">
        <title>Document</title>
    </head>
    <body>
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
        <a class="navbar-brand" href="#">{Usename}</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Listar Incidências</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Listar Tickets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Listar Usuários</a>
                </li>
            </ul>
            <div class="dropdown">
                <button class="btn btn-secondary btn-sm dropdown-toggle" style="background-color: #343a40; border-color: #343a40" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Opções
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Editar Perfil</a>
                    <a class="dropdown-item" href="#">Sair</a>
                </div>
            </div>
            <div style="margin-left: 10px">
                <img src="http://placehold.it/40x40" width="40px" style="border-radius: 20px">
            </div>
        </div>
    </nav>