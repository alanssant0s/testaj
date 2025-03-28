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
            <?= $this->Html->link(__('Edit Nature'), ['action' => 'edit', $nature->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Nature'), ['action' => 'delete', $nature->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nature->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Natures'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Nature'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="natures view content">
            <h3><?= h($nature->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($nature->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($nature->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($nature->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($nature->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= h($nature->deleted) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Processes') ?></h4>
                <?php if (!empty($nature->processes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Process Number') ?></th>
                            <th><?= __('Nature Id') ?></th>
                            <th><?= __('Object') ?></th>
                            <th><?= __('Case') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Jurisprudence') ?></th>
                            <th><?= __('Airline Company Id') ?></th>
                            <th><?= __('District Id') ?></th>
                            <th><?= __('Date') ?></th>
                            <th><?= __('Result') ?></th>
                            <th><?= __('Type') ?></th>
                            <th><?= __('Value Requests') ?></th>
                            <th><?= __('Judge Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Deleted') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($nature->processes as $processes) : ?>
                        <tr>
                            <td><?= h($processes->process_number) ?></td>
                            <td><?= h($processes->nature_id) ?></td>
                            <td><?= h($processes->object) ?></td>
                            <td><?= h($processes->case) ?></td>
                            <td><?= h($processes->description) ?></td>
                            <td><?= h($processes->jurisprudence) ?></td>
                            <td><?= h($processes->airline_company_id) ?></td>
                            <td><?= h($processes->district_id) ?></td>
                            <td><?= h($processes->date) ?></td>
                            <td><?= h($processes->result) ?></td>
                            <td><?= h($processes->type) ?></td>
                            <td><?= h($processes->value_requests) ?></td>
                            <td><?= h($processes->judge_id) ?></td>
                            <td><?= h($processes->created) ?></td>
                            <td><?= h($processes->modified) ?></td>
                            <td><?= h($processes->deleted) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Processes', 'action' => 'view', $processes->process_number]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Processes', 'action' => 'edit', $processes->process_number]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Processes', 'action' => 'delete', $processes->process_number], ['confirm' => __('Are you sure you want to delete # {0}?', $processes->process_number)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
