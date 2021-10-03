<!-- Body Section -->
<style>
    p {
        margin: 0 !important;
        padding: 0 !important;
    }

    .field-name {
        font-size: 20px;
        font-weight: 550;
    }

    .field-value {
        color: gray;
        font-weight: 550;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    table td {
        position: relative;
    }

    table td.feedback input {
        position: absolute;
        display: block;
        top: 0;
        left: 0;
        margin: 0;
        height: 100% !important;
        width: 100%;
        border-radius: 0 !important;
        border: none;
        padding: 10px;
        box-sizing: border-box;
    }
</style>

<body>
    <div class="container p-4" id="bg-template">
        <h1 class="mb-4 mt-4">Daily Timesheet</h1>
        <hr>
        <div class="row">
            <div class="col-lg-3 col-md-5 mb-4">
                <?php
                if (!empty($member_dsc->user_photo)) {
                    $user_photo = '<img src="data:image/' . $member_dsc->user_photo_type . ';base64,' . base64_encode($member_dsc->user_photo) . '" width="225" height="300">';
                } else {
                    $foto = base_url('/public/assets/uploads/user_photo/user_temp.png');
                    $user_photo = '<img src=' . $foto . " " . 'width="225" height="300">';
                };
                ?>
                <?= $user_photo ?>
            </div>

            <div class="col-lg-9 col-md-7">
                <h1 class="mb-4"><?= $member_dsc->nama_member ?></h1>
                <hr>
                <div class="row" id="row1">
                    <div id="usecase_leader" class="mb-4 col-lg-4 col-md-6">
                        <p class="field-name">NIK</p>
                        <p class="field-value"><?= $member_dsc->nik ?></p>
                    </div>

                    <div id="groups" class="mb-4 col-lg-4 col-md-6">
                        <p class="field-name">Education Background</p>
                        <p class="field-value"><?= $member_dsc->ed_bg_desc ?></p>
                    </div>

                    <div id="tribe" class="mb-4 col-lg-4 col-md-6">
                        <p class="field-name">Status</p>
                        <p class="field-value"><?= $member_dsc->nama_status ?></p>
                    </div>

                    <div id="usecase_leader" class="mb-4 col-lg-4 col-md-6">
                        <p class="field-name">Position</p>
                        <p class="field-value"><?= $member_dsc->nama_posisi ?></p>
                    </div>

                    <div id="groups" class="mb-4 col-lg-4 col-md-6">
                        <p class="field-name">Band</p>
                        <p class="field-value"><?= $member_dsc->nama_band ?></p>
                    </div>

                    <div id="usecase_leader" class="mb-4 col-lg-4 col-md-6">
                        <p class="field-name">Position Type</p>
                        <p class="field-value"><?= $member_dsc->nama_posisi_type ?></p>
                    </div>

                    <div id="usecase_leader" class="mb-4 col-lg-4 col-md-6">
                        <p class="field-name">Position Level</p>
                        <p class="field-value"><?= $member_dsc->nama_posisi_level ?></p>
                    </div>

                    <div id="tribe" class="mb-4 col-lg-4 col-md-6">
                        <p class="field-name">Started Date</p>
                        <p class="field-value"><?= $member_dsc->kontrak_mulai ?></p>
                    </div>
                </div>
            </div>
        </div>

        <hr class="mt-4 mb-4">

        <div class="row">
            <div class="col-6 col-md-4 md-6 mb-4">
                <label for="datepicker">Select Month and Year</label>
                <input type="text" class="form-control" name="datepicker" id="datepicker" value="<?= date('m-Y') ?>" onchange="changeDatatable()"/>
            </div>

            <div class="col-6 col-md-4 md-6 mb-4">
                <label for="changeFilter">Status Use Case Task</label>
                <select class="form-control" style="width:auto;" id="filter_status" onchange="changeDatatable()">
                    <option value="all" selected>All Use Case Task</option>
                    <?php foreach ($status_usecase_task->result() as $use_task) { ?>
                        <?php if($use_task->id_status_usecase_task != 1){ ?>
                            <option value="<?= $use_task->id_status_usecase_task ?>"><?= $use_task->nama_status ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </div>
        </div>
        <?php if($count_sent_usecase_task > 0){ ?>
            <button type="button" class="btn btn-sm btn-success mb-1 mt-2" data-toggle="modal" data-target="#approveAllUseCaseTask"><em class="fas fa-upload"></em> Approve All</button>
        <?php } else { ?>
            <button type="button" class="btn btn-sm btn-success mb-1 mt-2" data-toggle="modal" data-target="#approveAllUseCaseTask" disabled><em class="fas fa-upload"></em> Approve All</button>
        <?php } ?>

        <?php
        if ($this->session->flashdata('msg')) {
            echo $this->session->flashdata('msg');
        }
        ?>
        
        <table id="one_row_order_lite" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Date/Time</th>
                    <th>Task Name</th>
                    <th>Task Description</th>
                    <th>Reporter</th>
                    <th>Assignee</th>
                    <th>Feedback</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="datatable">
                <?php
                    $i = 1;
                    foreach ($usecase_task->result() as $use_task) {
                        if ($use_task->status != 1) {
                ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $use_task->date, '<br>'.substr($use_task->start_time, 0, -3) . '-' . substr($use_task->end_time, 0, -3) ?></td>
                    <td><?= $use_task->task_name ?></td>
                    <td><?= $use_task->task_description ?></td>
                    <td><?= $use_task->reporter ?></td>
                    <td><?= $use_task->assignee ?></td>
                    <?php if ($use_task->status == 3 || $use_task->status == 4) { ?>
                        <td><?= $use_task->feedback ?></td>
                    <?php } else { ?>
                        <td class="feedback"><input type="text" oninput="sendFeedback('<?= $use_task->id_usecase_task ?>')" id="feedback<?= $use_task->id_usecase_task ?>" placeholder="This is feedback"></td>
                    <?php } ?>
                    <td><?= $use_task->nama_status ?></td>
                    <td>
                        <?php if ($use_task->status == 3 || $use_task->status == 4) { ?>
                            <div class="btn-group-vertical">
                                <button type="button" class="btn btn-sm btn-success mb-1" data-toggle="modal" data-target="#approveUseCaseTask<?= $use_task->id_usecase_task ?>" disabled><em class="fas fa-upload"></em> Approve</button>
                                <button type="button" class="btn btn-sm btn-danger mb-1" data-toggle="modal" data-target="#rejectUseCaseTask<?= $use_task->id_usecase_task ?>" disabled><em class="fas fa-upload"></em> Reject</button>
                            </div>
                        <?php } else { ?>
                            <div class="btn-group-vertical">
                                <button type="button" class="btn btn-sm btn-success mb-1" data-toggle="modal" data-target="#approveUseCaseTask<?= $use_task->id_usecase_task ?>"><em class="fas fa-upload"></em> Approve</button>
                                <button type="button" class="btn btn-sm btn-danger mb-1" data-toggle="modal" data-target="#rejectUseCaseTask<?= $use_task->id_usecase_task ?>"><em class="fas fa-upload"></em> Reject</button>
                            </div>
                        <?php } ?>
                    </td>
                </tr>
                <?php
                    }
                }
                ?>

            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Date/Time</th>
                    <th>Task Name</th>
                    <th>Task Description</th>
                    <th>Reporter</th>
                    <th>Assignee</th>
                    <th>Feedback</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>
    </div>
</body>
<!-- End of Body Section -->

<script>
    function sendFeedback(id_usecase_task){
        var feedback = document.getElementById("feedback"+id_usecase_task).value;

        if(feedback){
            $.ajax({
                url: "<?= base_url() ?>pages/DailyTimesheet/send_feedback",
                method: 'POST',
                data: {
                    'feedback': feedback,
                    'id_usecase_task': id_usecase_task
                },
                async: false,
                success: function(data) {
                    var obj = JSON.parse(data);
                },
            });
        } else {
            return ;
        }
    }
</script>

<script>
    function changeDatatable(){
        var nik = <?php echo json_encode($nik); ?>;
        var id_usecase = <?php echo json_encode($id_usecase); ?>;
        var status = document.getElementById("filter_status").value;
        var month_year = document.getElementById("datepicker").value;
        if(month_year){
            $.ajax({
                url: "<?= base_url() ?>pages/DailyTimesheet/update_datatable_detail_member",
                method: 'POST',
                data: {
                    'status': status,
                    'month_year': month_year,
                    'nik': nik,
                    'id_usecase': id_usecase
                },
                async: false,
                success: function(data) {
                    var obj = JSON.parse(data)
                    var datatable = document.getElementById('datatable')
                    datatable.innerHTML = obj.string
                    var nama_usecase = document.getElementById('nama_usecase')
                    nama_usecase.innerHTML = obj.nama_usecase
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