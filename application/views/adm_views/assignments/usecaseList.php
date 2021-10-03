  <!-- Body Section -->
  <style>
      tr {
          cursor: pointer;
      }
  </style>

  <body>
      <div class="container p-4" id="bg-template">
          <h1 class="mb-4">List of Use Case</h1>
          <hr>

          <?php
            if ($this->session->flashdata('msg')) {
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
                      <th>Use Case Type</th>
                      <th>Group Name</th>
                      <th>Tribe Name</th>
                      <th>Squad Name</th>
                      <th>Status</th>
                      <th>Occupancy Rate</th>
                      <th>Occupancy Status</th>
                      <th>Level</th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                    $i = 1;
                    foreach ($usecase->result() as $u) {
                    ?>
                      <tr>
                          <td><?= $i++ ?></td>
                          <td class="text-uppercase clickable-row" data-href="<?= base_url() ?>pages/Assignments/detail_usecase/<?= $u->id_usecase ?>"><?= $u->nama_usecase ?></td>
                          <td class="text-uppercase">
                              <?php
                                if (!$u->jenis_analisis) {
                                    echo "-";
                                } else {
                                    echo $u->jenis_analisis;
                                }
                                ?>
                          </td>
                          <td class="text-uppercase"><?= $u->nama_groups ?></td>
                          <td class="text-uppercase"><?= $u->nama_tribe ?></td>
                          <td class="text-uppercase"><?= $u->nama_squad ?></td>
                          <td class="text-uppercase"><?= $u->deskripsi_status ?></td>
                          <td class="text-uppercase"><?= $u->occupancy_rate ?></td>
                          <td class="text-uppercase"><?= $u->occupancy_status ?></td>
                          <td class="text-uppercase"><?= $u->nama_workload_usecase_level ?></td>
                      </tr>

                  <?php
                    }
                    ?>
              </tbody>
              <tfoot>
                  <tr>
                      <th>No</th>
                      <th>Use Case Name</th>
                      <th>Use Case Type</th>
                      <th>Group Name</th>
                      <th>Tribe Name</th>
                      <th>Squad Name</th>
                      <th>Status</th>
                      <th>Occupancy Rate</th>
                      <th>Occupancy Status</th>
                      <th>Level</th>
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

      <script>
          jQuery(document).ready(function($) {
              $(".clickable-row").click(function() {
                  window.location = $(this).data("href");
              });
          });
      </script>

  </body>
  <!-- End of Body Section -->