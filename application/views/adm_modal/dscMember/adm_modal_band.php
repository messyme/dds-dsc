<!-- Add band Modal -->
<div class="modal fade" id="addBand"  role="dialog" aria-labelledby="addBandModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addBandModalLabel">Add Data Band</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataDscMembers/add_data_band">
                    <div class="form-group ml-auto">
                        <label class="required" for="nama_band">Band Name</label>
                        <input type="text" class="text-uppercase form-control" id="nama_band" name="nama_band" placeholder="example : III" required="required">
                    </div>
                    <input type="hidden" name="code" value="private">

                    <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-block" id="submit">Add Data Band</button>
                </form>
            </div>
            <!-- eof body -->
        </div>
    </div>
</div>
<!-- end of Add band Modal -->

<!-- edit band modal -->
<?php
foreach ($band->result() as $bd) {
?>
    <div class="modal fade" id="editBand<?= $bd->id_band ?>"  role="dialog" aria-labelledby="editStatus" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="editBand">Edit Data Band</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- eof header -->
                <!-- body -->
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataDscMembers/edit_data_band">
                        <div class="form-group ml-auto">
                            <label class="required" for="nama_band">Band Name</label>
                            <input type="text" class="text-uppercase form-control" id="nama_band" name="nama_band" value="<?= $bd->nama_band ?>" required="required">
                            <input type="hidden" name="id_band" id="id_band" value="<?= $bd->id_band ?>">
                        </div>
                        <input type="hidden" name="code" value="private">

                        <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block" id="submit">Edit Data Band</button>
                    </form>
                </div>
                <!-- eof body -->
            </div>
        </div>
    </div>
<?php } ?>
<!-- eof edit band modal -->

<!-- Delete Confirmation-->
<?php
foreach ($band->result() as $bd) {
?>
    <div class="modal fade" id="deleteBand<?= $bd->id_band ?>"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a id="btn-delete" class="btn btn-danger" href="<?= base_url() ?>pages/OtherDataDscMembers/delete_data_band/<?= $bd->id_band ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- end of Delete Confirmation-->