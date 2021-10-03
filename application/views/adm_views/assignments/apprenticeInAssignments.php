  <!-- Body Section -->
  <body>
    <?php
        if($this->session->flashdata('msg')){
            echo $this->session->flashdata('msg');
        }
    ?>

    <div class="container p-4" id="bg-template">
        <h1 class="mb-4">Number of Use Cases per Apprentice</h1>
        <hr>

        <table id="no_export" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Supervisor</th>
                    <th>University</th>
                    <th>Year</th>
                    <th>Total Use Case</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    foreach($number_of_usecases_app->result() as $nou_app){
                ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td class="text-uppercase"><?= $nou_app->nama_mahasiswa ?></td>
                    <td class="text-uppercase"><?= $nou_app->nama_member ?></td>
                    <td class="text-uppercase"><?= $nou_app->nama_universitas ?></td>
                    <td class="text-uppercase"><?= $nou_app->tahun_intern ?></td>
                    <td><?= $nou_app->jml_usecase ?></td>
                </tr>
                
                <?php
                    }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Supervisor</th>
                    <th>University</th>
                    <th>Year</th>
                    <th>Total Use Case</th>
                </tr>
            </tfoot>
        </table>
        <hr>
    </div>

    <div class="container p-4" id="bg-template">

        <?php 
            if ($this->session->userdata('role') != 'user_logged_in') {
        ?> 

        <h1 class="mb-4">Apprentice not in Use Case</h1>
        <hr>

        <table id="four_row_order_lite" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Supervisor</th>
                    <th>University</th>
                    <th>Year</th>
                    <th>Contract Started</th>
                    <th>Contract Finished</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    foreach($appNotInUsecase->result() as $miu){
                ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td class="text-uppercase"><?= $miu->nama_mahasiswa ?></td>
                    <td class="text-uppercase"><?= $miu->nama_member ?></td>
                    <td class="text-uppercase"><?= $miu->nama_universitas ?></td>
                    <td><?= $miu->tahun_intern ?></td>
                    <td><?= $miu->kontrak_mulai_internship ?></td>
                    <td><?= $miu->kontrak_selesai_internship ?></td>
                </tr>
                
                <?php
                    }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Supervisor</th>
                    <th>University</th>
                    <th>Year</th>
                    <th>Contract Started</th>
                    <th>Contract Finished</th>
                </tr>
            </tfoot>
        </table>
        <hr>
        <?php
            } 
        ?>

        <h1 class="mb-4">Apprentice in Assignments</h1>
        <hr>

        <?php 
            if ($this->session->userdata('role') != 'user_logged_in') {
        ?>

        <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addMemberAssignment"><em class="fas fa-plus"></em> Add Apprentice in Assignments</button>

        <?php
            }
        ?>

        <table id="two_row_order" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Groups</th>
                    <th>Tribes</th>
                    <th>Use Cases</th>
                    <th>Squads</th>
                    <th>Name</th>
                    <th>Status</th>
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
                    foreach($member_usecase->result() as $mu){
                ?>
                <tr>
                    <td class="text-uppercase"><?= $mu->nama_groups ?></td>
                    <td class="text-uppercase"><?= $mu->nama_tribe ?></td>
                    <td class="text-uppercase"><?= $mu->nama_usecase ?></td>
                    <td class="text-uppercase"><?= $mu->nama_squad ?></td>
                    <td class="text-uppercase"><?= $mu->nama_mahasiswa ?></td>
                    <td class="text-uppercase"><?= $mu->status_member ?></td>
                    <?php 
                        if ($this->session->userdata('role') != 'user_logged_in') {
                    ?> 
                    <td>
                        <div class="btn-group">
                            <a href="<?= base_url('pages/Assignments/member_in_assignmentAppEdit/'.$mu->id); ?>" type="button" class="btn btn-sm btn-primary"><em class="fas fa-edit"></em> Edit</a>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal<?= $mu->id?>"><em class="fas fa-trash"></em> Delete</button>
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
                    <th>Groups</th>
                    <th>Tribes</th>
                    <th>Use Cases</th>
                    <th>Squads</th>
                    <th>Name</th>
                    <th>Status</th>
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