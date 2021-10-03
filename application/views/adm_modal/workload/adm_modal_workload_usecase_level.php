<!-- Add Usecase Level Modal -->
<div class="modal fade" id="addWorkloadUsecaseLevel"  role="dialog" aria-labelledby="addWorkloadUsecaseLevelLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addWorkloadUsecaseLevelLabel">Add Data Use Case Level</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataWorkload/add_workload_usecase_level">
                    <div class="form-group ml-auto">
                        <label class="required" for="nama_workload_usecase_level">Use Case Level Name</label>
                        <input type="text" class="text-uppercase form-control" id="nama_workload_usecase_level" name="nama_workload_usecase_level" placeholder="example: Difficult" required="required">
                    </div>
                    <input type="hidden" name="code" value="private">

                    <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-block" id="submit">Add Data Use Case Level</button>
                </form>
            </div>
            <!-- eof body -->
        </div>
    </div>
</div>
<!-- End of Add Use Case Level Modal -->

<!-- edit category_okr modal -->
<?php
foreach ($workload_usecase_level->result() as $bd) {
?>
    <div class="modal fade" id="editWorkloadUsecaseLevel<?= $bd->id_workload_usecase_level ?>"  role="dialog" aria-labelledby="editWorkloadUsecaseLevelLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="editWorkloadUsecaseLevelLabel">Edit Data Use Case Level</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- eof header -->
                <!-- body -->
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataWorkload/edit_workload_usecase_level">
                        <div class="form-group ml-auto">
                            <label class="required" for="nama_workload_usecase_level">Use Case Level Name</label>
                            <input type="text" class="text-uppercase form-control" id="nama_workload_usecase_level" name="nama_workload_usecase_level" value="<?= $bd->nama_workload_usecase_level ?>" required="required">
                            <input type="hidden" name="id_workload_usecase_level" id="id_workload_usecase_level" value="<?= $bd->id_workload_usecase_level ?>">
                        </div>
                        <input type="hidden" name="code" value="private">

                        <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block" id="submit">Edit Data Use Case Level</button>
                    </form>
                </div>
                <!-- eof body -->
            </div>
        </div>
    </div>
<?php } ?>
<!-- End of Edit Use Case Level Modal -->

<!-- Delete Confirmation-->
<?php
foreach ($workload_usecase_level->result() as $bd) {
?>
    <div class="modal fade" id="deleteWorkloadUsecaseLevel<?= $bd->id_workload_usecase_level ?>"  role="dialog" aria-labelledby="deleteWorkloadUsecaseLevelLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteWorkloadUsecaseLevelLabel">Delete Confirmation</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure you want to delete this data?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a id="btn-delete" class="btn btn-danger" href="<?= base_url() ?>pages/OtherDataWorkload/delete_workload_usecase_level/<?= $bd->id_workload_usecase_level ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- end of Delete Confirmation-->


