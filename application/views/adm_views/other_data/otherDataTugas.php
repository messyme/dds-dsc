  <!-- Body Section -->

  <body>
      <div class="container p-4" id="bg-template">
          <h1 class="mb-4">List of Category OKR</h1>
          <hr>

          <?php
            if ($this->session->flashdata('msg')) {
                echo $this->session->flashdata('msg');
            }
            ?>

          <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addCategoryOkr"><em class="fas fa-plus"></em> Add Category OKR</button>

          <table id="no_row_order" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Category OKR Name</th>
                      <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                    $i = 1;
                    foreach ($category_okr->result() as $bd) {
                    ?>
                      <tr>
                          <td><?= $i++ ?></td>
                          <td class="text-uppercase"><?= $bd->nama_category_okr ?></td>
                          <td>
                              <div class="btn-group">
                                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editCategoryOkr<?= $bd->id_category_okr ?>"><em class="fas fa-edit"></em> Edit</button>
                                  <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteCategoryOkr<?= $bd->id_category_okr ?>"><em class="fas fa-trash"></em> Delete</button>
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
                      <th>Category OKR Name</th>
                      <th>Actions</th>
                  </tr>
              </tfoot>
          </table>

          <?php
            if ($this->session->userdata('role') != 'user_logged_in') {
            ?>

              <?php
                if ($footnote_category_okr->username_admin) {
                ?>
                  <div class="mt-4" id="footnote">
                      <?= $footnote_category_okr->username_admin ?> successfully <?= $footnote_category_okr->activity ?> data <?= $footnote_category_okr->page ?>-<?= $footnote_category_okr->table_name ?> with name: <?= $footnote_category_okr->name ?> on <?= $footnote_category_okr->timestamp ?>
                  </div>
              <?php
                }
                ?>

          <?php
            }
            ?>

          <h1 class="mb-4">List of Complexity OKR</h1>
          <hr>

          <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addComplexityOkr"><em class="fas fa-plus"></em> Add Complexity OKR</button>

          <table id="no_row_order_2" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Complexity OKR Name</th>
                      <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                    $i = 1;
                    foreach ($complexity_okr->result() as $ps) {
                    ?>
                      <tr>
                          <td><?= $i++ ?></td>
                          <td class="text-uppercase"><?= $ps->nama_complexity_okr ?></td>
                          <td>
                              <div class="btn-group">
                                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editComplexityOkr<?= $ps->id_complexity_okr ?>"><em class="fas fa-edit"></em> Edit</button>
                                  <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteComplexityOkr<?= $ps->id_complexity_okr ?>"><em class="fas fa-trash"></em> Delete</button>
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
                      <th>Complexity OKR Name</th>
                      <th>Actions</th>
                  </tr>
              </tfoot>
          </table>

          <?php
            if ($this->session->userdata('role') != 'user_logged_in') {
            ?>

              <?php
                if ($footnote_complexity_okr->username_admin) {
                ?>
                  <div class="mt-4" id="footnote">
                      <?= $footnote_complexity_okr->username_admin ?> successfully <?= $footnote_complexity_okr->activity ?> data <?= $footnote_complexity_okr->page ?>-<?= $footnote_complexity_okr->table_name ?> with name: <?= $footnote_complexity_okr->name ?> on <?= $footnote_complexity_okr->timestamp ?>
                  </div>
              <?php
                }
                ?>

          <?php
            }
            ?>

          <h1 class="mb-4">List of Formula Type</h1>
          <hr>

          <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addTofOkr"><em class="fas fa-plus"></em> Add Formula Type</button>

          <table id="no_row_order_3" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Formula Type Name</th>
                      <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                    $i = 1;
                    foreach ($tof_okr->result() as $st) {
                    ?>
                      <tr>
                          <td><?= $i++ ?></td>
                          <td class="text-uppercase"><?= $st->nama_tof_okr ?></td>
                          <td>
                              <div class="btn-group">
                                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editTofOkr<?= $st->id_tof_okr ?>"><em class="fas fa-edit"></em> Edit</button>
                                  <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteTofOkr<?= $st->id_tof_okr ?>"><em class="fas fa-trash"></em> Delete</button>
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
                      <th>Formula Type Name</th>
                      <th>Actions</th>
                  </tr>
              </tfoot>
          </table>

          <?php
            if ($this->session->userdata('role') != 'user_logged_in') {
            ?>

              <?php
                if ($footnote_tof_okr->username_admin) {
                ?>
                  <div class="mt-4" id="footnote">
                      <?= $footnote_tof_okr->username_admin ?> successfully <?= $footnote_tof_okr->activity ?> data <?= $footnote_tof_okr->page ?>-<?= $footnote_tof_okr->table_name ?> with name: <?= $footnote_tof_okr->name ?> on <?= $footnote_tof_okr->timestamp ?>
                  </div>
              <?php
                }
                ?>

          <?php
            }
            ?>
          <h1 class="mb-4">List of Output Type</h1>
          <hr>

          <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addTooOkr"><em class="fas fa-plus"></em> Add Output Type</button>

          <table id="no_row_order_4" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Output Type Names</th>
                      <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                    $i = 1;
                    foreach ($too_okr->result() as $ot) {
                    ?>
                      <tr>
                          <td><?= $i++ ?></td>
                          <td class="text-uppercase"><?= $ot->nama_too_okr ?></td>
                          <td>
                              <div class="btn-group">
                                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editTooOkr<?= $ot->id_too_okr ?>"><em class="fas fa-edit"></em> Edit</button>
                                  <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteTooOkr<?= $ot->id_too_okr ?>"><em class="fas fa-trash"></em> Delete</button>
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
                      <th>Output Type Names</th>
                      <th>Actions</th>
                  </tr>
              </tfoot>
          </table>

          <?php
            if ($this->session->userdata('role') != 'user_logged_in') {
            ?>

              <?php
                if ($footnote_too_okr->username_admin) {
                ?>
                  <div class="mt-4" id="footnote">
                      <?= $footnote_too_okr->username_admin ?> successfully <?= $footnote_too_okr->activity ?> data <?= $footnote_too_okr->page ?>-<?= $footnote_too_okr->table_name ?> with name: <?= $footnote_too_okr->name ?> on <?= $footnote_too_okr->timestamp ?>
                  </div>
              <?php
                }
                ?>

          <?php
            }
            ?>

          <h1 class="mb-4">Subunit Tribe</h1>
          <hr>

          <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addsubunit"><em class="fas fa-plus"></em> Add Subunit Tribe</button>

          <table id="no_row_order_5" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Subunit</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                    $i = 1;
                    foreach ($subunit->result() as $edbg) {
                    ?>
                      <tr>
                          <td><?= $i++ ?></td>
                          <td class="text-uppercase"><?= $edbg->unit ?></td>
                          <td>
                              <div class="btn-group">
                                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editsubunit<?= $edbg->id_unit ?>"><em class="fas fa-edit"></em> Edit</button>
                                  <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deletesubunit<?= $edbg->id_unit ?>"><em class="fas fa-trash"></em> Delete</button>
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
                      <th>Subunit</th>
                      <th>Action</th>
                  </tr>
              </tfoot>
          </table>

          <?php
            if ($this->session->userdata('role') != 'user_logged_in') {
            ?>

              <?php
                if ($footnote_unit->username_admin) {
                ?>
                  <div class="mt-4" id="footnote">
                      <?= $footnote_unit->username_admin ?> successfully <?= $footnote_unit->activity ?> data <?= $footnote_unit->page ?>-<?= $footnote_unit->table_name ?> with name: <?= $footnote_unit->name ?> on <?= $footnote_unit->timestamp ?>
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