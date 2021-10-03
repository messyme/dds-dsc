<!-- Add Admin Modal -->
<div class="modal fade" id="addAdmin"  role="dialog" aria-labelledby="addAdminModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addAdminModalLabel">Add Data Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/Account/add_data_admin">
                    <div class="form-group ml-auto">
                        <label class="required" for="nama">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="example : admin" required="required">
                    </div>
                    <div class="form-group">
                        <label class="required" for="email">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="********" required="required">
                    </div>
                    <div class="form-group">
                        <label class="required" for="role">Select Role</label>
                        <select class="form-control" id="role" name="role" required="required">
                            <option value='' selected disabled>Choose Role</option>
                            <option value='superadmin'>Super Admin</option>
                            <option value='admin'>Admin</option>
                            <option value='user'>User</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-block" id="submit">Add Data Admin</button>
                </form>
            </div>
            <!-- eof body -->
        </div>
    </div>
</div>
<!-- end of Add Admin Modal -->

<!-- edit admin modal -->
<?php
foreach ($admin->result() as $adm) {
    $ciphering = "AES-128-CTR";
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
    $decryption_iv = "1234567891011121";
    $decryption_key = "ddsdsctelkom";
    $password = openssl_decrypt($adm->password, $ciphering, $decryption_key, $options, $decryption_iv);
?>
    <div class="modal fade" id="editAdmin<?= $adm->id_admin ?>"  role="dialog" aria-labelledby="editAdmin" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="editAdmin">Edit Data Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- eof header -->
                <!-- body -->
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/Account/edit_data_admin">
                        <div class="form-group ml-auto">
                            <label class="required" for="username">Username</label>
                            <input type="text" class="boks form-control" id="username" name="username" value="<?= $adm->username ?>" required="required">
                            <input type="hidden" name="id_admin" id="id_admin" value="<?= $adm->id_admin ?>">
                        </div>
                        <div class="form-group">
                            <label class="required" for="email">Email Address</label>
                            <input type="email" class="boks form-control" id="email" name="email" value="<?= $adm->email ?>" required="required">
                            <input type="hidden" name="id_admin" id="id_admin" value="<?= $adm->id_admin ?>">
                        </div>
                        <div class="form-group ml-auto">
                            <label for="new_password">New Password</label>
                            <input type="password" class="boks form-control" id="new_password" name="new_password" placeholder="*******" required="required" value="<?= $password ?>">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="role">Select Role</label>
                            <select class="form-control" id="role" name="role" required="required">
                                <option value='' selected disabled>Choose Role</option>
                                <option value='superadmin' <?php if ($adm->role == 'superadmin') { ?> selected <?php } ?>>Super Admin</option>
                                <option value='admin' <?php if ($adm->role == 'admin') { ?> selected <?php } ?>>Admin</option>
                                <option value='user' <?php if ($adm->role == 'user') { ?> selected <?php } ?>>User</option>
                            </select>
                        </div>

                        <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block" id="submit">Edit Data Admin</button>
                    </form>
                </div>
                <!-- eof body -->
            </div>
        </div>
    </div>
<?php } ?>
<!-- eof edit admin modal -->

<!-- Delete Confirmation-->
<?php
foreach ($admin->result() as $adm) {
?>
    <div class="modal fade" id="deleteModal<?= $adm->id_admin ?>"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure want to delete this data?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a id="btn-delete" class="btn btn-danger" href="<?= base_url() ?>pages/Account/delete_data_admin/<?= $adm->id_admin ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- end of Delete Confirmation-->