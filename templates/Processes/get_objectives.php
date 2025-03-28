<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Objective $objective
 */
?>

<?= $this->Form->control('objective_id', ['id' => 'objective_id', 'options' => $objectives, 'label' => 'Objeto*', 'selected' => $objective_id, 'onchange' => 'updateCasosSelects()', 'class' => 'form-control select_pge form-select']); ?>

<script>
    var updateSelectsProcessObjectives = () => {
        try {
            $('#objective-id').val(<?= $objective_id ?>).change();

        } catch (e) {

        }
    }

    updateSelectsProcessObjectives();
</script>


<?php $this->append('scriptBottom'); ?>
<script>
    $(function() {
        updateSelectsProcessObjectives();
    })
</script>
<?php $this->end(); ?>