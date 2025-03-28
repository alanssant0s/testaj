<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="page-title-box d-sm-flex align-items-center justify-content-between">
    <h4 class="mb-sm-0">Adicionar Usuário</h4>

    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="<?= $this->Url->build('/users') ?>"><i class="fa fa-users"></i> Usuários</a></li>
            <li class="breadcrumb-item active">Adicionar Usuário</li>
        </ol>
    </div>

</div>
<!-- Main content -->

<div class="row">
    <div class="col-lg-12">
        <?= $this->Form->create($user, ['id' => 'user-form', 'url' => ['controller' => 'users', 'action' => 'add']]) ?>
        <div class="card">
            <div class="card-body">
                <?= $this->element('../Users/user_form') ?>
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