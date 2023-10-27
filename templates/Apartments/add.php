<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Apartment $apartment
 * @var \Cake\Collection\CollectionInterface|string[] $apartmentTypes
 * @var \Cake\Collection\CollectionInterface|string[] $statuses
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Apartments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="apartments form content">
            <?= $this->Form->create($apartment) ?>
            <fieldset>
                <legend><?= __('Add Apartment') ?></legend>
                <?php
                    echo $this->Form->control('apartment_type_id', ['options' => $apartmentTypes, 'empty' => true]);
                    echo $this->Form->control('title');
                    echo $this->Form->control('description');
                    echo $this->Form->control('address');
                    echo $this->Form->control('zipcode');
                    echo $this->Form->control('apartment_number');
                    echo $this->Form->control('floor');
                    echo $this->Form->control('rooms');
                    echo $this->Form->control('bathrooms');
                    echo $this->Form->control('has_heating');
                    echo $this->Form->control('has_gas');
                    echo $this->Form->control('has_parking');
                    echo $this->Form->control('apartment_size');
                    echo $this->Form->control('is_occuped');
                    echo $this->Form->control('status_id', ['options' => $statuses, 'empty' => true]);
                    echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
