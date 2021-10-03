  <!-- Body Section -->
  <body>
    <div class="container p-4" id="bg-template">
        <h1 class="mb-4">Rewarding Jira</h1>
        <hr>

        <?php
            if($this->session->flashdata('msg')){
                echo $this->session->flashdata('msg');
            }
        ?>

        <?php 
            if ($this->session->userdata('role') != 'user_logged_in') {
        ?> 

        <button type="button" class="mb-5 btn btn-primary" data-toggle="modal" data-target="#addJiraRewarding"><em class="fas fa-plus"></em> Add Jira Reward</button>

        <?php
            } 
        ?>
        
        <form class="mb-5"  action="<?= base_url() ?>pages/JiraSoftware" method="get" enctype="multipart/form-data" role="form" autocomplete="off">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="datepicker" id="datepicker" placeholder="pilih bulan dan tahun" />
                    </div>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>

        <table id="thirteen_row_order" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>Nama</th>
                    <th>Date Point</th>
                    <th>Raw</th>
                    <th>WV</th>
                    <th>Epic Tracking</th>
                    <th>Last Update</th>
                    <th>Raw (NoA)</th>
                    <th>WV (NoA)</th>
                    <th>Raw (Mean)</th>
                    <th>WV</th>
                    <th>PWA (NoA)</th>
                    <th>PWA (LoD)</th>
                    <th>Total PWA</th>
                    <th>RA (%)</th>
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
                    $i = 0;
                    foreach($data_rewarding_jira->result() as $drj){
                        $i++;
                ?>
                <tr>
                    <td class="text-uppercase"><?= $i ?></td>
                    <td class="text-uppercase"><?= $drj->nama_member ?></td>
                    <td class="text-uppercase"><?= $drj->date_point ?></td>
                    <td class="text-uppercase">
                    <?php
                        if (!$drj->raw) {
                            echo "-";
                        } else {
                            echo $drj->raw;
                        }
                    ?>
                    </td>
                    <td class="text-uppercase">
                    <?php
                        if (!$drj->wv) {
                            echo "-";
                        } else {
                            echo $drj->wv;
                        }
                    ?>
                    </td>
                    <td class="text-uppercase">
                    <?php
                        if (!$drj->epic_tracking) {
                            echo "-";
                        } else {
                            echo $drj->epic_tracking;
                        }
                    ?>
                    </td>
                    <td class="text-uppercase"><?= $drj->last_updated ?></td>
                    <td class="text-uppercase">
                    <?php
                        if (!$drj->raw_noa) {
                            echo "-";
                        } else {
                            echo $drj->raw_noa;
                        }
                    ?>
                    </td>
                    <td class="text-uppercase">
                    <?php
                        if (!$drj->wv_noa) {
                            echo "-";
                        } else {
                            echo $drj->wv_noa;
                        }
                    ?>
                    </td>
                    <td class="text-uppercase">
                    <?php
                        if (!$drj->raw_mean) {
                            echo "-";
                        } else {
                            echo $drj->raw_mean;
                        }
                    ?>
                    </td>
                    <td class="text-uppercase">
                    <?php
                        if (!$drj->wv_raw_mean) {
                            echo "-";
                        } else {
                            echo $drj->wv_raw_mean;
                        }
                    ?>
                    </td>
                    <td class="text-uppercase">
                    <?php
                        if (!$drj->pwa_noa) {
                            echo "-";
                        } else {
                            echo $drj->pwa_noa;
                        }
                    ?>
                    </td>
                    <td class="text-uppercase">
                    <?php
                        if (!$drj->pwa_lod) {
                            echo "-";
                        } else {
                            echo $drj->pwa_lod;
                        }
                    ?>
                    </td>
                    <td class="text-uppercase">
                    <?php
                        if (!$drj->total_pwa) {
                            echo "-";
                        } else {
                            echo $drj->total_pwa;
                        }
                    ?>
                    </td>
                    <td class="text-uppercase">
                    <?php
                        if (!$drj->ra) {
                            echo "-";
                        } else {
                            echo $drj->ra.'%';
                        }
                    ?>
                    </td>
                    <?php 
                        if ($this->session->userdata('role') != 'user_logged_in') {
                    ?> 
                    <td>
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#updateModal<?= $drj->id  ?>"><em class="fas fa-edit"></em> Edit</button>
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal<?= $drj->id  ?>"><em class="fas fa-trash"></em> Delete</button>
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
                    <th>Rank</th>
                    <th>Nama</th>
                    <th>Date Point</th>
                    <th>Raw</th>
                    <th>WV</th>
                    <th>Epic Tracking</th>
                    <th>Last Update</th>
                    <th>Raw (NoA)</th>
                    <th>WV (NoA)</th>
                    <th>Raw (Mean)</th>
                    <th>WV</th>
                    <th>PWA (NoA)</th>
                    <th>PWA (LoD)</th>
                    <th>Total PWA</th>
                    <th>RA (%)</th>
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