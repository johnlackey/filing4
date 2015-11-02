<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <!--<li><?= $this->Html->link(__('New Transfer'), ['action' => 'add']) ?></li>-->
    </ul>
</div>
<div class="transfers index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0" style="table-layout: auto">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('TransferId') ?></th>
            <th><?= $this->Paginator->sort('OldLocId') ?></th>
            <th><?= $this->Paginator->sort('OldItemId') ?></th>
            <th><?= $this->Paginator->sort('NewLocId') ?></th>
            <th><?= $this->Paginator->sort('NewItemId') ?></th>
            <th><?= $this->Paginator->sort('Item') ?></th>
            <th><?= $this->Paginator->sort('TransferType') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($transfers as $transfer): ?>
        <tr>
            <td><?= $this->Number->format($transfer->TransferId) ?></td>
            <td><?= h($transfer->old_location->LocName) ?></td>
            <td><?= $this->Number->format($transfer->OldItemId) ?></td>
            <td><?= h($transfer->new_location->LocName) ?></td>
            <td><?= $this->Number->format($transfer->NewItemId) ?></td>
            <td><?= h($transfer->item->ItemName) ?></td>
            <td><?= h($transfer->TransferType) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Confirm'), ['action' => 'confirm', $transfer->TransferId]) ?>
                <?= $this->Html->link(__('Cancel'), ['action' => 'cancel', $transfer->TransferId]) ?>
                <!--
                <?= $this->Html->link(__('View'), ['action' => 'view', $transfer->TransferId]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $transfer->TransferId]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $transfer->TransferId], ['confirm' => __('Are you sure you want to delete # {0}?', $transfer->TransferId)]) ?>
                -->
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
