<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TransferHistory[]|\Cake\Collection\CollectionInterface $transferHistory
 */
?>
<div class="transferHistory index content">
    <?= $this->Html->link(__('New Transfer History'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Transfer History') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('leaner_id') ?></th>
                    <th><?= $this->Paginator->sort('from_school_id') ?></th>
                    <th><?= $this->Paginator->sort('to_school_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transferHistory as $transferHistory): ?>
                <tr>
                    <td><?= $this->Number->format($transferHistory->id) ?></td>
                    <td><?= $this->Number->format($transferHistory->leaner_id) ?></td>
                    <td><?= $this->Number->format($transferHistory->from_school_id) ?></td>
                    <td><?= $this->Number->format($transferHistory->to_school_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $transferHistory->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $transferHistory->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $transferHistory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transferHistory->id)]) ?>
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
