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
        <legend class="col-sm-6"><?= __('Learner Details') ?></legend>
        <div class="col-sm-6" style="text-align: right">
            <?= $this->Html->link(__('List Learners'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="first_name" class="col-sm-2 col-form-label" style="font-weight: bold">First Name :</label>
        <div class="col-sm-10">
            <?= h($learner->first_name) ?>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="last_name" class="col-sm-2 col-form-label" style="font-weight: bold">Last Name :</label>
        <div class="col-sm-10">
            <?= h($learner->last_name) ?>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="id_number" class="col-sm-2 col-form-label" style="font-weight: bold">ID Number :</label>
        <div class="col-sm-10">
            <?= h($learner->id_number) ?>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="dob" class="col-sm-2 col-form-label" style="font-weight: bold">D.O.B :</label>
        <div class="col-sm-10">
            <?= h($learner->dob) ?>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="home_address" class="col-sm-2 col-form-label" style="font-weight: bold">Home Address :</label>
        <div class="col-sm-10">
            <?= h($learner->home_address) ?>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="contact_number" class="col-sm-2 col-form-label" style="font-weight: bold">Contact Number :</label>
        <div class="col-sm-10">
            <?= h($learner->contact_number) ?>
        </div>
    </div>


    <div class="mb-3 row">
        <label for="contact_number" class="col-sm-2 col-form-label" style="font-weight: bold">Current School :</label>
        <div class="col-sm-10">
            <label id="currentSchool">Not assigned</label>
        </div>
    </div>


    <!-- Tabs -->
    <section id="tabs">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 ">
                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Transfer Learner</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Transfer History</a>
                        </div>
                    </nav>
                    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <select name="school_id" id="school_id" class="form-control">
                                <option>-Please Select School</option>
                                <?php foreach ($schools as $school): ?>
                                    <option value="<?= $school->id ?>"><?= $school->school_name ?></option>
                                <?php endforeach; ?>
                            </select>
                            <hr>
                            <button id="switchSchool" type="button" class="btn btn-primary btn-sm">Transfer Learner</button>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="d-flex align-items-center" id="spinnerLoader">
                                <strong>Loading transfer history...</strong>
                                <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
                            </div>

                            <ul id="historyList" style="display: none">
                            </ul>
                            <i id="no-history" style="display: none"></i>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <div class="mb-3 row">
        <?= $this->Html->link(__('Edit Learner'), ['action' => 'edit', $learner->id], ['class' => 'btn btn-warning btn-sm']) ?>
        &nbsp;&nbsp;
        <?= $this->Html->link(__('New Learner'), ['action' => 'add'], ['class' => 'btn btn-success btn-sm']) ?>
        &nbsp;&nbsp;
        <?= $this->Form->postLink(
            __('Delete'),
            ['action' => 'delete', $learner->id],
            ['confirm' => __('Are you sure you want to delete # {0}?', $learner->id), 'class' => 'btn btn-danger btn-sm']
        ) ?>
    </div>
    <?= $this->Form->end() ?>

    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <p>Learner has been succesffuly assigned to the school!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-modal" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>

</div>
<hr>

<script type="text/javascript">

    $(function(){
        getCurrentSchool();
        $('#toggleDiv').on('click',function(){
            $('#collapseExample').toggle();
        });


        $(document).ready(function() {
            $('.close-modal').on('click',function(){
                $('#myModal').modal('hide');
            });

            $('#nav-profile-tab').on('click',function(){

                $.ajax({
                    type: 'POST',
                    url: "<?php echo $this->Url->build(['controller' => 'LearnerSchool','action' => 'getLearnerHistory']); ?>",
                    headers : {
                        'X-CSRF-Token': $('[name="_csrfToken"]').val()
                    },
                    datatype:'json',
                    cache: false,
                    data: {learner_id:<?= h($learner->id) ?>},

                })
                    .done(function(data){
                        if(data.history != ''){
                            $('#historyList').empty();
                            $.each(data.history, function(x,v) {
                                $('#historyList').append('<li>'+v+'</li>');
                            });
                            setTimeout(function() {
                                $('#spinnerLoader').attr('style','display:none !important');
                                $('#historyList').show();
                                $('#no-history').hide()
                            }, 3000);
                        }else{
                            setTimeout(function() {
                                $('#spinnerLoader').attr('style','display:none !important');
                                $('#no-history').text('No history found!').attr('style','display:visible !important');
                            }, 3000);
                        }

                    });



            });

        $('#switchSchool').on('click',function(){

            $.ajax({
                type: 'POST',
                url: "<?php echo $this->Url->build(['controller' => 'LearnerSchool','action' => 'saveData']); ?>",
                headers : {
                    'X-CSRF-Token': $('[name="_csrfToken"]').val()
                },
                datatype:'json',
                cache: false,
                data: {learner_id:<?= h($learner->id) ?>,school_id:$('#school_id').val()},

            })
                .done(function(){
                    $('#myModal').modal('show');
                });
            });
        });

    })

    function getCurrentSchool() {

        $.ajax({
            type: 'POST',
            url: "/schools/getLearnerSchool",
            headers : {
                'X-CSRF-Token': $('[name="_csrfToken"]').val()
            },
            datatype:'json',
            cache: false,
            data: {learner_id:<?= h($learner->id) ?>}
        })
            .done(function(data){
                 $('#currentSchool').html(data.current_school);
            });

    }
</script>
