<!-- Add Usecase difficultly -->
<div class="modal fade" id="addusecasedifficultly" role="dialog" aria-labelledby="addusecaselabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addusecaselabel">Add Use Case Difficulty</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataTalentCapability/add_usecase_difficultly">
                    <div class="form-group ml-auto">
                        <label class="required" for="id_usecase">Product/Use Case</label>
                        <select class="form-control select2usecase" id="id_usecase" name="id_usecase" required="required">
                            <option value=""></option>
                            <?php
                            foreach ($usecase->result() as $t) {
                                echo '<option value="' . $t->id_usecase . '">' . $t->id_usecase . ' - ' . $t->nama_usecase . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="industry">Industry</label>
                        <input type="text" class="text-uppercase form-control" id="industry" name="industry" placeholder="example : telco" required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="usecase_difficultly">Skills</label>
                        <select class="select2" id="skill" name="name_skill[]" multiple="multiple" required="required" data-placeholder="Choose Skill" style="width: 100%;">
                            <?php
                            foreach ($get_skill_minprof->result() as $md) {
                                echo '<option class="text-uppercase" value="' . $md->id_minimum_proficiency_level . '">' . $md->id_skill_list . ' - ' . $md->name_skill . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <input type="hidden" name="code" value="private">

                    <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-block" id="submit">Add </button>
                </form>
            </div>
            <!-- eof body -->
        </div>
    </div>
</div>
<!-- end -->

<!-- Delete Usecase Problems -->
<?php
foreach ($usecase_difficultly->result() as $pro) {
?>
    <div class="modal fade" id="deleteusecasedifficultly<?= $pro->id_usecase ?>" role="dialog" aria-labelledby="deletedifficultly" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deletedifficultly">Delete Confirmation</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure want to delete this data?
                </div>
                <div class="modal-footer">
                    <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataTalentCapability/delete_usecase_difficultly/<?= $pro->id_usecase ?>">
                        <div class="form-group ml-auto">
                            <input type="hidden" id="id_usecase" name="id_usecase" value="<?= $pro->id_usecase ?>">
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

<!-- edit Use Cases Difficultly -->
<?php
foreach ($usecase_difficultly->result() as $o) {
?>
    <div class="modal fade" id="editusecasedifficultly<?= $o->id_usecase ?>" role="dialog" aria-labelledby="labeleditusecasedifficultly" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="labeleditusecasedifficultly">Edit Use Case Difficulty</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- eof header -->
                <!-- body -->
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataTalentCapability/edit_usecase_difficultly">

                        <div class="form-group ml-auto">
                            <label class="required" for="id_usecase">Product/Use Case</label>
                            <input hidden class="text-uppercase form-control" value="<?= $o->id_usecase ?>" id="usecase" name="usecase">
                            <select class="form-control usecase" id="id_usecase3" name="id_usecase3" required="required">
                                <option disabled value="">Product/Use Case</option>
                                <?php
                                foreach ($usecase->result() as $t) {
                                    if ($t->id_usecase == $o->id_usecase) {
                                        echo '<option value="' . $t->id_usecase . '" data-usecase_id=" ' . $t->id_usecase . ' "  class="usecase_id' . $t->id_usecase . '" selected>' . $t->id_usecase . ' - ' . $t->nama_usecase . '</option>';
                                    } else {
                                        echo '<option value="' . $t->id_usecase . '"data-usecase_id=" ' . $t->id_usecase . ' "  class="usecase_id' . $t->id_usecase . '">' . $t->id_usecase . ' - ' . $t->nama_usecase . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="industry">Industry</label>
                            <input type="text" data-industri=" <?= $o->industry ?> " class="industri text-uppercase form-control" value="<?= $o->industry ?>" id="industry3" name="industry3" placeholder="example : telco" required="required">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="usecase_difficultly">Skills</label><br>

                            <div class="input-group mb-3">
                                <select style="width: 100%;" class="select2 form-control addskill " multiple="multiple" name="addskill[]">
                                    <?php
                                    foreach ($get_skill_minprof->result() as $md) {
                                        echo '<option class="text-uppercase" data-skillid=" ' . $md->id_minimum_proficiency_level . ' "    value="' . $md->id_minimum_proficiency_level . '">' . $md->id_skill_list . ' - ' . $md->name_skill . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>


                            <table id="tb" style="overflow-y:auto;" class="display table table-striped table-bordered dt-responsive" cellspacing="0" cellpadding="1" width="100%">

                                <tbody>
                                    <?php foreach ($edit_usecase_difficultly->result() as $a) :
                                        if ($a->id_usecase == $o->id_usecase) { ?>
                                            <tr>
                                                <td>
                                                    <input hidden value="<?= $a->id_difficultly;  ?>" id="skillid" name="skillid">
                                                    <p class="edit" id="namaskill<?= $a->id_difficultly; ?>"><?= $a->name_skill; ?></p>
                                                    <select style="display:none;" class="form-control txtedit" data-id=" <?= $a->id_difficultly;  ?> " data-field='optionskill' id="optionskill<?= $a->id_difficultly;  ?>" name="optionskill" required="required">
                                                        <option disabled value="">Skill</option>
                                                        <?php
                                                        foreach ($get_skill_minprof->result() as $md) {
                                                            if ($md->id_skill_list == $a->id_skill_list) {
                                                                echo '<option value="' . $md->id_minimum_proficiency_level . '" class="' . $md->id_skill_list . '" selected>' . $md->id_skill_list . ' - ' . $md->name_skill . '</option>';
                                                            } else {
                                                                echo '<option class="text-uppercase" value="' . $md->id_minimum_proficiency_level . '">' . $md->id_skill_list . ' - ' . $md->name_skill . '</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </td>

                                                <td>
                                                    <div class="btn-group">
                                                        <button id="edit<?= $a->id_difficultly; ?>" type="button" class="btn btn-sm btn-primary" onclick="option(<?= $a->id_difficultly; ?>)"><i class="bi bi-pencil-square"></i> </button>
                                                        <button id="update<?= $a->id_difficultly; ?>" style="display: none;" type="button" class="btn btn-sm btn-success" onclick="edit(<?= $a->id_difficultly; ?>)"><em class="bi bi-check"></em> </button>
                                                        <div id="id" data-id=" <?= $a->id_difficultly;  ?> " class="delete btn-sm bg-danger"><i style="color: white;" class="bi bi-trash"></i> </div>
                                                    </div>
                                                </td>
                                            </tr>
                                    <?php }
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <input type="hidden" name="code" value="private">

                        <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block update-all" id="submit">Edit </button>
                    </form>
                </div>
                <!-- eof body -->
            </div>
        </div>
    </div>
<?php
}
?>
<!-- end -->
<script>
    function option(no) {
        document.getElementById("optionskill" + no).style.display = "block";
        document.getElementById("namaskill" + no).style.display = "none";

    }
</script>
<script type="text/javascript">
    $(document).ready(function() {

        // Focus out from a textbox
        $('.txtedit').focusout(function() {
            // Get edit id, field name and value
            var edit_id = $(this).data('id');
            var value = $(this).val();
            var detail = $(this).children("option:selected").text();

            // Hide Input element
            $(this).hide();
            // Update viewing value and display it
            $(this).prev('.edit').show();
            $(this).prev('.edit').text(detail);

            // Send AJAX request
            $.ajax({
                url: '<?= base_url('pages/OtherDataTalentCapability/update_skill_usecase') ?>',
                type: 'post',
                data: {
                    value: value,
                    id: edit_id
                },
                success: function(response) {
                    console.log(response);

                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {

        // Focus out from a textbox
        $('.delete').click(function() {
            // Get edit id, field name and value
            var del_id = $(this).data('id');
            var tr = $(this).closest('tr');

            // Send AJAX request
            $.ajax({
                url: '<?= base_url('pages/OtherDataTalentCapability/delete_skill_usecase') ?>',
                type: 'post',
                data: {
                    id: del_id
                },
                success: function(result) {
                    tr.fadeOut(1000, function() {
                        $(this).remove();
                    });
                }
            });
        });
    });
</script>