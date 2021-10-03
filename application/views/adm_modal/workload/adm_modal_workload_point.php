<!-- Add Usecase Level Modal -->
<div class="modal fade" id="addWorkloadPointUsecase"  role="dialog" aria-labelledby="addWorkloadPointUsecaseLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addWorkloadPointUsecaseLabel">Add Data Use Case Workload Point</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataWorkload/add_workload_point_usecase">
                    <div class="form-group">
                        <label class="required" for="level">Use Case Level</label>
                        <select class="form-control" id="level" name="level" required="level" style="text-transform:uppercase">
                            <option selected disabled style="text-transform:capitalize">Choose Use Case Level</option>
                            <?php
                            foreach ($workload_usecase_level->result() as $s) {
                                echo '<option value="' . $s->id_workload_usecase_level . '" style="text-transform:uppercase">' . $s->nama_workload_usecase_level . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group ml-auto">
                        <label class="required" for="point">Point</label>
                        <input type="number" class="text-uppercase form-control" id="point" name="point" placeholder="example: 10" required="required">
                    </div>
                    <input type="hidden" name="code" value="private">

                    <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-block" id="submit">Add Data Use Case Workload Point</button>
                </form>
            </div>
            <!-- eof body -->
        </div>
    </div>
</div>
<!-- End of Add Use Case Level Modal -->

<!-- edit category_okr modal -->
<?php
foreach ($workload_point_usecase->result() as $bd) {
?>
    <div class="modal fade" id="editWorkloadPointUsecase<?= $bd->id_workload_point_usecase ?>"  role="dialog" aria-labelledby="editWorkloadPointUsecaseLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="editWorkloadPointUsecaseLabel">Edit Data Use Case Workload Point</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- eof header -->
                <!-- body -->
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataWorkload/edit_workload_point_usecase">
                        <div class="form-group">
                            <label class="required" for="level">Use Case Level</label>
                            <input type="text" class="text-uppercase form-control" value="<?= $bd->nama_workload_usecase_level ?>" required="required" readonly="readonly" style="text-transform:uppercase">
                            <input type="hidden" class="text-uppercase form-control" id="level" name="level" value="<?= $bd->id_workload_usecase_level ?>" required="required" readonly="readonly" style="text-transform:uppercase">
                        </div>

                        <div class="form-group ml-auto">
                            <label class="required" for="point">Point</label>
                            <input type="number" class="text-uppercase form-control" id="point" name="point" value="<?= $bd->point ?>" required="required">
                            <input type="hidden" name="id_workload_point_usecase" id="id_workload_point_usecase" value="<?= $bd->id_workload_point_usecase ?>">
                        </div>
                        
                        <input type="hidden" name="code" value="private">

                        <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block" id="submit">Edit Data Use Case Workload Point</button>
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
foreach ($workload_point_usecase->result() as $bd) {
?>
    <div class="modal fade" id="deleteWorkloadPointUsecase<?= $bd->id_workload_point_usecase ?>"  role="dialog" aria-labelledby="deleteWorkloadPointUsecaseLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteWorkloadPointUsecaseLabel">Delete Confirmation</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure you want to delete this data?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a id="btn-delete" class="btn btn-danger" href="<?= base_url() ?>pages/OtherDataWorkload/delete_workload_point_usecase/<?= $bd->id_workload_point_usecase ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- end of Delete Confirmation-->

<!-- Add Usecase Level Modal -->
<div class="modal fade" id="addWorkloadPointMember"  role="dialog" aria-labelledby="addWorkloadPointMemberLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addWorkloadPointMemberLabel">Add Data Member Workload Point</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataWorkload/add_workload_point_member">
                    <div class="form-group">
                        <label class="required" for="posisi_type">Position Type</label>
                        <select class="form-control" id="posisi_type" name="posisi_type" required="posisi_type" style="text-transform:uppercase">
                            <option selected disabled style="text-transform:capitalize">Choose Position Type</option>
                            <?php
                            foreach ($posisi_type->result() as $s) {
                                echo '<option value="' . $s->id_posisi_type . '" style="text-transform:uppercase">' . $s->nama_posisi_type . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="required" for="posisi_type">Position Level</label>
                        <select class="form-control" id="posisi_level" name="posisi_level" required="posisi_level" style="text-transform:uppercase">
                            <option selected disabled >Choose Position Level</option>
                            <?php
                            foreach ($posisi_level->result() as $s) {
                                echo '<option value="' . $s->id_posisi_level . '" style="text-transform:uppercase">' . $s->nama_posisi_level . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group ml-auto">
                        <label class="required" for="point">Point</label>
                        <input type="number" class="text-uppercase form-control" id="point" name="point" placeholder="example: 10" required="required">
                    </div>
                    <input type="hidden" name="code" value="private">

                    <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-block" id="submit">Add Data Member Workload Point</button>
                </form>
            </div>
            <!-- eof body -->
        </div>
    </div>
</div>
<!-- End of Add Use Case Level Modal -->

<!-- edit category_okr modal -->
<?php
foreach ($workload_point_member->result() as $bd) {
?>
    <div class="modal fade" id="editWorkloadPointMember<?= $bd->id_workload_point_member ?>"  role="dialog" aria-labelledby="editWorkloadPointMemberLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="editWorkloadPointMemberLabel">Edit Data Member Workload Point</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- eof header -->
                <!-- body -->
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataWorkload/edit_workload_point_member">
                        <div class="form-group">
                            <label class="required" for="posisi_type">Position Type</label>
                            <input type="text" class="text-uppercase form-control" value="<?= $bd->nama_posisi_type ?>" required="required" readonly="readonly" style="text-transform:uppercase">
                            <input type="hidden" class="text-uppercase form-control" id="posisi_type" name="posisi_type" value="<?= $bd->id_posisi_type ?>" required="required" readonly="readonly" style="text-transform:uppercase">
                        </div>

                        <div class="form-group">
                            <label class="required" for="posisi_level">Position Level</label>
                            <input type="text" class="text-uppercase form-control" value="<?= $bd->nama_posisi_level ?>" required="required" readonly="readonly" style="text-transform:uppercase">
                            <input type="hidden" class="text-uppercase form-control" id="posisi_level" name="posisi_level" value="<?= $bd->id_posisi_level ?>" required="required" readonly="readonly" style="text-transform:uppercase">
                        </div>

                        <div class="form-group ml-auto">
                            <label class="required" for="point">Point</label>
                            <input type="number" class="text-uppercase form-control" id="point" name="point" value="<?= $bd->point ?>" required="required">
                            <input type="hidden" name="id_workload_point_member" id="id_workload_point_member" value="<?= $bd->id_workload_point_member ?>">
                        </div>
                        
                        <input type="hidden" name="code" value="private">

                        <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block" id="submit">Edit Data Member Workload Point</button>
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
foreach ($workload_point_member->result() as $bd) {
?>
    <div class="modal fade" id="deleteWorkloadPointMember<?= $bd->id_workload_point_member ?>"  role="dialog" aria-labelledby="deleteWorkloadPointMemberLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteWorkloadPointMemberLabel">Delete Confirmation</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure you want to delete this data?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a id="btn-delete" class="btn btn-danger" href="<?= base_url() ?>pages/OtherDataWorkload/delete_workload_point_member/<?= $bd->id_workload_point_member ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- end of Delete Confirmation-->
