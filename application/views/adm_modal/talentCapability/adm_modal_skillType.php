<!-- Add Skill Type Modal -->
<div class="modal fade" id="addSkillType"  role="dialog" aria-labelledby="addSkillTypeLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addSkillTypeLabel">Add Data Skill Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataTalentCapability/add_skill_list_type">
                    <div class="form-group ml-auto">
                        <label class="required" for="name_skill_list_type">Name</label>
                        <input type="text" class="text-uppercase form-control" id="name_skill_list_type" name="name_skill_list_type" placeholder="example: General" required="required">
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
<!-- end of Add Skill Type Modal -->

<!-- edit Skill Type modal -->
<?php
foreach ($skill_list_type->result() as $slt) {
?>
    <div class="modal fade" id="editSkillType<?= $slt->id_skill_list_type ?>"  role="dialog" aria-labelledby="editSkillTypeLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="editSkillTypeLabel">Edit Skill Type</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- eof header -->
                <!-- body -->
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataTalentCapability/edit_skill_list_type">
                        <div class="form-group ml-auto">
                            <label class="required" for="name_skill_list_type">Name</label>
                            <input type="text" class="text-uppercase form-control" id="name_skill_list_type" name="name_skill_list_type" value="<?= $slt->name_skill_list_type ?>" required="required">
                            <input type="hidden" name="id_skill_list_type" id="id_skill_list_type" value="<?= $slt->id_skill_list_type ?>">
                        </div>
                        <input type="hidden" name="code" value="private">

                        <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block" id="submit">Edit Data</button>
                    </form>
                </div>
                <!-- eof body -->
            </div>
        </div>
    </div>
<?php } ?>
<!-- eof edit Skill Type modal -->

<!-- Delete Confirmation-->
<?php
foreach ($skill_list_type->result() as $slt) {
?>
    <div class="modal fade" id="deleteSkillType<?= $slt->id_skill_list_type ?>"  role="dialog" aria-labelledby="deleteSkillTypeLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteSkillTypeLabel">Delete Confirmation</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure want to delete this data?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a id="btn-delete" class="btn btn-danger" href="<?= base_url() ?>pages/OtherDataTalentCapability/delete_skill_list_type/<?= $slt->id_skill_list_type ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- end of Delete Confirmation-->