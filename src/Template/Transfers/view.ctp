<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Transfer'), ['action' => 'edit', $transfer->TransferId]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Transfer'), ['action' => 'delete', $transfer->TransferId], ['confirm' => __('Are you sure you want to delete # {0}?', $transfer->TransferId)]) ?> </li>
        <li><?= $this->Html->link(__('List Transfers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transfer'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="transfers view large-10 medium-9 columns">
    <h2><?= h($transfer->TransferId) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('TransferType') ?></h6>
            <p><?= h($transfer->TransferType) ?></p>
            <h6 class="subheader"><?= __('UserId') ?></h6>
            <p><?= h($transfer->UserId) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('TransferId') ?></h6>
            <p><?= $this->Number->format($transfer->TransferId) ?></p>
            <h6 class="subheader"><?= __('OldLocId') ?></h6>
            <p><?= $this->Number->format($transfer->OldLocId) ?></p>
            <h6 class="subheader"><?= __('OldItemId') ?></h6>
            <p><?= $this->Number->format($transfer->OldItemId) ?></p>
            <h6 class="subheader"><?= __('OldItemRecId') ?></h6>
            <p><?= $this->Number->format($transfer->OldItemRecId) ?></p>
            <h6 class="subheader"><?= __('NewLocId') ?></h6>
            <p><?= $this->Number->format($transfer->NewLocId) ?></p>
            <h6 class="subheader"><?= __('NewItemId') ?></h6>
            <p><?= $this->Number->format($transfer->NewItemId) ?></p>
            <h6 class="subheader"><?= __('NewItemRecId') ?></h6>
            <p><?= $this->Number->format($transfer->NewItemRecId) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('TransferDate') ?></h6>
            <p><?= h($transfer->TransferDate) ?></p>
            <h6 class="subheader"><?= __('ConfirmDate') ?></h6>
            <p><?= h($transfer->ConfirmDate) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('IsConfirmed') ?></h6>
            <?= $this->Text->autoParagraph(h($transfer->IsConfirmed)) ?>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('IsCancelled') ?></h6>
            <?= $this->Text->autoParagraph(h($transfer->IsCancelled)) ?>
        </div>
    </div>
</div>
