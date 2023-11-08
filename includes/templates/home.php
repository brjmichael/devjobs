 <!-- Template padrão do conteúdo central da página inicial -->
 <div class="main__Container">
  <img src="https://cdn-icons-png.flaticon.com/128/4997/4997543.png" width="80px">
  <?php
    if (!empty($_SESSION) && isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == 'administrador') {
      echo '<p>CONECTADO COMO ADMINISTRADOR</p>';
    }
  ?>
    <h3>Decole a sua carreira de programador com a DevJobs.</h3>
    <p>Aqui você encontra oportunidades em diversas empresas além de ficar por dentro das tendências no mercado de tecnologia no Brasil e no mundo!</p> 
    <button type="button" class="btn-action ver-vagas" style="margin-top: 25px;">Ver vagas</button>
 </div>


<?php
  if (!empty($_SESSION) && isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == 'administrador') {
    echo '<!-- Insere template do Modal que exibe o formulário de edição da vaga -->';
    include '.\includes\templates\modal-edita-vaga.php';
  }
?>

 <div id="lista-vagas"> </div>

 <!-- Requer arquivos JS responsáveis por controlar as ações de criação, edição, leitura e exclusão de vagas -->
<script>
    <?php
        require '.\includes\scripts\cadastrar-vaga.js';
        require '.\includes\scripts\editar-vaga.js';
        require '.\includes\scripts\listar-vagas.js';
        require '.\includes\scripts\deleta-vaga.js';
        require '.\includes\scripts\actions.js';
    ?>
</script>