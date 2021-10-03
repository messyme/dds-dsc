<!-- Add Member Modal -->
<div class="modal fade" id="addInternship"  role="dialog" aria-labelledby="addInternshipLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addInternshipLabel">Add Data Apprentice</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/DscMember/add_data_internship">
                    <div class="form-group ml-auto">
                        <label class="required" for="nama_mahasiswa">Name</label>
                        <input type="text" class="text-uppercase form-control" id="nama_mahasiswa" name="nama_mahasiswa" placeholder="example : Ahmad" required="required">
                    </div>
                    <div class="form-group">
                        <label class="required" for="groups">Cluster Education</label>
                        <select class="select2clustered form-control" id="cluster_ed" name="id_cluster_ed" required="required">
                            <option value="">Choose Cluster Education</option>
                            <?php foreach ($cluster_ed->result() as $clustered) { ?>
                                <option <?php echo $cluster_ed_selected == $clustered->id_cluster_ed ? 'selected="selected"' : '' ?> value="<?php echo $clustered->id_cluster_ed ?>"><?php echo $clustered->cluster_ed_desc ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="required" for="id_ed_bg">Educational Background</label>
                        <select class="select2edbg form-control" id="ed_bg" name="id_ed_bg" required="required">
                            <option value="">Choose Educational Background</option>
                            <?php foreach ($ed_bg->result() as $edbg) { ?>
                                <option <?php echo $ed_bg_selected == $edbg->id_cluster_ed ? 'selected="selected"' : '' ?> class="<?php echo $edbg->id_cluster_ed ?>" value="<?php echo $edbg->id_ed_bg ?>"><?php echo $edbg->ed_bg_desc ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="nik">Supervisor</label>
                        <select class="select2member form-control" id="nik" name="nik" required="required">
                            <option value=""></option>
                            <?php
                            foreach ($member_dsc->result() as $md) {
                                echo '<option value="' . $md->nik . '">' . $md->nik . ' - ' . $md->nama_member . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="kode_universitas">University</label>
                        <select class="select2univ form-control" id="kode_universitas" name="kode_universitas" required="required">
                            <option selected disabled>Choose University</option>
                            <?php
                            foreach ($universitas->result() as $univ) {
                                echo '<option value="' . $univ->kode_universitas . '">' . $univ->kode_universitas . ' - ' . $univ->nama_universitas . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="tahun_intern">Year</label>
                        <input type="number" class="text-uppercase form-control" id="tahun_intern" name="tahun_intern" placeholder="example : 2020" required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label for="kontrak_mulai_internship">Contract Started</label>
                        <input class="form-control" type="date" id="kontrak_mulai_internship" name="kontrak_mulai_internship">
                    </div>
                    <div class="form-group ml-auto">
                        <label for="kontrak_selesai_internship">Contract Finished</label>
                        <input class="form-control" type="date" id="kontrak_selesai_internship" name="kontrak_selesai_internship">
                    </div>
                    <input type="hidden" name="code" value="private">

                    <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-block" id="submit">Add Data Apprentice</button>
                </form>
            </div>
            <!-- eof body -->
        </div>
    </div>
</div>
<!-- end of Add Member Modal -->

<!-- Delete Confirmation-->
<?php
foreach ($member_internship->result() as $mi) {
?>
    <div class="modal fade" id="deleteModal<?= $mi->nim ?>"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a id="btn-delete" class="btn btn-danger" href="<?= base_url() ?>pages/DscMember/delete_data_internship/<?= $mi->nim ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- end of Delete Confirmation-->

<!-- resign Confirmation-->
<?php
foreach ($member_internship->result() as $mi) {
?>
    <div class="modal fade" id="resignModal<?= $mi->nim ?>"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Resign Confirmation</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure <b><?= $mi->nama_mahasiswa; ?></b> has resign ?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
                    <a id="btn-delete" class="btn btn-danger" href="<?= base_url() ?>pages/DscMember/update_statusAlumni_internship/<?= $mi->nim ?>">Yes</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- end of resign Confirmation-->