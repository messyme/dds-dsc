<!-- Add subunit Modal -->
<div class="modal fade" id="addsubunit" role="dialog" aria-labelledby="addsubunit" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addsubunitlabel">Add Subunit Tribe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataAssignment/add_unit_tribe">
                    <div class="form-group ml-auto">
                        <label class="required" for="nama_unit">Subunit</label>
                        <input type="text" class="text-uppercase form-control" id="unit" name="unit" placeholder="example : Sector" required="required">
                    </div>
                    <input type="hidden" name="code" value="private">

                    <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-block" id="submit">Add Data</button>
                </form>
            </div>
            <!-- eof body -->
        </div>
    </div>
</div>
<!-- end of Add subunit Modal -->

<!-- edit subunit modal -->
<?php
foreach ($subunit->result() as $st) {
?>
    <div class="modal fade" id="editsubunit<?= $st->id_unit ?>" role="dialog" aria-labelledby="editsubunit" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="editTofOkr">Edit Data Subunit Tribe</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- eof header -->
                <!-- body -->
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataAssignment/edit_unit_tribe">
                        <div class="form-group ml-auto">
                            <label class="required" for="nama_unit">Subunit</label>
                            <input type="text" class="text-uppercase form-control" id="unit" name="unit" value="<?= $st->unit ?>" required="required">
                            <input type="hidden" name="id_unit" id="id_unit" value="<?= $st->id_unit ?>">
                        </div>

                        <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block" id="submit">Edit Data</button>
                    </form>
                </div>
                <!-- eof body -->
            </div>
        </div>
    </div>
<?php } ?>
<!-- eof edit subunit modal -->

<!-- Delete Confirmation-->
<?php
foreach ($subunit->result() as $st) {
?>
    <div class="modal fade" id="deletesubunit<?= $st->id_unit ?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a id="btn-delete" class="btn btn-danger" href="<?= base_url() ?>pages/OtherDataAssignment/delete_unit_tribe/<?= $st->id_unit ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- end of Delete Confirmation-->