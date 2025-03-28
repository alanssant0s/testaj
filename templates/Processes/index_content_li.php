<?php

use App\Model\Entity\Auth;

?>

<div class="card-body pt-0">
    <ul id="processes-table<?= $tableName ? '-' . $tableName : '' ?>" class="list-group list-group-flush border-dashed p-0 m-0">
        <li class="list-group-item ps-0 table-light text-muted">
            <div class="row align-items-center g-3">
                <div class="col-2">
                    Informações
                </div>
                <div class="col-2">
                    Envolvidos
                </div>
                <div class="col-2">
                    Datas
                </div>

                <div class="col-1">
                    Status
                </div>
                <div class="col-4">
                    Ação
                </div>
                <div class="col-1">
                </div>
            </div>
            <!-- end row -->
        </li><!-- end -->
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

        <?php if ($actions->count() == 0): ?>
            Nenhuma Ação Encontrada
        <?php endif; ?>
    </ul><!-- end -->
</div>

<script>
    var initTablesProcesses = () => {
        initTables();
    }

    initTablesProcesses();
</script>