<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AirlineCompany $airlineCompany
 */
?>

<div class="page-title-box d-sm-flex align-items-center justify-content-between">
    <h4 class="mb-sm-0">Adicionar Cia Aérea</h4>

    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="<?= $this->Url->build('/airlineCompanies') ?>"><i class="fa fa-users"></i> Cia Aérea</a></li>
            <li class="breadcrumb-item active">Adicionar Cia Aérea</li>
        </ol>
    </div>

</div>
<!-- Main content -->

<div class="row">
    <div class="col-lg-12">
        <?= $this->Form->create($airlineCompany, ['id' => 'airline-company-form', 'url' => ['controller' => 'airlineCompanies', 'action' => 'add']]) ?>
        <div class="card">
            <div class="card-body">
                <?= $this->element('../AirlineCompanies/airline_company_form') ?>
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