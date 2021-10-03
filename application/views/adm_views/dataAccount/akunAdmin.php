  <!-- Body Section -->
  <body>
    <div class="container p-4" id="bg-template">
        <h1 class="mb-4">List of User</h1>
        <hr>

        <?php
            if($this->session->flashdata('msg')){
                echo $this->session->flashdata('msg');
            }
        ?>

        <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addAdmin"><em class="fas fa-plus"></em> Add User</button>

        <table id="no_export" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    foreach($admin->result() as $adm){
                ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $adm->username ?></td>
                    <td><?= $adm->email ?></td>
                    <td id="<?= $adm->id_admin ?>">
                        <?php 
                            // Variabel untuk decrypt
                            $ciphering = "AES-128-CTR";
                            $iv_length = openssl_cipher_iv_length($ciphering);
                            $options = 0;
                            $decryption_iv = "1234567891011121";
                            $decryption_key = "ddsdsctelkom";
                            $password = openssl_decrypt($adm->password, $ciphering, $decryption_key, $options, $decryption_iv);
                            echo str_repeat('*', strlen($password));
                        ?>
                    </td>
                    <td><?= $adm->role ?></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-warning float-right" data-toggle="modal" onclick="togglePassword(<?= $adm->id_admin ?>, '<?= $password ?>')"><em class="fas fa-eye"></em> Show</button>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editAdmin<?= $adm->id_admin ?>"><em class="fas fa-edit"></em> Edit</button>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal<?= $adm->id_admin  ?>"><em class="fas fa-trash"></em> Delete</button>
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
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Role</th>
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
        if(count($unverifieduser->result())>0){
    ?>

    <div class="container p-4" id="bg-template">
        <h1 class="mb-4">List of Unverified Users</h1>
        <hr>

        <table id="no_export" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    foreach($unverifieduser->result() as $unuser){
                ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $unuser->username ?></td>
                    <td><?= $unuser->email ?></td>
                    <td id="<?= $unuser->id_admin ?>">
                        <?php 
                            // Variabel untuk decrypt
                            $ciphering = "AES-128-CTR";
                            $iv_length = openssl_cipher_iv_length($ciphering);
                            $options = 0;
                            $decryption_iv = "1234567891011121";
                            $decryption_key = "ddsdsctelkom";
                            $password = openssl_decrypt($unuser->password, $ciphering, $decryption_key, $options, $decryption_iv);
                            echo str_repeat('*', strlen($password));
                        ?>
                    </td>
                    <td><?= $adm->role ?></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#verifyUser<?= $unuser->id_admin ?>">Verify</button>
                        </div>
                    </td>
                </tr>

                <div class="modal fade" id="verifyUser<?= $unuser->id_admin ?>"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Verification Confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Verify this user?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <form method="post" action="<?= base_url() ?>pages/Account/verify_user/<?= $unuser->id_admin ?>">
                                <button type="submit" class="btn btn-primary">Verify</button>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
                
                <?php
                    }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <?php
        }
    ?>

    <?php
        if(count($requestforgetpassworduser->result())>0){
    ?>

    <div class="container p-4" id="bg-template">
        <h1 class="mb-4">List of Forgot Password User</h1>
        <hr>

        <table id="no_export" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    foreach($requestforgetpassworduser->result() as $unuser){
                ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $unuser->username ?></td>
                    <td><?= $unuser->email ?></td>
                    <td id="<?= $unuser->id_admin ?>">
                        <?php 
                            // Variabel untuk decrypt
                            $ciphering = "AES-128-CTR";
                            $iv_length = openssl_cipher_iv_length($ciphering);
                            $options = 0;
                            $decryption_iv = "1234567891011121";
                            $decryption_key = "ddsdsctelkom";
                            $password = openssl_decrypt($unuser->password, $ciphering, $decryption_key, $options, $decryption_iv);
                            echo str_repeat('*', strlen($password));
                        ?>
                    </td>
                    <td><?= $adm->role ?></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#requestPassword<?= $unuser->id_admin ?>">Send password</button>
                        </div>
                    </td>
                </tr>

                <div class="modal fade" id="requestPassword<?= $unuser->id_admin ?>"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Request Password Confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Send password to their email?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <form method="post" action="<?= base_url() ?>pages/Account/send_password/<?= $unuser->id_admin ?>">
                                <button type="submit" class="btn btn-primary">Send</button>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
                
                <?php
                    }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Role</th>
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