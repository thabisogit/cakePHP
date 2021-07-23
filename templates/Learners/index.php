<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Learner[]|\Cake\Collection\CollectionInterface $learners
 */
?>
<div class="learners index content">
    <?= $this->Html->link(__('New Learner'), ['action' => 'add'], ['class' => 'btn btn-primary btn-sm float-right']) ?>
    <h3><?= __('Learners') ?></h3>
    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Id Number</th>
                <th>D.O.B</th>
                <th>Home Address</th>
                <th>Contact Number</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($learners as $learner): ?>
                <tr>
                    <td><?= h($learner->first_name) ?></td>
                    <td><?= h($learner->last_name) ?></td>
                    <td><?= h($learner->id_number) ?></td>
                    <td><?= h($learner->dob) ?></td>
                    <td><?= h($learner->home_address) ?></td>
                    <td><?= h($learner->contact_number) ?></td>
                    <td class="actions">

                        <?= $this->Html->link(__('View'), ['action' => 'view', $learner->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $learner->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $learner->id], ['confirm' => __('Are you sure you want to delete # {0}?', $learner->id)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            <tfoot>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Id Number</th>
                <th>D.O.B</th>
                <th>Home Address</th>
                <th>Contact Number</th>
                <th>Actions</th>
            </tr>
            </tfoot>
        </table>

    </div>

</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
