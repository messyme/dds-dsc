<!-- Add skill list -->
<div class="modal fade" id="addSkillList" role="dialog" aria-labelledby="addSkillListLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="addSkillListLabel">Add Skill</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- eof header -->
                <!-- body -->
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataTalentCapability/add_data_skill_list" enctype="multipart/form-data">
                        
                        <div class="form-group ml-auto">
                            <label class="required" for="category_skill">Category Skill</label>
                            <select class="form-control" id="category_skill" name="category_skill" required="required">
                                <option value="" selected disabled>Choose One</option>
                                <?php
                                    foreach($category_skill->result() as $c){
                                        echo '<option value="'.$c->id_category_skill.'">'.$c->name_category_skill.'</option>';
                                    };
                                ?>
                            </select>
                        </div>

                        <div class="form-group ml-auto">
                            <label class="required" for="skill_list_type">Skill Type</label>
                            <select class="form-control" id="skill_list_type" name="skill_list_type" required="required">
                                <option value="" selected disabled>Choose One</option>
                                <?php
                                    foreach($skill_list_type->result() as $t){
                                        echo '<option value="'.$t->id_skill_list_type.'">'.$t->name_skill_list_type.'</option>';
                                    };
                                ?>
                            </select>
                        </div>

                        <div class="form-group ml-auto">
                            <label class="required" for="skill_list_require">Skill Require</label>
                            <select class="form-control" id="skill_list_require" name="skill_list_require" required="required">
                                <option value="" selected disabled>Choose One</option>
                                <?php
                                    foreach($skill_list_require->result() as $r){
                                        echo '<option value="'.$r->id_skill_list_require.'">'.$r->name_skill_list_require.'</option>';
                                    };
                                ?>
                            </select>
                        </div>

                        <div class="form-group ml-auto">
                            <label class="required" for="skill_name">Skill Name</label>
                            <input type="text" class="form-control" id="skill_name" name="skill_name" placeholder="Example: NLP" required="required">
                        </div>

                        <input type="hidden" name="code" value="private">

                        <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block" id="submit">Add Skill</button>
                    </form>
                </div>
                <!-- eof body -->
            </div>
        </div>
    </div>
    <!-- End Add Skill list-->

    <!-- Edit Skill list -->
    <?php
        foreach($skill_list->result() as $s){
    ?>
    <div class="modal fade" id="editSkillList<?= $s->id_skill_list ?>" role="dialog" aria-labelledby="editSkillListLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSkillListLabel">Edit Skill List</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataTalentCapability/edit_data_skill_list" enctype="multipart/form-data">
                        
                        <div class="form-group ml-auto">
                            <label class="required" for="category_skill">Category Skill</label>
                            <select class="form-control" id="category_skill" name="category_skill_new" required="required">
                                <option value="" selected disabled>Choose One</option>
                                <?php
                                    foreach ($category_skill->result() as $co) {
                                        if ($co->id_category_skill == $s->id_category_skill) {
                                            echo '<option value="'.$co->id_category_skill. '" selected>'.$co->name_category_skill.'</option>';
                                        } else {
                                            echo '<option value="'.$co->id_category_skill.'">'.$co->name_category_skill.'</option>';
                                        }
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="form-group ml-auto">
                            <label class="required" for="skill_list_type">Skill Type</label>
                            <select class="form-control" id="skill_list_type" name="skill_list_type_new" required="required">
                                <option value="" selected disabled>Choose One</option>
                                <?php
                                    foreach ($skill_list_type->result() as $st) {
                                        if ($st->id_skill_list_type == $s->id_skill_list_type) {
                                            echo '<option value="'.$st->id_skill_list_type. '" selected>'.$st->name_skill_list_type.'</option>';
                                        } else {
                                            echo '<option value="'.$st->id_skill_list_type.'">'.$st->name_skill_list_type.'</option>';
                                        }
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="form-group ml-auto">
                            <label class="required" for="skill_list_require">Skill Require</label>
                            <select class="form-control" id="skill_list_require" name="skill_list_require_new" required="required">
                                <option value="" selected disabled>Choose One</option>
                                <?php
                                    foreach ($skill_list_require->result() as $sq) {
                                        if ($sq->id_skill_list_require== $s->id_skill_list_require) {
                                            echo '<option value="'.$sq->id_skill_list_require. '" selected>'.$sq->name_skill_list_require.'</option>';
                                        } else {
                                            echo '<option value="'.$sq->id_skill_list_require.'">'.$sq->name_skill_list_require.'</option>';
                                        }
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="form-group ml-auto">
                            <label class="required" for="skill_name">Skill Name</label>
                            <input type="text" class="text-uppercase form-control" id="skill_name" name="skill_name_new" value="<?= $s->name_skill ?>" required="required">
                        </div>

                        <input type="hidden" name="id_skill_list" value="<?= $s->id_skill_list ?>">
                        <input type="hidden" name="code" value="private">

                        <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block" id="submit">Edit Skill</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php 
        } 
    ?>
    <!-- End Edit Skill list-->


    <!-- Delete Skill List -->
    <?php
    foreach ($skill_list->result() as $s) {
    ?>

    <div class="modal fade" id="deleteSkillList<?= $s->id_skill_list ?>" role="dialog" aria-labelledby="deleteSkillListLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteSkillListLabel">Delete Confirmation</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure want to delete this data?
                </div>
                <div class="modal-footer">
                    <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataTalentCapability/delete_data_skill_list/<?= $s->id_skill_list ?>">

                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger" id="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php } ?>
<!-- End of Skill List -->