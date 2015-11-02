<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Location'), ['action' => 'edit', $location->LocId]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Location'), ['action' => 'delete', $location->LocId], ['confirm' => __('Are you sure you want to delete # {0}?', $location->LocId)]) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="locations view large-10 medium-9 columns">
    <h2><?= h($location->LocName) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('LocName') ?></h6>
            <p><?= h($location->LocName) ?></p>
            <h6 class="subheader"><?= __('ReviewFreqString') ?></h6>
            <p><?= h($location->ReviewFreqString) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('LocId') ?></h6>
            <p><?= $this->Number->format($location->LocId) ?></p>
            <h6 class="subheader"><?= __('MaxCapacity') ?></h6>
            <p><?= $this->Number->format($location->MaxCapacity) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('DateCreated') ?></h6>
            <p><?= h($location->DateCreated) ?></p>
            <h6 class="subheader"><?= __('Timestamp') ?></h6>
            <p><?= h($location->Timestamp) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('LocNote') ?></h6>
            <?= $this->Text->autoParagraph(h($location->LocNote)) ?>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('AllowDecimals') ?></h6>
            <?= $this->Text->autoParagraph(h($location->AllowDecimals)) ?>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Viewable') ?></h6>
            <?= $this->Text->autoParagraph(h($location->Viewable)) ?>
        </div>
    </div>
</div>
