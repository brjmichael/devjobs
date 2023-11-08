<!-- Template padrão da página de login -->

<div class="container main-painel">

<h3>Entre para continuar</h3>
<div class="form-main">
<form id="login-form">
        <input type="text" name="user_login" placeholder="Usuário" id="user_login">
        <input type="password" name="pass_login" placeholder="Senha" id="pass_login">
        <button type="submit" class="submit-login">Entrar</button>
    </form>


</div>
    </div>
    <script>

        // Faz o envio da solicitação de login para o arquivo de validação no backend
        $(document).ready(function () {
            $("#login-form").submit(function (e) {
                e.preventDefault(); // Impede o envio padrão do formulário

                // Recolhe os dados do formulário
                var username = $("#user_login").val();
                var password = $("#pass_login").val();

                // Envia os dados para o servidor usando AJAX
                $.ajax({
                    type: "POST",
                    url: "valida.php",
                    data: {
                        user_login: username,
                        pass_login: password
                    },
                    success: function (response) {
                        if (response === "success") {
                            // Redireciona para a página de destino após o login
                            window.location.href = "index.php";
                        } else {
                            // Exibe a mensagem de erro no HTML
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
                                icon: 'error',
                                title: 'Usuário ou senha inválido'
                                })

                        }
                    }
                });
            });
        });
    </script>