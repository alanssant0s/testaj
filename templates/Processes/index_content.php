<?php

use App\Model\Entity\Auth;

?>

<div class="table-responsive  table-pgeda mt-3 mb-1">
    <table id="processes-table<?= $tableName ? '-' . $tableName : '' ?>" class="table align-middle pge-data-table mb-0">
        <thead class="table-light">
            <tr role="row">
                <th>Informações</th>
                <th>Envolvidos</th>
                <th>Datas</th>
                <th>Status</th>
                <th style="width: 20%;">Ação</th>
                <th class="noExport"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($processes as $process) : ?>
                <tr>
                    <td>
                        <strong>Número: </strong><?= h($process->process_number) ?><br>
                        <strong>Natureza: </strong><?= h($process->nature->name ?? "") ?><br>
                        <strong>Objeto: </strong><?= h($process->objective->name ?? "") ?><br>
                        <strong>Caso: </strong><?= h($process->caso->name ?? "") ?><br>
                        <strong>Descrição: </strong><?= h($process->description ?? "") ?><br>
                        <strong>Data: </strong><?= h($process->date ? $process->date->format("d/m/Y") : "") ?><br>
                    </td>
                    <td><?= h($process->airline_company->name ?? "") ?></td>
                    <td>
                        <strong>Nome: </strong><?= h($process->district->name ?? "") ?><br>
                        <strong>Estado: </strong><?= h($process->district->city->state->name ?? "") ?><br>
                        <strong>Cidade: </strong><?= h($process->district->city->name ?? "") ?><br>
                    </td>
                    <td>
                        <strong>Resultado: </strong><?= h($process->result->name ?? "") ?><br>
                        <strong>Tipo: </strong><?= h($process->type->name ?? "") ?><br>
                        <strong>Valor: </strong><?= h($process->value_requests ?? "") ?><br>
                        <strong>Pedido: </strong><?= h($process->request->name ?? "") ?><br>
                    </td>
                    <td><?= h($process->judge->name ?? "") ?></td>
                    <?php if ($loggedUser->auth_id <= Auth::$_TYPE_ADMIN): ?>
                        <td class="actions noExport">
                            <div class="d-flex gap-2">
                                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $process->id], ['class' => 'btn btn-sm btn-primary btn-flat']) ?>
                                <?= $this->Form->postLink(__('Remover'), ['action' => 'delete', $process->id], ['class' => 'btn btn-sm btn-danger btn-flat', 'confirm' => __('Tem certeza que deseja remover o Processo "{0}"?', $process->process_number)]) ?>
                            </div>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<script>
    var initTablesProcesses = () => {
        try {
            initTables(true);

            var table = $("#processes-table<?= $tableName ? '-' . $tableName : '' ?>").DataTable();
            table.order([
                [2, 'desc']
            ]).draw();
        } catch (e) {

        }
    }

    initTablesProcesses();
</script>


<?php $this->append('scriptBottom'); ?>
<script>
    initTablesProcesses();
</script>
<?php $this->end(); ?>