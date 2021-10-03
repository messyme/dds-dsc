<!-- Add Groups Modal -->
<div class="modal fade" id="addPosisiType"  role="dialog" aria-labelledby="addPosisiTypeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addPosisiTypeModalLabel">Add Data Position Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataDscMembers/add_data_posisi_type">
                    <div class="form-group ml-auto">
                        <label class="required" for="nama_posisi">Position Type Name</label>
                        <input type="text" class="text-uppercase form-control" id="nama_posisi_type" name="nama_posisi_type" placeholder="example : Junior" required="required">
                    </div>
                    <input type="hidden" name="code" value="private">

                    <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-block" id="submit">Add Data Position Type</button>
                </form>
            </div>
            <!-- eof body -->
        </div>
    </div>
</div>
<!-- end of Add Groups Modal -->

<!-- edit groups modal -->
<?php
foreach ($posisi_type->result() as $ps) {
?>
    <div class="modal fade" id="editPosisiType<?= $ps->id_posisi_type ?>"  role="dialog" aria-labelledby="editPosisiType" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="editPosisiType">Edit Data Position Type</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- eof header -->
                <!-- body -->
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataDscMembers/edit_data_posisi_type">
                        <div class="form-group ml-auto">
                            <label class="required" for="nama_posisi_type">Position Type Name</label>
                            <input type="text" class="text-uppercase form-control" id="nama_posisi_type" name="nama_posisi_type" value="<?= $ps->nama_posisi_type ?>" required="required">
                            <input type="hidden" name="id_posisi_type" id="id_posisi_type" value="<?= $ps->id_posisi_type ?>">
                        </div>
                        <input type="hidden" name="code" value="private">

                        <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block" id="submit">Edit Data Position Type</button>
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
foreach ($posisi_type->result() as $ps) {
?>
    <div class="modal fade" id="deletePosisiType<?= $ps->id_posisi_type ?>"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a id="btn-delete" class="btn btn-danger" href="<?= base_url() ?>pages/OtherDataDscMembers/delete_data_posisi_type/<?= $ps->id_posisi_type ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- end of Delete Confirmation-->