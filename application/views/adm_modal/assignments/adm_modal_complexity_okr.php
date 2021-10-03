<!-- Add ComplexityOkr Modal -->
<div class="modal fade" id="addComplexityOkr"  role="dialog" aria-labelledby="addComplexityOkrModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addComplexityOkrModalLabel">Add Data Complexity OKR</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataAssignment/add_data_complexity_okr">
                    <div class="form-group ml-auto">
                        <label class="required" for="nama_complexity_okr">Complexity OKR Name</label>
                        <input type="number" class="text-uppercase form-control" id="nama_complexity_okr" name="nama_complexity_okr" placeholder="example : 1" required="required">
                    </div>
                    <input type="hidden" name="code" value="private">

                    <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-block" id="submit">Add Data Complexity OKR</button>
                </form>
            </div>
            <!-- eof body -->
        </div>
    </div>
</div>
<!-- end of Add ComplexityOkr Modal -->

<!-- edit ComplexityOkr modal -->
<?php
foreach ($complexity_okr->result() as $ps) {
?>
    <div class="modal fade" id="editComplexityOkr<?= $ps->id_complexity_okr ?>"  role="dialog" aria-labelledby="editComplexityOkr" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="editComplexityOkr">Edit Data Complexity OKR</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- eof header -->
                <!-- body -->
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataAssignment/edit_data_complexity_okr">
                        <div class="form-group ml-auto">
                            <label class="required" for="nama_complexity_okr">Complexity OKR Name</label>
                            <input type="number" class="text-uppercase form-control" id="nama_complexity_okr" name="nama_complexity_okr" value="<?= $ps->nama_complexity_okr ?>" required="required">
                            <input type="hidden" name="id_complexity_okr" id="id_complexity_okr" value="<?= $ps->id_complexity_okr ?>">
                        </div>
                        <input type="hidden" name="code" value="private">

                        <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block" id="submit">Edit Data Complexity OKR</button>
                    </form>
                </div>
                <!-- eof body -->
            </div>
        </div>
    </div>
<?php } ?>
<!-- eof edit ComplexityOkr modal -->

<!-- Delete Confirmation-->
<?php
foreach ($complexity_okr->result() as $ps) {
?>
    <div class="modal fade" id="deleteComplexityOkr<?= $ps->id_complexity_okr ?>"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a id="btn-delete" class="btn btn-danger" href="<?= base_url() ?>pages/OtherDataAssignment/delete_data_complexity_okr/<?= $ps->id_complexity_okr ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- end of Delete Confirmation-->