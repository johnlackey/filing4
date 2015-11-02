<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Transfers'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="transfers form large-10 medium-9 columns">
    <?= $this->Form->create($transfer) ?>
    <fieldset>
        <legend><?= __('Add Transfer') ?></legend>
        <?php
            echo $this->Form->input('OldLocId');
            echo $this->Form->input('OldItemId');
            echo $this->Form->input('OldItemRecId');
            echo $this->Form->input('NewLocId');
            echo $this->Form->input('NewItemId');
            echo $this->Form->input('NewItemRecId');
            echo $this->Form->input('IsConfirmed');
            echo $this->Form->input('TransferDate');
            echo $this->Form->input('ConfirmDate');
            echo $this->Form->input('IsCancelled');
            echo $this->Form->input('TransferType');
            echo $this->Form->input('UserId');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
