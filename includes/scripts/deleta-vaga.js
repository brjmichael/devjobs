//Script responsável por enviar a solicitação de DELETE para o backend

document.addEventListener("DOMContentLoaded", function () {
    document.body.addEventListener('click', function(event) {
        if (event.target.classList.contains('deleta-item')) {
            var vagaId = event.target.getAttribute('data-vaga-id');

            Swal.fire({
                title: 'Confirmar exclusão?',
                text: "Deseja realmente excluir esta vaga?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirmar',
                cancelButtonText: 'Cancelar'
              }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "deleta_vaga.php",
                        data: { vagaId: vagaId },
                        success: function(data) {
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
                                title: data
                                })
    
                            listarVagas();
                        }
                    });
                }
              })

        }
    })
});