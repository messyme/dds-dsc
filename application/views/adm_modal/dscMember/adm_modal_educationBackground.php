<!-- Add Groups Modal -->
<div class="modal fade" id="addEdbg"  role="dialog" aria-labelledby="addEdbgModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addEdbgModalLabel">Add Education Background</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataDscMembers/add_data_ed_bg">
                    <div class="form-group ml-auto">
                        <label class="required" for="id_cluster_ed">Cluster Education</label>
                        <select class="select2clustered form-control" id="id_cluster_ed" name="id_cluster_ed" required="required">
                            <option value=""></option>
                            <?php
                            foreach ($cluster_ed->result() as $clustered) {
                                echo '<option class="text-uppercase" value="' . $clustered->id_cluster_ed . '">' . $clustered->id_cluster_ed . ' - ' . $clustered->cluster_ed_desc . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="ed_bg_desc">Name</label>
                        <input type="text" class="text-uppercase form-control" id="ed_bg_desc" name="ed_bg_desc" placeholder="example : XYZ" required="required">
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
<!-- end of Add Groups Modal -->

<!-- edit groups modal -->
<?php
foreach ($ed_bg->result() as $edbg) {
?>
    <div class="modal fade" id="editEdbg<?= $edbg->id_ed_bg ?>"  role="dialog" aria-labelledby="editEdbg" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="editEdbg">Edit Data Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- eof header -->
                <!-- body -->
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataDscMembers/edit_data_ed_bg">
                        <div class="form-group">
                            <label class="required" for="id_cluster_ed">Cluster Education</label>
                            <select class="form-control" id="id_cluster_ed" name="id_cluster_ed" required="required">
                                <option disabled value="">Choose Cluster Education</option>
                                <?php
                                foreach ($cluster_ed->result() as $clustered) {
                                    if ($clustered->id_cluster_ed == $edbg->id_cluster_ed) {
                                        echo '<option class="text-uppercase" value="' . $clustered->id_cluster_ed . '" class="' . $clustered->id_cluster_ed . '" selected>' . $clustered->id_cluster_ed . ' - ' . $clustered->cluster_ed_desc . '</option>';
                                    } else {
                                        echo '<option class="text-uppercase" value="' . $clustered->id_cluster_ed . '" class="' . $clustered->id_cluster_ed . '">' . $clustered->id_cluster_ed . ' - ' . $clustered->cluster_ed_desc . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="ed_bg_desc">Name</label>
                            <input type="text" class="text-uppercase form-control" id="ed_bg_desc" name="ed_bg_desc" value="<?= $edbg->ed_bg_desc ?>" required="required">
                            <input type="hidden" name="id_ed_bg" id="id_ed_bg" value="<?= $edbg->id_ed_bg ?>">
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
<!-- eof edit groups modal -->

<!-- Delete Confirmation-->
<?php
foreach ($ed_bg->result() as $edbg) {
?>
    <div class="modal fade" id="deleteEdbg<?= $edbg->id_ed_bg ?>"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a id="btn-delete" class="btn btn-danger" href="<?= base_url() ?>pages/OtherDataDscMembers/delete_data_ed_bg/<?= $edbg->id_ed_bg ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- end of Delete Confirmation-->