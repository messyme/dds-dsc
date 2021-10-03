<!-- Approve Use Case Task-->
<?php
    foreach($all_usecase_task->result() as $use_task){
?>
<div class="modal fade" id="approveUseCaseTask<?= $use_task->id_usecase_task ?>"  role="dialog" aria-labelledby="approveUseCaseTaskModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="approveUseCaseTaskModal">Approve Confirmation</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to approve this task?
            </div>
            <div class="modal-footer">
                <form role="form" method="post" action="<?= base_url() ?>pages/DailyTimesheet/approve_usecase_task/<?= $use_task->id_usecase_task ?>/<?= $nik ?>/<?= $id_usecase ?>">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success" id="submit">Approve</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    }
?>
<!-- end of Approve Use Case Task-->

<!-- Reject Use Case Task-->
<?php
    foreach($all_usecase_task->result() as $use_task){
?>
<div class="modal fade" id="rejectUseCaseTask<?= $use_task->id_usecase_task ?>"  role="dialog" aria-labelledby="rejectUseCaseTaskModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rejectUseCaseTaskModal">Reject Confirmation</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to reject this task?
            </div>
            <div class="modal-footer">
                <form role="form" method="post" action="<?= base_url() ?>pages/DailyTimesheet/reject_usecase_task/<?= $use_task->id_usecase_task ?>/<?= $nik ?>/<?= $id_usecase ?>">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger" id="submit">Reject</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    }
?>
<!-- end of Reject Use Case Task-->

<!-- Send All Use Case Task-->
<div class="modal fade" id="approveAllUseCaseTask"  role="dialog" aria-labelledby="approveAllUseCaseTaskModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="approveAllUseCaseTaskModal">Approval Confirmation</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to approve all task?
            </div>
            <div class="modal-footer">
                <form role="form" method="post" action="<?= base_url() ?>pages/DailyTimesheet/approve_all_usecase_task/<?= $nik ?>/<?= $id_usecase ?>">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="submit">Approve</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end of Send All Use Case Task-->
