
<div class="modal fade" id="<?= $id??('modal_'.$action)?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel"><?=$action=='add'?'Adicionar':'Editar'?> Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <?= $this->element($form, ['action' => $action]) ?>
                </form>
            </div>
            <div class="modal-footer">
                <button data-bs-dismiss="<?= $id??('modal_'.$action)?>" type="button" class="btn btn-secondary pull-left" >Fechar</button>
                <button id="save_<?=$action?>_button" class="btn btn-success" onclick="save_form('<?=$action?>')">Salvar</button>
            </div>
        </div>
    </div>
</div>
