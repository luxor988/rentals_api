<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Apartment> $apartments
 */
?>
<div class="apartments index content">
    <?= $this->Html->link(__('New Apartment'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Apartments') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('apartment_type_id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th><?= $this->Paginator->sort('zipcode') ?></th>
                    <th><?= $this->Paginator->sort('apartment_number') ?></th>
                    <th><?= $this->Paginator->sort('floor') ?></th>
                    <th><?= $this->Paginator->sort('rooms') ?></th>
                    <th><?= $this->Paginator->sort('bathrooms') ?></th>
                    <th><?= $this->Paginator->sort('has_heating') ?></th>
                    <th><?= $this->Paginator->sort('has_gas') ?></th>
                    <th><?= $this->Paginator->sort('has_parking') ?></th>
                    <th><?= $this->Paginator->sort('apartment_size') ?></th>
                    <th><?= $this->Paginator->sort('is_occuped') ?></th>
                    <th><?= $this->Paginator->sort('status_id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($apartments as $apartment): ?>
                <tr>
                    <td><?= $this->Number->format($apartment->id) ?></td>
                    <td><?= $apartment->has('apartment_type') ? $this->Html->link($apartment->apartment_type->name, ['controller' => 'ApartmentTypes', 'action' => 'view', $apartment->apartment_type->id]) : '' ?></td>
                    <td><?= h($apartment->title) ?></td>
                    <td><?= h($apartment->address) ?></td>
                    <td><?= h($apartment->zipcode) ?></td>
                    <td><?= h($apartment->apartment_number) ?></td>
                    <td><?= $apartment->floor === null ? '' : $this->Number->format($apartment->floor) ?></td>
                    <td><?= $apartment->rooms === null ? '' : $this->Number->format($apartment->rooms) ?></td>
                    <td><?= $apartment->bathrooms === null ? '' : $this->Number->format($apartment->bathrooms) ?></td>
                    <td><?= h($apartment->has_heating) ?></td>
                    <td><?= h($apartment->has_gas) ?></td>
                    <td><?= h($apartment->has_parking) ?></td>
                    <td><?= $apartment->apartment_size === null ? '' : $this->Number->format($apartment->apartment_size) ?></td>
                    <td><?= h($apartment->is_occuped) ?></td>
                    <td><?= $apartment->has('status') ? $this->Html->link($apartment->status->name, ['controller' => 'Statuses', 'action' => 'view', $apartment->status->id]) : '' ?></td>
                    <td><?= $apartment->has('user') ? $this->Html->link($apartment->user->name, ['controller' => 'Users', 'action' => 'view', $apartment->user->id]) : '' ?></td>
                    <td><?= h($apartment->created) ?></td>
                    <td><?= h($apartment->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $apartment->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $apartment->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $apartment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $apartment->id)]) ?>
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
