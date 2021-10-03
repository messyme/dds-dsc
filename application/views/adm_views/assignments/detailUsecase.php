  <!-- Body Section -->
  <style>
      p {
          margin: 0 !important;
          padding: 0 !important;
      }

      .field-name {
          font-size: 20px;
          font-weight: 550;
      }

      .field-value {
          color: gray;
          font-weight: 550;
      }
  </style>

  <body>
      <div class="container p-4" id="bg-template">
          <h1 class="text-uppercase mb-4"><?= $usecase->nama_usecase ?></h1>
          <hr class="mb-4">

          <?php
            if ($this->session->flashdata('msg')) {
                echo $this->session->flashdata('msg');
            }
            ?>

          <div class="row" id="row1">
              <div id="usecase_leader" class="mb-4 col-md-4">
                  <p class="field-name">Use Case Leader</p>
                  <p class="field-value text-uppercase">
                      <?php
                        if (!$usecase_leader->nama_member) {
                            echo "-";
                        } else {
                            echo $usecase_leader->nama_member;
                        }
                        ?>
                  </p>
              </div>
              <div id="usecase_type" class="mb-4 col-md-4">
                  <p class="field-name">Use Case Type</p>
                  <p class="field-value text-uppercase">
                      <?php
                        if (!$usecase->jenis_analisis) {
                            echo "-";
                        } else {
                            echo $usecase->jenis_analisis;
                        }
                        ?>
                  </p>
              </div>
          </div>

          <div class="row" id="row2">
              <div id="groups" class="mb-4 col-md-4">
                  <p class="field-name">Groups</p>
                  <p class="field-value text-uppercase"><?= $usecase->nama_groups ?></p>
              </div>

              <div id="tribe" class="mb-4 col-md-4">
                  <p class="field-name">Tribe</p>
                  <p class="field-value text-uppercase"><?= $usecase->nama_tribe ?></p>
              </div>
              <div id="squad" class="mb-4 col-md-4">
                  <p class="field-name">Squad</p>
                  <p class="field-value text-uppercase"><?= $usecase->nama_squad ?></p>
              </div>
          </div>

          <div class="row" id="row3">
              <div id="started" class="mb-4 col-md-4">
                  <p class="field-name">Date Started</p>
                  <p class="field-value text-uppercase">
                      <?php
                        if (!$usecase->usecase_started) {
                            echo "Not defined yet";
                        } else {
                            echo $usecase->usecase_started;
                        }
                        ?>
                  </p>
              </div>

              <div id="finished" class="mb-4 col-md-4">
                  <p class="field-name">Date Finished</p>
                  <p class="field-value text-uppercase">
                      <?php
                        if (!$usecase->usecase_finished) {
                            echo "Not finished yet";
                        } else {
                            echo $usecase->usecase_finished;
                        }
                        ?>
                  </p>
              </div>
              <div id="status_usecase" class="mb-4 col-md-4">
                  <p class="field-name">Status</p>
                  <p class="field-value text-uppercase"><?= $usecase->deskripsi_status ?></p>
              </div>
          </div>

          <div class="row" id="row4">
              <div id="usecase+level" class="mb-4 col-md-4">
                  <p class="field-name">Level Usecase</p>
                  <p class="field-value text-uppercase">
                      <?php
                        if (!$usecase->nama_workload_usecase_level) {
                            echo "Not defined yet";
                        } else {
                            echo $usecase->nama_workload_usecase_level;
                        }
                        ?>
                  </p>
              </div>
  
              <div id="occupancy_rate" class="mb-4 col-md-4">
                  <p class="field-name">Occupancy Rate</p>
                  <p class="field-value text-uppercase">
                      <?php
                        if (!$usecase->occupancy_rate) {
                            echo "Not defined yet";
                        } else {
                            echo $usecase->occupancy_rate;
                        }
                        ?>
                  </p>
              </div>
              <div id="occupancy_status" class="mb-4 col-md-4">
                  <p class="field-name">Occupancy Status</p>
                  <p class="field-value text-uppercase">
                      <?php
                        if (!$usecase->occupancy_status) {
                            echo "Not defined yet";
                        } else {
                            echo $usecase->occupancy_status;
                        }
                        ?>
                  </p>
              </div>
          </div>


          <?php if ($this->session->userdata('role') != 'user_logged_in') { ?>
              <button type="button" class="btn btn-primary btn-sm mb-4" data-toggle="modal" data-target="#editUsecase<?= $usecase->id_usecase ?>"><em class="fas fa-edit"></em> Edit</button>
              <button type="button" class="btn btn-sm btn-danger mb-4" data-toggle="modal" data-target="#deleteModal<?= $usecase->id_usecase  ?>"><em class="fas fa-trash"></em> Delete</button>
              <a class="btn btn-sm btn-warning mb-4 text-white" href="<?= base_url() ?>pages/Assignments/usecase_list" role="button"><i class="fas fa-window-close"></i> Back</a>
          <?php } ?>

          <h1 class="mb-4 mt-4">DSC Member</h1>
          <hr>

          <table id="no_export" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>NIK</th>
                      <th>Nama Member</th>
                      <th>Nama Squad</th>
                      <th>Nama Tribe</th>
                      <th>Nama Group</th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                    $i = 1;
                    foreach ($member_usecase->result() as $m) {
                    ?>
                      <tr>
                          <td><?= $i++ ?></td>
                          <td class="text-uppercase"><?= $m->nik ?></td>
                          <td class="text-uppercase"><?= $m->nama_member ?></td>
                          <td class="text-uppercase"><?= $m->nama_squad ?></td>
                          <td class="text-uppercase"><?= $m->nama_tribe ?></td>
                          <td class="text-uppercase"><?= $m->nama_groups ?></td>
                      </tr>

                  <?php
                    }
                    ?>
              </tbody>
              <tfoot>
                  <tr>
                      <th>No</th>
                      <th>NIK</th>
                      <th>Nama Member</th>
                      <th>Nama Squad</th>
                      <th>Nama Tribe</th>
                      <th>Nama Group</th>
                  </tr>
              </tfoot>
          </table>


          <h1 class="mb-4 mt-4">Apprentice</h1>
          <hr>

          <table id="no_export_2" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>NIM</th>
                      <th>Nama Member</th>
                      <th>Nama Squad</th>
                      <th>Nama Tribe</th>
                      <th>Nama Group</th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                    $i = 1;
                    foreach ($member_internship_usecase->result() as $m) {
                    ?>
                      <tr>
                          <td><?= $i++ ?></td>
                          <td class="text-uppercase"><?= $m->nim ?></td>
                          <td class="text-uppercase"><?= $m->nama_mahasiswa ?></td>
                          <td class="text-uppercase"><?= $m->nama_squad ?></td>
                          <td class="text-uppercase"><?= $m->nama_tribe ?></td>
                          <td class="text-uppercase"><?= $m->nama_groups ?></td>
                      </tr>

                  <?php
                    }
                    ?>
              </tbody>
              <tfoot>
                  <tr>
                      <th>No</th>
                      <th>NIM</th>
                      <th>Nama Member</th>
                      <th>Nama Squad</th>
                      <th>Nama Tribe</th>
                      <th>Nama Group</th>
                  </tr>
              </tfoot>
          </table>


          <h1 class="mb-4 mt-4">Use Case Tasks</h1>
          <hr>

          <table id="no_export_3" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Date & Time</th>
                      <th>Task Name</th>
                      <th>Task Description</th>
                      <th>Reporter</th>
                      <th>Assignee</th>
                      <th>Feedback</th>
                      <th>Status</th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                    $i = 1;
                    foreach ($usecase_task->result() as $u) {
                    ?>
                      <tr>
                          <td><?= $i++ ?></td>
                          <?php if ($u->start_date == '00:00:00' or $u->end_time == '00:00:00') { ?>
                              <td><?= $u->date ?></td>
                          <?php } else { ?>
                              <td><?= $u->date, '<br>' . substr($u->start_time, 0, -3) . '-' . substr($u->end_time, 0, -3) ?></td>
                          <?php } ?>
                          <td class="text-uppercase"><?= $u->task_name ?></td>
                          <td class="text-uppercase"><?= $u->task_description ?></td>
                          <td class="text-uppercase"><?= $u->reporter ?></td>
                          <td class="text-uppercase"><?= $u->assignee ?></td>
                          <td class="text-uppercase"><?= $u->feedback ?></td>
                          <td class="text-uppercase"><?= $u->nama_status ?></td>
                      </tr>

                  <?php
                    }
                    ?>
              </tbody>
              <tfoot>
                  <tr>
                      <th>No</th>
                      <th>Date & Time</th>
                      <th>Task Name</th>
                      <th>Task Description</th>
                      <th>Reporter</th>
                      <th>Assignee</th>
                      <th>Feedback</th>
                      <th>Status</th>
                  </tr>
              </tfoot>
          </table>

          <h1 class="mb-4 mt-4">Data Source</h1>
          <hr>

          <?php if ($this->session->userdata('role') != 'user_logged_in') { ?>
              <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addDataSource"><em class="fas fa-plus"></em> Add Data Source</button>
          <?php } ?>

          <?php
            if ($this->session->flashdata('msgDataSource')) {
                echo $this->session->flashdata('msgDataSource');
            }
            ?>

          <table id="no_export_4" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Data Source Name</th>
                      <th>Data Source Detail</th>
                      <?php if ($this->session->userdata('role') != 'user_logged_in') { ?>
                          <th>Action</th>
                      <?php } ?>
                  </tr>
              </thead>
              <tbody>
                  <?php
                    $i = 1;
                    foreach ($data_source->result() as $ds) {
                    ?>
                      <tr>
                          <td><?= $i++ ?></td>
                          <td class="text-uppercase"><?= $ds->data_source_name ?></td>
                          <td class="text-uppercase"><?= $ds->data_source_detail ?></td>
                          <?php if ($this->session->userdata('role') != 'user_logged_in') { ?>
                              <td>
                                  <div class="btn-group">
                                      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editDataSource<?= $ds->id_data_source ?>"><em class="fas fa-edit"></em> Edit</button>
                                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteDataSource<?= $ds->id_data_source  ?>"><em class="fas fa-trash"></em> Delete</button>
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
                      <th>Data Source Name</th>
                      <th>Data Source Detail</th>
                      <?php if ($this->session->userdata('role') != 'user_logged_in') { ?>
                          <th>Action</th>
                      <?php } ?>
                  </tr>
              </tfoot>
          </table>

          <?php
            if ($this->session->userdata('role') != 'user_logged_in') {
            ?>

              <?php
                if ($footnoteDataSource->username_admin) {
                ?>
                  <div class="mt-4" id="footnote">
                      <?= $footnoteDataSource->username_admin ?> successfully <?= $footnoteDataSource->activity ?> data <?= $footnoteDataSource->page ?>-<?= $footnoteDataSource->table_name ?> with name: <?= $footnoteDataSource->name ?> on <?= $footnoteDataSource->timestamp ?>
                  </div>
              <?php
                }
                ?>

          <?php
            }
            ?>


          <h1 class="mb-4 mt-4">Output</h1>
          <hr>

          <?php if ($this->session->userdata('role') != 'user_logged_in') { ?>
              <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addOutput"><em class="fas fa-plus"></em> Add Output</button>
          <?php } ?>

          <?php
            if ($this->session->flashdata('msgOutput')) {
                echo $this->session->flashdata('msgOutput');
            }
            ?>

          <table id="no_export_5" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Output Name</th>
                      <th>Output Description</th>
                      <?php if ($this->session->userdata('role') != 'user_logged_in') { ?>
                          <th>Action</th>
                      <?php } ?>
                  </tr>
              </thead>
              <tbody>
                  <?php
                    $i = 1;
                    foreach ($output->result() as $o) {
                    ?>
                      <tr>
                          <td><?= $i++ ?></td>
                          <td class="text-uppercase"><?= $o->output_name ?></td>
                          <td class="text-uppercase"><?= $o->output_description ?></td>
                          <?php if ($this->session->userdata('role') != 'user_logged_in') { ?>
                              <td>
                                  <div class="btn-group">
                                      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editOutput<?= $o->id_output_usecase ?>"><em class="fas fa-edit"></em> Edit</button>
                                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteOutput<?= $o->id_output_usecase  ?>"><em class="fas fa-trash"></em> Delete</button>
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
                      <th>Output Name</th>
                      <th>Output Description</th>
                      <?php if ($this->session->userdata('role') != 'user_logged_in') { ?>
                          <th>Action</th>
                      <?php } ?>
                  </tr>
              </tfoot>
          </table>

          <?php
            if ($this->session->userdata('role') != 'user_logged_in') {
            ?>

              <?php
                if ($footnoteOutput->username_admin) {
                ?>
                  <div class="mt-4" id="footnote">
                      <?= $footnoteOutput->username_admin ?> successfully <?= $footnoteOutput->activity ?> data <?= $footnoteOutput->page ?>-<?= $footnoteOutput->table_name ?> with name: <?= $footnoteOutput->name ?> on <?= $footnoteOutput->timestamp ?>
                  </div>
              <?php
                }
                ?>

          <?php
            }
            ?>

          <h1 class="mb-4 mt-4">OKR Product</h1>
          <hr>

          <?php if ($this->session->userdata('role') != 'user_logged_in') { ?>
              <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addOKR"><em class="fas fa-plus"></em> Add OKR Product</button>
          <?php } ?>
          
          <?php if ($avg_okr_product > 0) { ?>
            <button type="button" class="mb-4 btn btn-success" disabled><?= number_format($avg_okr_product) ?>%</button>
          <?php }else{ ?>
            <button type="button" class="mb-4 btn btn-success" disabled>0%</button>
          <?php } ?>

          <?php
            if ($this->session->flashdata('msgOKR')) {
                echo $this->session->flashdata('msgOKR');
            }
            ?>

          <table id="no_export_7" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Detail Progress</th>
                      <th>Progress</th>
                      <th>Objective</th>
                      <th>Key Result</th>
                      <th>Definition of Done</th>
                      <th>Quarter</th>
                      <th>Year</th>
                      <th>Assignee</th>
                      <th>Complexity</th>
                      <th>Type of Output</th>
                      <th>Unit</th>
                      <th>Target</th>
                      <th>Start</th>
                      <th>End</th>
                      <th>Type of Formula</th>
                      <th>Codification</th>
                      <th>Category OKR</th>
                      <?php if ($this->session->userdata('role') != 'user_logged_in') { ?>
                          <th>Action</th>
                      <?php } ?>
                  </tr>
              </thead>
              <tbody>
                  <?php
                    $i = 1;
                    foreach ($okr_product->result() as $op) {
                    ?>
                      <tr>
                          <td><?= $i++ ?></td>
                          <td class="text-uppercase"><?= $op->detail_progress ?></td>
                          <td class="text-uppercase"><?= $op->progress ?>%</td>
                          <td class="text-uppercase"><?= $op->objective ?></td>
                          <td class="text-uppercase"><?= $op->key_result ?></td>
                          <td class="text-uppercase"><?= $op->definition_of_done ?></td>
                          <td class="text-uppercase"><?= $op->quarter ?></td>
                          <td class="text-uppercase"><?= $op->year ?></td>
                          <td class="text-uppercase"><?= $op->assignee ?></td>
                          <td class="text-uppercase"><?= $op->nama_complexity_okr ?></td>
                          <td class="text-uppercase"><?= $op->nama_too_okr ?></td>
                          <td class="text-uppercase"><?= $op->unit ?></td>
                          <td class="text-uppercase"><?= $op->target ?></td>
                          <td class="text-uppercase"><?= $op->start ?></td>
                          <td class="text-uppercase"><?= $op->end ?></td>
                          <td class="text-uppercase"><?= $op->nama_tof_okr ?></td>
                          <td class="text-uppercase"><?= $op->kodifikasi ?></td>
                          <td class="text-uppercase"><?= $op->nama_category_okr ?></td>
                          <?php if ($this->session->userdata('role') != 'user_logged_in') { ?>
                              <td>
                                  <div class="btn-group">
                                      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editOKR<?= $op->id_okr_product ?>"><em class="fas fa-edit"></em> Edit</button>
                                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteOKR<?= $op->id_okr_product  ?>"><em class="fas fa-trash"></em> Delete</button>
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
                      <th>Detail Progress</th>
                      <th>Progress</th>
                      <th>Objective</th>
                      <th>Key Result</th>
                      <th>Definition of Done</th>
                      <th>Quarter</th>
                      <th>Year</th>
                      <th>Assignee</th>
                      <th>Complexity</th>
                      <th>Type of Output</th>
                      <th>Unit</th>
                      <th>Target</th>
                      <th>Start</th>
                      <th>End</th>
                      <th>Type of Formula</th>
                      <th>Codification</th>
                      <th>Category OKR</th>
                      <?php if ($this->session->userdata('role') != 'user_logged_in') { ?>
                          <th>Action</th>
                      <?php } ?>
                  </tr>
              </tfoot>
          </table>

          <?php
            if ($this->session->userdata('role') != 'user_logged_in') {
            ?>

              <?php
                if ($footnoteOKR->username_admin) {
                ?>
                  <div class="mt-4" id="footnote">
                      <?= $footnoteOKR->username_admin ?> successfully <?= $footnoteOKR->activity ?> data <?= $footnoteOKR->page ?>-<?= $footnoteOKR->table_name ?> with Kodifikasi: <?= $footnoteOKR->name ?> on <?= $footnoteOKR->timestamp ?>
                  </div>
              <?php
                }
                ?>

          <?php
            }
            ?>

          <h1 class="mb-4 mt-4">OKR DSC Team</h1>
          <hr>

          <?php if ($this->session->userdata('role') != 'user_logged_in') { ?>
              <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addOKRDSCTeam"><em class="fas fa-plus"></em> Add OKR DSC Team</button>
          <?php } ?>

          <?php if ($avg_okr_dsc > 0) { ?>
            <button type="button" class="mb-4 btn btn-success" disabled><?= number_format($avg_okr_dsc) ?>%</button>
          <?php }else{ ?>
            <button type="button" class="mb-4 btn btn-success" disabled>0%</button>
          <?php } ?>

          <?php
            if ($this->session->flashdata('msgOKRDSCTeam')) {
                echo $this->session->flashdata('msgOKRDSCTeam');
            }
            ?>

          <table id="no_export_8" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Detail Progress</th>
                      <th>Progress</th>
                      <th>Objective</th>
                      <th>Key Result</th>
                      <th>Definition of Done</th>
                      <th>Quarter</th>
                      <th>Year</th>
                      <th>Assignee</th>
                      <th>Complexity</th>
                      <th>Type of Output</th>
                      <th>Unit</th>
                      <th>Target</th>
                      <th>Start</th>
                      <th>End</th>
                      <th>Type of Formula</th>
                      <th>Codification</th>
                      <th>Category OKR</th>
                      <?php if ($this->session->userdata('role') != 'user_logged_in') { ?>
                          <th>Action</th>
                      <?php } ?>
                  </tr>
              </thead>
              <tbody>
                  <?php
                    $i = 1;
                    foreach ($okr_dsc->result() as $o) {
                    ?>
                      <tr>
                          <td><?= $i++ ?></td>
                          <td class="text-uppercase"><?= $o->detail_progress ?></td>
                          <td class="text-uppercase"><?= $o->progress ?>%</td>
                          <td class="text-uppercase"><?= $o->objective ?></td>
                          <td class="text-uppercase"><?= $o->key_result ?></td>
                          <td class="text-uppercase"><?= $o->definition_of_done ?></td>
                          <td class="text-uppercase"><?= $o->quarter ?></td>
                          <td class="text-uppercase"><?= $o->year ?></td>
                          <td class="text-uppercase"><?= $o->assignee ?></td>
                          <td class="text-uppercase"><?= $o->nama_complexity_okr ?></td>
                          <td class="text-uppercase"><?= $o->nama_too_okr ?></td>
                          <td class="text-uppercase"><?= $o->unit ?></td>
                          <td class="text-uppercase"><?= $o->target ?></td>
                          <td class="text-uppercase"><?= $o->start ?></td>
                          <td class="text-uppercase"><?= $o->end ?></td>
                          <td class="text-uppercase"><?= $o->nama_tof_okr ?></td>
                          <td class="text-uppercase"><?= $o->kodifikasi ?></td>
                          <td class="text-uppercase"><?= $o->nama_category_okr ?></td>
                          <?php if ($this->session->userdata('role') != 'user_logged_in') { ?>
                              <td>
                                  <div class="btn-group">
                                      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editOKRDSCTeam<?= $o->id_okr_dsc ?>"><em class="fas fa-edit"></em> Edit</button>
                                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteOKRDSCTeam<?= $o->id_okr_dsc  ?>"><em class="fas fa-trash"></em> Delete</button>
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
                      <th>Detail Progress</th>
                      <th>Progress</th>
                      <th>Objective</th>
                      <th>Key Result</th>
                      <th>Definition of Done</th>
                      <th>Quarter</th>
                      <th>Year</th>
                      <th>Assignee</th>
                      <th>Complexity</th>
                      <th>Type of Output</th>
                      <th>Unit</th>
                      <th>Target</th>
                      <th>Start</th>
                      <th>End</th>
                      <th>Type of Formula</th>
                      <th>Codification</th>
                      <th>Category OKR</th>
                      <?php if ($this->session->userdata('role') != 'user_logged_in') { ?>
                          <th>Action</th>
                      <?php } ?>
                  </tr>
              </tfoot>
          </table>

          <?php
            if ($this->session->userdata('role') != 'user_logged_in') {
            ?>

              <?php
                if ($footnoteOKRDSCTeam->username_admin) {
                ?>
                  <div class="mt-4" id="footnote">
                      <?= $footnoteOKRDSCTeam->username_admin ?> successfully <?= $footnoteOKRDSCTeam->activity ?> data <?= $footnoteOKRDSCTeam->page ?>-<?= $footnoteOKRDSCTeam->table_name ?> with Kodifikasi: <?= $footnoteOKRDSCTeam->name ?> on <?= $footnoteOKRDSCTeam->timestamp ?>
                  </div>
              <?php
                }
                ?>

          <?php
            }
            ?>

          <h1 class="mb-4 mt-4">OKR Member</h1>
          <hr>

          <?php if ($this->session->userdata('role') != 'user_logged_in') { ?>
              <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addOKRMember"><em class="fas fa-plus"></em> Add OKR Member</button>
          <?php } ?>

          <?php if ($avg_okr_member > 0) { ?>
            <button type="button" class="mb-4 btn btn-success" disabled><?= number_format($avg_okr_member) ?>%</button>
          <?php }else{ ?>
            <button type="button" class="mb-4 btn btn-success" disabled>0%</button>
          <?php } ?>

          <?php
            if ($this->session->flashdata('msgOKRMember')) {
                echo $this->session->flashdata('msgOKRMember');
            }
            ?>

          <table id="no_export_9" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Assignee</th>
                      <th>Detail Progress</th>
                      <th>Progress</th>
                      <th>Objective</th>
                      <th>Key Result</th>
                      <th>Definition of Done</th>
                      <th>Quarter</th>
                      <th>Year</th>
                      <!-- <th>Assignee</th> -->
                      <th>Complexity</th>
                      <th>Type of Output</th>
                      <th>Unit</th>
                      <th>Target</th>
                      <th>Start</th>
                      <th>End</th>
                      <th>Type of Formula</th>
                      <th>Codification</th>
                      <th>Category OKR</th>
                      <?php if ($this->session->userdata('role') != 'user_logged_in') { ?>
                          <th>Action</th>
                      <?php } ?>
                  </tr>
              </thead>
              <tbody>
                  <?php
                    $i = 1;
                    foreach ($okr_member->result() as $om) {
                    ?>
                      <tr>
                          <td><?= $i++ ?></td>
                          <td class="text-uppercase"><?= $om->assignee ?></td>
                          <td class="text-uppercase"><?= $om->detail_progress ?></td>
                          <td class="text-uppercase"><?= $om->progress ?>%</td>
                          <td class="text-uppercase"><?= $om->objective ?></td>
                          <td class="text-uppercase"><?= $om->key_result ?></td>
                          <td class="text-uppercase"><?= $om->definition_of_done ?></td>
                          <td class="text-uppercase"><?= $om->quarter ?></td>
                          <td class="text-uppercase"><?= $om->year ?></td>
                          <!-- <td class="text-uppercase"><?= $om->assignee ?></td> -->
                          <td class="text-uppercase"><?= $om->nama_complexity_okr ?></td>
                          <td class="text-uppercase"><?= $om->nama_too_okr ?></td>
                          <td class="text-uppercase"><?= $om->unit ?></td>
                          <td class="text-uppercase"><?= $om->target ?></td>
                          <td class="text-uppercase"><?= $om->start ?></td>
                          <td class="text-uppercase"><?= $om->end ?></td>
                          <td class="text-uppercase"><?= $om->nama_tof_okr ?></td>
                          <td class="text-uppercase"><?= $om->kodifikasi ?></td>
                          <td class="text-uppercase"><?= $om->nama_category_okr ?></td>
                          <?php if ($this->session->userdata('role') != 'user_logged_in') { ?>
                              <td>
                                  <div class="btn-group">
                                      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editOKRMember<?= $om->id_okr_member ?>"><em class="fas fa-edit"></em> Edit</button>
                                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteOKRMember<?= $om->id_okr_member  ?>"><em class="fas fa-trash"></em> Delete</button>
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
                      <th>Assignee</th>
                      <th>Detail Progress</th>
                      <th>Progress</th>
                      <th>Objective</th>
                      <th>Key Result</th>
                      <th>Definition of Done</th>
                      <th>Quarter</th>
                      <th>Year</th>
                      <!-- <th>Assignee</th> -->
                      <th>Complexity</th>
                      <th>Type of Output</th>
                      <th>Unit</th>
                      <th>Target</th>
                      <th>Start</th>
                      <th>End</th>
                      <th>Type of Formula</th>
                      <th>Codification</th>
                      <th>Category OKR</th>
                      <?php if ($this->session->userdata('role') != 'user_logged_in') { ?>
                          <th>Action</th>
                      <?php } ?>
                  </tr>
              </tfoot>
          </table>

          <?php
            if ($this->session->userdata('role') != 'user_logged_in') {
            ?>

              <?php
                if ($footnoteOKRMember->username_admin) {
                ?>
                  <div class="mt-4" id="footnote">
                      <?= $footnoteOKRMember->username_admin ?> successfully <?= $footnoteOKRMember->activity ?> data <?= $footnoteOKRMember->page ?>-<?= $footnoteOKRMember->table_name ?> with Member: <?= $footnoteOKRMember->name ?> on <?= $footnoteOKRMember->timestamp ?>
                  </div>
              <?php
                }
                ?>

          <?php
            }
            ?>

          <h1 class="mb-4 mt-4">Problems</h1>
          <hr>

          <?php if ($this->session->userdata('role') != 'user_logged_in') { ?>
              <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addProblem"><em class="fas fa-plus"></em> Add Problem</button>
          <?php } ?>

          <?php
            if ($this->session->flashdata('msgProblem')) {
                echo $this->session->flashdata('msgProblem');
            }
            ?>

          <table id="no_export_6" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Descriptions</th>
                      <th>Quarter</th>
                      <th>Year</th>
                      <?php if ($this->session->userdata('role') != 'user_logged_in') { ?>
                          <th>Action</th>
                      <?php } ?>
                  </tr>
              </thead>
              <tbody>
                  <?php
                    $i = 1;
                    foreach ($problem->result() as $o) {
                    ?>
                      <tr>
                          <td><?= $i++ ?></td>
                          <td class="text-uppercase"><?= $o->descriptions ?></td>
                          <td class="text-uppercase"><?= $o->quarter ?></td>
                          <td class="text-uppercase"><?= $o->year ?></td>
                          <?php if ($this->session->userdata('role') != 'user_logged_in') { ?>
                              <td>
                                  <div class="btn-group">
                                      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editProblem<?= $o->id_usecase_kendala ?>"><em class="fas fa-edit"></em> Edit</button>
                                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteProblem<?= $o->id_usecase_kendala  ?>"><em class="fas fa-trash"></em> Delete</button>
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
                      <th>Descriptions</th>
                      <th>Quarter</th>
                      <th>Year</th>
                      <?php if ($this->session->userdata('role') != 'user_logged_in') { ?>
                          <th>Action</th>
                      <?php } ?>
                  </tr>
              </tfoot>
          </table>

          <?php
            if ($this->session->userdata('role') != 'user_logged_in') {
            ?>

              <?php
                if ($footnoteProblem->username_admin) {
                ?>
                  <div class="mt-4" id="footnote">
                      <?= $footnoteProblem->username_admin ?> successfully <?= $footnoteProblem->activity ?> data <?= $footnoteProblem->page ?>-<?= $footnoteProblem->table_name ?> with descriptions: <?= $footnoteProblem->name ?> on <?= $footnoteProblem->timestamp ?>
                  </div>
              <?php
                }
                ?>

          <?php
            }
            ?>

          <hr>

          <div class="row">
              <div class="col-6">
                  <h1 class="mb-4 mt-4">Resource Needs</h1>
                  <hr>

                  <?php if ($this->session->userdata('role') != 'user_logged_in') { ?>
                      <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addResource"><em class="fas fa-plus"></em> Add Resource Needs</button>
                  <?php } ?>

                  <?php
                    if ($this->session->flashdata('msgResource')) {
                        echo $this->session->flashdata('msgResource');
                    }
                    ?>

                  <table id="no_export_12" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Role</th>
                              <th>Quantity</th>
                              <th>Level</th>
                              <th>Skill</th>
                              <th>Quarter</th>
                              <th>Year</th>
                              <?php if ($this->session->userdata('role') != 'user_logged_in') { ?>
                                  <th>Action</th>
                              <?php } ?>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                            $i = 1;
                            foreach ($resource_needs->result() as $rn) {
                            ?>
                              <tr>
                                  <td><?= $i++ ?></td>
                                  <td class="text-uppercase"><?= $rn->role ?></td>
                                  <td class="text-uppercase"><?= $rn->quantity ?></td>
                                  <td class="text-uppercase"><?= $rn->level ?></td>
                                  <td class="text-uppercase"><?= $rn->skill ?></td>
                                  <td class="text-uppercase"><?= $rn->quarter ?></td>
                                  <td class="text-uppercase"><?= $rn->year ?></td>

                                  <?php if ($this->session->userdata('role') != 'user_logged_in') { ?>
                                      <td>
                                          <div class="btn-group">
                                              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editResource<?= $rn->id_usecase_resource_needs ?>"><em class="fas fa-edit"></em> Edit</button>
                                              <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteResource<?= $rn->id_usecase_resource_needs  ?>"><em class="fas fa-trash"></em> Delete</button>
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
                              <th>Role</th>
                              <th>Quantity</th>
                              <th>Level</th>
                              <th>Skill</th>
                              <th>Quarter</th>
                              <th>Year</th>
                              <?php if ($this->session->userdata('role') != 'user_logged_in') { ?>
                                  <th>Action</th>
                              <?php } ?>
                          </tr>
                      </tfoot>
                  </table>

                  <?php
                    if ($this->session->userdata('role') != 'user_logged_in') {
                    ?>

                      <?php
                        if ($footnoteResource->username_admin) {
                        ?>
                          <div class="mt-4" id="footnote">
                              <?= $footnoteResource->username_admin ?> successfully <?= $footnoteResource->activity ?> data <?= $footnoteResource->page ?>-<?= $footnoteResource->table_name ?> with Role: <?= $footnoteResource->name ?> on <?= $footnoteResource->timestamp ?>
                          </div>
                      <?php
                        }
                        ?>

                  <?php
                    }
                    ?>
              </div>

              <div class="col-6">
                  <h1 class="mb-4 mt-4">Tool Needs</h1>
                  <hr>

                  <?php if ($this->session->userdata('role') != 'user_logged_in') { ?>
                      <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addTool"><em class="fas fa-plus"></em> Add Tool Needs</button>
                  <?php } ?>

                  <?php
                    if ($this->session->flashdata('msgTool')) {
                        echo $this->session->flashdata('msgTool');
                    }
                    ?>

                  <table id="no_export_11" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Tool Name</th>
                              <th>Quarter</th>
                              <th>Year</th>
                              <?php if ($this->session->userdata('role') != 'user_logged_in') { ?>
                                  <th>Action</th>
                              <?php } ?>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                            $i = 1;
                            foreach ($tool_needs->result() as $tn) {
                            ?>
                              <tr>
                                  <td><?= $i++ ?></td>
                                  <td class="text-uppercase"><?= $tn->tool_name ?></td>
                                  <td class="text-uppercase"><?= $tn->quarter ?></td>
                                  <td class="text-uppercase"><?= $tn->year ?></td>

                                  <?php if ($this->session->userdata('role') != 'user_logged_in') { ?>
                                      <td>
                                          <div class="btn-group">
                                              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editTool<?= $tn->id_usecase_tool_needs ?>"><em class="fas fa-edit"></em> Edit</button>
                                              <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteTool<?= $tn->id_usecase_tool_needs  ?>"><em class="fas fa-trash"></em> Delete</button>
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
                              <th>Tool Name</th>
                              <th>Quarter</th>
                              <th>Year</th>
                              <?php if ($this->session->userdata('role') != 'user_logged_in') { ?>
                                  <th>Action</th>
                              <?php } ?>
                          </tr>
                      </tfoot>
                  </table>

                  <?php
                    if ($this->session->userdata('role') != 'user_logged_in') {
                    ?>

                      <?php
                        if ($footnoteTool->username_admin) {
                        ?>
                          <div class="mt-4" id="footnote">
                              <?= $footnoteTool->username_admin ?> successfully <?= $footnoteTool->activity ?> data <?= $footnoteTool->page ?>-<?= $footnoteTool->table_name ?> with Tool: <?= $footnoteTool->name ?> on <?= $footnoteTool->timestamp ?>
                          </div>
                      <?php
                        }
                        ?>

                  <?php
                    }
                    ?>

              </div>
          </div>

          <div class="row">
              <div class="col-md-6">
                  <h1 class="mb-4 mt-4">Training Needs</h1>
                  <hr>

                  <?php if ($this->session->userdata('role') != 'user_logged_in') { ?>
                      <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addTrainingNeeds"><em class="fas fa-plus"></em> Add Training Needs</button>
                  <?php } ?>

                  <?php
                    if ($this->session->flashdata('msgTrainingNeeds')) {
                        echo $this->session->flashdata('msgTrainingNeeds');
                    }
                    ?>

                  <table id="no_export_13" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Training Name</th>
                              <th>Quarter</th>
                              <th>Year</th>
                              <?php if ($this->session->userdata('role') != 'user_logged_in') { ?>
                                  <th>Action</th>
                              <?php } ?>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                            $i = 1;
                            foreach ($training_needs->result() as $tn) {
                            ?>
                              <tr>
                                  <td><?= $i++ ?></td>
                                  <td class="text-uppercase"><?= $tn->training_name ?></td>
                                  <td class="text-uppercase"><?= $tn->quarter ?></td>
                                  <td class="text-uppercase"><?= $tn->year ?></td>
                                  <?php if ($this->session->userdata('role') != 'user_logged_in') { ?>
                                      <td>
                                          <div class="btn-group">
                                              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editTrainingNeeds<?= $tn->id_usecase_training_needs ?>"><em class="fas fa-edit"></em> Edit</button>
                                              <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteTrainingNeeds<?= $tn->id_usecase_training_needs ?>"><em class="fas fa-trash"></em> Delete</button>
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
                              <th>Training Name</th>
                              <th>Quarter</th>
                              <th>Year</th>
                              <?php if ($this->session->userdata('role') != 'user_logged_in') { ?>
                                  <th>Action</th>
                              <?php } ?>
                          </tr>
                      </tfoot>
                  </table>
                  <?php
                    if ($this->session->userdata('role') != 'user_logged_in') {
                    ?>

                      <?php
                        if ($footnoteTrainingNeeds->username_admin) {
                        ?>
                          <div class="mt-4" id="footnote">
                              <?= $footnoteTrainingNeeds->username_admin ?> successfully <?= $footnoteTrainingNeeds->activity ?> data <?= $footnoteTrainingNeeds->page ?>-<?= $footnoteTrainingNeeds->table_name ?> with name: <?= $footnoteTrainingNeeds->name ?> on <?= $footnoteTrainingNeeds->timestamp ?>
                          </div>
                      <?php
                        }
                        ?>

                  <?php
                    }
                    ?>
              </div>

              <div class="col-md-6">
                  <h1 class="mb-4 mt-4">Skill Existing</h1>
                  <hr>

                  <?php if ($this->session->userdata('role') != 'user_logged_in') { ?>
                      <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addSkillExisting"><em class="fas fa-plus"></em> Add Skill Existing</button>
                  <?php } ?>

                  <?php
                    if ($this->session->flashdata('msgSkillExisting')) {
                        echo $this->session->flashdata('msgSkillExisting');
                    }
                    ?>

                  <table id="no_export_14" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Skill Existing</th>
                              <th>Quarter</th>
                              <th>Year</th>
                              <?php if ($this->session->userdata('role') != 'user_logged_in') { ?>
                                  <th>Action</th>
                              <?php } ?>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                            $i = 1;
                            foreach ($skill_existing->result() as $se) {
                            ?>
                              <tr>
                                  <td><?= $i++ ?></td>
                                  <td class="text-uppercase"><?= $se->skill_name ?></td>
                                  <td class="text-uppercase"><?= $se->quarter ?></td>
                                  <td class="text-uppercase"><?= $se->year ?></td>
                                  <?php if ($this->session->userdata('role') != 'user_logged_in') { ?>
                                      <td>
                                          <div class="btn-group">
                                              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editSkillExisting<?= $se->id_usecase_skill_existing ?>"><em class="fas fa-edit"></em> Edit</button>
                                              <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteSkillExisting<?= $se->id_usecase_skill_existing  ?>"><em class="fas fa-trash"></em> Delete</button>
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
                              <th>Skill Existing</th>
                              <th>Quarter</th>
                              <th>Year</th>
                              <?php if ($this->session->userdata('role') != 'user_logged_in') { ?>
                                  <th>Action</th>
                              <?php } ?>
                          </tr>
                      </tfoot>
                  </table>
                  <?php
                    if ($this->session->userdata('role') != 'user_logged_in') {
                    ?>

                      <?php
                        if ($footnoteSkillExisting->username_admin) {
                        ?>
                          <div class="mt-4" id="footnote">
                              <?= $footnoteSkillExisting->username_admin ?> successfully <?= $footnoteSkillExisting->activity ?> data <?= $footnoteSkillExisting->page ?>-<?= $footnoteSkillExisting->table_name ?> with name: <?= $footnoteSkillExisting->name ?> on <?= $footnoteSkillExisting->timestamp ?>
                          </div>
                      <?php
                        }
                        ?>

                  <?php
                    }
                    ?>
              </div>
          </div>

      </div>

      <script>
          <?php if ($this->session->flashdata('msgUsecaseTask')) { ?>
              document.getElementById('msgUsecaseTask').scrollIntoView();
          <?php } ?>

          <?php if ($this->session->flashdata('msgDataSource')) { ?>
              document.getElementById('msgDataSource').scrollIntoView();
          <?php } ?>

          <?php if ($this->session->flashdata('msgOutput')) { ?>
              document.getElementById('msgOutput').scrollIntoView();
          <?php } ?>

          <?php if ($this->session->flashdata('msgOKR')) { ?>
              document.getElementById('msgOKR').scrollIntoView();
          <?php } ?>

          <?php if ($this->session->flashdata('msgOKRDSCTeam')) { ?>
              document.getElementById('msgOKRDSCTeam').scrollIntoView();
          <?php } ?>

          <?php if ($this->session->flashdata('msgOKRMember')) { ?>
              document.getElementById('msgOKRMember').scrollIntoView();
          <?php } ?>

          <?php if ($this->session->flashdata('msgTrainingNeeds')) { ?>
              document.getElementById('msgTrainingNeeds').scrollIntoView();
          <?php } ?>

          <?php if ($this->session->flashdata('msgSkillExisting')) { ?>
              document.getElementById('msgSkillExisting').scrollIntoView();
          <?php } ?>

          <?php if ($this->session->flashdata('msgResource')) { ?>
              document.getElementById('msgResource').scrollIntoView();
          <?php } ?>

          <?php if ($this->session->flashdata('msgTool')) { ?>
              document.getElementById('msgTool').scrollIntoView();
          <?php } ?>
      </script>

  </body>
  <!-- End of Body Section -->