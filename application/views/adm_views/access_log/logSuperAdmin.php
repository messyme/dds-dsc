  <!-- Body Section -->
  <body>
    <div class="container p-4" id="bg-template">
        <h1 class="mb-4">Access Log Super Admin</h1>
        <hr>

        <?php
            if($this->session->flashdata('msg')){
                echo $this->session->flashdata('msg');
            }
        ?>

        <h4 class="mb-4">Duration of Accessing the Page</h4>
        <table id="two_row_order_no_export" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Names</th>
                    <th>Date</th>
                    <th>Login Time</th>
                    <th>Logout Time</th>
                    <th>Duration Access</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    foreach($duration as $dr){
                ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td class="text-uppercase"><?= $dr->username ?></td>
                    <td class="text-uppercase"><?= $dr->tanggal ?></td>
                    <td class="text-uppercase"><?= $dr->login_time ?></td>
                    <td class="text-uppercase"><?= $dr->logout_time ?></td>
                    <td class="text-uppercase"><?= $dr->duration ?></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Names</th>
                    <th>Date</th>
                    <th>Login Time</th>
                    <th>Logout Time</th>
                    <th>Duration Access</th>
                </tr>
            </tfoot>
        </table>

        <hr>
        <h1 class="mb-4">Page Accessed</h1>
        <table id="no_row_order" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Names</th>
                    <th>Activity</th>
                    <th>Date Time Access</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    foreach($log as $lg){
                ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td class="text-uppercase"><?= $lg->username ?></td>
                    <td class="text-uppercase"><?= $lg->activity ?></td>
                    <td class="text-uppercase"><?= $lg->date_access ?></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Names</th>
                    <th>Activity</th>
                    <th>Date Time Access</th>
                </tr>
            </tfoot>
        </table>
    </div>
  </body>
  <!-- End of Body Section -->