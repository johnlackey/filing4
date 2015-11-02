<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Items'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="items form large-10 medium-9 columns">
    <?= $this->Form->create($item) ?>
    <fieldset>
        <legend><?= __('Add Item') ?></legend>
        <?php
            echo $this->Form->input('NumItemId');
            echo $this->Form->input('TextItemId');
            echo $this->Form->input('LocId');
            echo $this->Form->input('ItemName');
            echo $this->Form->input('Keywords');
            echo $this->Form->input('CatId');
            echo $this->Form->input('ActionDate');
            echo $this->Form->input('DateCreated');
            echo $this->Form->input('ReviewFreq');
            echo $this->Form->input('ItemNote');
            echo $this->Form->input('IsTagged');
            echo $this->Form->input('Status');
            echo $this->Form->input('TimeStamp');
            echo $this->Form->input('ItemNotes');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
