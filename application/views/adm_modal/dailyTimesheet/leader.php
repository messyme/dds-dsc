<!-- Add Member Use Case Modal -->
<div class="modal fade" id="addMemberUseCase"  role="dialog" aria-labelledby="addMemberUseCaseLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addMemberUseCaseLabel">Add Member - <?= $leader_default->nama_usecase ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/AssignedUsecase/add_data_memberusecase_leader">
                    <div class="form-group">
                        <label class="required">Name</label>
                        <select class="select2member form-control" id="nik" name="nik" required="required" data-placeholder="Choose Member Name" style="width: 100%;">
                        <?php
                            foreach($member_dsc->result() as $md){
                                $cek = 0;
                                foreach($all_member_dsc_in_usecase->result() as $mb){
                                    if($md->nik == $mb->nik || $md->nik == $leader_usecase->nik){
                                        $cek = 1;
                                    }
                                }
                                if($cek == 0){
                                    echo '<option class="text-uppercase" value="'.$md->nik.'">'.$md->nik.' - '.$md->nama_member.'</option>';
                                }
                            }
                        ?>
                        <!-- < ?php
                            foreach($member_dsc->result() as $md){
                                if($md->nik != $this->session->userdata['username']){
                                    echo '<option class="text-uppercase" value="'.$md->nik.'">'.$md->nik.' - '.$md->nama_member.'</option>';
                                }
                            }
                        ?> -->
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="required">Status</label>
                        <select class="boks form-control" name="status_member" id="status_member" required="required">
                            <option disabled selected value="">Choose Member Status</option>
                            <option value="Dedicated">Dedicated</option>
                            <option value="Managed Service">Managed Service</option>
                        </select>
                    </div>
                    
                    <input type="hidden" name="code" value="private">
                    <input type="hidden" name="id_usecase_member" id="id_usecase_member" value="<?= $leader_default->id_usecase ?>">
                    <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-block" id="submit">Add Member</button>
                </form>
            </div>
            <!-- eof body -->
        </div>
    </div>
</div>
<!-- end of Add Member Use Case Modal -->

<!-- Delete Member Use Case -->

<?php
    foreach ($all_member_usecase->result() as $all_member_usecase) {
?>

<div class="modal fade" id="deleteMember/<?= $all_member_usecase->nik ?>/<?= $all_member_usecase->id_usecase ?>"  role="dialog" aria-labelledby="deleteMemberModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteMemberModal">Delete Confirmation</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure to delete this?
            </div>
            <div class="modal-footer">
                <form role="form" method="post" action="<?= base_url() ?>pages/DailyTimesheet/delete_member_usecase/<?= $all_member_usecase->nik ?>/<?= $all_member_usecase->id_usecase ?>">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger" id="submit">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    }
?>

<!-- end of Delete Member Use Case -->

<!-- Add Use Case Task-->
<div class="modal fade" id="addUseCaseTask" role="dialog" aria-labelledby="addUseCaseLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addUseCaseLabel">Add Activity</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/DailyTimesheet/add_usecase_task_leader">
                    <div class="form-group ml-auto">
                        <label class="required" for="date">Date</label>
                        <input type="date" class="form-control" name="date" id="date" required  value="<?= date('Y-m-d') ?>">
                    </div>

                    <div class="form-group" id="form_start_time_add">
                        <label for="start_time">Start Time</label>
                        <input type="time" class="form-control" name="start_time" id="start_time">
                    </div>

                    <div class="form-group" id="form_end_time_add">
                        <label for="end_time">End Time</label>
                        <input type="time" class="form-control" name="end_time" id="end_time">
                    </div>

                    <input type="hidden" class="form-control" id="id_reporter" name="id_reporter" value=<?=$nik?>>

                    <input type="hidden" class="form-control" id="id_assignee" name="id_assignee" value=<?=$nik?>>

                    <div class="form-group ml-auto" id="form_task_name_add">
                        <label class="required" for="task_name">Task Name</label>
                        <input type="text" class="text-uppercase form-control" id="task_name" name="task_name" placeholder="Task Name" required>
                    </div>

                    <div class="form-group" id="form_task_description_add">
                        <label class="required" for="task_name">Task Description</label>
                        <textarea type="text" rows="4" class="form-control" name="task_description" id="task_description" placeholder="Task Description" required></textarea>
                    </div>

                    <input type="hidden" name="id_usecase" id="id_usecase_add" value="<?= $leader_default->id_usecase ?>">

                    <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-block" id="submit">Add Use Case Task</button>
                </form>
            </div>
            <!-- eof body -->
        </div>
    </div>
</div>
<!-- end of Add Use Case Task -->

<!-- Send Use Case Task-->
<?php
    foreach($all_usecase_task->result() as $use_task){
?>
<div class="modal fade" id="sendUseCaseTask<?= $use_task->id_usecase_task ?>"  role="dialog" aria-labelledby="sendUseCaseTaskModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sendUseCaseTaskModal">Approval Confirmation</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure want to approve this?
            </div>
            <div class="modal-footer">
                <form role="form" method="post" action="<?= base_url() ?>pages/DailyTimesheet/send_usecase_task_leader/<?= $use_task->id_usecase_task ?>">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="submit">Approve</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    }
?>
<!-- end of Send Use Case Task-->

<!-- Edit Use Case Task-->
<?php
    foreach($all_usecase_task->result() as $use_task){
?>
<div class="modal fade" id="editUseCaseTask<?= $use_task->id_usecase_task ?>" role="dialog" aria-labelledby="editUseCaseTaskLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="editUseCaseTaskLabel">Edit Activity</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/DailyTimesheet/edit_usecase_task_leader">
                    <div class="form-group ml-auto">
                        <label class="required" for="date_edit">Date</label>
                        <input type="date" class="form-control" name="date_edit" id="date_edit" required value="<?= $use_task->date ?>">
                    </div>

                    <div class="form-group" id="form_start_time_edit_<?= $use_task->id_usecase_task ?>">
                        <label for="start_time_edit">Start Time</label>
                        <input type="time" class="form-control" name="start_time_edit" id="start_time_edit_<?= $use_task->id_usecase_task ?>" value="<?= $use_task->start_time ?>">
                    </div>

                    <div class="form-group" id="form_end_time_edit_<?= $use_task->id_usecase_task ?>">
                        <label for="end_time_edit">End Time</label>
                        <input type="time" class="form-control" name="end_time_edit" id="end_time_edit_<?= $use_task->id_usecase_task ?>" value="<?= $use_task->end_time ?>">
                    </div>

                    <input type="hidden" class="form-control" id="id_reporter_edit_<?= $use_task->id_usecase_task ?>" name="id_reporter_edit" value=<?=$nik?>>

                    <input type="hidden" class="form-control" id="id_assignee_edit<?= $use_task->id_usecase_task ?>" name="id_assignee_edit" value=<?=$nik?>>

                    <div class="form-group ml-auto" id="form_task_name_edit_<?= $use_task->id_usecase_task ?>">
                        <label for="task_name_edit">Task Name</label>
                        <input type="text" class="text-uppercase form-control" id="task_name_edit_<?= $use_task->id_usecase_task ?>" name="task_name_edit" placeholder="Task Name" value="<?= $use_task->task_name ?>">
                    </div>

                    <div class="form-group" id="form_task_description_edit_<?= $use_task->id_usecase_task ?>">
                        <label for="task_description_edit">Task Description</label>
                        <textarea type="text" rows="4" class="form-control" name="task_description_edit" id="task_description_edit_<?= $use_task->id_usecase_task ?>" placeholder="Task Description"><?= $use_task->task_description ?></textarea>
                    </div>

                    <input type="hidden" name="id_usecase_task_edit" id="id_usecase_task_edit" value="<?= $use_task->id_usecase_task ?>">

                    <input type="hidden" name="id_usecase_edit" id="id_usecase_edit" value="<?= $use_task->id_usecase ?>">

                    <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-block" id="submit">Edit Use Case Task</button>
                </form>
            </div>
            <!-- eof body -->
        </div>
    </div>
</div>
<?php
    }
?>
<!-- end of Edit Use Case Task -->

<!-- Delete Use Case Task-->
<?php
    foreach($all_usecase_task->result() as $use_task){
?>
<div class="modal fade" id="deleteUseCaseTask/<?= $use_task->id_usecase_task ?>/<?= $use_task->id_usecase ?>"  role="dialog" aria-labelledby="deleteUseCaseTaskModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteUseCaseTaskModal">Delete Confirmation</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure want to delete this?
            </div>
            <div class="modal-footer">
                <form role="form" method="post" action="<?= base_url() ?>pages/DailyTimesheet/delete_usecase_task_leader/<?= $use_task->id_usecase_task ?>/<?= $use_task->id_usecase ?>">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger" id="submit">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    }
?>
<!-- end of Delete Use Case Task-->

<!-- Send All Use Case Task-->
<div class="modal fade" id="sendAllUseCaseTask"  role="dialog" aria-labelledby="sendAllUseCaseTaskModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sendAllUseCaseTaskModal">Approval Confirmation</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure want to approve all this task?
            </div>
            <div class="modal-footer">
                <form role="form" method="post" action="<?= base_url() ?>pages/DailyTimesheet/send_all_usecase_task_leader">
                    <input type="hidden" name="id_usecase_send_all" id="id_usecase_send_all" value="<?= $leader_default->id_usecase ?>">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="submit">Approve</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end of Send All Use Case Task-->