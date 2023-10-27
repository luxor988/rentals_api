<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Apartment $apartment
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Apartment'), ['action' => 'edit', $apartment->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Apartment'), ['action' => 'delete', $apartment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $apartment->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Apartments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Apartment'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="apartments view content">
            <h3><?= h($apartment->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Apartment Type') ?></th>
                    <td><?= $apartment->has('apartment_type') ? $this->Html->link($apartment->apartment_type->name, ['controller' => 'ApartmentTypes', 'action' => 'view', $apartment->apartment_type->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($apartment->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($apartment->address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Zipcode') ?></th>
                    <td><?= h($apartment->zipcode) ?></td>
                </tr>
                <tr>
                    <th><?= __('Apartment Number') ?></th>
                    <td><?= h($apartment->apartment_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $apartment->has('status') ? $this->Html->link($apartment->status->name, ['controller' => 'Statuses', 'action' => 'view', $apartment->status->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $apartment->has('user') ? $this->Html->link($apartment->user->name, ['controller' => 'Users', 'action' => 'view', $apartment->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($apartment->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Floor') ?></th>
                    <td><?= $apartment->floor === null ? '' : $this->Number->format($apartment->floor) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rooms') ?></th>
                    <td><?= $apartment->rooms === null ? '' : $this->Number->format($apartment->rooms) ?></td>
                </tr>
                <tr>
                    <th><?= __('Bathrooms') ?></th>
                    <td><?= $apartment->bathrooms === null ? '' : $this->Number->format($apartment->bathrooms) ?></td>
                </tr>
                <tr>
                    <th><?= __('Apartment Size') ?></th>
                    <td><?= $apartment->apartment_size === null ? '' : $this->Number->format($apartment->apartment_size) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($apartment->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($apartment->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Has Heating') ?></th>
                    <td><?= $apartment->has_heating ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Has Gas') ?></th>
                    <td><?= $apartment->has_gas ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Has Parking') ?></th>
                    <td><?= $apartment->has_parking ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Occuped') ?></th>
                    <td><?= $apartment->is_occuped ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($apartment->description)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
