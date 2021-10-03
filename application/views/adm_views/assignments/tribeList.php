  <!-- Body Section -->

  <body>
      <div class="container p-4" id="bg-template">
          <h1 class="mb-4">List of Tribe</h1>
          <hr>

          <?php
            if ($this->session->flashdata('msg')) {
                echo $this->session->flashdata('msg');
            }
            ?>

          <?php
            if ($this->session->userdata('role') != 'user_logged_in') {
            ?>

              <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addTribe"><em class="fas fa-plus"></em> Add Tribe</button>

          <?php
            }
            ?>

          <table id="two_row_order" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Code</th>
                      <th>Tribe Name</th>
                      <th>Unit</th>
                      <th>PIC Name</th>
                      <th>Group Name</th>
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
                    foreach ($tribe->result() as $t) {
                    ?>
                      <tr>
                          <td><?= $i++ ?></td>
                          <td class="text-uppercase"><?= $t->code ?></td>
                          <td class="text-uppercase"><?= $t->nama_tribe ?></td>
                          <td class="text-uppercase"><?= $t->unit ?></td>
                          <td class="text-uppercase">
                              <?php
                                if (!$t->tribe_pic) {
                                    echo "-";
                                } else {
                                    echo $t->tribe_pic;
                                }
                                ?>
                          </td>
                          <td class="text-uppercase"><?= $t->nama_groups ?></td>
                          <?php
                            if ($this->session->userdata('role') != 'user_logged_in') {
                            ?>
                              <td>
                                  <div class="btn-group">
                                      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editTribe<?= $t->id_tribe ?>"><em class="fas fa-edit"></em> Edit</button>
                                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal<?= $t->id_tribe ?>"><em class="fas fa-trash"></em> Delete</button>
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
                      <th>Code</th>
                      <th>Tribes Names</th>
                      <th>Unit</th>
                      <th>PIC Name</th>
                      <th>Groups Names</th>
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