<!-- Add Groups Modal -->
<div class="modal fade" id="addPosisiLevel"  role="dialog" aria-labelledby="addPosisiLevelModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addPosisiLevelModalLabel">Add Data Position Level</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataDscMembers/add_data_posisi_level">
                    <div class="form-group ml-auto">
                        <label class="required" for="nama_posisi">Position Level Name</label>
                        <input type="number" class="text-uppercase form-control" id="nama_posisi_level" name="nama_posisi_level" placeholder="example : 1" required="required">
                    </div>
                    <input type="hidden" name="code" value="private">

                    <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-block" id="submit">Add Data Position Level</button>
                </form>
            </div>
            <!-- eof body -->
        </div>
    </div>
</div>
<!-- end of Add Groups Modal -->

<!-- edit groups modal -->
<?php
foreach ($posisi_level->result() as $ps) {
?>
    <div class="modal fade" id="editPosisiLevel<?= $ps->id_posisi_level ?>"  role="dialog" aria-labelledby="editPosisiLevel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="editPosisiLevel">Edit Data Position Level</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- eof header -->
                <!-- body -->
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataDscMembers/edit_data_posisi_level">
                        <div class="form-group ml-auto">
                            <label class="required" for="nama_posisi_level">Position Level Name</label>
                            <input type="number" class="text-uppercase form-control" id="nama_posisi_level" name="nama_posisi_level" value="<?= $ps->nama_posisi_level ?>" required="required">
                            <input type="hidden" name="id_posisi_level" id="id_posisi_level" value="<?= $ps->id_posisi_level ?>">
                        </div>
                        <input type="hidden" name="code" value="private">

                        <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block" id="submit">Edit Data Position Level</button>
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
foreach ($posisi_level->result() as $ps) {
?>
    <div class="modal fade" id="deletePosisiLevel<?= $ps->id_posisi_level ?>"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a id="btn-delete" class="btn btn-danger" href="<?= base_url() ?>pages/OtherDataDscMembers/delete_data_posisi_level/<?= $ps->id_posisi_level ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- end of Delete Confirmation-->