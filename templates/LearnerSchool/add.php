<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LearnerSchool $learnerSchool
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Learner School'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="learnerSchool form content">
            <?= $this->Form->create($learnerSchool) ?>
            <fieldset>
                <legend><?= __('Add Learner School') ?></legend>
                <?php
                    echo $this->Form->control('leaner_id');
                    echo $this->Form->control('school_id', ['options' => $schools]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
