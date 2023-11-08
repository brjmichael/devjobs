<?php

/**
 * Este arquivo monta a estrutura de LOGIN.
 */
    require './config.php';
    require './functions.php';

    // Verifica se o administrador já está logado, se sim, redireciona para o painel.
    if (!empty($_SESSION) && isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == 'administrador') {
        header('Location: painel.php');
        exit;
      }

    // Verifique a conexão com o banco de dados
    if (checkDatabase($host, $username, $password, $database)) {

    // Monta estrutura da página requerindo os arquivos necessários para exibir a aplicação
    
    require './includes/header.php';
    include './includes/templates/login-form.php';
    require './includes/body.php';
    
} else {
    header('Location: welcome.php');
    exit;
}