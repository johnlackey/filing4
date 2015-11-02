<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $category->CatId],
                ['confirm' => __('Are you sure you want to delete # {0}?', $category->CatId)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="categories form large-10 medium-9 columns">
    <?= $this->Form->create($category) ?>
    <fieldset>
        <legend><?= __('Edit Category') ?></legend>
        <?php
            echo $this->Form->input('CatName');
            echo $this->Form->input('Catnote');
            echo $this->Form->input('Viewable');
            echo $this->Form->input('TimeStamp');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
