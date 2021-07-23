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
            <?= $this->Html->link(__('Edit Transfer History'), ['action' => 'edit', $transferHistory->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Transfer History'), ['action' => 'delete', $transferHistory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transferHistory->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Transfer History'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Transfer History'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="transferHistory view content">
            <h3><?= h($transferHistory->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($transferHistory->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Leaner Id') ?></th>
                    <td><?= $this->Number->format($transferHistory->leaner_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('From School Id') ?></th>
                    <td><?= $this->Number->format($transferHistory->from_school_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('To School Id') ?></th>
                    <td><?= $this->Number->format($transferHistory->to_school_id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
