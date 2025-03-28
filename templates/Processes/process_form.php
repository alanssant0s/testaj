<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Judge $judge
 */
?>

<fieldset>
    <div class="row gy-4">
        <div class="col-xxl-6 col-md-6">
            <?= $this->Form->control('process_number', ['label' => 'Número do Processo*']); ?>
        </div>
        <div class="col-lg-6">
            <?= $this->Form->control('judge_id', [
                'id' => 'judge_id',
                'label' => 'Juíz*',
                'options' => $judges,
                'class' => 'form-control select_pge form-select'
            ]); ?>
        </div>
        <div class="col-lg-4">
            <?= $this->Form->control('nature_id', [
                'id' => 'nature_id',
                'onchange' => 'updateObjectivesSelects()',
                'options' => $natures,
                'label' => 'Natureza*',
                'class' => 'form-control select_pge form-select'
            ]); ?>
        </div>
        <div class="col-lg-4">
            <div id="objectives-select">
                <?= $this->Form->control('objective_id', [
                    'id' => 'objective_id',
                    'onchange' => 'updateCasosSelects()',
                    'label' => 'Objeto*',
                    'class' => 'form-control select_pge form-select'
                ]); ?>
            </div>
        </div>
        <div class="col-lg-4">
            <div id="casos-select">
                <?= $this->Form->control('caso_id', [
                    'id' => 'caso_id',
                    'label' => 'Caso*',
                    'options' => $casos,
                    'class' => 'form-control select_pge form-select'
                ]); ?>
            </div>
        </div>
        <div class="col-xxl-12 col-md-12">
            <?= $this->Form->control('description', ['label' => 'Descrição*']); ?>
        </div>
        <div class="col-lg-6">
            <?= $this->Form->control('airline_company_id', [
                'id' => 'airline_company_id',
                'label' => 'Cia Aérea*',
                'options' => $airlineCompanies,
                'class' => 'form-control select_pge form-select'
            ]); ?>
        </div>
        <div class="col-lg-6">
            <?= $this->Form->control('district_id', [
                'id' => 'district_id',
                'label' => 'Comarca*',
                'options' => $districts,
                'class' => 'form-control select_pge form-select'
            ]); ?>
        </div>
        <div class="col-lg-6">
            <?= $this->Form->control('result_id', [
                'id' => 'result_id',
                'label' => 'Resultado*',
                'options' => $results,
                'class' => 'form-control select_pge form-select'
            ]); ?>
        </div>
        <div class="col-lg-6">
            <?= $this->Form->control('type_id', [
                'id' => 'type_id',
                'label' => 'Tipo*',
                'options' => $types,
                'class' => 'form-control select_pge form-select'
            ]); ?>
        </div>
        <div class="col-lg-4">
            <?= $this->Form->control('request_id', [
                'id' => 'request_id',
                'label' => 'Pedido(s)*',
                'options' => $requests,
                'class' => 'form-control select_pge form-select'
            ]); ?>
        </div>
        <div class="col-xxl-4 col-md-4">
            <?= $this->Form->control('value_requests', ['label' => 'Valor Pedido*']); ?>
        </div>
        <div class="col-xxl-4 col-md-4">
            <?= $this->Form->control('date', ['label' => 'Data*']); ?>
        </div>
        <div class="col-xxl-4 col-md-4">
            <?= $this->Form->control('authors', ['label' => 'Quantidade de Autores*']); ?>
        </div>
        <div class="col-xxl-4 col-md-4">
            <?= $this->Form->control('link', ['label' => 'Link do Documento*']); ?>
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

<script>
    var initSelectsProcess = () => {
        $('.select_pge').select2({});
    }

    var updateObjectivesSelects = (objective_id = null) => {
        try {
            if ($("#nature_id").val()) {
                $.ajax({
                    url: "<?= $this->Url->build('/processes/get_objectives') ?>/" + $("#nature_id").val() + "/" + objective_id,
                    type: "GET",
                    success: function(html) {
                        $('#objectives-select').html(html);
                        //Initialize Select2 Elements
                        initSelectsProcess();
                        updateCasosSelects(<?= $process->caso_id ?>);
                    }
                });
            }
        } catch (e) {

        }
    }

    var updateCasosSelects = (caso_id = null) => {
        try {
            if ($("#objective_id").val()) {
                $.ajax({
                    url: "<?= $this->Url->build('/processes/get_casos') ?>/" + $("#objective_id").val() + "/" + caso_id,
                    type: "GET",
                    success: function(html) {
                        $('#casos-select').html(html);
                        //Initialize Select2 Elements
                        initSelectsProcess();
                    }
                });
            }
        } catch (e) {

        }
    }

    updateObjectivesSelects(<?= $process->objective_id ?>);
    updateCasosSelects(<?= $process->caso_id ?>);
</script>

<?php $this->append('scriptBottom'); ?>

<script>
    $(function() {
        updateObjectivesSelects(<?= $process->objective_id ?>);
        updateCasosSelects(<?= $process->caso_id ?>);
    })
</script>
<?php $this->end(); ?>