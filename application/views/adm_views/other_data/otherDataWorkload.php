  <!-- Body Section -->

  <body>
    <div class="container p-4" id="bg-template">
      <h1 class="mb-4">Use Case Workload Point</h1>
      <hr>

      <?php
      if ($this->session->flashdata('msg')) {
        echo $this->session->flashdata('msg');
      }
      ?>

      <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addWorkloadPointUsecase"><em class="fas fa-plus"></em> Add Usecase Workload Point</button>

      <table id="no_row_order" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Level</th>
            <th>Point</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 1;
          foreach ($workload_point_usecase->result() as $cs) {
          ?>
            <tr>
              <td><?= $i++ ?></td>
              <td class="text-uppercase"><?= $cs->nama_workload_usecase_level ?></td>
              <td class="text-uppercase"><?= $cs->point ?></td>
              <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editWorkloadPointUsecase<?= $cs->id_workload_point_usecase ?>"><em class="fas fa-edit"></em> Edit</button>
                  <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteWorkloadPointUsecase<?= $cs->id_workload_point_usecase ?>"><em class="fas fa-trash"></em> Delete</button>
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
            <th>Level</th>
            <th>Point</th>
            <th>Actions</th>
          </tr>
        </tfoot>
      </table>

      <?php
      if ($this->session->userdata('role') != 'user_logged_in') {
      ?>

        <?php
        if ($footnote_workload_point_usecase->username_admin) {
        ?>
          <div class="mt-4" id="footnote">
            <?= $footnote_workload_point_usecase->username_admin ?> successfully <?= $footnote_workload_point_usecase->activity ?> data <?= $footnote_workload_point_usecase->page ?>-<?= $footnote_workload_point_usecase->table_name ?> with ID: <?= $footnote_workload_point_usecase->name ?> on <?= $footnote_workload_point_usecase->timestamp ?>
          </div>
        <?php
        }
        ?>

      <?php
      }
      ?>

      <br>
      <br>

      <h1 class="mb-4">Member Workload Point</h1>
      <hr>

      <?php
      if ($this->session->flashdata('msg')) {
        echo $this->session->flashdata('msg');
      }
      ?>

      <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addWorkloadPointMember"><em class="fas fa-plus"></em> Add Member Workload Point</button>

      <table id="no_row_order_2" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Level</th>
            <th>Point</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 1;
          foreach ($workload_point_member->result() as $cs) {
          ?>
            <tr>
              <td><?= $i++ ?></td>
              <td class="text-uppercase"><?= $cs->nama_posisi_type.' '.$cs->nama_posisi_level ?></td>
              <td class="text-uppercase"><?= $cs->point ?></td>
              <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editWorkloadPointMember<?= $cs->id_workload_point_member ?>"><em class="fas fa-edit"></em> Edit</button>
                  <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteWorkloadPointMember<?= $cs->id_workload_point_member ?>"><em class="fas fa-trash"></em> Delete</button>
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
            <th>Level</th>
            <th>Point</th>
            <th>Actions</th>
          </tr>
        </tfoot>
      </table>

      <?php
      if ($this->session->userdata('role') != 'user_logged_in') {
      ?>

        <?php
        if ($footnote_workload_point_member->username_admin) {
        ?>
          <div class="mt-4" id="footnote">
            <?= $footnote_workload_point_member->username_admin ?> successfully <?= $footnote_workload_point_member->activity ?> data <?= $footnote_workload_point_member->page ?>-<?= $footnote_workload_point_member->table_name ?> with ID: <?= $footnote_workload_point_member->name ?> on <?= $footnote_workload_point_member->timestamp ?>
          </div>
        <?php
        }
        ?>

      <?php
      }
      ?>
      
      <br>
      <br>

      <h1 class="mb-4">Use Case Level</h1>
      <hr>

      <?php
      if ($this->session->flashdata('msg')) {
        echo $this->session->flashdata('msg');
      }
      ?>

      <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addWorkloadUsecaseLevel"><em class="fas fa-plus"></em> Add Use Case Level</button>

      <table id="no_row_order_3" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Use Case Level</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 1;
          foreach ($workload_usecase_level->result() as $cs) {
          ?>
            <tr>
              <td><?= $i++ ?></td>
              <td class="text-uppercase"><?= $cs->nama_workload_usecase_level ?></td>
              <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editWorkloadUsecaseLevel<?= $cs->id_workload_usecase_level ?>"><em class="fas fa-edit"></em> Edit</button>
                  <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteWorkloadUsecaseLevel<?= $cs->id_workload_usecase_level ?>"><em class="fas fa-trash"></em> Delete</button>
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
            <th>Use Case Level</th>
            <th>Actions</th>
          </tr>
        </tfoot>
      </table>

      <?php
      if ($this->session->userdata('role') != 'user_logged_in') {
      ?>

        <?php
        if ($footnote_workload_usecase_level->username_admin) {
        ?>
          <div class="mt-4" id="footnote">
            <?= $footnote_workload_usecase_level->username_admin ?> successfully <?= $footnote_workload_usecase_level->activity ?> data <?= $footnote_workload_usecase_level->page ?>-<?= $footnote_workload_usecase_level->table_name ?> with name: <?= $footnote_workload_usecase_level->name ?> on <?= $footnote_workload_usecase_level->timestamp ?>
          </div>
        <?php
        }
        ?>

      <?php
      }
      ?>

      <br>
      <br>

      <h1 class="mb-4">Workload Threshold Member</h1>
        <hr>

        <?php
            if($this->session->flashdata('msg')){
                echo $this->session->flashdata('msg');
            }
        ?>

        <?php 
            if ($this->session->userdata('role') != 'user_logged_in') {
        ?> 
        <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addWorkloadThresholdMember"><em class="fas fa-plus"></em> Add Workload Threshold Member</button>
        <?php
            } 
        ?>
            
        <table id="no_row_order_4" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Level</th>
                    <th>Threshold</th>
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
                    foreach($workload_threshold_member->result() as $wt){
                ?>
                <tr>
                    <td><?= $wt->id_workload_threshold_member ?></td>
                    <td class="text-uppercase"><?= $wt->nama_posisi_type.' '.$wt->nama_posisi_level ?></td>
                    <td class="text-uppercase"><?= $wt->threshold ?></td>
                    <?php 
                        if ($this->session->userdata('role') != 'user_logged_in') {
                    ?>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editWorkloadThresholdMember<?= $wt->id_workload_threshold_member ?>"><em class="fas fa-edit"></em> Edit</button>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteWorkloadMemberModal<?= $wt->id_workload_threshold_member ?>"><em class="fas fa-trash"></em> Delete</button>
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
                    <th>No.</th>
                    <th>Level</th>
                    <th>Threshold</th>
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
            if($footnote_workload_threshold_member->username_admin){
        ?>
            <div class="mt-4" id="footnote">
                <?= $footnote_workload_threshold_member->username_admin ?> successfully <?= $footnote_workload_threshold_member->activity ?> data <?= $footnote_workload_threshold_member->page ?>-<?= $footnote_workload_threshold_member->table_name ?> with ID: <?= $footnote_workload_threshold_member->name ?> on <?= $footnote_workload_threshold_member->timestamp ?>
            </div>
        <?php
            }
        ?>

        <?php
            }
        ?>

      <br>
      <br>

        <h1 class="mb-4">Workload Threshold Usecase</h1>
        <hr>

        <?php
            if($this->session->flashdata('msg')){
                echo $this->session->flashdata('msg');
            }
        ?>

        <?php 
            if ($this->session->userdata('role') != 'user_logged_in') {
        ?> 
        <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addWorkloadThresholdUsecase"><em class="fas fa-plus"></em> Add Workload Threshold Usecase</button>
        <?php
            } 
        ?>
            
        <table id="no_row_order_5" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Level</th>
                    <th>Threshold</th>
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
                    foreach($workload_threshold_usecase->result() as $wtu){
                ?>
                <tr>
                    <td><?= $wtu->id_workload_threshold_usecase ?></td>
                    <td class="text-uppercase"><?= $wtu->nama_workload_usecase_level ?></td>
                    <td class="text-uppercase"><?= $wtu->threshold ?></td>
                    <?php 
                        if ($this->session->userdata('role') != 'user_logged_in') {
                    ?>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editWorkloadThresholdUsecase<?= $wtu->id_workload_threshold_usecase ?>"><em class="fas fa-edit"></em> Edit</button>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteWorkloadUsecaseModal<?= $wtu->id_workload_threshold_usecase ?>"><em class="fas fa-trash"></em> Delete</button>
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
                    <th>No.</th>
                    <th>Level</th>
                    <th>Threshold</th>
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
            if($footnote_workload_threshold_usecase->username_admin){
        ?>
            <div class="mt-4" id="footnote">
                <?= $footnote_workload_threshold_usecase->username_admin ?> successfully <?= $footnote_workload_threshold_usecase->activity ?> data <?= $footnote_workload_threshold_usecase->page ?>-<?= $footnote_workload_threshold_usecase->table_name ?> with ID: <?= $footnote_workload_threshold_usecase->name ?> on <?= $footnote_workload_threshold_usecase->timestamp ?>
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