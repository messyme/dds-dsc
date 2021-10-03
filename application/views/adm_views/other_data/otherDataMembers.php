  <!-- Body Section -->
  <body>
    <div class="container p-4" id="bg-template">
        <h1 class="mb-4">List of Band</h1>
        <hr>

        <?php
            if($this->session->flashdata('msg')){
                echo $this->session->flashdata('msg');
            }
        ?>

        <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addBand"><em class="fas fa-plus"></em> Add Band</button>
        
        <table id="no_row_order" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Band Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    foreach($band->result() as $bd){
                ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td class="text-uppercase"><?= $bd->nama_band ?></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editBand<?= $bd->id_band ?>"><em class="fas fa-edit"></em> Edit</button>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteBand<?= $bd->id_band ?>"><em class="fas fa-trash"></em> Delete</button>
                        </div>
                    </td>
                </tr>
                
                <?php
                    }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Band Name</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>

        <?php 
            if ($this->session->userdata('role') != 'user_logged_in') {
        ?>

        <?php 
            if($footnote_band->username_admin){
        ?>
            <div class="mt-4" id="footnote">
                <?= $footnote_band->username_admin ?> successfully <?= $footnote_band->activity ?> data <?= $footnote_band->page ?>-<?= $footnote_band->table_name ?> with name: <?= $footnote_band->name ?> on <?= $footnote_band->timestamp ?>
            </div>
        <?php
            }
        ?>

        <?php
            }
        ?>
        
    </div>

    <div class="container p-4" id="bg-template">
        <h1 class="mb-4">List of Positions</h1>
        <hr>

        <?php
            if($this->session->flashdata('msg')){
                echo $this->session->flashdata('msg');
            }
        ?>

        <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addPosisi"><em class="fas fa-plus"></em> Add Position</button>
        
        <table id="no_row_order_2" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Positions Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    foreach($posisi->result() as $ps){
                ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td class="text-uppercase"><?= $ps->nama_posisi ?></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editPosisi<?= $ps->id_posisi ?>"><em class="fas fa-edit"></em> Edit</button>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deletePosisi<?= $ps->id_posisi ?>"><em class="fas fa-trash"></em> Delete</button>
                        </div>
                    </td>
                </tr>
                
                <?php
                    }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Positions Name</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>

        <?php 
            if ($this->session->userdata('role') != 'user_logged_in') {
        ?>

        <?php 
            if($footnote_posisi->username_admin){
        ?>
            <div class="mt-4" id="footnote">
                <?= $footnote_posisi->username_admin ?> successfully <?= $footnote_posisi->activity ?> data <?= $footnote_posisi->page ?>-<?= $footnote_posisi->table_name ?> with name: <?= $footnote_posisi->name ?> on <?= $footnote_posisi->timestamp ?>
            </div>
        <?php
            }
        ?>

        <?php
            }
        ?>
        
    </div>

    <div class="container p-4" id="bg-template">
        <h1 class="mb-4">List of Position Type</h1>
        <hr>

        <?php
            if($this->session->flashdata('msg')){
                echo $this->session->flashdata('msg');
            }
        ?>

        <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addPosisiType"><em class="fas fa-plus"></em> Add Position Type</button>
        
        <table id="no_row_order" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Position Type Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    foreach($posisi_type->result() as $pt){
                ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td class="text-uppercase"><?= $pt->nama_posisi_type ?></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editPosisiType<?= $pt->id_posisi_type ?>"><em class="fas fa-edit"></em> Edit</button>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deletePosisiType<?= $pt->id_posisi_type ?>"><em class="fas fa-trash"></em> Delete</button>
                        </div>
                    </td>
                </tr>
                
                <?php
                    }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Position Type Name</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>

        <?php 
            if ($this->session->userdata('role') != 'user_logged_in') {
        ?>

        <?php 
            if($footnote_posisi_type->username_admin){
        ?>
            <div class="mt-4" id="footnote">
                <?= $footnote_posisi_type->username_admin ?> successfully <?= $footnote_posisi_type->activity ?> data <?= $footnote_posisi_type->page ?>-<?= $footnote_posisi_type->table_name ?> with name: <?= $footnote_posisi_type->name ?> on <?= $footnote_posisi_type->timestamp ?>
            </div>
        <?php
            }
        ?>

        <?php
            }
        ?>
        
    </div>

    <div class="container p-4" id="bg-template">
        <h1 class="mb-4">List of Position Level</h1>
        <hr>

        <?php
            if($this->session->flashdata('msg')){
                echo $this->session->flashdata('msg');
            }
        ?>

        <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addPosisiLevel"><em class="fas fa-plus"></em> Add Position Level</button>
        
        <table id="no_row_order" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Position Level Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    foreach($posisi_level->result() as $pl){
                ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td class="text-uppercase"><?= $pl->nama_posisi_level ?></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editPosisiLevel<?= $pl->id_posisi_level ?>"><em class="fas fa-edit"></em> Edit</button>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deletePosisiLevel<?= $pl->id_posisi_level ?>"><em class="fas fa-trash"></em> Delete</button>
                        </div>
                    </td>
                </tr>
                
                <?php
                    }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Position Level Name</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>

        <?php 
            if ($this->session->userdata('role') != 'user_logged_in') {
        ?>

        <?php 
            if($footnote_posisi_level->username_admin){
        ?>
            <div class="mt-4" id="footnote">
                <?= $footnote_posisi_level->username_admin ?> successfully <?= $footnote_posisi_level->activity ?> data <?= $footnote_posisi_level->page ?>-<?= $footnote_posisi_level->table_name ?> with name: <?= $footnote_posisi_level->name ?> on <?= $footnote_posisi_level->timestamp ?>
            </div>
        <?php
            }
        ?>

        <?php
            }
        ?>
        
    </div>

    <div class="container p-4" id="bg-template">
        <h1 class="mb-4">List of Status</h1>
        <hr>

        <?php
            if($this->session->flashdata('msg')){
                echo $this->session->flashdata('msg');
            }
        ?>

        <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addStatus"><em class="fas fa-plus"></em> Add Status</button>
        
        <table id="no_row_order_3" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Status Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    foreach($status->result() as $st){
                ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td class="text-uppercase"><?= $st->nama_status ?></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editStatus<?= $st->id_status ?>"><em class="fas fa-edit"></em> Edit</button>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteStatus<?= $st->id_status ?>"><em class="fas fa-trash"></em> Delete</button>
                        </div>
                    </td>
                </tr>
                
                <?php
                    }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Status Name</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>

        <?php 
            if ($this->session->userdata('role') != 'user_logged_in') {
        ?>
        
        <?php 
            if($footnote_status->username_admin){
        ?>
            <div class="mt-4" id="footnote">
                <?= $footnote_status->username_admin ?> successfully <?= $footnote_status->activity ?> data <?= $footnote_status->page ?>-<?= $footnote_status->table_name ?> with name: <?= $footnote_status->name ?> on <?= $footnote_status->timestamp ?>
            </div>
        <?php
            }
        ?>

        <?php
            }
        ?>

    </div>

    <div class="container p-4" id="bg-template">
        <h1 class="mb-4">List of Univeristy (for apprentice)</h1>
        <hr>

        <?php
            if($this->session->flashdata('msg')){
                echo $this->session->flashdata('msg');
            }
        ?>

        <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addUniv"><em class="fas fa-plus"></em> Add Univeristy</button>
        
        <table id="no_row_order_4" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>University Names</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    foreach($universitas->result() as $univ){
                ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td class="text-uppercase"><?= $univ->nama_universitas ?></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editUniv<?= $univ->kode_universitas ?>"><em class="fas fa-edit"></em> Edit</button>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteUniv<?= $univ->kode_universitas ?>"><em class="fas fa-trash"></em> Delete</button>
                        </div>
                    </td>
                </tr>
                
                <?php
                    }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>University Names</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>

        <?php 
            if ($this->session->userdata('role') != 'user_logged_in') {
        ?>
        
        <?php 
            if($footnote_universitas->username_admin){
        ?>
            <div class="mt-4" id="footnote">
                <?= $footnote_universitas->username_admin ?> successfully <?= $footnote_universitas->activity ?> data <?= $footnote_universitas->page ?>-<?= $footnote_universitas->table_name ?> with name: <?= $footnote_universitas->name ?> on <?= $footnote_universitas->timestamp ?>
            </div>
        <?php
            }
        ?>

        <?php
            }
        ?>

    </div>

    <div class="container p-4" id="bg-template">
        <h1 class="mb-4">List of Cluster Education</h1>
        <hr>

        <?php
            if($this->session->flashdata('msg')){
                echo $this->session->flashdata('msg');
            }
        ?>

        <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addClustered"><em class="fas fa-plus"></em> Add Cluster Education</button>
        
        <table id="no_row_order_5" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    foreach($cluster_ed->result() as $clustered){
                ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td class="text-uppercase"><?= $clustered->cluster_ed_desc ?></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editClustered<?= $clustered->id_cluster_ed ?>"><em class="fas fa-edit"></em> Edit</button>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteClustered<?= $clustered->id_cluster_ed ?>"><em class="fas fa-trash"></em> Delete</button>
                        </div>
                    </td>
                </tr>
                
                <?php
                    }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>

        <?php 
            if ($this->session->userdata('role') != 'user_logged_in') {
        ?>

        <?php 
            if($footnote_cluster_ed->username_admin){
        ?>
            <div class="mt-4" id="footnote">
                <?= $footnote_cluster_ed->username_admin ?> successfully <?= $footnote_cluster_ed->activity ?> data <?= $footnote_cluster_ed->page ?>-<?= $footnote_cluster_ed->table_name ?> with name: <?= $footnote_cluster_ed->name ?> on <?= $footnote_cluster_ed->timestamp ?>
            </div>
        <?php
            }
        ?>

        <?php
            }
        ?>
    </div>
    
    <div class="container p-4" id="bg-template">
        <h1 class="mb-4">List of Education Background</h1>
        <hr>

        <?php
            if($this->session->flashdata('msg')){
                echo $this->session->flashdata('msg');
            }
        ?>

        <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addEdbg"><em class="fas fa-plus"></em> Add Education Background</button>
        
        <table id="two_row_order" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Cluster</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    foreach($ed_bg->result() as $edbg){
                ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td class="text-uppercase"><?= $edbg->ed_bg_desc ?></td>
                    <td class="text-uppercase"><?= $edbg->cluster_ed_desc ?></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editEdbg<?= $edbg->id_ed_bg ?>"><em class="fas fa-edit"></em> Edit</button>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteEdbg<?= $edbg->id_ed_bg ?>"><em class="fas fa-trash"></em> Delete</button>
                        </div>
                    </td>
                </tr>
                
                <?php
                    }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Cluster</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>

        <?php 
            if ($this->session->userdata('role') != 'user_logged_in') {
        ?>

        <?php 
            if($footnote_ed_bg->username_admin){
        ?>
            <div class="mt-4" id="footnote">
                <?= $footnote_ed_bg->username_admin ?> successfully <?= $footnote_ed_bg->activity ?> data <?= $footnote_ed_bg->page ?>-<?= $footnote_ed_bg->table_name ?> with name: <?= $footnote_ed_bg->name ?> on <?= $footnote_ed_bg->timestamp ?>
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