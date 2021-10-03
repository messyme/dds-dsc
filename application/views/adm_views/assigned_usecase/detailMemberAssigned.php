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
    <?php if (count($usecase) == 0) { ?>
        <div id="notfound" class="container-fluid p-4">
            <div class="notfound">
                <br>
                <br><br><br>
                <br><br>
                <h2>We are sorry, You are not in Use Cases</h2>
                <img src="<?= base_url() ?>public/assets/images/empty-data.png" srcset="" width="40%">
                <p>If you are a Member,</b> please fill your Assigned Use Case as a Member Role in <a href="<?= base_url() ?>pages/AssignedUsecase">Assigned Usecase</a> page.</p>
                <a class="btn btn-primary" href="<?= base_url() ?>pages/Home">Back To Homepage</a>
            </div>
        </div>
    <?php } else { ?>

        <div class="container p-4" id="bg-template">
            <h1 class="mb-4 mt-4" id="training">Daily Timesheet - Member</h1>
            <p> Please fill Daily Timesheet (DT) according your Use Case and submit approval to your Supervisor. DT Status should be approved by Supervisor.</p>
            <div class="bd-example">
                <div class="btn-group">
                    <div class="md-12 mb-4">
                        <label for="changeFilter">Select Use Case</label>
                        <select class="form-control" style="width:auto;" id="usecase" onchange="changeDatatable()">
                            <?php foreach ($usecase->result() as $usecase) { ?>
                                <option value="<?= $usecase->id_usecase ?>"><?= $usecase->nama_usecase ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="md-12 mb-4 ml-1">
                        <label for="datepicker">Select Month and Year</label>
                        <input type="text" class="form-control" name="datepicker" id="datepicker" value="<?= date('m-Y') ?>" onchange="changeDatatable()"/>
                    </div>
                </div>
            </div>
            <hr>

            <h3 class="mb-4 mt-4" id="nama_usecase"><?= $usecase_default->nama_usecase ?></h3>
            <div class="bd-example">
                <div class="btn-group">
                    <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addUseCaseTask"><em class="fas fa-plus"></em> Add Task</button>
                </div>
                <?php if(count($usecase_task_not_sent->result()) > 0){ ?>
                    <div class="btn-group">
                        <button id="button_send_all" type="button" class="mb-4 btn btn-success" data-toggle="modal" data-target="#sendAllUseCaseTask"><em class="fas fa-upload"></em> Send All</button>
                    </div>
                <?php } else { ?>
                    <div class="btn-group">
                        <button id="button_send_all" type="button" class="mb-4 btn btn-success" data-toggle="modal" data-target="#sendAllUseCaseTask" disabled><em class="fas fa-upload"></em> Send All</button>
                    </div>
                <?php } ?>
            </div>
            <?php
            if ($this->session->flashdata('msg')) {
                echo $this->session->flashdata('msg');
            }
            ?>

            <table id="no_export_2" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Date & Time</th>
                        <th>Task Name</th>
                        <th>Task Description</th>
                        <th>Reporter</th>
                        <th>Feedback</th>
                        <th>Actions</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody id="datatable">
                    <?php
                        $i = 1;
                        foreach ($usecase_task->result() as $use_task) {
                    ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $use_task->date, '<br>'.substr($use_task->start_time, 0, -3) . '-' . substr($use_task->end_time, 0, -3) ?></td>
                            <td><?= $use_task->task_name ?></td>
                            <td><?= $use_task->task_description ?></td>
                            <td><?= $use_task->nama_member ?></td>
                            <td><?= $use_task->feedback ?></td>
                            <td>
                                <?php if ($use_task->status == 2) { ?>
                                    <div class="btn-group-vertical">
                                        <button type="button" class="btn btn-sm btn-primary mb-1" data-toggle="modal" data-target="#sendUseCaseTask<?= $use_task->id_usecase_task ?>" disabled><em class="fas fa-upload"></em> Send</button>
                                        <button type="button" class="btn btn-sm btn-success mb-1" data-toggle="modal" data-target="#editUseCaseTask<?= $use_task->id_usecase_task ?>" disabled><em class="fas fa-upload"></em> Edit</button>
                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteUseCaseTask<?= $use_task->id_usecase_task ?>" disabled><em class="fas fa-trash"></em> Delete</button>
                                    </div>
                                <?php } else { ?>
                                    <div class="btn-group-vertical">
                                        <button type="button" class="btn btn-sm btn-primary mb-1" data-toggle="modal" data-target="#sendUseCaseTask<?= $use_task->id_usecase_task ?>"><em class="fas fa-upload"></em> Send</button>
                                        <button type="button" class="btn btn-sm btn-success mb-1" data-toggle="modal" data-target="#editUseCaseTask<?= $use_task->id_usecase_task ?>"><em class="fas fa-upload"></em> Edit</button>
                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteUseCaseTask<?= $use_task->id_usecase_task ?>"><em class="fas fa-trash"></em> Delete</button>
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
                        <th>Feedback</th>
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
            var month_year = document.getElementById("datepicker").value;
            if(month_year){
                $.ajax({
                    url: "<?= base_url() ?>pages/AssignedUsecase/update_datatable_usecase_task",
                    method: 'POST',
                    data: {
                        'id_usecase': usecase,
                        'nik': '<?= $this->session->userdata('username') ?>',
                        'month_year': month_year
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

</body>