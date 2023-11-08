<?php

    /**
     * Este arquivo renderiza um template padrão sempre que a conexão com o banco de dados foi estabelecida e o usuário tenta acessar novamente o WELCOME.PHP. Com isso, o usuário não consegue visualizar a página com o botão de INICIAR como na primeira vez que está configurando a instância.
     */

    // Chama arquivos de configuração do banco de dados e funções
    include '.\config.php';
    include '.\includes\header.php';
?>

<body class="bg-dev">

    <div class="main h-100">
        <div class="main-default">
        <img src="//cdn-icons-png.flaticon.com/128/4997/4997543.png" alt="Logo DevJobs" width="78px">
        <h3>Sua instância está configurada!</h3>
        <div class="d-flex">
            <button id="start" class="btn-action mt-3">Começar</button>
            <button id="info" class="btn-action mt-3">Ver detalhes</button>
        </div>
        </div>
    </div>
  

    <script>
        // Este script adiciona um evento de "escuta" no botão de ID "start". Quando clicado, redireciona para o arquivo principal da aplicação (index.php).
        document.getElementById('start').addEventListener('click', function () {
            // Redirecionar para a página principal
            window.location.href = 'index.php';
        });

        
        document.getElementById('info').addEventListener('click', function () {
            // Abre modal com informações das configurações do banco de dados
            Swal.fire(
                '<?php 
                    echo '<p class="info">Host: ' . $host . '</p><br>';
                    echo '<p class="info">Username: ' . $username . '</p><br>';
                    echo '<p class="info">Password: ' . $password . '</p><br>';
                    echo '<p class="info">Database: ' . $database . '</p><br>';
                    ?>
                ')

        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <<?php
  // Inclui o restante do body necessário na página
        include '.\includes\body.php';
    ?>