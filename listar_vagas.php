<?php

/**
 * Arquivo responsável pela lisagem das vagas no backend.
 */

require 'config.php'; // Inclua o arquivo de configuração do banco de dados

try {
    //Instancia o banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);

    // Seleciona todos os campos da tabela vagas
    $sql = "SELECT id, titulo, empresa, descricao, requisitos, DATE_FORMAT(data_publicacao, '%d/%m/%Y') AS data_publicacao_formatada FROM vagas";
    $stmt = $pdo->query($sql);
    $vagas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //Verifica se existem pelo menos 1 item na tabela, se sim, retorna uma estrutura HTML que monta os CARDS de vagas no Frontend.
    if (count($vagas) > 0) {
        // Exiba as vagas em uma lista não ordenada
        foreach ($vagas as $vaga) {
            echo "<div class=\"card-vaga\">";

            //Exibe o botão de editar somente se o usuário da sessão for 'administrador'
            if (!empty($_SESSION) && isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == 'administrador') {
            echo '<button class="btn-editar" data-vaga-id="' . $vaga['id'] . '"><i class="bi bi-pen"></i></button>';
            }

            echo "<h2 class=\"empresa\">{$vaga['empresa']}</h2>";
            echo "<h2 class=\"titulo\">{$vaga['titulo']}</h2>";
            echo "<p>{$vaga['descricao']}</p>";
            echo "<p>Requisitos: {$vaga['requisitos']}</p>";
            echo "<p class=\"data_publicacao\">Publicada em {$vaga['data_publicacao_formatada']}</p>";

            //Exibe o botão de excluir somente se o usuário da sessão for 'administrador'
            if (!empty($_SESSION) && isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == 'administrador') {
            echo '<p class="deleta-item" data-vaga-id="' . $vaga['id'] . '">Deletar vaga</p>';
            }
            
            echo "</div>";
        }
    } else {
        echo "Nenhuma vaga encontrada.";
    }
} catch (PDOException $e) {
    echo "Erro ao listar as vagas.";
}
?>