//Script responsável por enviar a solicitação de UPDATE para o backend

document.addEventListener("DOMContentLoaded", function () {
    document.body.addEventListener('click', function(event) {
                // Verifique se o elemento clicado tem a classe "btn-editar"
                if (event.target.classList.contains('btn-editar')) {
                    // Você pode acessar o ID da vaga usando o atributo "data-vaga-id"
                    var vagaId = event.target.getAttribute('data-vaga-id');
                    // Faça o que você precisa fazer com o ID da vaga
                    $.ajax({
                    type: "GET",
                    url: "buscar_vaga.php?vagaId=" + vagaId, // Arquivo PHP para buscar os dados da vaga
                    success: function (data) {
    
                        var detalhesVaga = JSON.parse(data);
                        var modalBody = document.querySelector(".modal-body");
    
                        if (modalBody) {
                        // A partir do elemento .modal-body, selecione os campos específicos pelo ID
                        var idField = modalBody.querySelector("#vagaId");
                        var empresaField = modalBody.querySelector("#empresa");
                        var tituloField = modalBody.querySelector("#titulo");
                        var descricaoField = modalBody.querySelector("#descricao");
                        var requisitosField = modalBody.querySelector("#requisitos");
    
                        // Verifica se os campos foram encontrados
                        if (idField) {
                            idField.value = detalhesVaga.id;
                        }
                        if (empresaField) {
                            empresaField.value = detalhesVaga.empresa;
                        }
                        if (tituloField) {
                            tituloField.value = detalhesVaga.titulo;
                        }
                        if (descricaoField) {
                            descricaoField.value = detalhesVaga.descricao;
                        }
                        if (requisitosField) {
                            requisitosField.value = detalhesVaga.requisitos;
                        }
                        // Abre o modal
                        $("#editarVagaModal").modal("show");
                        }
                    }
                });
                }
            });
        });
        $(document).ready(function () {
    
            // Manipula o clique no botão "Salvar Edição"
            $("#salvarEdicao").click(function () {
                // Use AJAX para enviar os dados de edição do formulário
                $.ajax({
                    type: "POST",
                    url: "editar_vaga.php", // Arquivo PHP para editar a vaga
                    data: $("#editarVagaForm").serialize(),
                    success: function () {
    
                        // Fecha o modal após a edição
                        const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                        })
    
                        Toast.fire({
                        icon: 'success',
                        title: 'Vaga atualizada com sucesso!'
                        })
                        $("#editarVagaModal").modal("hide");
                        listarVagas();
                    }
                });
            });
        });