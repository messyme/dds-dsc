<!-- Add Skill Requirement Modal -->
<div class="modal fade" id="addSkillRequirement"  role="dialog" aria-labelledby="addSkillRequirementLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addSkillRequirementLabel">Add Data Skill Requirement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataTalentCapability/add_skill_list_require">
                    <div class="form-group ml-auto">
                        <label class="required" for="name_skill_list_require">Name</label>
                        <input type="text" class="text-uppercase form-control" id="name_skill_list_require" name="name_skill_list_require" placeholder="example: Mandatory" required="required">
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
<!-- end of Add Skill Requirement Modal -->

<!-- edit Skill Requirement modal -->
<?php
foreach ($skill_list_require->result() as $slr) {
?>
    <div class="modal fade" id="editSkillRequirement<?= $slr->id_skill_list_require ?>"  role="dialog" aria-labelledby="editSkillRequirementLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="editSkillRequirementLabel">Edit Skill Requirement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- eof header -->
                <!-- body -->
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataTalentCapability/edit_skill_list_require">
                        <div class="form-group ml-auto">
                            <label class="required" for="name_skill_list_type">Name</label>
                            <input type="text" class="text-uppercase form-control" id="name_skill_list_require" name="name_skill_list_require" value="<?= $slr->name_skill_list_require ?>" required="required">
                            <input type="hidden" name="id_skill_list_require" id="id_skill_list_require" value="<?= $slr->id_skill_list_require ?>">
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
<!-- eof edit Skill Requirement modal -->

<!-- Delete Confirmation-->
<?php
foreach ($skill_list_require->result() as $slr) {
?>
    <div class="modal fade" id="deleteSkillRequirement<?= $slr->id_skill_list_require ?>"  role="dialog" aria-labelledby="deleteSkillRequirementLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteSkillRequirementLabel">Delete Confirmation</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure want to delete this data?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a id="btn-delete" class="btn btn-danger" href="<?= base_url() ?>pages/OtherDataTalentCapability/delete_skill_list_require/<?= $slr->id_skill_list_require ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- end of Delete Confirmation-->