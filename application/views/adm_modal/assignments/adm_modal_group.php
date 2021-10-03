<!-- Add Groups Modal -->
<div class="modal fade" id="addGroups"  role="dialog" aria-labelledby="addGroupsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addGroupsModalLabel">Add Data Groups</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/Assignments/add_data_group">
                    <div class="form-group ml-auto">
                        <label class="required" for="nama_groups">Groups Name</label>
                        <input type="text" class="text-uppercase form-control" id="nama_groups" name="nama_groups" placeholder="Example: XYZ" required="required">
                    </div>
                    <input type="hidden" name="code" value="private">

                    <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-block" id="submit">Add Data Groups</button>
                </form>
            </div>
            <!-- eof body -->
        </div>
    </div>
</div>
<!-- end of Add Groups Modal -->

<!-- edit groups modal -->
<?php
foreach ($groups->result() as $g) {
?>
    <div class="modal fade" id="editGroup<?= $g->id_groups ?>"  role="dialog" aria-labelledby="editGroup" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="editGroup">Edit Data Group</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- eof header -->
                <!-- body -->
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/Assignments/edit_data_group">
                        <div class="form-group ml-auto">
                            <label class="required" for="nama_groups">Groups Name</label>
                            <input type="text" class="text-uppercase form-control" id="nama_groups" name="nama_groups" value="<?= $g->nama_groups ?>" required="required">
                            <input type="hidden" name="id_groups" id="id_groups" value="<?= $g->id_groups ?>">
                        </div>
                        <input type="hidden" name="code" value="private">

                        <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block" id="submit">Edit Data Group</button>
                    </form>
                </div>
                <!-- eof body -->
            </div>
        </div>
    </div>
<?php } ?>
<!-- eof edit groups modal -->

<!-- Delete Confirmation-->
<?php
foreach ($groups->result() as $g) {
?>
    <div class="modal fade" id="deleteModal<?= $g->id_groups ?>"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a id="btn-delete" class="btn btn-danger" href="<?= base_url() ?>pages/Assignments/delete_data_group/<?= $g->id_groups ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- end of Delete Confirmation-->