<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Users $user
 */
?>

<fieldset>
    <div class="row gy-4">
        <div class="col-xxl-12 col-md-12"><?= $this->Form->control('name', ['label' => 'Nome*']); ?></div>
        <div class="col-xxl-6 col-md-6"><?= $this->Form->control('email', ['label' => 'Email*']); ?></div>
        <div class="col-xxl-6 col-md-6"><?= $this->Form->control('password', ['label' => 'Senha*']); ?></div>
        <div class="col-xxl-6 col-md-6">
            <?= $this->Form->control('plan_id', [
                'id' => 'select_pge_unit',
                'label' => 'Tipo de Plano*',
                'options' => $plans,
                'class' => 'form-control select_pge form-select'
            ]); ?>
        </div>
        <div class="col-xxl-6 col-md-6">
            <?= $this->Form->control('auth_id', [
                'id' => 'select_pge_unit',
                'label' => 'Nível de Acesso*',
                'options' => $auths,
                'class' => 'form-control select_pge form-select'
            ]); ?>
        </div>
    </div>
</fieldset>

<?= $this->Html->css('../assets/libs/quill/quill.core', ['block' => 'css']); ?>
<?= $this->Html->css('../assets/libs/quill/quill.snow', ['block' => 'css']); ?>

<?= $this->Html->script('../assets/libs/select2/js/select2.min', ['block' => 'script']); ?>
<?= $this->Html->script('../assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor', ['block' => 'script']); ?>
<!-- quill js -->
<?= $this->Html->script('../assets/libs/quill/quill.min', ['block' => 'script']); ?>
<?= $this->Html->script('../assets/js/pages/form-editor.init', ['block' => 'script']); ?>