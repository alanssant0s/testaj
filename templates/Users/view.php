<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users view content">
            <h3><?= h($user->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($user->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Plan') ?></th>
                    <td><?= $user->has('plan') ? $this->Html->link($user->plan->name, ['controller' => 'Plans', 'action' => 'view', $user->plan->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Auth') ?></th>
                    <td><?= $user->has('auth') ? $this->Html->link($user->auth->name, ['controller' => 'Auths', 'action' => 'view', $user->auth->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Photo Url') ?></th>
                    <td><?= h($user->photo_url) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($user->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($user->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deleted') ?></th>
                    <td><?= h($user->deleted) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Audits') ?></h4>
                <?php if (!empty($user->audits)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Event') ?></th>
                            <th><?= __('Model') ?></th>
                            <th><?= __('Entity Id') ?></th>
                            <th><?= __('Json Object') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Delta Count') ?></th>
                            <th><?= __('Source Ip') ?></th>
                            <th><?= __('Source Url') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->audits as $audits) : ?>
                        <tr>
                            <td><?= h($audits->id) ?></td>
                            <td><?= h($audits->event) ?></td>
                            <td><?= h($audits->model) ?></td>
                            <td><?= h($audits->entity_id) ?></td>
                            <td><?= h($audits->json_object) ?></td>
                            <td><?= h($audits->description) ?></td>
                            <td><?= h($audits->user_id) ?></td>
                            <td><?= h($audits->created) ?></td>
                            <td><?= h($audits->delta_count) ?></td>
                            <td><?= h($audits->source_ip) ?></td>
                            <td><?= h($audits->source_url) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Audits', 'action' => 'view', $audits->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Audits', 'action' => 'edit', $audits->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Audits', 'action' => 'delete', $audits->id], ['confirm' => __('Are you sure you want to delete # {0}?', $audits->id)]) ?>
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
