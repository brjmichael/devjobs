<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DevJobs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="./assets/style/geral.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Outfit:wght@200&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>
    
</head>
<body class="bg-dev">
<div class="hero">

<div class="circle-hero-home-one"></div>
<div class="circle-hero-home-two"></div>

<header class="p-3 text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="./" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <img src="./assets/img/logo.svg" width="180px">
        </a>

        <ul class="nav container col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="./" class="nav-link px-2 text-secondary">Início</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Vagas</a></li>
        </ul>

        <div class="text-end">

        <?php

          // Exibe botões SAIR e PAINEL DE CONTROLE apenas se o usuário da sessão atual for do tipo 'administrador'
          if (!empty($_SESSION) && isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == 'administrador') {
              echo '
              <button type="button" id="logout" class="btn-login">Sair</button>
              <button type="button" id="painel" class="btn-action">Painel de Controle</button>
              ';
          } else {
              echo '
              <button type="button" id="login" class="btn-login">Login</button>
              ';
          }
          ?>


        </div>
      </div>
    </div>
  </header>
  