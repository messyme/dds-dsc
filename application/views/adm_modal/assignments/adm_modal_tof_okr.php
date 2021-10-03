<!-- Add tof_okr Modal -->
<div class="modal fade" id="addTofOkr"  role="dialog" aria-labelledby="addTofOkrModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addTofOkrModalLabel">Add Data Formula Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataAssignment/add_data_tof_okr">
                    <div class="form-group ml-auto">
                        <label class="required" for="nama_tof_okr">Formula Type Name</label>
                        <input type="text" class="text-uppercase form-control" id="nama_tof_okr" name="nama_tof_okr" placeholder="example : Higher Better" required="required">
                    </div>
                    <input type="hidden" name="code" value="private">

                    <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-block" id="submit">Add Data Formula Type</button>
                </form>
            </div>
            <!-- eof body -->
        </div>
    </div>
</div>
<!-- end of Add tof_okr Modal -->

<!-- edit tof_okr modal -->
<?php
foreach ($tof_okr->result() as $st) {
?>
    <div class="modal fade" id="editTofOkr<?= $st->id_tof_okr ?>"  role="dialog" aria-labelledby="editTofOkr" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="editTofOkr">Edit Data Formula Type</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- eof header -->
                <!-- body -->
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataAssignment/edit_data_tof_okr">
                        <div class="form-group ml-auto">
                            <label class="required" for="nama_tof_okr">Formula Type Name</label>
                            <input type="text" class="text-uppercase form-control" id="nama_tof_okr" name="nama_tof_okr" value="<?= $st->nama_tof_okr ?>" required="required">
                            <input type="hidden" name="id_tof_okr" id="id_tof_okr" value="<?= $st->id_tof_okr ?>">
                        </div>
                        <input type="hidden" name="code" value="private">

                        <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block" id="submit">Edit Data Formula Type</button>
                    </form>
                </div>
                <!-- eof body -->
            </div>
        </div>
    </div>
<?php } ?>
<!-- eof edit tof_okr modal -->

<!-- Delete Confirmation-->
<?php
foreach ($tof_okr->result() as $st) {
?>
    <div class="modal fade" id="deleteTofOkr<?= $st->id_tof_okr ?>"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a id="btn-delete" class="btn btn-danger" href="<?= base_url() ?>pages/OtherDataAssignment/delete_data_tof_okr/<?= $st->id_tof_okr ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- end of Delete Confirmation-->