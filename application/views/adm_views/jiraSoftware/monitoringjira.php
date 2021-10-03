  <!-- Body Section -->

  <body>
      <div class="container p-4" id="bg-template">
          <h1 class="mb-4">Monitoring Jira</h1>
          <hr>

          <?php
            if ($this->session->flashdata('msg')) {
                echo $this->session->flashdata('msg');
            }
            ?>

            <?php 
                if ($this->session->userdata('role') != 'user_logged_in') {
            ?>

            <button type="button" class="mb-5 btn btn-primary" data-toggle="modal" data-target="#addJiraMonitoring"><em class="fas fa-plus"></em> Add Jira Monitoring</button>

            <?php
                } 
            ?>

          <table id="monitoring" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Use Cases</th>
                      <th>Key</th>
                      <th>Kanban</th>
                      <th>To Do</th>
                      <th>In Progress</th>
                      <th>Done</th>
                      <th>Last Updated</th>
                      <th>Performance</th>
                      <th>Updating</th>
                      <th>Last Monitored</th>
                        <?php 
                            if ($this->session->userdata('role') != 'user_logged_in') {
                        ?>
                        <th>Action</th>
                        <?php
                            } 
                        ?>

                  </tr>
              </thead>
              <tbody>
                  <?php
                    $i = 1;
                    foreach ($data_monitoring_jira as $monitor) {
                    ?>

                      <tr>
                          <td><?= $i++ ?></td>
                          <td class="text-uppercase"><?= $monitor->nama_usecase ?></td>
                          <td class="text-uppercase"><?= $monitor->key ?></td>
                          <td class="text-uppercase"><?= $monitor->kanban ?></td>
                          <td class="text-uppercase"><?= $monitor->todo ?></td>
                          <td class="text-uppercase"><?= $monitor->in_progress ?> </td>
                          <td class="text-uppercase"><?= $monitor->done ?></td>
                          <td class="text-uppercase"><?= $monitor->last_updated ?></td>
                          <td class="text-uppercase"><?= $monitor->performance ?></td>
                          <td class="text-uppercase"><?= $monitor->updating ?></td>
                          <td class="text-uppercase"><?= $monitor->monitored ?></td>
                            <?php 
                                if ($this->session->userdata('role') != 'user_logged_in') {
                            ?>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editJiraMonitoring<?= $monitor->id_jiramonitor ?>"><em class="fas fa-edit"></em> Edit</button>
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteMonitor<?= $monitor->id_jiramonitor ?>"><em class="fas fa-trash"></em> Delete</button>
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
                      <th>Use Cases</th>
                      <th>Key</th>
                      <th>Kanban</th>
                      <th>To Do</th>
                      <th>In Progress</th>
                      <th>Done</th>
                      <th>Last Updated</th>
                      <th>Performance</th>
                      <th>Updating</th>
                      <th>Last Monitored</th>
                        <?php 
                            if ($this->session->userdata('role') != 'user_logged_in') {
                        ?>
                        <th>Action</th>
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