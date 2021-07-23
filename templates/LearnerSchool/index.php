<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LearnerSchool[]|\Cake\Collection\CollectionInterface $learnerSchool
 */
?>
<div class="learnerSchool index content">
    <?= $this->Html->link(__('New Learner School'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Learner School') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('leaner_id') ?></th>
                    <th><?= $this->Paginator->sort('school_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($learnerSchool as $learnerSchool): ?>
                <tr>
                    <td><?= $this->Number->format($learnerSchool->id) ?></td>
                    <td><?= $this->Number->format($learnerSchool->leaner_id) ?></td>
                    <td><?= $learnerSchool->has('school') ? $this->Html->link($learnerSchool->school->id, ['controller' => 'Schools', 'action' => 'view', $learnerSchool->school->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $learnerSchool->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $learnerSchool->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $learnerSchool->id], ['confirm' => __('Are you sure you want to delete # {0}?', $learnerSchool->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
