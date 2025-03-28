<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Process[] $processes
 * @var \App\Model\Entity\User $loggedUser
 */
?>

<div class="row justify-content-evenly mb-4">
    <!-- Buttons with dropdowns -->
    <div class="col-6">
        <div class="input-group">
            <div class="col-2 mx-0 px-0">
                <select class="form-select">
                    <option value="todos">Todos</option>
                    <option value="comarca">Comarca</option>
                    <option value="juiz">Juiz</option>
                    <option value="natureza">Natureza</option>
                    <option value="objeto">Objeto</option>
                </select>
            </div>
            <input type="text" class="form-control" aria-label="Text input with dropdown button">
        </div>
    </div>
</div>


<div id="list_processes">
    <?php foreach ($processes as $process) : ?>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <table class="table align-middle aerojuris-data-table mb-0">
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
                    </table>
                </div>
            </div>
        </div>
    <?php endforeach; ?>


    <?= $this->Paginator->numbers() ?>
    <?= $this->Paginator->first('<< ' . __('primeira')) ?>
    <?= $this->Paginator->prev('< ' . __('anterior')) ?>
    <?= $this->Paginator->next(__('próxima') . ' >') ?>
    <?= $this->Paginator->last(__('última') . ' >>') ?>


    <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, mostrando {{current}} registros de um total de {{count}}')) ?></p>

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
