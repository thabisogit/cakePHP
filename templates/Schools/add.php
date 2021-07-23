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
        <legend class="col-sm-6"><?= __('Add School') ?></legend>
        <div class="col-sm-6" style="text-align: right">
            <?= $this->Html->link(__('List Schools'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="first_name" class="col-sm-2 col-form-label">School Name</label>
        <div class="col-sm-6">
            <?php echo $this->Form->text('school_name',['class'=>'form-control']);?>
        </div>
    </div>


    <div class="mb-3 row">
        <label for="province_id" class="col-sm-2 col-form-label">Province</label>
        <div class="col-sm-6">
            <select name="province_id"  class="form-control">
                <option>-Please Select</option>
                <?php foreach ($provinces as $province): ?>
                    <option value="<?= $province->id ?>"><?= $province->province_name ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="first_name" class="col-sm-2 col-form-label">Area</label>
        <div class="col-sm-6">
            <?php echo $this->Form->text('area',['class'=>'form-control']);?>
        </div>
    </div>

    <div class="mb-3 row">
        <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary btn-sm']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
<hr>
