<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Province $province
 */
?>

<hr>
<div class="container" style="background-color: white">
    <?= $this->Form->create($province) ?>
    <div class="mb-3 row">
        <legend class="col-sm-6"><?= __('Edit Province') ?></legend>
        <div class="col-sm-6" style="text-align: right">
            <?= $this->Html->link(__('List Provinces'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="province_name" class="col-sm-2 col-form-label">Province Name</label>
        <div class="col-sm-6">
            <?php echo $this->Form->text('province_name',['class'=>'form-control']);?>
        </div>
    </div>

    <div class="mb-3 row" style="margin-left: auto">
        <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary btn-sm']) ?>
        &nbsp;&nbsp;
        <?= $this->Form->postLink(
            __('Delete'),
            ['action' => 'delete', $province->id],
            ['confirm' => __('Are you sure you want to delete # {0}?', $province->id), 'class' => 'btn btn-danger btn-sm']
        ) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
<hr>





