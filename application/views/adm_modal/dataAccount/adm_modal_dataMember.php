
    <!-- Add Member Modal -->
    <div class="modal fade" id="addMember"  role="dialog" aria-labelledby="addMemberModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="addMemberModalLabel">Add Data Member</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- eof header -->
                <!-- body -->
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/Account/add_data_member">
                        <div class="form-group">
                            <label class="required">Name</label>
                            <select class="select2" id="nik" name="multinik[]" multiple="multiple" required="required" data-placeholder="Choose Name" style="width: 100%;">
                                <?php
                                    foreach($member_dsc->result() as $md){
                                        if($md->have_account == 0){
                                            if(strlen($md->nik < 6)){
                                                echo '<option class="text-uppercase" value="'.$md->nik.'">'.$md->nik.' - '.$md->nama_member.'</option>';
                                            }
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block" id="submit">Add Data Member</button>
                    </form>
                </div>
                <!-- eof body -->
            </div>
        </div>
    </div>
    <!-- end of Add Member Modal -->

    <!-- Delete Member Confirmation-->
    <?php
        foreach ($member->result() as $member) {
    ?>
    <div class="modal fade" id="deleteMemberModal<?= $member->id_admin ?>"  role="dialog" aria-labelledby="deleteMemberModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteMemberModalLabel">Delete Confirmation</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure want to delete this data?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a id="btn-delete" class="btn btn-danger" href="<?= base_url() ?>pages/Account/delete_data_member/<?= $member->id_admin ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <!-- end of Delete Member Confirmation-->

    <!-- Accept Request Edit Confirmation-->
    <?php
        foreach ($requesteditmember->result() as $reqmem) {
    ?>
    <div class="modal fade" id="requestEdit<?= $reqmem->nik ?>"  role="dialog" aria-labelledby="requestEditModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="requestEditModalLabel">Request Edit Confirmation</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure want to accept this request?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a id="btn-delete" class="btn btn-primary" href="<?= base_url() ?>pages/Account/accept_request_edit/<?= $reqmem->nik ?>">Accept</a>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <!-- end of Accept Request Edit Confirmation-->