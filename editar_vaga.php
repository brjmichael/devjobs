<?php

/**
 * Arquivo processa a ação de editar informações no banco de dados
 */

require 'config.php'; // Inclua o arquivo de configuração do banco de dados

// Verifique se a solicitação é uma requisição POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupere os dados do formulário e salva em variáveis correspondentes
    $vagaId = $_POST['vagaId'];
    $novoTitulo = $_POST['titulo'];
    $novaEmpresa = $_POST['empresa'];
    $novaDescricao = $_POST['descricao'];
    $novosRequisitos = $_POST['requisitos'];

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);

        // Consulta para atualizar os detalhes da vaga com base no ID
        $sql = "UPDATE vagas SET titulo = :titulo, descricao = :descricao, empresa = :empresa, requisitos = :requisitos WHERE id = :vagaId";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':vagaId', $vagaId, PDO::PARAM_INT);
        $stmt->bindParam(':empresa', $novaEmpresa, PDO::PARAM_STR);
        $stmt->bindParam(':titulo', $novoTitulo, PDO::PARAM_STR);
        $stmt->bindParam(':descricao', $novaDescricao, PDO::PARAM_STR);
        $stmt->bindParam(':requisitos', $novosRequisitos, PDO::PARAM_STR);

        // Executa um retorno em JSON
        if ($stmt->execute()) {
            // Atualização bem-sucedida
            echo json_encode(['success' => 'Vaga atualizada com sucesso.']);
        } else {
            echo json_encode(['error' => 'Erro ao atualizar a vaga.']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Erro ao atualizar a vaga.']);
    }
} else {
    echo json_encode(['error' => 'ID da vaga não fornecido.']);
}

?>