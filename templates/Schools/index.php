<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\School[]|\Cake\Collection\CollectionInterface $schools
 */
?>
<div class="schools index content">
    <?= $this->Html->link(__('New School'), ['action' => 'add'], ['class' => 'btn btn-primary btn-sm button float-right']) ?>
    <h3><?= __('Schools') ?></h3>
    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>Id</th>
                <th>School Name</th>
                <th>Province</th>
                <th>Area</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($schools as $school): ?>
                <tr>
                    <td><?= $this->Number->format($school->id) ?></td>
                    <td><?= h($school->school_name) ?></td>
                    <td><?= $school->has('province') ? $this->Html->link($school->province->province_name, ['controller' => 'Provinces', 'action' => 'view', $school->province->id]) : '' ?></td>
                    <td><?= h($school->area) ?></td>
                    <td class="actions">
<!--                        <i class="far fa-eye"></i>-->
                        <?= $this->Html->link(__('View'), ['action' => 'view', $school->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $school->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $school->id], ['confirm' => __('Are you sure you want to delete # {0}?', $school->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
            <tr>
                <th>Id</th>
                <th>School Name</th>
                <th>Province</th>
                <th>Area</th>
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
