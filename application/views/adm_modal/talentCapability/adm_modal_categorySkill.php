<!-- Add Category Skill Modal -->
<div class="modal fade" id="addCategorySkill"  role="dialog" aria-labelledby="addCategorySkillLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addCategorySkillLabel">Add Data Category Skill</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataTalentCapability/add_category_skill">
                    <div class="form-group ml-auto">
                        <label class="required" for="name_category_skill">Name</label>
                        <input type="text" class="text-uppercase form-control" id="name_category_skill" name="name_category_skill" placeholder="example: Data Science" required="required">
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
<!-- end of Add Category Skill Modal -->

<!-- edit Category Skill modal -->
<?php
foreach ($category_skill->result() as $cs) {
?>
    <div class="modal fade" id="editCategorySkill<?= $cs->id_category_skill ?>"  role="dialog" aria-labelledby="editCategorySkillLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="editCategorySkillLabel">Edit Category Skill</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- eof header -->
                <!-- body -->
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataTalentCapability/edit_category_skill">
                        <div class="form-group ml-auto">
                            <label class="required" for="name_category_skill">Name</label>
                            <input type="text" class="text-uppercase form-control" id="name_category_skill" name="name_category_skill" value="<?= $cs->name_category_skill ?>" required="required">
                            <input type="hidden" name="id_category_skill" id="id_category_skill" value="<?= $cs->id_category_skill ?>">
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
<!-- eof edit Category Skill modal -->

<!-- Delete Confirmation-->
<?php
foreach ($category_skill->result() as $cs) {
?>
    <div class="modal fade" id="deleteCategorySkill<?= $cs->id_category_skill ?>"  role="dialog" aria-labelledby="deleteCategorySkillLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteCategorySkillLabel">Delete Confirmation</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure want to delete this data?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a id="btn-delete" class="btn btn-danger" href="<?= base_url() ?>pages/OtherDataTalentCapability/delete_category_skill/<?= $cs->id_category_skill ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- end of Delete Confirmation-->