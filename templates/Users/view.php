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
                    <th><?= __('Lastname') ?></th>
                    <td><?= h($user->lastname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $user->has('status') ? $this->Html->link($user->status->name, ['controller' => 'Statuses', 'action' => 'view', $user->status->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Role') ?></th>
                    <td><?= $user->has('role') ? $this->Html->link($user->role->name, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
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
            </table>
            <div class="related">
                <h4><?= __('Related Apartments') ?></h4>
                <?php if (!empty($user->apartments)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Apartment Type Id') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Address') ?></th>
                            <th><?= __('Zipcode') ?></th>
                            <th><?= __('Apartment Number') ?></th>
                            <th><?= __('Floor') ?></th>
                            <th><?= __('Rooms') ?></th>
                            <th><?= __('Bathrooms') ?></th>
                            <th><?= __('Has Heating') ?></th>
                            <th><?= __('Has Gas') ?></th>
                            <th><?= __('Has Parking') ?></th>
                            <th><?= __('Apartment Size') ?></th>
                            <th><?= __('Is Occuped') ?></th>
                            <th><?= __('Status Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->apartments as $apartments) : ?>
                        <tr>
                            <td><?= h($apartments->id) ?></td>
                            <td><?= h($apartments->apartment_type_id) ?></td>
                            <td><?= h($apartments->title) ?></td>
                            <td><?= h($apartments->description) ?></td>
                            <td><?= h($apartments->address) ?></td>
                            <td><?= h($apartments->zipcode) ?></td>
                            <td><?= h($apartments->apartment_number) ?></td>
                            <td><?= h($apartments->floor) ?></td>
                            <td><?= h($apartments->rooms) ?></td>
                            <td><?= h($apartments->bathrooms) ?></td>
                            <td><?= h($apartments->has_heating) ?></td>
                            <td><?= h($apartments->has_gas) ?></td>
                            <td><?= h($apartments->has_parking) ?></td>
                            <td><?= h($apartments->apartment_size) ?></td>
                            <td><?= h($apartments->is_occuped) ?></td>
                            <td><?= h($apartments->status_id) ?></td>
                            <td><?= h($apartments->user_id) ?></td>
                            <td><?= h($apartments->created) ?></td>
                            <td><?= h($apartments->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Apartments', 'action' => 'view', $apartments->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Apartments', 'action' => 'edit', $apartments->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Apartments', 'action' => 'delete', $apartments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $apartments->id)]) ?>
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
