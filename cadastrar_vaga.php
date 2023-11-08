<?php

/**
 * Este arquivo realiza o cadastro da vaga no banco de dados
 */

require 'config.php'; // Inclua o arquivo de configuração do banco de dados

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $empresa = $_POST['empresa'];
    $descricao = $_POST['descricao'];
    $requisitos = $_POST['requisitos'];

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);

        $sql = "INSERT INTO vagas (titulo, empresa, descricao, requisitos) VALUES (:titulo, :empresa, :descricao, :requisitos)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':empresa', $empresa);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':requisitos', $requisitos);
        $stmt->execute();

        // Se o cadastro foi bem-sucedido, você pode retornar uma resposta de sucesso
        echo "success";
    } catch (PDOException $e) {
        // Em caso de erro, você pode retornar uma resposta de erro
        echo 'Erro: ' . $e->getMessage();
    }
}
?>