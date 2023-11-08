<!-- Modal para edição de vaga -->
<div class="modal fade" id="editarVagaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Vaga</h5>
                <button type="button" class="close-modal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editarVagaForm">
                    <input type="hidden" id="vagaId" name="vagaId">
                    <label for="titulo">Título da Vaga:</label>
                    <input type="text" id="titulo" name="titulo" required>
                    <label for="empresa">Nome da empresa</label>
                    <input type="text" id="empresa" name="empresa" required>
                    <label for="descricao">Descrição da Vaga:</label>
                    <textarea id="descricao" name="descricao" required></textarea>
                    <label for="requisitos">Requisitos da Vaga:</label>
                    <textarea id="requisitos" name="requisitos"></textarea>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" id="salvarEdicao">Salvar Edição</button>
            </div>
        </div>
    </div>
</div>