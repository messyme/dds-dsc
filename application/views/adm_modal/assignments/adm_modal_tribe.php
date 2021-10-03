<!-- Add Tribe Modal -->
<div class="modal fade" id="addTribe" role="dialog" aria-labelledby="addTribeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addTribeModalLabel">Add Data Tribe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/Assignments/add_data_tribe">
                    <div class="form-group ml-auto">
                        <label class="required" for="nama_tribe">Tribe Name</label>
                        <input type="text" class="text-uppercase form-control" id="nama_tribe" name="nama_tribe" placeholder="example : XYZ" required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="code_unit">Code</label>
                        <input type="text" class="text-uppercase form-control" id="code_unit" name="code_unit" placeholder="example : BDA" required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="unit">Unit</label>
                        <select class="form-control select2grup" id="unit" name="unit" required="required">
                            <option value="" disabled>Select Unit
                            </option>
                            <?php
                            foreach ($subunit->result() as $g) {
                                echo '<option value="' . $g->id_unit . '">' . $g->unit . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="tribe_pic">PIC Name </label>
                        <input type="text" class="text-uppercase form-control" id="tribe_pic" name="tribe_pic" placeholder="example : XYZ" required="required">
                    </div>
                    <div class="form-group">
                        <label class="required" for="id_groups">Groups Names</label>
                        <select class="form-control select2grup" id="id_groups" name="id_groups" required="required">
                            <option value=""></option>
                            <?php
                            foreach ($groups->result() as $g) {
                                echo '<option value="' . $g->id_groups . '">' . $g->id_groups . ' - ' . $g->nama_groups . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <input type="hidden" name="code" value="private">

                    <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-block" id="submit">Add Data Tribe</button>
                </form>
            </div>
            <!-- eof body -->
        </div>
    </div>
</div>
<!-- end of Add Tribe Modal -->

<!-- Edit Tribe Modal -->
<?php
foreach ($tribe->result() as $t) {
?>
    <div class="modal fade" id="editTribe<?= $t->id_tribe ?>" role="dialog" aria-labelledby="editTribeLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTribeLabel">Edit Tribe</h5>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/Assignments/edit_data_tribe">

                        <div class="form-group ml-auto" hidden>
                            <label class="required" for="id_tribe">ID</label>
                            <input type="number" class="boks form-control" id="id_tribe" name="id_tribe" value="<?= $t->id_tribe ?>">
                            <input type="hidden" name="id_tribe" value="<?= $t->id_tribe ?>">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="nama_tribe">Tribe Name</label>
                            <input type="text" class="form-control text-uppercase" id="nama_tribe" name="nama_tribe" value="<?= $t->nama_tribe ?>" required="required">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="code_unit">Code</label>
                            <input type="text" class="text-uppercase form-control" value="<?= $t->code ?>" id="code_unit" name="code_unit" placeholder="example : BDA" required="required">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="unit">Unit</label>
                            <select class="form-control select2grup" id="unit" name="unit" required="required">
                                <option value="" disabled>Select Unit</option>
                                <?php
                                foreach ($subunit->result() as $g) {
                                    if ($g->id_unit == $t->id_unit) {
                                        echo '<option value="' . $g->id_unit . '" class="' . $g->id_unit . '" selected>' . $g->unit . ' </option>';
                                    } else {
                                        echo '<option value="' . $g->id_unit . '" class="' . $g->id_unit . '">' . $g->unit . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="tribe_pic">PIC Name </label>
                            <input type="text" class="text-uppercase form-control" id="tribe_pic" name="tribe_pic" value="<?= $t->tribe_pic ?>" required="required">
                        </div>
                        <div class="form-group">
                            <label class="required" for="id_groups">Groups Names</label>
                            <select class="form-control" id="id_groups" name="id_groups" required="required">
                                <option disabled value="">Choose Groups</option>
                                <?php
                                foreach ($groups->result() as $g) {
                                    if ($g->id_groups == $t->id_groups) {
                                        echo '<option value="' . $g->id_groups . '" class="' . $g->id_groups . '" selected>' . $g->id_groups . ' - ' . $g->nama_groups . '</option>';
                                    } else {
                                        echo '<option value="' . $g->id_groups . '" class="' . $g->id_groups . '">' . $g->id_groups . ' - ' . $g->nama_groups . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <input type="hidden" name="code" value="private">

                        <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block" id="submit">Edit Data Tribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- End of Modal -->

<!-- Delete Confirmation-->
<?php
foreach ($tribe->result() as $t) {
?>
    <div class="modal fade" id="deleteModal<?= $t->id_tribe ?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a id="btn-delete" class="btn btn-danger" href="<?= base_url() ?>pages/Assignments/delete_data_tribe/<?= $t->id_tribe ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- end of Delete Confirmation-->