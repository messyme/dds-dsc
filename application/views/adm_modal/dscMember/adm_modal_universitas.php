<!-- Add Groups Modal -->
<div class="modal fade" id="addUniv"  role="dialog" aria-labelledby="addUnivModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addUnivModalLabel">Add Data University</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataDscMembers/add_data_univ">
                    <div class="form-group ml-auto">
                        <label class="required" for="nama_universitas">University Names</label>
                        <input type="text" class="text-uppercase form-control" id="nama_universitas" name="nama_universitas" placeholder="example : XYZ" required="required">
                    </div>
                    <input type="hidden" name="code" value="private">

                    <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-block" id="submit">Add Data University</button>
                </form>
            </div>
            <!-- eof body -->
        </div>
    </div>
</div>
<!-- end of Add Groups Modal -->

<!-- edit groups modal -->
<?php
foreach ($universitas->result() as $univ) {
?>
    <div class="modal fade" id="editUniv<?= $univ->kode_universitas ?>"  role="dialog" aria-labelledby="editUniv" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="editUniv">Edit Data University</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- eof header -->
                <!-- body -->
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataDscMembers/edit_data_univ">
                        <div class="form-group ml-auto">
                            <label class="required" for="nama_universitas">University Names</label>
                            <input type="text" class="text-uppercase form-control" id="nama_universitas" name="nama_universitas" value="<?= $univ->nama_universitas ?>" required="required">
                            <input type="hidden" name="kode_universitas" id="kode_universitas" value="<?= $univ->kode_universitas ?>">
                        </div>
                        <input type="hidden" name="code" value="private">

                        <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block" id="submit">Edit Data Universitas</button>
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
foreach ($universitas->result() as $univ) {
?>
    <div class="modal fade" id="deleteUniv<?= $univ->kode_universitas ?>"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a id="btn-delete" class="btn btn-danger" href="<?= base_url() ?>pages/OtherDataDscMembers/delete_data_univ/<?= $univ->kode_universitas ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- end of Delete Confirmation-->