<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <!-- <li><?= $this->Html->link(__('New Item'), ['action' => 'add']) ?></li> -->
    </ul>
</div>
<div class="items index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0" style="table-layout: auto">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('LocName') ?></th>
            <th><?= $this->Paginator->sort('NumItemId') ?></th>
            <th><?= $this->Paginator->sort('ItemName') ?></th>
            <th><?= $this->Paginator->sort('CatName') ?></th>
            <th><?= $this->Paginator->sort('ActionDate') ?></th>
            <th><?= $this->Paginator->sort('Status') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($items as $item): ?>
        <tr>
            <td><?= h($item->location->LocName) ?></td>
            <td><?= $this->Number->format($item->NumItemId) ?></td>
            <td><?= h($item->ItemName) ?></td>
            <td><?= h(is_null($item->category) ? "" : $item->category->CatName) ?></td>
            <td><?= h($item->ActionDate) ?></td>
            <td><?= h(is_null($item->status) ? "" : $item->status->name) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $item->RecordId]) ?>
                <?= $item->Status == 1 ? $this->Html->link(__('Edit'), ['action' => 'edit', $item->RecordId]) : '' ?>
                <?= $item->Status == 1 ? $this->Html->link(__('Move'), ['action' => 'move', $item->RecordId]) : '' ?>
                <!-- <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $item->RecordId], ['confirm' => __('Are you sure you want to delete # {0}?', $item->RecordId)]) ?> -->
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
