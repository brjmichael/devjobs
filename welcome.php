<?php

    // Chama arquivos de configuração do banco de dados e funções
    require './config.php';
    require './functions.php';

    // Verifique a conexão com o banco de dados
    if (checkDatabase($host, $username, $password, $database)) {
    // A conexão foi bem-sucedida e a base de dados existe

    // Inclui template padrão
    include("./includes/templates/default.php");
    exit;
}

?>


<!-- Página padrão - caso instância ainda não esteja configurada -->
<?php
    include '.\config.php';
    include '.\includes\header.php';

?>

<body class="bg-dev">

    <div class="main h-100">
    <div class="main-default">
        <img src="//cdn-icons-png.flaticon.com/128/4997/4997543.png" alt="Logo DevJobs" width="78px">
            <h3>Bem-vindo ao projeto DevJobs</h3>
    <p class="text-light">Se você já modificou o arquivo CONFIG.PHP com as informações do seu banco de dados local, basta clicar no botão abaixo para iniciar a instalação automática da instância. Se tiver dúvida, leia a documentação <a href="#">clicando aqui</a>.</p>
    <button id="initialize" class="btn-action mt-3">Iniciar</button>
</div>
    </div>
    
    <script>
        // Este script "escuta" o evento de Click no botão Iniciar. Quando clicado, envia uma requisição para o arquivo backend reponsável por criar a conexão com o banco de dados.

        document.getElementById('initialize').addEventListener('click', function () {
            // Redirecionar para o script de inicialização
            window.location.href = 'connect.php';
        });
    </script>

    
    <?php
    // Inclui o restante do body necessário na página
        include '.\includes\body.php';
    ?>