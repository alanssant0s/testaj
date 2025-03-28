<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Process $process
 */
?>

<div class="page-title-box d-sm-flex align-items-center justify-content-between">
    <h4 class="mb-sm-0">Importar Processos</h4>

    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="<?= $this->Url->build('/processes') ?>"><i class="fa fa-users"></i> Processos</a></li>
            <li class="breadcrumb-item active">Importar Processos</li>
        </ol>
    </div>

</div>
<!-- Main content -->

<div class="row">
    <div class="col-lg-12">
        <?= $this->Form->create($process, ['id' => 'process-form', 'type' => 'file', 'url' => ['controller' => 'processes', 'action' => 'import']]) ?>
        <div class="card">
            <div class="card-body">
                <fieldset>
                    <div class="row gy-4">
                        <div class="col-xxl-6 col-md-6">
                            <?= $this->Form->control('excel_file', ['type' => 'file', 'label' => 'Upload do Arquivo Excel*', 'required']); ?>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="card-footer">
                <?= $this->Form->button(__('Importar')) ?>
            </div>
        </div>
        <?= $this->Form->end() ?>
        <p>OBS: As datas serão aceitas no formado dia/mês/ano ou então dia-mês-ano. Caso sua data esteja no formato mês/dia/ano ou mês-da-ano então tente trocar o formato da data na sua planilha.</p>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->