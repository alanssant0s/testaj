<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Judge $judge
 */
?>

<div class="page-title-box d-sm-flex align-items-center justify-content-between">
    <h4 class="mb-sm-0">Adicionar Juiz</h4>

    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="<?= $this->Url->build('/judges') ?>"><i class="fa fa-users"></i> Juizes</a></li>
            <li class="breadcrumb-item active">Adicionar Juiz</li>
        </ol>
    </div>

</div>
<!-- Main content -->

<div class="row">
    <div class="col-lg-12">
        <?= $this->Form->create($judge, ['id' => 'judge-form', 'url' => ['controller' => 'judges', 'action' => 'add']]) ?>
        <div class="card">
            <div class="card-body">
                <?= $this->element('../Judges/judge_form') ?>
            </div>
            <div class="card-footer">
                <?= $this->Form->button(__('Cadastrar')) ?>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->