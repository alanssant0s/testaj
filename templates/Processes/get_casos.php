<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Caso $caso
 */
?>

<?= $this->Form->control('caso_id', ['options' => $casos, 'label' => 'Caso*', 'selected' => $caso_id, 'class' => 'form-control select_pge form-select']); ?>

<script>
    var updateSelectsProcessCasos = () => {
        try {
            $('#caso-id').val(<?= $caso_id ?>).change();

        } catch (e) {

        }
    }

    updateSelectsProcessCasos();
</script>


<?php $this->append('scriptBottom'); ?>
<script>
    $(function() {
        updateSelectsProcessCasos();
    })
</script>
<?php $this->end(); ?>