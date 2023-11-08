<?php

/**
 * Este arquivo é essencial para o funcionamento do sistema. Configure-o corretamente de acordo com as informações do seu banco de dados.
 * AVISO: Não altere o nome das variáveis configuradas abaixo, tal ação fará com que a aplicação pare de funcionar corretamente.
 */

// Inicia a sessão para identificar o usuário conectado. Inclui apenas uma vez o session.php para evitar conflitos.
include_once 'session.php';

/**
 * Configurando o banco de dados MySql
 * Preencha com as informações do seu banco de dados
 */

$host = 'localhost'; // Insira o host do seu banco de dados - normalmente é 'localhost'
$username = 'root'; // Insira o usuário do seu banco de dados - normalmente é 'root'
$password = ''; // Insira a senha do seu banco de dados - - normalmente é vazia
$database = 'devjobs'; // Não é necessário alterar o nome da base da dados

?>