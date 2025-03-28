<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Judge $judge
 */
?>

<fieldset>
    <div class="row gy-4">
        <div class="col-xxl-6 col-md-6">
            <?= $this->Form->control('name', ['label' => 'Nome*']); ?>
        </div>
        <div class="col-lg-6">
            <?= $this->Form->control('state_id', [
                'id' => 'state_id',
                'onchange' => 'updateCitiesSelects()',
                'options' => $states,
                'label' => 'Estado',
                'class' => 'form-control select_pge form-select'
            ]); ?>
        </div>

        <div class="col-lg-6">
            <div id="cities-select">
                <?= $this->Form->control('city_id', [
                    'id' => 'city_id',
                    'label' => 'Cidades',
                    'class' => 'form-control select_pge form-select'
                ]); ?>
            </div>
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
    var initSelectsDistrict = () => {
        $('.select_pge').select2({});
    }

    var updateCitiesSelects = (city_id = null) => {
        try {
            if ($("#state_id").val()) {
                $.ajax({
                    url: "<?= $this->Url->build('/districts/get_cities') ?>/" + $("#state_id").val() + "/" + city_id,
                    type: "GET",
                    success: function(html) {
                        $('#cities-select').html(html);
                        //Initialize Select2 Elements
                        initSelectsDistrict();
                    }
                });
            }
        } catch (e) {

        }
    }

    updateCitiesSelects(<?= $district->city_id ?>);
</script>

<?php $this->append('scriptBottom'); ?>

<script>
    $(function() {
        updateCitiesSelects(<?= $district->city_id ?>);
    })
</script>
<?php $this->end(); ?>