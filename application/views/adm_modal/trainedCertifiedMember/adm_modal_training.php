<!-- Add Training Modal -->
<div class="modal fade" id="addTraining"  role="dialog" aria-labelledby="addTrainingLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addTrainingLabel">Add Data Training</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/MemberSkills/add_data_training">
                    <div class="form-group ml-auto">
                        <label class="required" for="nama_training">Training Name</label>
                        <input type="text" class="text-uppercase form-control" id="nama_training" name="nama_training" placeholder="example : Pelatihan AI" required="required">
                    </div>
                    <input type="hidden" name="code" value="private">

                    <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-block" id="submit">Add Data Training</button>
                </form>
            </div>
            <!-- eof body -->
        </div>
    </div>
</div>
<!-- end of Add Training Modal -->

<!-- edit Training modal -->
<?php
foreach ($training->result() as $t) {
?>
    <div class="modal fade" id="editTraining<?= $t->id_training ?>"  role="dialog" aria-labelledby="editTrainingLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="editTrainingLabel">Edit Data Training</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- eof header -->
                <!-- body -->
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/MemberSkills/edit_data_training">
                        <div class="form-group ml-auto">
                            <label class="required" for="nama_training">Training Name</label>
                            <input type="text" class="text-uppercase form-control" id="nama_training" name="nama_training" value="<?= $t->nama_training ?>" required="required">
                            <input type="hidden" name="id_training" id="id_training" value="<?= $t->id_training ?>">
                        </div>
                        <input type="hidden" name="code" value="private">

                        <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block" id="submit">Edit Data Training</button>
                    </form>
                </div>
                <!-- eof body -->
            </div>
        </div>
    </div>
<?php } ?>
<!-- eof edit Training modal -->

<!-- Delete Confirmation-->
<?php
foreach ($training->result() as $t) {
?>
    <div class="modal fade" id="deleteModal<?= $t->id_training ?>"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a id="btn-delete" class="btn btn-danger" href="<?= base_url() ?>pages/MemberSkills/delete_data_training/<?= $t->id_training ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- end of Delete Confirmation-->