<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Process $process
 */
?>

<div class="page-title-box d-sm-flex align-items-center justify-content-between">
    <h4 class="mb-sm-0">Editar Processo</h4>

    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="<?= $this->Url->build('/processes') ?>"><i class="fa fa-users"></i> Processos</a></li>
            <li class="breadcrumb-item active">Editar Processo</li>
        </ol>
    </div>

</div>
<!-- Main content -->

<div class="row">
    <div class="col-lg-12">
        <?= $this->Form->create($process, ['id' => 'process-form', 'url' => ['controller' => 'processes', 'action' => 'edit', $process->id]]) ?>
        <div class="card">
            <div class="card-body">
                <?= $this->element('../Processes/process_form') ?>
            </div>
            <div class="card-footer">
                <?= $this->Form->button(__('Salvar')) ?>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->