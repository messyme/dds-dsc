<body>
    <div class="container p-4" id="bg-template">
        <h1 class="mb-4 mt-4" id="training">Daily Timesheet - Leader</h1>

        <div class="md-6 mb-4  ">
            <label for="changeFilter">Select Use Case</label>
            <select class="form-control" style="width:auto;" id="usecase">
                <option value="indibox">DASHBOARD ANALYTIC CORPU</option>
                <option value="option">ANOTHER OPTION</option>
                <option value="option">ANOTHER OPTION</option>
            </select>
        </div>
        <hr>

        <h3 class="mb-4 mt-4" id="training">Dashboard Analytic CORPU (Autogenerate use case name)</h3>
        <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addMember"><em class="fas fa-plus"></em> Add Member</button>

        <?php
        if ($this->session->flashdata('msg')) {
            echo $this->session->flashdata('msg');
        }
        ?>

        <table id="no_export_2" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
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
            <tbody>

                <tr>
                    <td class="text-uppercase"></td>
                    <td class="text-uppercase"></td>
                    <td class="text-uppercase"></td>
                    <td class="text-uppercase">approved/waiting for aprroval/rejected</td>
                    <td class="text-uppercase"></td>
                    <td>
                        <div class="btn-group">
                            <a href="<?= base_url() ?>pages/DailyTimesheet/detail_member" type="button" class="btn btn-sm btn-primary"><em class="fas fa-info"></em> Detail</a>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target=""><em class="fas fa-trash"></em> Delete</button>
                        </div>
                    </td>
                </tr>


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
    </div>

    <div class="container p-4" id="bg-template">
        <h1 class="mb-4 mt-4" id="training">Daily Timesheet - Member</h1>
        <p> Please fill Daily Timesheet (DT) according your Use Case and submit approval to your Supervisor. DT Status should be approved by Supervisor.</p>

        <div class="bd-example">
            <div class="btn-group">
                <div class="md-6 mb-4  ">
                    <label for="changeFilter">Select Use Case</label>
                    <select class="form-control" style="width:auto;" id="usecase">
                        <option value="indibox">INDIBOX</option>
                        <option value="option">ANOTHER OPTION</option>
                        <option value="option">ANOTHER OPTION</option>
                    </select>
                </div>
            </div>
            <div class="btn-group">
                <div class="md-6 mb-4  ">
                    <label for="changeFilter">Month</label>
                    <select class="form-control" style="width:auto;" id="month">
                        <option value="option">May</option>
                        <option value="option">June</option>
                    </select>
                </div>
            </div>
        </div>
        <hr>

        <h3 class="mb-4 mt-4" id="training">Indibox (Autogenerate use case name)</h3>
        <div class="custom-control custom-checkbox md-6 mb-4">
            <input type="checkbox" class="check custom-control-input" id="approveAll">
            <label class="custom-control-label" for="approveAll">Select All</label>
        </div>
        <div class="bd-example">
            <div class="btn-group">
                <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addUseCaseTask"><em class="fas fa-plus"></em> Add Task</button>
            </div>
            <div class="btn-group">
                <button type="button" class="mb-4 btn btn-success"><em class="fas fa-upload"></em> Send All</button>
            </div>
        </div>
        <?php
        if ($this->session->flashdata('msg')) {
            echo $this->session->flashdata('msg');
        }
        ?>

        <table id="no_export_2" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
            <thead>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Date/Time</th>
                        <th>Task Name</th>
                        <th>Task Description</th>
                        <th>Reporter</th>
                        <th>Assignee</th>
                        <th>Feedback</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            <tbody>

                <tr>
                    <td></td>
                    <td class="text-uppercase"></td>
                    <td class="text-uppercase"></td>
                    <td class="text-uppercase"></td>
                    <td class="text-uppercase"></td>
                    <td class="text-uppercase"></td>
                    <td class="text-uppercase"></td>
                    <td>
                        <div class="btn-group">
                            <a href="" type="button" class="btn btn-sm btn-primary"><i class="fas fa-upload"></i> Send</a>
                            <a href="" type="button" class="btn btn-sm btn-success"><em class="fas fa-edit"></em> Edit</a>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteTraining"><em class="fas fa-trash"></em> Delete</button>
                        </div>
                    </td>
                </tr>


            </tbody>
            <tfoot>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Date/Time</th>
                        <th>Task Name</th>
                        <th>Task Description</th>
                        <th>Reporter</th>
                        <th>Assignee</th>
                        <th>Feedback</th>
                        <th>Actions</th>
                    </tr>
            </tfoot>
        </table>
    </div>
</body>