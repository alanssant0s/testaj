<?php

/**
 * @var \App\View\AppView $this
 */
?>
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
    <h4 class="mb-sm-0">Suas Importações</h4>

    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="<?= $this->Url->build('/processes') ?>"><i class="fa fa-users"></i> Processos</a></li>
            <li class="breadcrumb-item active">Suas Importações</li>
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
                                <th class="sort" style="width: 25%" data-sort="number">Nome da Importação</th>
                                <th class="sort" style="width: 15%" data-sort="date">Data</th>
                                <th class="sort" style="width: 10%" data-sort="total">Processos Importados</th>
                                <th class="sort" style="width: 10%" data-sort="approved">Processos Aceitos</th>
                                <th class="sort" style="width: 10%" data-sort="waiting">Processos Aguardando Resposta</th>
                                <th class="sort" style="width: 10%" data-sort="desapproved">Processos Negados</th>
                                <th class="sort" style="width: 10%" data-sort="desapproved">Processos Já Existentes</th>
                                <th class="sort" style="width: 10%" data-sort="button"></th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            <?php foreach ($imports as $import) : ?>
                                <tr>
                                    <td><?= $import->name ?></td>
                                    <td><?= $import->date ?></td>
                                    <td><?= $import->total_processes ?></td>
                                    <td><?= $import->approved_processes ?></td>
                                    <td><?= $import->waiting_processes ?></td>
                                    <td><?= $import->desapproved_processes ?></td>
                                    <td><?= $import->existing_processes ?></td>
                                    <td><?= $this->Html->link(__('Ver Processos'), ['action' => 'myProcesses', $import->id], ['class' => 'btn btn-sm btn-primary btn-flat']) ?></td>
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