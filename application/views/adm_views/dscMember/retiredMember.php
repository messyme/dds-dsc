  <!-- Body Section -->
  <body>
    <div class="container p-4" id="bg-template">
        <h1 class="mb-4">List of DSC Members Alumni</h1>
        <hr>

        <?php
            if($this->session->flashdata('msg')){
                echo $this->session->flashdata('msg');
            }
        ?>

        <table id="no_row_order" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>NIK</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Education Background</th>
                    <th>Cluster Education</th>
                    <th>Status</th>
                    <th>Position</th>
                    <th>Band</th>
                    <th>Position Type</th>
                    <th>Position Level</th>
                    <th>Contract Started</th>
                    <th>Contract Finished</th>
                    <?php 
                        if ($this->session->userdata('role') != 'user_logged_in') {
                    ?> 
                    <th>Action</th>
                    <?php
                        } 
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($member_dsc->result() as $mk){
                        if (!empty($mk->user_photo)) {
                            $user_photo = '<img src="data:image/'.$mk->user_photo_type.';base64,'.base64_encode($mk->user_photo).'" width="75" height="75">';
                        } else {
                            $foto = base_url('/public/assets/uploads/user_photo/user_temp.png');
                            $user_photo = '<img src='.$foto." ".'width="75" height="75">';
                        };
                ?>
                <tr>
                    <td><?= $mk->nik ?></td>
                    <td><?= $user_photo; ?></td>
                    <td class="text-uppercase"><?= $mk->nama_member ?></td>
                    <td class="text-uppercase"><?= $mk->ed_bg_desc ?></td>
                    <td class="text-uppercase"><?= $mk->cluster_ed_desc ?></td>
                    <td class="text-uppercase"><?= $mk->nama_status ?></td>
                    <td class="text-uppercase"><?= $mk->nama_posisi ?></td>
                    <td class="text-uppercase"><?= $mk->nama_band ?></td>
                    <td class="text-uppercase"><?= $mk->nama_posisi_type ?></td>
                    <td class="text-uppercase"><?= $mk->nama_posisi_level ?></td>
                    <td><?= $mk->kontrak_mulai ?></td>
                    <td><?= $mk->kontrak_selesai ?></td>
                    <?php 
                        if ($this->session->userdata('role') != 'user_logged_in') {
                    ?> 
                    <td>
                        <button class="btn btn-success" data-toggle="modal" data-target="#editMember<?= $mk->nik ?>">Put back</button>
                    </td>
                    <?php
                        } 
                    ?>
                </tr>
                
                <?php
                    }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>NIK</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Education Background</th>
                    <th>Cluster Education</th>
                    <th>Status</th>
                    <th>Positions</th>
                    <th>Band</th>
                    <th>Positions Type</th>
                    <th>Positions Level</th>
                    <th>Contract Started</th>
                    <th>Contract Finished</th>
                    <?php 
                        if ($this->session->userdata('role') != 'user_logged_in') {
                    ?> 
                    <th>Action</th>
                    <?php
                        } 
                    ?>
                </tr>
            </tfoot>
        </table>

        <?php 
            if ($this->session->userdata('role') != 'user_logged_in') {
        ?>

        <?php 
            if($footnote->username_admin){
        ?>
            <div class="mt-4" id="footnote">
                <?= $footnote->username_admin ?> successfully <?= $footnote->activity ?> data <?= $footnote->page ?>-<?= $footnote->table_name ?> with name: <?= $footnote->name ?> on <?= $footnote->timestamp ?>
            </div>
        <?php
            }
        ?>

        <?php
            }
        ?>
        
    </div>
  </body>
  <!-- End of Body Section -->