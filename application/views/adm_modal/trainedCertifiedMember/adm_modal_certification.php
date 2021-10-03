<!-- Add Certification Modal -->
<div class="modal fade" id="addCertification"  role="dialog" aria-labelledby="addCertificationLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addCertificationLabel">Add Data Certification</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/MemberSkills/add_data_certification">
                    <div class="form-group ml-auto">
                        <label class="required" for="nama_sertifikasi">Certification Name</label>
                        <input type="text" class="text-uppercase form-control" id="nama_sertifikasi" name="nama_sertifikasi" placeholder="example : Sertifikasi AI" required="required">
                    </div>
                    <input type="hidden" name="code" value="private">

                    <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-block" id="submit">Add Data Certification</button>
                </form>
            </div>
            <!-- eof body -->
        </div>
    </div>
</div>
<!-- end of Add Certification Modal -->

<!-- edit Certification modal -->
<?php
foreach ($sertifikasi->result() as $s) {
?>
    <div class="modal fade" id="editCertification<?= $s->id_sertifikasi ?>"  role="dialog" aria-labelledby="editCertificationLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="editCertificationLabel">Edit Data Certification</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- eof header -->
                <!-- body -->
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/MemberSkills/edit_data_certification">
                        <div class="form-group ml-auto">
                            <label class="required" for="nama_sertifikasi">Certification Name</label>
                            <input type="text" class="text-uppercase form-control" id="nama_sertifikasi" name="nama_sertifikasi" value="<?= $s->nama_sertifikasi ?>" required="required">
                            <input type="hidden" name="id_sertifikasi" id="id_sertifikasi" value="<?= $s->id_sertifikasi ?>">
                        </div>
                        <input type="hidden" name="code" value="private">

                        <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block" id="submit">Edit Data Certification</button>
                    </form>
                </div>
                <!-- eof body -->
            </div>
        </div>
    </div>
<?php } ?>
<!-- eof edit Certification modal -->

<!-- Delete Confirmation-->
<?php
foreach ($sertifikasi->result() as $s) {
?>
    <div class="modal fade" id="deleteModal<?= $s->id_sertifikasi ?>"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a id="btn-delete" class="btn btn-danger" href="<?= base_url() ?>pages/MemberSkills/delete_data_certification/<?= $s->id_sertifikasi ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- end of Delete Confirmation-->