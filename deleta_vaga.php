<?php

/**
 * Arquivo processa a ação de deletar informações no banco de dados
 */

require 'config.php'; //Inlcui o arquivo de configuração do banco de dados

// Verifica se a requisição é do tipo POST e se existe o dado vagaId no corpo da requisição
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['vagaId'])){

    $vagaId = $_POST['vagaId'];

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);

        $sql = "DELETE FROM vagas WHERE id = :vagaId";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':vagaId', $vagaId, PDO::PARAM_INT);

        if($stmt->execute()) {
            echo 'Vaga excluída com sucesso.';
        } else {
            echo 'Erro ao excluir vaga.';
        }

    } catch(PDOException $e) {
        echo 'Erro ao excluir vaga.';
    }

} else {
    echo 'ID da vaga não fornecido ou método de requisição não válido.';
}