<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Action $action
 * @var \Cake\Collection\CollectionInterface|string[] $schedules
 * @var \Cake\Collection\CollectionInterface|string[] $meets
 * @var \Cake\Collection\CollectionInterface|string[] $indicators
 * @var \Cake\Collection\CollectionInterface|string[] $managementTools
 * @var \Cake\Collection\CollectionInterface|string[] $sectors
 * @var \Cake\Collection\CollectionInterface|string[] $companies
 * @var \Cake\Collection\CollectionInterface|string[] $anomalies
 */
?>

<?= $this->Form->control('city_id', ['options' => $cities, 'label' => 'Cidade', 'selected' => $city_id, 'class' => 'form-control select_pge form-select']); ?>

<script>
    var updateSelectsDistrictCities = () => {
        try {
            $('#city-id').val(<?= $city_id ?>).change();

        } catch (e) {

        }
    }

    updateSelectsDistrictCities();
</script>


<?php $this->append('scriptBottom'); ?>
<script>
    $(function() {
        updateSelectsDistrictCities();
    })
</script>
<?php $this->end(); ?>