  <!-- Body Section -->
  <body>
    <div class="container p-4" id="bg-template">
        <h1 class="mb-4">List of Certified Members</h1>
        <hr>

        <?php
            if($this->session->flashdata('msg')){
                echo $this->session->flashdata('msg');
            }
        ?>
        
        <?php 
            if ($this->session->userdata('role') != 'user_logged_in') {
        ?> 
        <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addCertifiedMember"><em class="fas fa-plus"></em> Add Certified Member</button>
        <?php
            } 
        ?>

        <table id="one_row_order" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>NIK</th>
                    <th>Name</th>
                    <th>Certification Name</th>
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
                    foreach($certified_member->result() as $cm){
                ?>
                <tr>
                    <td><?= $cm->nik ?></td>
                    <td class="text-uppercase"><?= $cm->nama_member ?></td>
                    <td class="text-uppercase"><?= $cm->nama_sertifikasi ?></td>
                    <td class="text-uppercase"><?= $cm->nama_pathway ?></td>
                    <td><?= $cm->tahun_sertifikasi ?></td>
                    <?php 
                        if ($this->session->userdata('role') != 'user_logged_in') {
                    ?> 
                    <td><a href="../public/assets/uploads/sertifikasi/<?= $cm->bukti_sertifikasi ?>"><?= $cm->bukti_sertifikasi ?></a></td>
                    <td>
                        <div class="btn-group">
                        <a href="<?= base_url('pages/MemberSkills/getEditCertifiedMember/'.$cm->id_certified_member); ?>" type="button" class="btn btn-sm btn-primary"><em class="fas fa-edit"></em> Edit</a>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal<?= $cm->id_certified_member  ?>"><em class="fas fa-trash"></em> Delete</button>
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
                    <th>Certification Name</th>
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