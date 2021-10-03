  <!-- Body Section -->
    <style>
        tr{
            cursor: pointer;
        }
        
    </style>
  
  <body>
    <div class="container p-4" id="bg-template">
        <h1 class="mb-4">List of All DSC Members</h1>
        <hr>

        <?php
            if($this->session->flashdata('msg')){
                echo $this->session->flashdata('msg');
            }
        ?>

        <?php 
            if ($this->session->userdata('role') != 'user_logged_in') {
        ?>
        <text>Please make sure all required fields are filled out correctly when Add a Member.</text>
        <br>
        <br>
        <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addMember"><em class="fas fa-plus"></em> Add Member</button>
        <?php 
            } 
        ?>
        
        <table id="five_row_order" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>NIK</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Education Background</th>
                    <th>Cluster Education</th>
                    <th>Status</th>
                    <th>Positions</th> 
                    <th>Band</th> 
                    <th>Position Type</th>
                    <th>Position Level</th>
                    <th>Occupancy Rate</th>
                    <th>Occupancy Status</th>
                    <?php 
                        if ($this->session->userdata('role') != 'user_logged_in') {
                    ?>
                    <th>Contract Started</th>
                    <th>Contract Finished</th>
                    <?php 
                        } 
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($member_dsc->result() as $md){
                        if (!empty($md->user_photo)) {
                            $user_photo = '<img src="data:image/'.$md->user_photo_type.';base64,'.base64_encode($md->user_photo).'" width="75" height="75">';
                        } else {
                            $foto = base_url('/public/assets/uploads/user_photo/user_temp.png');
                            $user_photo = '<img src='.$foto." ".'width="75" height="75">';
                        };
                ?>
                <tr>
                    <td><?= $md->nik ?></td>
                    <td><?= $user_photo ?></td>
                    <td class="text-uppercase clickable-row" data-href="<?= base_url() ?>pages/DscMember/member_dsc/<?= $md->nik ?>"><?= $md->nama_member ?></td>
                    <td class="text-uppercase"><?= $md->ed_bg_desc ?></td>
                    <td class="text-uppercase"><?= $md->cluster_ed_desc ?></td>
                    <td class="text-uppercase"><?= $md->nama_status ?></td>
                    <td class="text-uppercase"><?= $md->nama_posisi ?></td>
                    <td class="text-uppercase"><?= $md->nama_band ?></td>
                    <td class="text-uppercase"><?= $md->nama_posisi_type ?></td>
                    <td class="text-uppercase"><?= $md->nama_posisi_level ?></td>
                    <td class="text-uppercase"><?= $md->occupancy_rate ?></td>
                    <td class="text-uppercase"><?= $md->occupancy_status ?></td>
                    <?php 
                        if ($this->session->userdata('role') != 'user_logged_in') {
                    ?>
                    <td><?= $md->kontrak_mulai ?></td>
                    <td><?= $md->kontrak_selesai ?></td>
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
                    <th>Occupancy Rate</th>
                    <th>Occupancy Status</th>
                    <?php 
                        if ($this->session->userdata('role') != 'user_logged_in') {
                    ?>
                    <th>Contract Started</th>
                    <th>Contract Finished</th>
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

    <script>
        jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });
        });
    </script>

  </body>
  <!-- End of Body Section -->