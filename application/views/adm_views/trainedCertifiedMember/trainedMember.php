  <!-- Body Section -->
  <body>
    <div class="container p-4" id="bg-template">
        <h1 class="mb-4">List of Trained Members</h1>
        <hr>

        <?php
            if($this->session->flashdata('msg')){
                echo $this->session->flashdata('msg');
            }
        ?>

        <?php 
            if ($this->session->userdata('role') != 'user_logged_in') {
        ?> 
        <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addTrainedMember"><em class="fas fa-plus"></em> Add Trained Member</button>
        <?php
            } 
        ?>
            
        <table id="one_row_order" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>NIK</th>
                    <th>Name</th>
                    <th>Training Name</th>
                    <th>Pathway</th>
                    <th>Year</th>
                    <?php 
                        if ($this->session->userdata('role') != 'user_logged_in') {
                    ?> 
                    <th>Certificate</th>
                    <th>Actions</th>
                    <?php
                        } 
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($trained_member->result() as $tm){
                ?>
                <tr>
                    <td><?= $tm->nik ?></td>
                    <td class="text-uppercase"><?= $tm->nama_member ?></td>
                    <td class="text-uppercase"><?= $tm->nama_pelatihan ?></td>
                    <td class="text-uppercase"><?= $tm->nama_pathway ?></td>
                    <td><?= $tm->tahun_pelatihan ?></td>
                    <?php 
                        if ($this->session->userdata('role') != 'user_logged_in') {
                    ?> 
                    <td><a href="../public/assets/uploads/training/<?= $tm->bukti_pelatihan ?>"><?= $tm->bukti_pelatihan ?></a></td>
                    <td>
                        <div class="btn-group">
                        <a href="<?= base_url('pages/MemberSkills/getEditTrainedMember/'.$tm->id_trained_member); ?>" type="button" class="btn btn-sm btn-primary"><em class="fas fa-edit"></em> Edit</a>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal<?= $tm->id_trained_member ?>"><em class="fas fa-trash"></em> Delete</button>
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
                    <th>NIK</th>
                    <th>Name</th>
                    <th>Training Name</th>
                    <th>Pathway</th>
                    <th>Year</th>
                    <?php 
                        if ($this->session->userdata('role') != 'user_logged_in') {
                    ?> 
                    <th>Certificate</th>
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