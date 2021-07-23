<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\School $school
 */
?>

<hr>
<div class="container" style="background-color: white">
    <?= $this->Form->create($school) ?>
    <div class="mb-3 row">
        <legend class="col-sm-6"><?= __('School Details') ?></legend>
        <div class="col-sm-6" style="text-align: right">
            <?= $this->Html->link(__('List Schools'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="school_name" class="col-sm-2 col-form-label" style="font-weight: bold">School Name :</label>
        <div class="col-sm-10">
            <?= h($school->school_name) ?>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="last_name" class="col-sm-2 col-form-label" style="font-weight: bold">Province :</label>
        <div class="col-sm-10">
            <?= h($province) ?>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="area" class="col-sm-2 col-form-label" style="font-weight: bold">Area :</label>
        <div class="col-sm-10">
            <?= h($school->area) ?>
        </div>
    </div>

    <div class="mb-3 row">
        <legend class="col-sm-6"><?= __('Learners in this School') ?></legend>
            <?php if (!empty($school->learner_school)) : ?>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th><?= __('Leaner') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($learners as $learner) : ?>
                            <tr>
                                <td><?= h($learner->first_name) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Learners', 'action' => 'view', $learner->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Learners', 'action' => 'edit', $learner->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Learners', 'action' => 'delete', $learner->id], ['confirm' => __('Are you sure you want to delete # {0}?', $learner->id)]) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            <?php endif; ?>
    </div>


    <div class="mb-3 row">
        <?= $this->Html->link(__('Edit School'), ['action' => 'edit', $school->id], ['class' => 'btn btn-warning btn-sm']) ?>
        &nbsp;&nbsp;
        <?= $this->Html->link(__('New School'), ['action' => 'add'], ['class' => 'btn btn-success btn-sm']) ?>
        &nbsp;&nbsp;
        <?= $this->Form->postLink(
            __('Delete'),
            ['action' => 'delete', $school->id],
            ['confirm' => __('Are you sure you want to delete # {0}?', $school->id), 'class' => 'btn btn-danger btn-sm']
        ) ?>
    </div>
    <?= $this->Form->end() ?>


</div>
<hr>



