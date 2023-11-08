
<!-- Template padrão do painel administrativo -->
<div class="container main-painel">

<h3>Crie uma nova vaga</h3>

<div class="form-main">
<form id="cadastrar-vaga">
    <label for="titulo">Título da Vaga:</label>
    <input type="text" id="titulo" name="titulo" required>

    <label for="empresa">Nome da empresa:</label>
    <input type="text" id="empresa" name="empresa" required>

    <label for="descricao">Descrição da Vaga:</label>
    <textarea id="descricao" name="descricao" required></textarea>

    <label for="requisitos">Requisitos da Vaga:</label>
    <textarea id="requisitos" name="requisitos"></textarea>

    <button type="submit" class="submit-vaga">Cadastrar Vaga</button>
</form>
</div>

<!-- Insere template do Modal que exibe o formulário de edição da vaga -->
<?php
    include '.\includes\templates\modal-edita-vaga.php';
?>

<!-- Esta div recebe recebe a iteração das vagas que são retornadas do backend -->
<h3>Vagas disponíveis</h3>
<div id="lista-vagas"> </div>
</div>

<!-- Chama arquivos JS responsáveis por controlar as ações de criação, edição, leitura e exclusão de vagas -->
<script>
    <?php
        require '.\includes\scripts\cadastrar-vaga.js';
        require '.\includes\scripts\editar-vaga.js';
        require '.\includes\scripts\listar-vagas.js';
        require '.\includes\scripts\deleta-vaga.js';
    ?>

</script>