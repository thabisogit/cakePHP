<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TransferHistory $transferHistory
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $transferHistory->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $transferHistory->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Transfer History'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="transferHistory form content">
            <?= $this->Form->create($transferHistory) ?>
            <fieldset>
                <legend><?= __('Edit Transfer History') ?></legend>
                <?php
                    echo $this->Form->control('leaner_id');
                    echo $this->Form->control('from_school_id');
                    echo $this->Form->control('to_school_id');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
