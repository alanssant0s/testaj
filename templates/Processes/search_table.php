<?php

/**
 * @var \App\View\AppView $this
 */
?>


<?php
// Obtém o campo e a direção de ordenação atuais da URL
$currentSort = $this->request->getQuery('sort');
$q = $this->request->getQuery('q', '');
$currentDirection = $this->request->getQuery('direction', 'asc'); // 'asc' é o padrão

// Define a classe CSS com base na ordenação
function getSortClass($field, $currentSort, $currentDirection)
{
    if ($currentSort === $field) {
        return $currentDirection === 'asc' ? 'sort sorting sorting_asc' : 'sort sorting sorting_desc';
    }
    return 'sort sorting';
}
?>

<div class="col-lg-12 mt-2">
    <div class="row justify-content-evenly mb-4">
        <!-- Buttons with dropdowns -->

        <div class="col-sm-12 col-lg-6">
            <form method="get">
                <div class="input-group">
                    <select name="type" class="col-sm-4 col-lg-2">
                        <option value="todos" <?= $this->request->getQuery('type') == 'todos' ? 'selected' : '' ?>>Todos</option>
                        <option value="comarca" <?= $this->request->getQuery('type') == 'comarca' ? 'selected' : '' ?>>Comarca</option>
                        <option value="cia" <?= $this->request->getQuery('type') == 'cia' ? 'selected' : '' ?>>Cia. Aérea</option>
                        <option value="juiz" <?= $this->request->getQuery('type') == 'juiz' ? 'selected' : '' ?>>Juiz</option>
                        <option value="natureza" <?= $this->request->getQuery('type') == 'natureza' ? 'selected' : '' ?>>Natureza</option>
                        <option value="objeto" <?= $this->request->getQuery('type') == 'objeto' ? 'selected' : '' ?>>Objeto</option>
                        <option value="result" <?= $this->request->getQuery('type') == 'result' ? 'selected' : '' ?>>Resultado</option>
                    </select>

                    <input name="q" type="text" value="<?= $this->request->getQuery('q') ?>" class="form-control" aria-label="Text input with dropdown button">
                    <?= $this->Form->hidden('page', ['value' => $this->request->getQuery('page')]); ?>
                    <!-- Buttons Group -->
                    <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="ri-search-2-line"></i></button>
                </div>
            </form>
        </div>

    </div>
</div>


<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div id="categories">

                <?php if (empty($processes) || $processes->count() == 0) : ?>
                    <div class="noresult d-flex align-items-center justify-content-center" style="height: 500px;">
                        <div class="text-center">
                            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                            <?php if ($q != ''): ?>
                                <h5 class="mt-2">Nenhum Processo Encontrado</h5>
                                <p class="text-muted mb-0">Reformule o filtro para exibir algum registro.</p>
                            <?php else: ?>
                                <h5 class="mt-2">Selecione um dos filtros para exibir as informações</h5>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php else : ?>
                    <?= $this->element('../Processes/paginator') ?>

                    <div class="table-responsive table-card mt-2 mb-2">
                        <table class="table table-nowrap align-middle aerojuris-data-table mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="<?= getSortClass('process_number', $currentSort, $currentDirection) ?>" style="width: 20%">
                                        <?= $this->Paginator->sort('process_number', 'Dados do Processo') ?>
                                    </th>
                                    <th class="<?= getSortClass('AirlineCompanies.name', $currentSort, $currentDirection) ?>" style="width: 10%">
                                        <?= $this->Paginator->sort('AirlineCompanies.name', 'Cia Aérea') ?>
                                    </th>
                                    <th class="<?= getSortClass('district', $currentSort, $currentDirection) ?>" style="width: 20%">
                                        <?= $this->Paginator->sort('district', 'Comarca') ?>
                                    </th>
                                    <th class="<?= getSortClass('result', $currentSort, $currentDirection) ?>" style="width: 20%">
                                        <?= $this->Paginator->sort('result', 'Resultado') ?>
                                    </th>
                                    <th class="<?= getSortClass('judge', $currentSort, $currentDirection) ?>" style="width: 10%">
                                        <?= $this->Paginator->sort('judge', 'Juíz') ?>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                <?php foreach ($processes as $process) : ?>
                                    <tr>
                                        <td>
                                            <strong>Natureza: </strong><?= h($process->nature->name ?? "") ?><br>
                                            <strong>Objeto: </strong><?= h($process->objective->name ?? "") ?><br>
                                            <strong>Caso: </strong><?= h($process->caso->name ?? "") ?><br>
                                            <strong>Descrição: </strong><?= h($process->description ?? "") ?><br>
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
                                            <strong>Valor: R$</strong><?= h($process->value_requests ?? "") ?><br>
                                            <strong>Pedido: </strong><?= h($process->request->name ?? "") ?><br>
                                        </td>
                                        <td><?= h($process->judge->name ?? "") ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <?= $this->element('../Processes/paginator') ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!--datatable css-->
<?= $this->Html->css('https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css', ['block' => 'css']); ?>
<!--datatable responsive css-->
<?= $this->Html->css('https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css', ['block' => 'css']); ?>
<?= $this->Html->css('https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css', ['block' => 'css']); ?>



<?php $this->append('scriptBottom'); ?>

<script>
</script>
<?php $this->end(); ?>
