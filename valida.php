<?php

/**
 * Este script é responsável por validar o login do usuário administrador
 */

 // Chama o arquivo de funções

require './functions.php';

// Salva os dados vindos do login-form em variáveis
$username_login = $_POST['user_login'];
$password_login = $_POST['pass_login'];

/**
 *  $admin recebe a resposta da função, que por sua vez faz validação no banco de dados (functions.php).
 * Se receber TRUE = O usuário pode iniciar a sessão.
 * Se receber FALSE = Usuário não pode iniciar a sessão e retorna um erro
 */
$admin = verificarCredenciaisAdministrador($username_login, $password_login);

// SE $admin receber TRUE...
if ($admin) {
        // As credenciais estão corretas, faça o que for necessário, como iniciar uma sessão e redirecionar o usuário
        
        // Armazene informações do usuário na sessão
        $_SESSION['user_nome'] = $admin['nome'];
        $_SESSION['tipo_usuario'] = 'administrador';

        echo "success";
        
} else {
    // Usuário não encontrado, retorna uma mensagem de erro
    echo 'Usuário ou senha incorreto';
}