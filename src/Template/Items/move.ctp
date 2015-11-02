<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Items'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="items form large-10 medium-9 columns">
    <h2><?= h($item->location->LocName) ?> <?= h($item->TextItemId) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('ItemName') ?></h6>
            <p><?= h($item->ItemName) ?></p>
            <h6 class="subheader"><?= __('CatId') ?></h6>
            <p><?= h(is_null($item->category) ? "" : $item->category->CatName) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('ReviewFreq') ?></h6>
            <p><?= $this->Number->format($item->ReviewFreq) ?></p>
            <h6 class="subheader"><?= __('Status') ?></h6>
            <p><?= $this->Number->format($item->Status) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('ActionDate') ?></h6>
            <p><?= h($item->ActionDate) ?></p>
            <h6 class="subheader"><?= __('DateCreated') ?></h6>
            <p><?= h($item->DateCreated) ?></p>
            <h6 class="subheader"><?= __('TimeStamp') ?></h6>
            <p><?= h($item->TimeStamp) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Keywords') ?></h6>
            <?= $this->Text->autoParagraph(h($item->Keywords)) ?>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('ItemNote') ?></h6>
            <?= $this->Text->autoParagraph(h($item->ItemNote)) ?>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('IsTagged') ?></h6>
            <?= $this->Text->autoParagraph(h($item->IsTagged)) ?>
        </div>
    </div>
    <?= $this->Form->create($item) ?>
    <fieldset>
        <legend><?= __('Move Item') ?></legend>
        <?php
            echo $this->Form->input
            (
                'LocId',
                [
                    'type' => 'select',
                    'multiple' => FALSE,
                    'options' => $locations,
                    'empty' => TRUE,
                ]
            );
            //echo $this->Form->input('NumItemId');
            //echo $this->Form->input('TextItemId');
            //echo $this->Form->input('LocId');
            //echo $this->Form->input('ItemName');
            //echo $this->Form->input('Keywords');
            //echo $this->Form->input('CatId');
            //echo $this->Form->input('ActionDate');
            //echo $this->Form->input('DateCreated');
            //echo $this->Form->input('ReviewFreq');
            //echo $this->Form->input('ItemNote');
            //echo $this->Form->input('IsTagged');
            //echo $this->Form->input('Status');
            //echo $this->Form->input('TimeStamp');
            //echo $this->Form->input('ItemNotes');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
