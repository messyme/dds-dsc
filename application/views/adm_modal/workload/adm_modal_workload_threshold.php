<!-- Add Workload Threshold Member Modal -->
<div class="modal fade" id="addWorkloadThresholdMember"  role="dialog" aria-labelledby="addaddWorkloadThresholdMemberLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="addWorkloadThresholdMemberLabel">Add Data Workload Threshold Member</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- eof header -->
                <!-- body -->
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataWorkload/add_workload_threshold_member">

                        <div class="form-group ml-auto">
                            <label class="required" for="id_posisi_type">Type Position</label>
                            <br>
                            <select class="form-control select2position" id="id_posisi_type" name="id_posisi_type" required="required">
                                <option selected disabled value="">Choose Position</option>
                                <?php
                                    foreach($posisi_type->result() as $pos){
                                        echo '<option value="'.$pos->id_posisi_type.'">'.$pos->nama_posisi_type.'</option>';
                                    }
                                    ?>
                            </select>
                        </div>
                        
                        <div class="form-group ml-auto">
                            <label class="required" for="id_posisi_level">Position Level</label>
                            <br>
                            <select class="form-control select2level" id="id_posisi_level" name="id_posisi_level" required="required">
                                <option selected disabled value="">Choose Level</option>
                                <?php
                                    foreach($posisi_level->result() as $lvp){
                                        echo '<option value="'.$lvp->id_posisi_level.'">'.$lvp->nama_posisi_level.'</option>';
                                    }
                                    ?>
                            </select>
                        </div>

                        <div class="form-group ml-auto">
                            <label class="required" for="member_threshold">Threshold</label>
                            <input class="form-control" type="number" id="member_threshold" name="member_threshold" required="required">
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
    <!-- end of Workload Threshold Member Modal -->

    <!-- edit Workload Threshold Member modal --> 
    <?php
    foreach ($workload_threshold_member->result() as $wt) {
    ?>
        <div class="modal fade" id="editWorkloadThresholdMember<?= $wt->id_workload_threshold_member ?>"  role="dialog" aria-labelledby="editeditWorkloadThresholdMemberLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!-- header -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="editWorkloadThresholdMemberLabel">Edit Workload Threshold Member</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- eof header -->
                    <!-- body -->
                    <div class="modal-body">
                        <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataWorkload/edit_workload_threshold_member">
                            <input type="hidden" id="id_workload_threshold_member" name="id_workload_threshold_member" value="<?= $wt->id_workload_threshold_member ?>">

                            <div class="form-group ml-auto">
                                <label class="required" for="id_posisi_type">Type Position</label>
                                <br>
                                <select class="form-control select2position" id="id_posisi_type" name="id_posisi_type">
                                    <option selected value="<?= $wt->posisi_type ?>"><?= $wt->nama_posisi_type ?></option>
                                    <?php
                                        foreach($posisi_type->result() as $pos){
                                            if($wt->posisi_type == $pos->id_posisi_type){

                                            }
                                            else{
                                                echo '<option value="'.$pos->id_posisi_type.'">'.$pos->nama_posisi_type.'</option>';
                                            }
                                        }
                                        ?>
                                </select>
                            </div>
                            
                            <div class="form-group ml-auto">
                                <label class="required" for="id_posisi_level">Position Level</label>
                                <br>
                                <select class="form-control select2level" id="id_posisi_level" name="id_posisi_level">
                                    <option selected value="<?= $wt->posisi_level ?>"><?= $wt->nama_posisi_level ?></option>
                                    <?php
                                        foreach($posisi_level->result() as $lvp){
                                            if($wt->posisi_level == $lvp->id_posisi_level){

                                            }
                                            else{
                                                echo '<option value="'.$lvp->id_posisi_level.'">'.$lvp->nama_posisi_level.'</option>';
                                            }
                                        }
                                        ?>
                                </select>
                            </div>

                            <div class="form-group ml-auto">
                                <label class="required" for="member_threshold">Threshold</label>
                                <input class="form-control" type="number" id="member_threshold" name="member_threshold" value=<?= $wt->threshold ?>>
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
    <!-- eof Workload Threshold Member modal -->

    <!-- Delete Workload Threshold Member Confirmation-->
    <?php
        foreach ($workload_threshold_member->result() as $wt) {
    ?>
    <div class="modal fade" id="deleteWorkloadMemberModal<?= $wt->id_workload_threshold_member ?>"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a id="btn-delete" class="btn btn-danger" href="<?= base_url() ?>pages/OtherDataWorkload/delete_data_workloadthresholdmember/<?= $wt->id_workload_threshold_member ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <!-- end of Delete Workload Threshold Member Confirmation-->

    <!-- Add Workload Threshold Usecase Modal -->
    <div class="modal fade" id="addWorkloadThresholdUsecase"  role="dialog" aria-labelledby="addWorkloadThresholdUsecaseLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="addWorkloadThresholdUsecaseLabel">Add Data Workload Threshold Usecase</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- eof header -->
                <!-- body -->
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataWorkload/add_workload_threshold_usecase">

                        <div class="form-group ml-auto">
                            <label class="required" for="id_level">Level</label>
                            <br>
                            <select class="form-control select2level" id="id_level" name="id_level" required="required">
                                <option selected disabled value="">Choose Level</option>
                                <?php
                                    foreach($workload_usecase_level->result() as $lvu){
                                        echo '<option value="'.$lvu->id_workload_usecase_level.'">'.$lvu->nama_workload_usecase_level.'</option>';
                                    }
                                    ?>
                            </select>
                        </div>

                        <div class="form-group ml-auto">
                            <label class="required" for="usecase_threshold">Threshold</label>
                            <input class="form-control" type="number" id="usecase_threshold" name="usecase_threshold" required="required">
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
    <!-- end of Workload Threshold Usecase Modal -->

    <!-- edit Workload Threshold Usecase modal --> 
    <?php
    foreach ($workload_threshold_usecase->result() as $wtu) {
    ?>
        <div class="modal fade" id="editWorkloadThresholdUsecase<?= $wtu->id_workload_threshold_usecase ?>"  role="dialog" aria-labelledby="editeditWorkloadThresholdUsecaseLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!-- header -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="editWorkloadThresholdUsecaseLabel">Edit Workload Threshold Usecase</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- eof header -->
                    <!-- body -->
                    <div class="modal-body">
                        <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataWorkload/edit_workload_threshold_usecase">
                            <input type="hidden" id="id_workload_threshold_usecase" name="id_workload_threshold_usecase" value="<?= $wtu->id_workload_threshold_usecase ?>">

                            <div class="form-group ml-auto">
                                <label class="required" for="id_level">Level</label>
                                <br>
                                <select class="form-control select2level" id="id_level" name="id_level">
                                    <option selected value="<?= $wtu->level ?>"><?= $wtu->nama_workload_usecase_level ?></option>
                                    <?php
                                        foreach($workload_usecase_level->result() as $lvp){
                                            if($wtu->level == $lvp->id_workload_usecase_level){

                                            }
                                            else{
                                                echo '<option value="'.$lvp->id_workload_usecase_level.'">'.$lvp->nama_workload_usecase_level.'</option>';
                                            }
                                        }
                                        ?>
                                </select>
                            </div>

                            <div class="form-group ml-auto">
                                <label class="required" for="usecase_threshold">Threshold</label>
                                <input class="form-control" type="number" id="usecase_threshold" name="usecase_threshold" value=<?= $wtu->threshold ?>>
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
    <!-- eof Workload Threshold Usecase modal -->

    <!-- Delete Workload Threshold Usecase Confirmation-->
    <?php
        foreach ($workload_threshold_usecase->result() as $wtu) {
    ?>
    <div class="modal fade" id="deleteWorkloadUsecaseModal<?= $wtu->id_workload_threshold_usecase ?>"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a id="btn-delete" class="btn btn-danger" href="<?= base_url() ?>pages/OtherDataWorkload/delete_data_workloadthresholdusecase/<?= $wtu->id_workload_threshold_usecase ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <!-- end of Delete Workload Threshold Usecase Confirmation-->