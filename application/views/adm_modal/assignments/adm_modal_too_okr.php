<!-- Add too_okr Modal -->
<div class="modal fade" id="addTooOkr"  role="dialog" aria-labelledby="addTooOkrModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addTooOkrModalLabel">Add Data Output Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataAssignment/add_data_too_okr">
                    <div class="form-group ml-auto">
                        <label class="required" for="nama_too_okr">Output Type Names</label>
                        <input type="text" class="text-uppercase form-control" id="nama_too_okr" name="nama_too_okr" placeholder="example : Milestone" required="required">
                    </div>
                    <input type="hidden" name="code" value="private">

                    <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-block" id="submit">Add Data Output Type</button>
                </form>
            </div>
            <!-- eof body -->
        </div>
    </div>
</div>
<!-- end of Add too_okr Modal -->

<!-- edit too_okr modal -->
<?php
foreach ($too_okr->result() as $ot) {
?>
    <div class="modal fade" id="editTooOkr<?= $ot->id_too_okr ?>"  role="dialog" aria-labelledby="editTooOkr" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="editTooOkr">Edit Data Output Type</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- eof header -->
                <!-- body -->
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataAssignment/edit_data_too_okr">
                        <div class="form-group ml-auto">
                            <label class="required" for="nama_too_okr">Output Type Names</label>
                            <input type="text" class="text-uppercase form-control" id="nama_too_okr" name="nama_too_okr" value="<?= $ot->nama_too_okr ?>" required="required">
                            <input type="hidden" name="id_too_okr" id="id_too_okr" value="<?= $ot->id_too_okr ?>">
                        </div>
                        <input type="hidden" name="code" value="private">

                        <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block" id="submit">Edit Data Output Type</button>
                    </form>
                </div>
                <!-- eof body -->
            </div>
        </div>
    </div>
<?php } ?>
<!-- eof edit too_okr modal -->

<!-- Delete Confirmation-->
<?php
foreach ($too_okr->result() as $ot) {
?>
    <div class="modal fade" id="deleteTooOkr<?= $ot->id_too_okr ?>"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a id="btn-delete" class="btn btn-danger" href="<?= base_url() ?>pages/OtherDataAssignment/delete_data_too_okr/<?= $ot->id_too_okr ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- end of Delete Confirmation-->