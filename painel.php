<?php

    /**
     * Este arquivo monta a estrutura de página do Painel Administrativo.
     */

    require './config.php';
    require './functions.php';

    // Verifica se quem está acessando a página é um usuário administrador, se não for, redireciona para a página de login

    if (!(!empty($_SESSION) && isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == 'administrador')) {
        header('Location: login.php');
        exit;
      }

    // Verifique a conexão com o banco de dados
    if (checkDatabase($host, $username, $password, $database)) {

    // Monta estrutura da página requerindo os arquivos necessários para exibir a aplicação
    
    require './includes/header.php';
    include './includes/templates/painel-admin.php';
    require './includes/body.php';
    
} else {
    // Redirecione para welcome.php
    header('Location: welcome.php');
    exit;
}