<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->CatId]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->CatId], ['confirm' => __('Are you sure you want to delete # {0}?', $category->CatId)]) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="categories view large-10 medium-9 columns">
    <h2><?= h($category->CatId) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('CatName') ?></h6>
            <p><?= h($category->CatName) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('CatId') ?></h6>
            <p><?= $this->Number->format($category->CatId) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('TimeStamp') ?></h6>
            <p><?= h($category->TimeStamp) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Catnote') ?></h6>
            <?= $this->Text->autoParagraph(h($category->Catnote)) ?>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Viewable') ?></h6>
            <?= $this->Text->autoParagraph(h($category->Viewable)) ?>
        </div>
    </div>
</div>
