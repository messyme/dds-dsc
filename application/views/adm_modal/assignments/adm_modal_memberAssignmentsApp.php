<!-- Add Member Use Case Modal -->
<div class="modal fade" id="addMemberAssignment" role="dialog" aria-labelledby="addMemberAssignmentLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addMemberAssignmentLabel">Add Data Members in Assignments</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/Assignments/add_data_memberusecaseApp">

                    <div class="form-group">
                        <label class="required">Name</label>
                        <select class="select2" id="nim" name="multinim[]" multiple="multiple" required="required" data-placeholder="Choose Name" style="width: 100%;">
                            <?php
                            foreach ($member_dsc_internship->result() as $md) {
                                echo '<option class="text-uppercase" value="' . $md->nim . '">' . $md->nim . ' - ' . $md->nama_mahasiswa . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="required">Status</label>
                        <select class="boks form-control" name="status_member" id="status_member" required="required">
                            <option disabled selected value="">Choose Status Member</option>
                            <option value="Dedicated">Dedicated</option>
                            <option value="Managed Service">Managed Service</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="required" for="groups">Groups</label>
                        <select class="select2grup form-control" id="groups" name="id_groups" required="required">
                            <option value="">Choose Group</option>
                            <?php foreach ($groups->result() as $n_groups) { ?>
                                <option <?php echo $group_selected == $n_groups->id_groups ? 'selected="selected"' : '' ?> value="<?php echo $n_groups->id_groups ?>"><?php echo $n_groups->nama_groups ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="required" for="tribe">Tribe</label>
                        <select class="select2tribe form-control" id="tribe" name="id_tribe" required="required">
                            <option value="">Choose Tribe</option>
                            <?php foreach ($tribe->result() as $n_tribe) { ?>
                                <option <?php echo $tribe_selected == $n_tribe->id_groups ? 'selected="selected"' : '' ?> class="<?php echo $n_tribe->id_groups ?>" value="<?php echo $n_tribe->id_tribe ?>"><?php echo $n_tribe->nama_tribe ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="required" for="squad">Squad</label>
                        <select class="select2squad form-control" id="squad" name="id_squad" required="required">
                            <option value="">Choose Squad</option>
                            <?php foreach ($squad->result() as $n_squad) { ?>
                                <option <?php echo $squad_selected == $n_squad->id_tribe ? 'selected="selected"' : '' ?> class="<?php echo $n_squad->id_tribe ?>" value="<?php echo $n_squad->id_squad ?>"><?php echo $n_squad->nama_squad ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="required" for="usecase">Usecase</label>
                        <select class="select2usecase form-control" id="usecase" name="id_usecase" required="required">
                            <option value="">Choose Usecase</option>
                            <?php foreach ($usecase->result() as $n_usecase) { ?>
                                <option <?php echo $usecase_selected == $n_usecase->id_squad ? 'selected="selected"' : '' ?> class="<?php echo $n_usecase->id_squad ?>" value="<?php echo $n_usecase->id_usecase ?>"><?php echo $n_usecase->nama_usecase ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <input type="hidden" name="code" value="private">

                    <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-block" id="submit">Add Data Member in Assignment's</button>
                </form>
            </div>
            <!-- eof body -->
        </div>
    </div>
</div>
<!-- end of Add Member Use Case Modal -->

<!-- Delete Confirmation-->
<?php
foreach ($member_usecase->result() as $mu) {
?>
    <div class="modal fade" id="deleteModal<?= $mu->id ?>"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure want to delete this data?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a id="btn-delete" class="btn btn-danger" href="<?= base_url() ?>pages/Assignments/delete_data_memberusecaseApp/<?= $mu->id ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- end of Delete Confirmation-->