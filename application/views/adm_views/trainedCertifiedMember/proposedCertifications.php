  <!-- Body Section -->
  <body>
    <div class="container p-4" id="bg-template">
        <h1 class="mb-4">List of Proposed Certifications</h1>
        <hr>

        <?php
            if($this->session->flashdata('msg')){
                echo $this->session->flashdata('msg');
            }
        ?>
        
        <?php 
            if ($this->session->userdata('role') != 'user_logged_in') {
        ?> 
        <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addProposedCertification"><em class="fas fa-plus"></em> Add Proposed Certification</button>
        <?php
            } 
        ?>

        <table id="one_row_order" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Certification Name</th>
                    <th>Pathway</th>
                    <th>Certification Source</th>
                    <th>Quarter</th>
                    <th>Year</th>
                    <?php if ($this->session->userdata('type') == 'superadmin' or $this->session->userdata('type') == 'admin') { ?>
                    <th>Action</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    foreach($proposed_certification->result() as $pc){
                ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td class="text-uppercase"><?= $pc->nama_member ?></td>
                    <td class="text-uppercase"><?= $pc->nama_certification ?></td>
                    <td class="text-uppercase"><?= $pc->nama_pathway ?></td>
                    <td><a href="http://<?= $pc->certification_source ?>" target="_blank"><?= $pc->certification_source ?></a></td>
                    <td class="text-uppercase"><?= $pc->kuartal ?></td>
                    <td><?= $pc->year ?></td>
                    <?php if ($this->session->userdata('type') == 'superadmin' or $this->session->userdata('type') == 'admin') { ?>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editProposedCertification<?= $pc->id_usulan_cert  ?>"><em class="fas fa-edit"></em> Edit</button>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteProposedCertification<?= $pc->id_usulan_cert  ?>"><em class="fas fa-trash"></em> Delete</button>
                        </div>
                    </td>
                    <?php } ?>
                </tr>
                <?php
                    }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama Member</th>
                    <th>Certification Name</th>
                    <th>Pathway</th>
                    <th>Certification Source</th>
                    <th>Quarter</th>
                    <th>Year</th>
                    <?php if ($this->session->userdata('type') == 'superadmin' or $this->session->userdata('type') == 'admin') { ?>
                    <th>Action</th>
                    <?php } ?>
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