<!-- Add Groups Modal -->
<div class="modal fade" id="addClustered"  role="dialog" aria-labelledby="addClusteredModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addClusteredModalLabel">Add Data Cluster Education</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataDscMembers/add_data_cluster_ed">
                    <div class="form-group ml-auto">
                        <label class="required" for="cluster_ed_desc">Name</label>
                        <input type="text" class="text-uppercase form-control" id="cluster_ed_desc" name="cluster_ed_desc" placeholder="example : XYZ" required="required">
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
foreach ($cluster_ed->result() as $clustered) {
?>
    <div class="modal fade" id="editClustered<?= $clustered->id_cluster_ed ?>"  role="dialog" aria-labelledby="editClusteredModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="editClusteredModalLabel">Edit Data Cluster Education</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- eof header -->
                <!-- body -->
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataDscMembers/edit_data_cluster_ed">
                        <div class="form-group ml-auto">
                            <label class="required" for="cluster_ed_desc">Name</label>
                            <input type="text" class="text-uppercase form-control" id="cluster_ed_desc" name="cluster_ed_desc" value="<?= $clustered->cluster_ed_desc ?>" required="required">
                            <input type="hidden" name="id_cluster_ed" id="id_cluster_ed" value="<?= $clustered->id_cluster_ed ?>">
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
foreach ($cluster_ed->result() as $clustered) {
?>
    <div class="modal fade" id="deleteClustered<?= $clustered->id_cluster_ed ?>"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a id="btn-delete" class="btn btn-danger" href="<?= base_url() ?>pages/OtherDataDscMembers/delete_data_cluster_ed/<?= $clustered->id_cluster_ed ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- end of Delete Confirmation-->