<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Process[] $processes
 * @var \App\Model\Entity\User $loggedUser
 */

use App\Model\Entity\Auth;

?>
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
    <h4 class="mb-sm-0">Listagem de Processos</h4>

    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item active">Processos</li>
        </ol>
    </div>
</div>
<!-- Main content -->
<div class="col-lg-12">
    <div class="card" id="tasksList">
        <div class="card-body border border-dashed border-end-0 border-start-0">
            <div class="accordion text-body" id="default-accordion-example">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <i class="ri-equalizer-fill me-1 align-bottom"></i> Filtros
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                        data-bs-parent="#default-accordion-example">
                        <div class="accordion-body">
                            <?= $this->Form->create($q, ['id' => 'processes-search-form', 'action' => 'javascript:void(0)']) ?>
                            <div class="row gy-4">
                                <div class="col-md-3">
                                    <?= $this->Form->control('judge', ['options' => $judges, 'label' => false, 'empty' => 'Juíz', 'class' => 'form-control form-select select_pge',]); ?>
                                </div>
                                <?= $this->Form->end() ?>
                            </div>
                            <div class="row gy-4 mt-2">
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-block btn-primary btn-flat w-100"
                                        onclick="limparForm()"> Limpar Filtro
                                    </button>
                                </div>

                                <div class="col-md-3">
                                    <button onclick="searchProcesses('<?= $this->Url->build('/processes/index/modal') ?>', null, true)" class="btn btn-block btn-primary btn-flat w-100" name="filtrar" value="filtrar"><i class="fa fa-filter"></i> Filtrar </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end card-body-->
        <div class="card-body" id="process-table">
        </div>
    </div><!--end card-->
    <div class="card">
        <div id="categories">
            <a href="<?= $this->Url->build("/processes/add") ?>" class="btn btn-success"><i class="ri-add-line align-bottom me-1"></i> Adicionar</a>
            <a href="<?= $this->Url->build("/processes/import") ?>" class="btn btn-primary "><i class="las la-file-medical me-1"></i> Importar</a>
            <?php if ($loggedUser->auth_id <= Auth::$_TYPE_MODERADOR): ?>
                <a href="<?= $this->Url->build("/processes/evaluate") ?>" class="btn btn-warning "><i class="las la-file-medical me-1"></i> Avaliar</a>
            <?php endif; ?>
            <div class="table-responsive">
                <table class="table align-middle aerojuris-data-table mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="sort" style="width: 20%" data-sort="number">Dados do Processo</th>
                            <th class="sort" style="width: 10%" data-sort="airline">Cia Aérea</th>
                            <th class="sort" style="width: 20%" data-sort="district">Comarca</th>
                            <th class="sort" style="width: 20%" data-sort="result">Resultado</th>
                            <th class="sort" style="width: 10%" data-sort="judge">Juíz</th>
                            <?php if ($loggedUser->auth_id <= Auth::$_TYPE_ADMIN): ?>
                                <th class="actions" style="width: 20%"><?= __('Ações') ?></th>
                            <?php endif; ?>
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

    function searchProcesses(url, postdata = null, updateUrl = false, view = 'default') {
        var div = '#process-table';
        var tableName = '.pge-data-table';

        if (!postdata) {
            postdata = $("#processes-search-form").serialize();
        }

        if (view == 'default') {
            $(div).text("Carregando...");
        }

        var url_get = '';
        url_get = url + '&' + postdata;

        if (updateUrl) {
            let updateUrl = new URL(location.href);
            updateUrl.searchParams.set('q_url', encodeURIComponent(postdata));
            window.history.pushState('', '', updateUrl);
        }

        $.ajax({
            url: url_get,
            type: 'GET',
            success: function(html) {
                if (view == 'default') {
                    $(div).html(html);
                }
            }
        });
    }

    $('.select_pge').select2({});
    searchProcesses("<?= $this->Url->build("/processes/index/modal") ?>", decodeURIComponent('<?= $q_url ?>'), true);
    initTables();
</script>
<?php $this->end(); ?>
