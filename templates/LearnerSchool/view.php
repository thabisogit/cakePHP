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
            <?= $this->Html->link(__('Edit Learner School'), ['action' => 'edit', $learnerSchool->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Learner School'), ['action' => 'delete', $learnerSchool->id], ['confirm' => __('Are you sure you want to delete # {0}?', $learnerSchool->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Learner School'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Learner School'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="learnerSchool view content">
            <h3><?= h($learnerSchool->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('School') ?></th>
                    <td><?= $learnerSchool->has('school') ? $this->Html->link($learnerSchool->school->id, ['controller' => 'Schools', 'action' => 'view', $learnerSchool->school->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($learnerSchool->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Leaner Id') ?></th>
                    <td><?= $this->Number->format($learnerSchool->leaner_id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
