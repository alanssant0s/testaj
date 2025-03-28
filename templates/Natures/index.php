<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Nature> $natures
 */
?>
<div class="natures index content">
    <?= $this->Html->link(__('New Nature'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Natures') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('deleted') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($natures as $nature): ?>
                <tr>
                    <td><?= $this->Number->format($nature->id) ?></td>
                    <td><?= h($nature->name) ?></td>
                    <td><?= h($nature->created) ?></td>
                    <td><?= h($nature->modified) ?></td>
                    <td><?= h($nature->deleted) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $nature->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $nature->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $nature->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nature->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
