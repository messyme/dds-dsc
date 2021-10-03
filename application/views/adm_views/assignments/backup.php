  <!-- Body Section -->
  <body>
    <div class="container p-4" id="bg-template">
        <h1 class="mb-4">List of Use Case</h1>
        <hr>

        <?php
            if($this->session->flashdata('msg')){
                echo $this->session->flashdata('msg');
            }
        ?>

        <?php 
            if ($this->session->userdata('role') != 'user_logged_in') {
        ?> 

        <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addUsecase"><em class="fas fa-plus"></em> Add Use Case</button>

        <?php
            } 
        ?>

        <table id="three_row_order" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Use Case Name</th>
                    <th>Leader Name</th>
                    <th>Tribe Name</th>
                    <th>Use Case Started</th>
                    <th>Use Case Finished</th>
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
                    foreach($usecase->result() as $u){
                ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td class="text-uppercase"><?= $u->nama_usecase ?></td>
                    <td class="text-uppercase"><?= $u->nama_member ?></td>
                    <td class="text-uppercase"><?= $u->nama_tribe ?></td>
                    <td class="text-uppercase"><?= $u->usecase_started ?></td>
                    <td class="text-uppercase">
                        <?php 
                            if($u->usecase_finished=='0000-00-00'){
                                echo "Not finished yet";
                            }
                            else{
                                echo $u->usecase_finished;
                            }
                        ?>
                    </td>
                    <?php 
                        if ($this->session->userdata('role') != 'user_logged_in') {
                    ?> 
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editUsecase<?= $u->id_usecase ?>"><em class="fas fa-edit"></em> Edit</button>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal<?= $u->id_usecase ?>"><em class="fas fa-trash"></em> Delete</button>
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
                    <th>Use Case Name</th>
                    <th>Leader Name</th>
                    <th>Tribe Name</th>
                    <th>Use Case Started</th>
                    <th>Use Case Finished</th>
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