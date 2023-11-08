
  <script>
    // Script cria um evento de "escuta" no elemento ID "logout". Quando clicado, envia uma solicitação para o arquivo logout.php, fazendo com que a sessão atual do usuário seja limpa do navegador.
document.getElementById('logout').addEventListener('click', function () {
  // Exibe um modal personalizado para pedir a confirmação do usuário
  // Usei a biblioteca SweetAlert aqui

  Swal.fire({
  title: 'Tem certeza?',
  text: "Você tem certeza que deseja sair do sistema?",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Confirmar saída',
  cancelButtonText: 'Cancelar'
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href = 'logout.php';
  }
})
});

</script>

<script>
// Fecha o modal de edição de vaga quando o botão correspondente de fechamento é clicado.
$(".close-modal").click(function () {
    $("#editarVagaModal").modal("hide");
});
// Redirecione o usuário para a página de login ao clicar no elemento ID "login"
document.getElementById('login').addEventListener('click', function () {
  window.location.href = 'login.php';
});
</script>

<script>
  // Redirecione o usuário para o painel ao clicar no elemento ID "painel"
  document.getElementById('painel').addEventListener('click', function () {
  window.location.href = 'painel.php';
});
  </script>
  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>