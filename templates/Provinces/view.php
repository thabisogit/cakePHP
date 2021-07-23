<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Province $province
 */
?>


<hr>
<div class="container" style="background-color: white">
    <div class="mb-3 row">
        <legend class="col-sm-6"><?= __('Province Details') ?></legend>
        <div class="col-sm-6" style="text-align: right">
            <?= $this->Html->link(__('List Provinces'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="province_name" class="col-sm-2 col-form-label" style="font-weight: bold">Province Name :</label>
        <div class="col-sm-10">
            <?= h($province->province_name) ?>
        </div>
    </div>

    <div class="mb-3 row">
        <legend class="col-sm-6"><?= __('Schools in this province') ?></legend>
            <?php if (!empty($province->schools)) : ?>
                <div class="table-responsive ">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th><?= __('School Name') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($province->schools as $schools) : ?>
                            <tr>
                                <td><?= h($schools->school_name) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Schools', 'action' => 'view', $schools->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Schools', 'action' => 'edit', $schools->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Schools', 'action' => 'delete', $schools->id], ['confirm' => __('Are you sure you want to delete # {0}?', $schools->id)]) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            <?php endif; ?>
    </div>


    <div class="mb-3 row">
        <?= $this->Html->link(__('Edit Province'), ['action' => 'edit', $province->id], ['class' => 'btn btn-warning btn-sm']) ?>
        &nbsp;&nbsp;
        <?= $this->Html->link(__('New Province'), ['action' => 'add'], ['class' => 'btn btn-success btn-sm']) ?>
        &nbsp;&nbsp;
        <?= $this->Form->postLink(
            __('Delete'),
            ['action' => 'delete', $province->id],
            ['confirm' => __('Are you sure you want to delete # {0}?', $province->id), 'class' => 'btn btn-danger btn-sm']
        ) ?>
    </div>


</div>
<hr>
