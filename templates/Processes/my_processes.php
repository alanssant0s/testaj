<?php

/**
 * @var \App\View\AppView $this
 */

use App\Model\Entity\Auth;

?>
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
    <h4 class="mb-sm-0">Seus Processos</h4>

    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="<?= $this->Url->build('/processes') ?>"><i class="fa fa-users"></i> Processos</a></li>
            <li class="breadcrumb-item active">Seus Processos</li>
        </ol>
    </div>

</div>

<!-- Main content -->
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div id="categories">
                <div class="table-responsive">
                    <table class="table align-middle aerojuris-data-table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="sort" style="width: 20%" data-sort="number">Dados do Processo</th>
                                <th class="sort" style="width: 10%" data-sort="airline">Cia Aérea</th>
                                <th class="sort" style="width: 20%" data-sort="district">Comarca</th>
                                <th class="sort" style="width: 20%" data-sort="result">Resultado</th>
                                <th class="sort" style="width: 10%" data-sort="judge">Juíz</th>
                                <th class="sort" style="width: 10%" data-sort="approval">Aprovação</th>
                                <th class="actions" style="width: 20%"><?= __('Ações') ?></th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            <?php foreach ($processes as $process) : ?>
                                <tr>
                                    <td>
                                        <strong>Número: </strong><?= h($process->process_number) ?><br>
                                        <strong>Natureza: </strong><?= h($process->nature->name ?? "") ?><br>
                                        <strong>Objeto: </strong><?= h($process->objective->name ?? "") ?><br>
                                        <strong>Caso: </strong><?= h($process->caso->name ?? "") ?><br>
                                        <strong>Descrição: </strong><?= h($process->description ?? "") ?><br>
                                        <strong>Data: </strong><?= h($process->date ? $process->date->format("d/m/Y") : "") ?><br>
                                        <strong>
                                            Link :
                                            <a target='_blank' href="<?= (substr_compare(strtolower($process->link), 'https://', 0, 7) == 0 || substr_compare(strtolower($process->link), 'http://', 0, 7) == 0) ? $process->link : 'https://' . $process->link ?>">
                                                <?= strtolower($process->link) ?>
                                            </a>
                                        </strong><br>
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
                                        <strong>Quantidade de Autores: </strong><?= h($process->authors ?? "") ?><br>
                                        <strong>Valor Total: R$ </strong><?= h($process->value_requests ?? "") ?><br>
                                        <strong>Valor por Pessoa: R$ </strong><?= h($process->divided_value ?? "") ?><br>
                                        <strong>Pedido: </strong><?= h($process->request->name ?? "") ?><br>
                                    </td>
                                    <td><?= h($process->judge->name ?? "") ?></td>
                                    <td><?= h($process->approved_by ? ($process->reason ? "Não.\n Motivo: " . $process->reason : "Aprovado") : "Aguardando Aprovação") ?></td>
                                    <?php if ($loggedUser->auth_id <= Auth::$_TYPE_ADMIN || !$process->approved_by): ?>
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
            </div>
        </div>
    </div>
</div>

<!--datatable js-->
<?= $this->Html->script('https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js', ['block' => 'script']); ?>
<?= $this->Html->script('https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js', ['block' => 'script']); ?>
<?= $this->Html->script('https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js', ['block' => 'script']); ?>
<?= $this->Html->script('https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js', ['block' => 'script']); ?>
<?= $this->Html->script('https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js', ['block' => 'script']); ?>
<?= $this->Html->script('https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js', ['block' => 'script']); ?>

<?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js', ['block' => 'script']); ?>
<?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js', ['block' => 'script']); ?>
<?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js', ['block' => 'script']); ?>

<!--datatable css-->
<?= $this->Html->css('https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css', ['block' => 'css']); ?>
<!--datatable responsive css-->
<?= $this->Html->css('https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css', ['block' => 'css']); ?>
<?= $this->Html->css('https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css', ['block' => 'css']); ?>

<?php $this->append('scriptBottom'); ?>

<script>
    function initTables(buttons = false, tableElement = '.aerojuris-data-table') {
        buttonsArray = [];
        if (buttons)
            buttonsArray = [{
                extend: 'csv',
                exportOptions: {
                    columns: "thead th:not(.noExport)"
                }
            }, {
                extend: 'excel',
                exportOptions: {
                    columns: "thead th:not(.noExport)"
                }
            }, {
                extend: 'print',
                text: 'Imprimir'
            }];
        var table = $(tableElement).DataTable({
            "pageLength": 50,
            dom: 'Bfrtip',
            buttons: buttonsArray,
            "language": {
                "lengthMenu": "Mostrar &nbsp; _MENU_ &nbsp; por página",
                "zeroRecords": "Sem resultados encontrados",
                "info": "Mostrando _START_ até _END_ de _TOTAL_",
                "infoEmpty": "Nenhum registro encontraro.",
                "infoFiltered": "(filtrando de um total de _MAX_ registros)",
                "search": "Buscar: ",
                "thousands": ".",
                "paginate": {
                    "first": "Início",
                    "last": "Fim",
                    "next": "Próximo",
                    "previous": "Anterior"
                },
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                }

            }
        });

    }
    initTables();
</script>
<?php $this->end(); ?>