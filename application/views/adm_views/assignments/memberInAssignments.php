  <!-- Body Section -->

  <body>
      <?php
        if ($this->session->flashdata('msg')) {
            echo $this->session->flashdata('msg');
        }
        ?>

      <div class="container p-4" id="bg-template">
          <h1 class="mb-4">Number of Use Cases/Member</h1>
          <hr>

          <table id="no_export" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Status</th>
                      <th>Total Use Case</th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                    $i = 1;
                    foreach ($number_of_usecase->result() as $nou) {
                    ?>
                      <tr>
                          <td><?= $i++ ?></td>
                          <td class="text-uppercase"><?= $nou->nama_member ?></td>
                          <td class="text-uppercase"><?= $nou->nama_status ?></td>
                          <td><?= $nou->jml_usecase ?></td>
                      </tr>

                  <?php
                    }
                    ?>
              </tbody>
              <tfoot>
                  <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Status</th>
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

              <h1 class="mb-4">Member not in Use Case</h1>
              <hr>

              <table id="four_row_order_lite" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th>NIK</th>
                          <th>Name</th>
                          <th>Status</th>
                          <th>Positions</th>
                          <th>Band</th>
                          <th>Contract Started</th>
                          <th>Contract Finished</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                        foreach ($mdscNotInUsecase->result() as $mdscNotInUsecase) {
                        ?>
                          <tr>
                              <td><?= $mdscNotInUsecase->nik ?></td>
                              <td class="text-uppercase"><?= $mdscNotInUsecase->nama_member ?></td>
                              <td class="text-uppercase"><?= $mdscNotInUsecase->nama_status ?></td>
                              <td class="text-uppercase"><?= $mdscNotInUsecase->nama_posisi ?></td>
                              <td class="text-uppercase"><?= $mdscNotInUsecase->nama_band ?></td>
                              <td><?= $mdscNotInUsecase->kontrak_mulai ?></td>
                              <td><?= $mdscNotInUsecase->kontrak_selesai ?></td>
                          </tr>

                      <?php
                        }
                        ?>
                  </tbody>
                  <tfoot>
                      <tr>
                          <th>NIK</th>
                          <th>Name</th>
                          <th>Status</th>
                          <th>Positions</th>
                          <th>Band</th>
                          <th>Contract Started</th>
                          <th>Contract Finished</th>
                      </tr>
                  </tfoot>
              </table>
              <hr>
          <?php
            }
            ?>

          <br>
          <?php
            if ($this->session->userdata('role') != 'user_logged_in') {
            ?>

              <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addMemberAssignment"><em class="fas fa-plus"></em> Add Member in Assignments</button>

          <?php
            }
            ?>

          <hr>

          <h1 class="mb-4">Use Case Leader/PIC</h1>
          <hr>

          <table id="five_row_order" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
              <thead>
                  <tr>
                      <th>Groups</th>
                      <th>Tribes</th>
                      <th>Use Cases</th>
                      <th>Squads</th>
                      <th>NIK</th>
                      <th>Name</th>
                      <th>Status</th>
                      <th>Point</th>
                      <th>Occupancy Rate</th>
                      <th>Occupancy Status</th>

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
                    foreach ($usecase_leader_list->result() as $ull) {
                    ?>
                      <tr>
                          <td class="text-uppercase"><?= $ull->nama_groups ?></td>
                          <td class="text-uppercase"><?= $ull->nama_tribe ?></td>
                          <td class="text-uppercase"><?= $ull->nama_usecase ?></td>
                          <td class="text-uppercase"><?= $ull->nama_squad ?></td>
                          <td><?= $ull->nik ?></td>
                          <td class="text-uppercase"><?= $ull->nama_member ?></td>

                          <td class="text-uppercase">
                              <?php
                                if (!$ull->status_member) {
                                    echo "-";
                                } else {
                                    echo $ull->status_member;
                                }
                                ?>
                          </td>
                          <td class="text-uppercase"><?= $ull->point ?></td>
                          <td class="text-uppercase"><?= $ull->occupancy_rate ?></td>
                          <td class="text-uppercase"><?= $ull->occupancy_status ?></td>
                          <?php
                            if ($this->session->userdata('role') != 'user_logged_in') {
                            ?>
                              <td>
                                  <div class="btn-group">
                                      <a href="<?= base_url('pages/Assignments/getMemberAssignmentEdit/' . $ull->id_member_usecase); ?>" type="button" class="btn btn-sm btn-primary"><em class="fas fa-edit"></em> Edit</a>
                                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal<?= $ull->id_member_usecase  ?>"><em class="fas fa-trash"></em> Delete</button>
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
                      <th>NIK</th>
                      <th>Name</th>
                      <th>Status</th>
                      <th>Point</th>
                      <th>Occupancy Rate</th>
                      <th>Occupancy Status</th>

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

          <hr>

          <h1 class="mb-4">Use Case Member</h1>
          <hr>

          <table id="two_row_order" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
              <thead>
                  <tr>
                      <th>Groups</th>
                      <th>Tribes</th>
                      <th>Use Cases</th>
                      <th>Squads</th>
                      <th>NIK</th>
                      <th>Name</th>
                      <th>Status</th>
                      <th>Point</th>
                      <th>Occupancy Rate</th>
                      <th>Occupancy Status</th>
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
                    foreach ($usecase_member_list->result() as $uml) {
                    ?>
                      <tr>
                          <td class="text-uppercase"><?= $uml->nama_groups ?></td>
                          <td class="text-uppercase"><?= $uml->nama_tribe ?></td>
                          <td class="text-uppercase"><?= $uml->nama_usecase ?></td>
                          <td class="text-uppercase"><?= $uml->nama_squad ?></td>
                          <td><?= $uml->nik ?></td>
                          <td class="text-uppercase"><?= $uml->nama_member ?></td>
                          <td class="text-uppercase">
                              <?php
                                if (!$uml->status_member) {
                                    echo "-";
                                } else {
                                    echo $uml->status_member;
                                }
                                ?>
                          </td>
                          <td class="text-uppercase"><?= $uml->point ?></td>
                          <td class="text-uppercase"><?= $uml->occupancy_rate ?></td>
                          <td class="text-uppercase"><?= $uml->occupancy_status ?></td>
                          <?php
                            if ($this->session->userdata('role') != 'user_logged_in') {
                            ?>
                              <td>
                                  <div class="btn-group">
                                      <a href="<?= base_url('pages/Assignments/getMemberAssignmentEdit/' . $uml->id_member_usecase); ?>" type="button" class="btn btn-sm btn-primary"><em class="fas fa-edit"></em> Edit</a>
                                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal<?= $uml->id_member_usecase  ?>"><em class="fas fa-trash"></em> Delete</button>
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
                      <th>NIK</th>
                      <th>Name</th>
                      <th>Status</th>
                      <th>Point</th>
                      <th>Occupancy Rate</th>
                      <th>Occupancy Status</th>
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
                if ($footnote->username_admin) {
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