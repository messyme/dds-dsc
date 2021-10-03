<!-- Add Minimum Proficiency Level -->
<div class="modal fade" id="addMinProficiencyLevel" role="dialog" aria-labelledby="addProficiencyLevelLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <!-- header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="addProficiencyLevelLabel">Add Minimum Proficiency Level</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- eof header -->
                <!-- body -->
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataTalentCapability/add_data_minimum_proficiency_level" enctype="multipart/form-data">
                        
                        <div class="form-group ml-auto">
                            <label class="required" for="prof_skill">Skill Name</label>
                            <select class="select2" multiple="multiple" id="id_skill_list"  name="multiSkill[]" data-placeholder="Choose Name Skill" required="required">
                                <?php
                                    foreach($skill_list->result() as $s){
                                        echo '<option value="'.$s->id_skill_list.'">'. $s->name_category_skill. ' - '.$s->name_skill.'</option>';
                                    };
                                ?>
                            </select>
                        </div>

                        <div class="form-group ml-auto">
                            <label class="required" for="j1">J1</label>
                            <select class="form-control" id="j1" name="j1" required="required">
                                <option value="" selected disabled>Choose 1-5</option>
                                <?php
                                    foreach($proficiency_level->result() as $pl){
                                        echo '<option value="'.$pl->id_proficiency_level.'">'.$pl->value.'</option>';
                                    };
                                ?>
                            </select>
                        </div>

                        <div class="form-group ml-auto">
                            <label class="required" for="j2">J2</label>
                            <select class="form-control" id="j2" name="j2" required="required">
                                <option value="" selected disabled>Choose 1-5</option>
                                <?php
                                    foreach($proficiency_level->result() as $pl){
                                        echo '<option value="'.$pl->id_proficiency_level.'">'.$pl->value.'</option>';
                                    };
                                ?>
                            </select>
                        </div>

                        <div class="form-group ml-auto">
                            <label class="required" for="j3">J3</label>
                            <select class="form-control" id="j3" name="j3" required="required">
                                <option value="" selected disabled>Choose 1-5</option>
                                <?php
                                    foreach($proficiency_level->result() as $pl){
                                        echo '<option value="'.$pl->id_proficiency_level.'">'.$pl->value.'</option>';
                                    };
                                ?>
                            </select>
                        </div>

                        <div class="form-group ml-auto">
                            <label class="required" for="m1">M1</label>
                            <select class="form-control" id="m1" name="m1" required="required">
                                <option value="" selected disabled>Choose 1-5</option>
                                <?php
                                    foreach($proficiency_level->result() as $pl){
                                        echo '<option value="'.$pl->id_proficiency_level.'">'.$pl->value.'</option>';
                                    };
                                ?>
                            </select>
                        </div>

                        <div class="form-group ml-auto">
                            <label class="required" for="m2">M2</label>
                            <select class="form-control" id="m2" name="m2" required="required">
                                <option value="" selected disabled>Choose 1-5</option>
                                <?php
                                    foreach($proficiency_level->result() as $pl){
                                        echo '<option value="'.$pl->id_proficiency_level.'">'.$pl->value.'</option>';
                                    };
                                ?>
                            </select>
                        </div>

                        <div class="form-group ml-auto">
                            <label class="required" for="m3">M3</label>
                            <select class="form-control" id="m3" name="m3" required="required">
                                <option value="" selected disabled>Choose 1-5</option>
                                <?php
                                    foreach($proficiency_level->result() as $pl){
                                        echo '<option value="'.$pl->id_proficiency_level.'">'.$pl->value.'</option>';
                                    };
                                ?>
                            </select>
                        </div>

                        <div class="form-group ml-auto">
                            <label class="required" for="s1">S1</label>
                            <select class="form-control" id="s1" name="s1" required="required">
                                <option value="" selected disabled>Choose 1-5</option>
                                <?php
                                    foreach($proficiency_level->result() as $pl){
                                        echo '<option value="'.$pl->id_proficiency_level.'">'.$pl->value.'</option>';
                                    };
                                ?>
                            </select>
                        </div>

                        <div class="form-group ml-auto">
                            <label class="required" for="s2">S2</label>
                            <select class="form-control" id="s2" name="s2" required="required">
                                <option value="" selected disabled>Choose 1-5</option>
                                <?php
                                    foreach($proficiency_level->result() as $pl){
                                        echo '<option value="'.$pl->id_proficiency_level.'">'.$pl->value.'</option>';
                                    };
                                ?>
                            </select>
                        </div>

                        <div class="form-group ml-auto">
                            <label class="required" for="s3">S3</label>
                            <select class="form-control" id="s3" name="s3" required="required">
                                <option value="" selected disabled>Choose 1-5</option>
                                <?php
                                    foreach($proficiency_level->result() as $pl){
                                        echo '<option value="'.$pl->id_proficiency_level.'">'.$pl->value.'</option>';
                                    };
                                ?>
                            </select>
                        </div>

                        <input type="hidden" name="code" value="private">

                        <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block" id="submit">Add Minimum Proficiency Level</button>
                    </form>
                </div>
                <!-- eof body -->
        </div>
    </div>
</div>
<!-- End Add Minimum Proficiency Level -->

 <!-- Edit Minimum Proficiency Level -->
 <?php
        foreach($minimum_proficiency_level->result() as $mp) {
    ?>
    <div class="modal fade" id="editMinProf<?= $mp->id_minimum_proficiency_level ?>" role="dialog" aria-labelledby="editMinProfLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editMinProfLabel">Edit Minimum Proficiency</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataTalentCapability/edit_data_minimum_proficiency" enctype="multipart/form-data">
                        
                        <div class="form-group ml-auto">
                            <label class="required" for="prof_skill">Skill Name</label>
                           <select class="form-control" id="prof_skill" name="prof_skill_new" required="required">
                                <option value="" selected disabled>Choose One</option>
                                <?php
                                    foreach ($skill_list->result() as $s) {
                                        if ($s->id_skill_list == $mp->id_skill_list) {
                                            echo '<option value="'.$s->id_skill_list. '" selected>'.$s->name_skill.'</option>';
                                        } else {
                                            echo '<option value="'.$s->id_skill_list.'">'.$s->name_skill.'</option>';
                                        }
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="form-group ml-auto">
                            <label class="required" for="j1">J1</label>
                           <select class="form-control" id="j1" name="j1_new" required="required">
                                <option value="" selected disabled>Choose One</option>
                                <?php
                                    foreach ($proficiency_level->result() as $p) {
                                        if ($p->id_proficiency_level == $mp->j1) {
                                            echo '<option value="'.$p->id_proficiency_level. '" selected>'.$p->value.'</option>';
                                        } else {
                                            echo '<option value="'.$p->id_proficiency_level.'">'.$p->value.'</option>';
                                        }
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="form-group ml-auto">
                            <label class="required" for="j2">J2</label>
                           <select class="form-control" id="j2" name="j2_new" required="required">
                                <option value="" selected disabled>Choose One</option>
                                <?php
                                    foreach ($proficiency_level->result() as $p) {
                                        if ($p->id_proficiency_level == $mp->j2) {
                                            echo '<option value="'.$p->id_proficiency_level. '" selected>'.$p->value.'</option>';
                                        } else {
                                            echo '<option value="'.$p->id_proficiency_level.'">'.$p->value.'</option>';
                                        }
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="form-group ml-auto">
                            <label class="required" for="j3">J3</label>
                           <select class="form-control" id="j3" name="j3_new" required="required">
                                <option value="" selected disabled>Choose One</option>
                                <?php
                                    foreach ($proficiency_level->result() as $p) {
                                        if ($p->id_proficiency_level == $mp->j3) {
                                            echo '<option value="'.$p->id_proficiency_level. '" selected>'.$p->value.'</option>';
                                        } else {
                                            echo '<option value="'.$p->id_proficiency_level.'">'.$p->value.'</option>';
                                        }
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="form-group ml-auto">
                            <label class="required" for="m1">M1</label>
                           <select class="form-control" id="m1" name="m1_new" required="required">
                                <option value="" selected disabled>Choose One</option>
                                <?php
                                    foreach ($proficiency_level->result() as $p) {
                                        if ($p->id_proficiency_level == $mp->m1) {
                                            echo '<option value="'.$p->id_proficiency_level. '" selected>'.$p->value.'</option>';
                                        } else {
                                            echo '<option value="'.$p->id_proficiency_level.'">'.$p->value.'</option>';
                                        }
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="form-group ml-auto">
                            <label class="required" for="m2">M2</label>
                           <select class="form-control" id="m2" name="m2_new" required="required">
                                <option value="" selected disabled>Choose One</option>
                                <?php
                                    foreach ($proficiency_level->result() as $p) {
                                        if ($p->id_proficiency_level == $mp->m2) {
                                            echo '<option value="'.$p->id_proficiency_level. '" selected>'.$p->value.'</option>';
                                        } else {
                                            echo '<option value="'.$p->id_proficiency_level.'">'.$p->value.'</option>';
                                        }
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="form-group ml-auto">
                            <label class="required" for="m3">M3</label>
                           <select class="form-control" id="m3" name="m3_new" required="required">
                                <option value="" selected disabled>Choose One</option>
                                <?php
                                    foreach ($proficiency_level->result() as $p) {
                                        if ($p->id_proficiency_level == $mp->m3) {
                                            echo '<option value="'.$p->id_proficiency_level. '" selected>'.$p->value.'</option>';
                                        } else {
                                            echo '<option value="'.$p->id_proficiency_level.'">'.$p->value.'</option>';
                                        }
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="form-group ml-auto">
                            <label class="required" for="s1">S1</label>
                           <select class="form-control" id="s1" name="s1_new" required="required">
                                <option value="" selected disabled>Choose One</option>
                                <?php
                                    foreach ($proficiency_level->result() as $p) {
                                        if ($p->id_proficiency_level == $mp->s1) {
                                            echo '<option value="'.$p->id_proficiency_level. '" selected>'.$p->value.'</option>';
                                        } else {
                                            echo '<option value="'.$p->id_proficiency_level.'">'.$p->value.'</option>';
                                        }
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="form-group ml-auto">
                            <label class="required" for="s2">S2</label>
                           <select class="form-control" id="s2" name="s2_new" required="required">
                                <option value="" selected disabled>Choose One</option>
                                <?php
                                    foreach ($proficiency_level->result() as $p) {
                                        if ($p->id_proficiency_level == $mp->s2) {
                                            echo '<option value="'.$p->id_proficiency_level. '" selected>'.$p->value.'</option>';
                                        } else {
                                            echo '<option value="'.$p->id_proficiency_level.'">'.$p->value.'</option>';
                                        }
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="form-group ml-auto">
                            <label class="required" for="s3">S3</label>
                           <select class="form-control" id="s3" name="s3_new" required="required">
                                <option value="" selected disabled>Choose One</option>
                                <?php
                                    foreach ($proficiency_level->result() as $p) {
                                        if ($p->id_proficiency_level == $mp->s3) {
                                            echo '<option value="'.$p->id_proficiency_level. '" selected>'.$p->value.'</option>';
                                        } else {
                                            echo '<option value="'.$p->id_proficiency_level.'">'.$p->value.'</option>';
                                        }
                                    }
                                ?>
                            </select>
                        </div>

                        <input type="hidden" name="id_minimum_proficiency_level" value="<?= $mp->id_minimum_proficiency_level ?>">
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
<!-- End Edit Minimum Proficiency Level-->


<!-- Delete Minimum Proficiency Level -->
<?php
    foreach ($minimum_proficiency_level->result() as $mp) {
?>
    <div class="modal fade" id="deleteMinProf<?= $mp->id_minimum_proficiency_level ?>" role="dialog" aria-labelledby="delete" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete">Delete Confirmation</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure want to delete this data?
                </div>
                <div class="modal-footer">
                    <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataTalentCapability/delete_data_minimum_proficiency/<?= $mp->id_minimum_proficiency_level ?>">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger" id="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php } ?>

<!-- End of Minimum Proficiency -->


<script>
    
</script>