// Função para listar as vagas

function listarVagas() {
    $.ajax({
        type: "GET",
        url: "listar_vagas.php", // Arquivo PHP que lista as vagas
        success: function (response) {
            // Preenche a div com as vagas
            $("#lista-vagas").html(response);
        },
        error: function (xhr, status, error) {
            // Lide com erros, exiba uma mensagem de erro
            console.error(error);
            $("#lista-vagas").html("Erro ao listar as vagas.");
        }
    });
}

// Chame a função para listar as vagas assim que a página carregar. Executando isso, qualquer alteração é reativa na página.
listarVagas();