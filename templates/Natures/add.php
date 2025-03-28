<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Nature $nature
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Natures'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="natures form content">
            <?= $this->Form->create($nature) ?>
            <fieldset>
                <legend><?= __('Add Nature') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('deleted', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
