    //Script responsável por enviar as informações do formulário de cadastro para o servidor.

    $(document).ready(function () {
        $("#cadastrar-vaga").submit(function (e) {
            e.preventDefault(); // Impede o envio padrão do formulário

            // Recolhe os dados do formulário
            var titulo = $("#titulo").val();
            var empresa = $("#empresa").val();
            var descricao = $("#descricao").val();
            var requisitos = $("#requisitos").val();

            // Envie os dados para o servidor usando AJAX
            $.ajax({
                type: "POST",
                url: "cadastrar_vaga.php", // Script PHP para processar o cadastro das vagas
                data: {
                    titulo: titulo,
                    empresa: empresa,
                    descricao: descricao,
                    requisitos: requisitos
                },
                success: function (response) {
                    // 
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
                    title: 'Vaga cadastrada com sucesso!'
                    })

                    // Limpa os campos do formulário
                    $("#titulo").val("");
                    $("#empresa").val("");
                    $("#descricao").val("");
                    $("#requisitos").val("");

                    listarVagas();
                },
            });
        });
    });