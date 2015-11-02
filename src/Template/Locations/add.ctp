<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Locations'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="locations form large-10 medium-9 columns">
    <?= $this->Form->create($location) ?>
    <fieldset>
        <legend><?= __('Add Location') ?></legend>
        <?php
            echo $this->Form->input('LocName');
            echo $this->Form->input('LocNote');
            echo $this->Form->input('DateCreated');
            echo $this->Form->input('AllowDecimals');
            echo $this->Form->input('MaxCapacity');
            echo $this->Form->input('Viewable');
            echo $this->Form->input('ReviewFreqString');
            echo $this->Form->input('Timestamp');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
