<?php
    /**
     * Estrutura principal da aplicação
     */

    // Chama arquivos de configuração do banco de dados e funções
    require './config.php';
    require './functions.php';

    /**
     * Verifique a conexão com o banco de dados
     * Esta função passa os parâmetros de conexão com o banco de dados configuradas no arquivo config.php
     * Se a conexão com o banco de dados já estiver estabelecida e devidamente configurada, monta a estrutura html para exibir a mensagem correspondente.
     * Caso o banco de dados não esteja configurado, a página Welcome.php é exibida e nela é possível interagir com um botão que faz a configuração automaticamente.
     */

    if (checkDatabase($host, $username, $password, $database)) {

    // Monta estrutura da página requerindo os arquivos necessários para exibir a aplicação
    
    require './includes/header.php';
    include './includes/templates/home.php';
    require './includes/body.php';
    
} else {
    // Redireciona para a página padrão de configuração
    header('Location: welcome.php');
    exit;
}
