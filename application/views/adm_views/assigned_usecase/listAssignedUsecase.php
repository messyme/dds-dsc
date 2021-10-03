<!-- Body Section -->


<body>
    <div class="container p-4" id="bg-template">
        <h1 class="mb-4 mt-4" id="training">List of My Assigned Use Case</h1>

        <div class="bd-example">
            <div class="btn-group">
                <div class="md-12 mb-4  ">
                    <label for="changeFilter">Select Role</label>
                    <select class="form-control" style="width:auto;" id="filter" onchange="changeDatatable()">
                        <option value="allrole" selected>All Role</option>
                        <option value="leader">Leader</option>
                        <option value="member">Member</option>
                    </select>
                </div>
            </div>
        </div>
        <button type="button" class=" mb-4 btn btn-primary" data-toggle="modal" data-target="#addMemberUseCase"><em class="fas fa-plus"></em> Add Use Case</button>


        <?php
        if ($this->session->flashdata('msg')) {
            echo $this->session->flashdata('msg');
        }
        ?>

        <table id="no_export_idt" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Use Case</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="datatable">
                <?php
                    $i = 1;
                    foreach ($usecase_leader->result() as $use_leader) {
                ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <?php if ($this->session->userdata('role') == 'member_logged_in') { ?>
                        <td class="text-uppercase clickable-row" data-href="<?= base_url() ?>pages/AssignedUsecase/detailusecase/<?= $use_leader->id_usecase ?>"><?= $use_leader->nama_usecase ?></td>
                    <?php } elseif ($this->session->userdata('role') == 'superadmin_logged_in' || $this->session->userdata('role') == 'admin_logged_in'){ ?>
                        <td class="text-uppercase clickable-row" data-href="<?= base_url() ?>pages/Assignments/detailusecase/<?= $use_leader->id_usecase ?>"><?= $use_leader->nama_usecase ?></td>
                    <?php } ?>
                    <td class="text-uppercase">Leader</td>
                    <td class="text-uppercase"><?= $use_leader->deskripsi_status ?></td>
                    <td>
                        <div class="btn-group">
                            <a href="<?= base_url() ?>pages/DailyTimesheet/leader_assigned/<?= $use_leader->id_usecase ?>" type="button" class="btn btn-sm btn-primary"><em class="fas fa-info"></em> DailyTimesheet</a>
                            <a href="<?= base_url() ?>pages/AssignedUsecase/update_assigned_usecase/<?= $use_leader->id_usecase ?>" type="button" class="btn btn-sm btn-success"><em class="fas fa-check"></em> Done</a>
                        </div>
                    </td>
                </tr>
                <?php
                    }
                ?>

                <?php
                    foreach ($usecase_member->result() as $use_member) {
                        $cek = 0;
                        foreach ($usecase_leader->result() as $use_leader) {
                            if ($use_member->id_usecase == $use_leader->id_usecase) {
                                $cek = 1;
                            } 
                        }
                        if ($cek == 0) {
                ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <?php if ($this->session->userdata('role') == 'member_logged_in') { ?>
                        <td class="text-uppercase clickable-row" data-href="<?= base_url() ?>pages/AssignedUsecase/detailusecase/<?= $use_member->id_usecase ?>"><?= $use_member->nama_usecase ?></td>
                    <?php } elseif ($this->session->userdata('role') == 'superadmin_logged_in' || $this->session->userdata('role') == 'admin_logged_in'){ ?>
                        <td class="text-uppercase clickable-row" data-href="<?= base_url() ?>pages/Assignments/detailusecase/<?= $use_member->id_usecase ?>"><?= $use_member->nama_usecase ?></td>
                    <?php } ?>
                    <td class="text-uppercase">Member</td>
                    <td class="text-uppercase"><?= $use_member->deskripsi_status ?></td>
                    <td>
                        <div class="btn-group">
                            <a href="<?= base_url() ?>pages/DailyTimesheet/member_detail/<?= $use_member->id_usecase ?>" type="button" class="btn btn-sm btn-primary"><em class="fas fa-info"></em> DailyTimesheet</a>
                        </div>
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
                    <th>Use Case</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>
    </div>

    <script>
    
        function changeDatatable(){
            var filter = document.getElementById("filter").value;
            console.log(filter);
            $.ajax({
                url: "<?= base_url() ?>pages/AssignedUsecase/update_datatable_usecase",
                method: 'POST',
                data: {
                    'nik': '<?= $this->session->userdata('username') ?>',
                    'filter': filter
                },
                async: false,
                success: function(data) {
                    var obj = JSON.parse(data)
                    var datatable = document.getElementById('datatable')
                    datatable.innerHTML = obj
                },
            });
        }

    </script>
    <script>
        jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });
        });
    </script>

</body>