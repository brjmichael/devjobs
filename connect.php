<?php

/**
 * Este arquivo realiza a conexão com o banco de dados, gera as tabelas e cria um administrador padrão.
 */

// Requer o arquivo contendo informações do banco de dados
require './config.php';

// Por favor, não modifique o código abaixo. Isso é responsável por tentar criar a conexão com o banco de dados usando as informações fornecidas no arquivo config.php

try {

    // Conectar ao banco de dados
    $pdo = new PDO("mysql:host=$host", $username, $password);

    // Cria DATABASE se ainda não existir
    $pdo->exec("CREATE DATABASE IF NOT EXISTS $database");

    // Usa o banco de dados
    $pdo->exec("USE $database");

    // Cria tabelas

    $createTable = "
        
        -- TABELA USUÁRIOS

        CREATE TABLE usuarios (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nome VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            senha VARCHAR(255) NOT NULL,
            tipo_usuario ENUM('administrador', 'candidato') NOT NULL,
            data_cadastro DATETIME DEFAULT CURRENT_TIMESTAMP
        );

        -- TABELA VAGAS

        CREATE TABLE vagas (
            id INT AUTO_INCREMENT PRIMARY KEY,
            titulo VARCHAR(255) NOT NULL,
            descricao TEXT NOT NULL,
            requisitos TEXT,
            data_publicacao DATETIME DEFAULT CURRENT_TIMESTAMP,
            empresa VARCHAR(255) NOT NULL
        );

    ";

    $pdo->exec($createTable);
    
    // Inserir um usuário administrador padrão
    $adminNome = 'admin';
    $adminEmail = 'admin@admin.com';
    $adminSenhaHash = password_hash('admin', PASSWORD_DEFAULT); // Hash da senha 'admin'
    $adminTipoUsuario = 'administrador';

    $inserirUsuario = $pdo->prepare("INSERT INTO usuarios (nome, email, senha, tipo_usuario) VALUES (:nome, :email, :senha, :tipo_usuario)");
    $inserirUsuario->bindParam(':nome', $adminNome);
    $inserirUsuario->bindParam(':email', $adminEmail);
    $inserirUsuario->bindParam(':senha', $adminSenhaHash);
    $inserirUsuario->bindParam(':tipo_usuario', $adminTipoUsuario);
    $inserirUsuario->execute();

    // Inicie a sessão
    session_start();

    // Armazene os detalhes do administrador na sessão
    $_SESSION['user_id'] = $pdo->lastInsertId(); // ID do administrador
    $_SESSION['user_nome'] = $adminNome;
    $_SESSION['user_email'] = $adminEmail;
    $_SESSION['tipo_usuario'] = $adminTipoUsuario;

    // Redireciona para a página principal
    header('Location: welcome.php');
    exit;
    
} catch (PDOException $e) {
    die ('Erro de conexão: ' . $e->getMessage());
}

?>