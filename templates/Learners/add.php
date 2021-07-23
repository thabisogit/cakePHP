<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Learner $learner
 */
?>
<hr>
<div class="container" style="background-color: white">
    <?= $this->Form->create($learner) ?>
    <div class="mb-3 row">
        <legend class="col-sm-6"><?= __('Add Learner') ?></legend>
        <div class="col-sm-6" style="text-align: right">
        <?= $this->Html->link(__('List Learners'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="first_name" class="col-sm-2 col-form-label">First Name</label>
        <div class="col-sm-10">
            <?php echo $this->Form->text('first_name',['class'=>'form-control']);?>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
        <div class="col-sm-10">
            <?php echo $this->Form->text('last_name',['class'=>'form-control']);?>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="id_number" class="col-sm-2 col-form-label">ID Number</label>
        <div class="col-sm-10">
            <?php echo $this->Form->text('id_number',['class'=>'form-control']);?>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="dob" class="col-sm-2 col-form-label">D.O.B</label>
        <div class="col-sm-10">
            <?php echo $this->Form->date('dob',['class'=>'form-control']);?>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="home_address" class="col-sm-2 col-form-label">Home Address</label>
        <div class="col-sm-10">
            <?php echo $this->Form->text('home_address',['class'=>'form-control']);?>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="contact_number" class="col-sm-2 col-form-label">Contact Number</label>
        <div class="col-sm-10">
            <?php echo $this->Form->text('contact_number',['class'=>'form-control']);?>
        </div>
    </div>

    <div class="mb-3 row">
        <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary btn-sm']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
<hr>
