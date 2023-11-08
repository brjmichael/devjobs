<?php

/**
 * Este arquivo realiza busca uma vaga através de parâmetro passado por GET para preencher os campos do formulário de edição.
 */

require 'config.php'; // Inclua o arquivo de configuração do banco de dados

// Verifica se o ID da vaga foi fornecido via parâmetro GET
if (isset($_GET['vagaId'])) {
    $vagaId = $_GET['vagaId'];

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);

        // Consulta para buscar os detalhes da vaga com base no ID
        $sql = "SELECT id, empresa, titulo, descricao, requisitos FROM vagas WHERE id = :vagaId";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':vagaId', $vagaId, PDO::PARAM_INT);
        $stmt->execute();
        $vaga = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($vaga) {
            // Retorna os dados da vaga em formato JSON
            echo json_encode($vaga);
        } else {
            echo json_encode(['error' => 'Vaga não encontrada.']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Erro ao buscar a vaga.']);
    }
} else {
    echo json_encode(['error' => 'ID da vaga não fornecido.']);
}