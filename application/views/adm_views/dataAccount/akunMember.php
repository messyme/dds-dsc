  <!-- Body Section -->
  <body>
    <div class="container p-4" id="bg-template">
        <h1 class="mb-4">List of Member</h1>
        <hr>

        <?php
            if($this->session->flashdata('msg')){
                echo $this->session->flashdata('msg');
            }
        ?>

        <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addMember"><em class="fas fa-plus"></em> Add Member</button>

        <table id="no_export_2" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Member</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    foreach($member->result() as $member){
                ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $member->nama_member ?></td>
                    <td><?= $member->username ?></td>
                    <td id="<?= $member->id_admin ?>">
                        <?php 
                            // Variabel untuk decrypt
                            $ciphering = "AES-128-CTR";
                            $iv_length = openssl_cipher_iv_length($ciphering);
                            $options = 0;
                            $decryption_iv = "1234567891011121";
                            $decryption_key = "ddsdsctelkom";
                            $password = openssl_decrypt($member->password, $ciphering, $decryption_key, $options, $decryption_iv);
                            echo str_repeat('*', strlen($password));
                        ?>
                    </td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-warning float-right" data-toggle="modal" onclick="togglePassword(<?= $member->id_admin ?>, '<?= $password ?>')"><em class="fas fa-eye"></em> Show</button>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteMemberModal<?= $member->id_admin ?>"><em class="fas fa-trash"></em> Delete</button>
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
                    <th>Nama Member</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Actions</th>
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

    <?php
        if(count($requesteditmember->result())>0){
    ?>

    <div class="container p-4 mt-5" id="bg-template">
        <h1 class="mb-4">List of Request Edit Member</h1>
        <hr>

        <table id="no_export" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Member</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    foreach($requesteditmember->result() as $reqmem){
                ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $reqmem->nama_member ?></td>
                    <td><?= $reqmem->nik ?></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#requestEdit<?= $reqmem->nik ?>">Accept</button>
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
                    <th>Nama Member</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <?php
        }
    ?>

    <script>
        function togglePassword(x, password) {
            if (document.getElementById(x).innerHTML == password) {
                document.getElementById(x).innerHTML = "*".repeat(password.length);
            } else {
                document.getElementById(x).innerHTML = password;
            }
        }
    </script>
  </body>
  <!-- End of Body Section -->