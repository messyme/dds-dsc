<!-- Add proficiency level Modal -->
<div class="modal fade" id="addProficiencylevel" role="dialog" aria-labelledby="addProficiencylevellabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addProficiencylevellabel">Add Proficiency Level</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataTalentCapability/add_proficiency_level">
                    <div class="form-group ml-auto">
                        <label class="required" for="name_proficiency_level">Proficiency Level Name</label>
                        <input type="text" class="text-uppercase form-control" id="name_proficiency_level" name="name_proficiency_level" placeholder="example : Proficient" required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="value">Value</label>
                        <input type="number" class="text-uppercase form-control" id="value" name="value" placeholder="example : 1" required="required">
                    </div>
                    <input type="hidden" name="code" value="private">

                    <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-block" id="submit">Add Proficiency Level</button>
                </form>
            </div>
            <!-- eof body -->
        </div>
    </div>
</div>
<!-- end of Add proficiency level Modal -->

<!-- Edit Usecase Problem -->
<?php
foreach ($proficiency_level->result() as $o) {
?>
    <div class="modal fade" id="editproficiency_level<?= $o->id_proficiency_level ?>" role="dialog" aria-labelledby="editproficiency_levelLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editproficiency_levelLabel">Edit Proficiency Level</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataTalentCapability/edit_proficiency_level">
                        <div class="form-group ml-auto">
                            <label class="required" for="name_proficiency_level">Proficiency Level Name</label>
                            <input type="text" class="text-uppercase form-control" id="name_proficiency_level" name="name_proficiency_level" value="<?= $o->name_proficiency_level ?>" required="required">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="value">Value</label>
                            <input type="number" class="text-uppercase form-control" id="value" name="value" value="<?= $o->value ?>" required="required">
                        </div>
                        <input type="hidden" name="id_proficiency_level" value="<?= $o->id_proficiency_level ?>">
                        <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block" id="submit">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>
<!-- End of Edit Usecase Problem -->

<!-- Delete Usecase Problems -->
<?php
foreach ($proficiency_level->result() as $pro) {
?>
    <div class="modal fade" id="deleteproficiency_level<?= $pro->id_proficiency_level ?>" role="dialog" aria-labelledby="deleteProblemLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteproficiency_levelLabel">Delete Confirmation</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure want to delete this data?
                </div>
                <div class="modal-footer">
                    <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataTalentCapability/delete_proficiency_level/<?= $pro->id_proficiency_level ?>">
                        <div class="form-group ml-auto">
                            <input type="hidden" id="id_proficiency_level" name="id_proficiency_level" value="<?= $pro->id_proficiency_level ?>">
                        </div>

                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger" id="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php } ?>
<!-- End of Delete Usecase Problems -->