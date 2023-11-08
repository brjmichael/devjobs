<?php

/**
 * Este arquivo é usado para fins de reutilização e otimização do código. Arqui serão configuradas algumas funções importantes para o funcionamento da aplicação.
 */


/**
 * Função responsável por verificar se o banco de dados já está configurado.
 */

function checkDatabase($host, $username, $password, $database) {
    try {
        // Instancia conexão com o DB
        $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);

        return true; // A conexão foi bem-sucedida.
        
    } catch (PDOException $e) {

        return false; // Erro de conexão.
    }
}


/**
 * Função responsável por acessar o banco de dados e validar o acesso do usuário
 */

 function verificarCredenciaisAdministrador($user, $pass) {
    require 'config.php'; // Inclui o arquivo de configuração do banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    
    // Consulta para verificar as credenciais no banco de dados
    $sql = "SELECT * FROM usuarios WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $user, PDO::PARAM_STR);
    $stmt->execute();
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifica se as credenciais do usuário estão corretas
    if ($admin) {
        // Um usuário com o email fornecido foi encontrado, verifique a senha
        if (password_verify($pass, $admin['senha']) && $admin['tipo_usuario'] === 'administrador') {
            return $admin; // As credenciais estão corretas
        }
    }

    return false; // Credenciais incorretas
}


?>