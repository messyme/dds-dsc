<style>
    * {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    #notfound {
        position: relative;
        height: 90vh;
    }

    #notfound .notfound {
        position: absolute;
        left: 50%;
        top: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    .notfound {
        max-width: 920px;
        width: 100%;
        line-height: 1.4;
        text-align: center;
        padding-left: 15px;
        padding-right: 15px;
    }


    .notfound h2 {
        font-family: 'Maven Pro', sans-serif;
        font-size: 35px;
        color: #000;
        font-weight: 900;
        text-transform: uppercase;
        margin: 0px;
    }

    .notfound p {
        font-family: 'Maven Pro', sans-serif;
        font-size: 16px;
        color: #000;
        font-weight: 400;
        text-transform: uppercase;
        margin-top: 15px;
    }

    /* .notfound a {
        font-family: 'Maven Pro', sans-serif;
        font-size: 14px;
        text-decoration: none;
        text-transform: uppercase;
        background: #189cf0;
    display: inline-block;
    padding: 16px 38px;
        border: 2px solid transparent;
        border-radius: 40px;
        color: #fff;
    font-weight: 400;
    -webkit-transition: 0.2s all;
    transition: 0.2s all;
    }

    */
    /* .notfound a:hover {
        background-color: #fff;
        border-color: #189cf0;
        color: #189cf0;
    } */

    @media only screen and (max-width: 480px) {
        .notfound .notfound-404 h1 {
            font-size: 162px;
        }

        .notfound h2 {
            font-size: 26px;
        }
    }
</style>

<body>
    <!-- if leader kosong/belum isi assigned role leader -->
    <?php if ($count_leader == 0) { ?>
    <div id="notfound" class="container-fluid p-4">
        <div class="notfound">
            <br>
            <br><br><br>
            <br><br>
            <h2>We are sorry, You are not Use Case Leader</h2>
            <img src="<?= base_url() ?>public/assets/images/empty-data.png" srcset="" width="40%">
            <p>If you are a Leader,</b> please fill your Assigned Use Case as a Leader Role in <a href="<?= base_url() ?>pages/AssignedUsecase">Assigned Usecase</a> page.</p>
            <a class="btn btn-primary" href="<?= base_url() ?>pages/Home">Back To Homepage</a>
        </div>
    </div>
    <?php } else { ?>
    <div class="container p-4" id="bg-template">
        <h1 class="mb-4 mt-4" id="training">Daily Timesheet - Leader</h1>
        <hr>
        <h3 class="mb-4 mt-4" id="nama_usecase"><?= $leader_default->nama_usecase ?></h3>

        <!-- <div class="md-6 mb-4  ">
            <label for="changeFilter">Select Use Case</label>
            <select class="form-control text-uppercase" style="width:auto;" id="usecase" onchange="changeDatatable()">
                < ?php foreach ($leader->result() as $leader) { ?>
                    < ?php if($leader->id_usecase == $leader_default->id_usecase){ ?>
                    <option value="< ?= $leader->id_usecase ?>" selected>< ?= $leader->nama_usecase ?></option>
                    < ?php } else { ?>
                    <option value="< ?= $leader->id_usecase ?>">< ?= $leader->nama_usecase ?></option>
                    < ?php } ?>
                < ?php } ?>
            </select>
        </div> -->

        <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addMemberUseCase"><em class="fas fa-plus"></em> Add Member</button>

        <?php
        if ($this->session->flashdata('msg')) {
            echo $this->session->flashdata('msg');
        }
        ?>

        <table id="no_export_idt" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>NIK</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Status</th>
                    <th>Number of Submissions</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="datatable">
                <?php 
                foreach ($member_usecase->result() as $member_usecase) {

                    $count_all_usecase_task = $this->M_otherDataAssignments->count_get_usecase_task_nik($member_usecase->id_usecase, $member_usecase->nik);
                    $count_sent_usecase_task = $this->M_otherDataAssignments->get_usecase_task_member_status($member_usecase->id_usecase, $member_usecase->nik, 2)->num_rows();
                    $count_approved_usecase_task = $this->M_otherDataAssignments->get_usecase_task_member_status($member_usecase->id_usecase, $member_usecase->nik, 3)->num_rows();
                    $count_rejected_usecase_task = $this->M_otherDataAssignments->get_usecase_task_member_status($member_usecase->id_usecase, $member_usecase->nik, 4)->num_rows();

                    if ($count_all_usecase_task == $count_approved_usecase_task && $count_all_usecase_task > 0) {
                        $status = "Approved";
                        $num = 0;
                    } elseif ($count_sent_usecase_task > 0 || $count_rejected_usecase_task > 0) {
                        $status = "Waiting Approval";
                        $num = $count_sent_usecase_task + $count_rejected_usecase_task;
                    } else {
                        $status = "No Data Available";
                        $num = 0;
                    }
                ?>
                <tr>
                    <td><?= $member_usecase->nik ?></td>
                    <td><?= $member_usecase->nama_member ?></td>
                    <td><?= $member_usecase->nama_posisi ?></td>
                    <td><?= $status ?></td>
                    <td><?= $num ?></td>
                    <td>
                        <div class="btn-group">
                            <a href="<?= base_url() ?>pages/DailyTimesheet/detail_member/<?= $member_usecase->nik ?>/<?= $member_usecase->id_usecase ?>" type="button" class="btn btn-sm btn-primary"><em class="fas fa-info"></em> Detail</a>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteMember/<?= $member_usecase->nik ?>/<?= $member_usecase->id_usecase ?>"><em class="fas fa-trash"></em> Delete</button>
                        </div>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>NIK</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Status</th>
                    <th>Number of Submissions</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>

        <hr>

        <h3 class="mb-4 mt-4">Tasks</h3>
        <div class="col-md-4 mb-4 pl-0">
            <label for="datepicker">Select Month and Year</label>
            <input type="text" class="form-control" name="datepicker" id="datepicker" value="<?= date('m-Y') ?>" onchange="changeDatatable2()"/>
        </div>
        <div class="bd-example">
            <div class="btn-group">
                <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addUseCaseTask"><em class="fas fa-plus"></em> Add Activity</button>
            </div>
            <?php if(count($usecase_task_waiting_for_approval->result()) > 0){ ?>
                <div class="btn-group">
                    <button id="button_send_all" type="button" class="mb-4 btn btn-success" data-toggle="modal" data-target="#sendAllUseCaseTask"><em class="fas fa-upload"></em> Approve All</button>
                </div>
            <?php } else { ?>
                <div class="btn-group">
                    <button id="button_send_all" type="button" class="mb-4 btn btn-success" data-toggle="modal" data-target="#sendAllUseCaseTask" disabled><em class="fas fa-upload"></em> Approve All</button>
                </div>
            <?php } ?>
        </div>
        <table id="one_row_order_lite" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Date & Time</th>
                    <th>Task Name</th>
                    <th>Task Description</th>
                    <th>Reporter</th>
                    <th>Assignee</th>
                    <th>Actions</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="datatable2">
                <?php
                    $i = 1;
                    foreach ($usecase_task_leader->result() as $use_task) {
                ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <?php if($use_task->start_date == '00:00:00' or $use_task->end_time == '00:00:00'){ ?>
                        <td><?= $use_task->date ?></td>
                        <?php } else { ?>
                        <td><?= $use_task->date, '<br>'.substr($use_task->start_time, 0, -3) . '-' . substr($use_task->end_time, 0, -3) ?></td>
                        <?php } ?>
                        <td><?= $use_task->task_name ?></td>
                        <td><?= $use_task->task_description ?></td>
                        <td><?= $use_task->reporter ?></td>
                        <td><?= $use_task->assignee ?></td>
                        <td>
                            <?php if ($use_task->status == 2) { ?>
                                <div class="btn-group-vertical">
                                    <button type="button" class="btn btn-sm btn-success mb-1" data-toggle="modal" data-target="#sendUseCaseTask<?= $use_task->id_usecase_task ?>"><em class="fas fa-upload"></em> Approve</button>
                                    <button type="button" class="btn btn-sm btn-secondary mb-1" data-toggle="modal" data-target="#editUseCaseTask<?= $use_task->id_usecase_task ?>"><em class="fas fa-upload"></em> Edit</button>
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteUseCaseTask/<?= $use_task->id_usecase_task ?>/<?= $use_task->id_usecase ?>"><em class="fas fa-trash"></em> Delete</button>
                                </div>
                            <?php } else { ?>
                                <div class="btn-group-vertical">
                                    <button type="button" class="btn btn-sm btn-success mb-1" data-toggle="modal" data-target="#sendUseCaseTask<?= $use_task->id_usecase_task ?>" disabled><em class="fas fa-upload"></em> Approve</button>
                                    <button type="button" class="btn btn-sm btn-secondary mb-1" data-toggle="modal" data-target="#editUseCaseTask<?= $use_task->id_usecase_task ?>" disabled><em class="fas fa-upload"></em> Edit</button>
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteUseCaseTask<?= $use_task->id_usecase_task ?>" disabled><em class="fas fa-trash"></em> Delete</button>
                                </div>
                            <?php } ?>
                        </td>
                        <td><?= $use_task->nama_status ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Date & Time</th>
                    <th>Task Name</th>
                    <th>Task Description</th>
                    <th>Reporter</th>
                    <th>Assignee</th>
                    <th>Actions</th>
                    <th>Status</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <?php } ?>
    
   
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    function changeDatatable(){
        var usecase = document.getElementById("usecase").value;
        if(usecase){
            $.ajax({
                url: "<?= base_url() ?>pages/DailyTimesheet/update_datatable_member_usecase",
                method: 'POST',
                data: {
                    'id_usecase': usecase
                },
                async: false,
                success: function(data) {
                    var obj = JSON.parse(data)
                    var datatable = document.getElementById('datatable')
                    datatable.innerHTML = obj.string
                    var nama_usecase = document.getElementById('nama_usecase')
                    nama_usecase.innerHTML = obj.nama_usecase
                    var nama_usecase_modal = document.getElementById("addMemberUseCaseLabel")
                    nama_usecase_modal.innerHTML = "Add Member - " + obj.nama_usecase
                    var add_usecase_modal = document.getElementById('id_usecase_add')
                    add_usecase_modal.value = obj.id_usecase
                    var id_usecase_member_modal = document.getElementById('id_usecase_member')
                    id_usecase_member_modal.value = obj.id_usecase
                    var nik = document.getElementById('nik')
                    nik.innerHTML = obj.string2
                },
            });
            changeDatatable2()
        } else {
            return ;
        }
    }
</script>

<script>
    function changeDatatable2(){
        var usecase = document.getElementById("usecase").value;
        var month_year = document.getElementById("datepicker").value;
        if(month_year){
            $.ajax({
                url: "<?= base_url() ?>pages/DailyTimesheet/update_datatable_usecase_task",
                method: 'POST',
                data: {
                    'id_usecase': usecase,
                    'nik': '<?= $this->session->userdata('username') ?>',
                    'month_year': month_year
                },
                async: false,
                success: function(data) {
                    var obj = JSON.parse(data)
                    var datatable = document.getElementById('datatable2')
                    datatable.innerHTML = obj.string
                    var id_usecase_add = document.getElementById('id_usecase_add')
                    id_usecase_add.value = obj.id_usecase
                    var id_usecase_send_all = document.getElementById('id_usecase_send_all')
                    id_usecase_send_all.value = obj.id_usecase
                    if(obj.usecase_task_not_sent > 0){
                        document.getElementById("button_send_all").disabled = false;
                    } else {
                        document.getElementById("button_send_all").disabled = true;
                    }
                },
            });
        } else {
            return ;
        }
    }
</script>

</body>