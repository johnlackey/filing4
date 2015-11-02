<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Category'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="categories index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('CatId') ?></th>
            <th><?= $this->Paginator->sort('CatName') ?></th>
            <th><?= $this->Paginator->sort('TimeStamp') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($categories as $category): ?>
        <tr>
            <td><?= $this->Number->format($category->CatId) ?></td>
            <td><?= h($category->CatName) ?></td>
            <td><?= h($category->TimeStamp) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $category->CatId]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $category->CatId]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $category->CatId], ['confirm' => __('Are you sure you want to delete # {0}?', $category->CatId)]) ?>
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
