<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Province[]|\Cake\Collection\CollectionInterface $provinces
 */
?>
<div class="provinces index content">
    <?= $this->Html->link(__('New Province'), ['action' => 'add'], ['class' => 'button btn btn-primary btn-sm float-right']) ?>
    <h3><?= __('Provinces') ?></h3>
    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>Id</th>
                <th>Province Name</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($provinces as $province): ?>
                <tr>
                    <td><?= $this->Number->format($province->id) ?></td>
                    <td><?= h($province->province_name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $province->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $province->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $province->id], ['confirm' => __('Are you sure you want to delete # {0}?', $province->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
            <tr>
                <th>Id</th>
                <th>Province Name</th>
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
