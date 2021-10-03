  <!-- Body Section -->
  <body>
    <div class="container p-4" id="bg-template">
        <h1 class="mb-4">List of Apprentice</h1>
        <hr>

        <?php
            if($this->session->flashdata('msg')){
                echo $this->session->flashdata('msg');
            }
        ?>

        <?php 
            if ($this->session->userdata('role') != 'user_logged_in') {
        ?> 
        <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addInternship"><em class="fas fa-plus"></em> Add Apprentice</button>
        <?php
            } 
        ?>

        <table id="five_row_order" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Education Background</th>
                    <th>Cluster Education</th>
                    <th>Supervisor</th>
                    <th>University</th>
                    <th>Year</th>
                    <th>Contract Started</th>
                    <th>Contract Finished</th>
                    <?php 
                        if ($this->session->userdata('role') != 'user_logged_in') {
                    ?> 
                    <th>Actions</th>
                    <?php
                        } 
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    foreach($member_internship->result() as $mi){
                ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td class="text-uppercase"><?= $mi->nama_mahasiswa ?></td>
                    <td class="text-uppercase"><?= $mi->ed_bg_desc ?></td>
                    <td class="text-uppercase"><?= $mi->cluster_ed_desc ?></td>
                    <td class="text-uppercase"><?= $mi->nama_member ?></td>
                    <td class="text-uppercase"><?= $mi->nama_universitas ?></td>
                    <td><?= $mi->tahun_intern ?></td>
                    <td><?= $mi->kontrak_mulai_internship ?></td>
                    <td><?= $mi->kontrak_selesai_internship ?></td>
                    <?php 
                        if ($this->session->userdata('role') != 'user_logged_in') {
                    ?> 
                    <td>
                        <div class="btn-group">
                            <a href="<?= base_url('pages/DscMember/getMemberAppEdit/'.$mi->nim); ?>" type="button" class="btn btn-sm btn-primary"><em class="fas fa-edit"></em> Edit</a>
                            <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#resignModal<?= $mi->nim ?>"><em class="fas fa-times"></em> Resign</button>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal<?= $mi->nim  ?>"><em class="fas fa-trash"></em> Delete</button>
                        </div>
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
                    <th>No</th>
                    <th>Name</th>
                    <th>Education Background</th>
                    <th>Cluster Education</th>
                    <th>Supervisor</th>
                    <th>University</th>
                    <th>Year</th>
                    <th>Contract Started</th>
                    <th>Contract Finished</th>
                    <?php 
                        if ($this->session->userdata('role') != 'user_logged_in') {
                    ?> 
                    <th>Actions</th>
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