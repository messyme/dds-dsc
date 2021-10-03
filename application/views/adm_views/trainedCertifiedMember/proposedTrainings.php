  <!-- Body Section -->
  <body>
    <div class="container p-4" id="bg-template">
        <h1 class="mb-4">List of Proposed Trainings</h1>
        <hr>

        <?php
            if($this->session->flashdata('msg')){
                echo $this->session->flashdata('msg');
            }
        ?>
        
        <?php 
            if ($this->session->userdata('role') != 'user_logged_in') {
        ?> 
        <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addProposedTraining"><em class="fas fa-plus"></em> Add Proposed Training</button>
        <?php
            } 
        ?>

        <table id="one_row_order" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Training Name</th>
                    <th>Pathway</th>
                    <th>Training Source</th>
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
                    foreach($proposed_training->result() as $pt){
                ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td class="text-uppercase"><?= $pt->nama_member ?></td>
                    <td class="text-uppercase"><?= $pt->nama_training ?></td>
                    <td class="text-uppercase"><?= $pt->nama_pathway ?></td>
                    <td><a href="http://<?= $pt->training_source ?>" target="_blank"><?= $pt->training_source ?></a></td>
                    <td class="text-uppercase"><?= $pt->kuartal ?></td>
                    <td><?= $pt->year ?></td>
                    <?php if ($this->session->userdata('type') == 'superadmin' or $this->session->userdata('type') == 'admin') { ?>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editProposedTraining<?= $pt->id_usulan  ?>"><em class="fas fa-edit"></em> Edit</button>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteProposedTraining<?= $pt->id_usulan  ?>"><em class="fas fa-trash"></em> Delete</button>
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
                    <th>Training Name</th>
                    <th>Pathway</th>
                    <th>Training Source</th>
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