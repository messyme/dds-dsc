
        <!-- Add Certified Member Modal -->
        <div class="modal fade" id="addCertifiedMember" role="dialog" aria-labelledby="addCertifiedMember" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="addCertifiedMember">Add Data Certified Member</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- eof header -->
                <!-- body -->
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/MemberSkills/upload_sertifikasi" enctype="multipart/form-data">
                        <div class="form-group ml-auto">
                            <label class="required" for="nik">DSC Member Name</label>
                            <select class="form-control select2member" id="nik" name="nik" required="required">
                                <option value=""></option>
                                <?php
                                    foreach($member_dsc->result() as $md){
                                        echo '<option value="'.$md->nik.'">'.$md->nik.' - '.$md->nama_member.'</option>';
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="form-group ml-auto">
                            <label class="required" for="nama_sertifikasi">Certification Name</label>
                            <input class="form-control" type="text" id="nama_sertifikasi" name="nama_sertifikasi" placeholder="Example: Big Data Analytic" required="required">
                        </div>

                        <div class="form-group ml-auto">
                            <label class="required" for="id_pathway">Certification Pathway</label>
                            <br>
                            <select class="form-control select2pathway" id="id_pathway" name="id_pathway" required="required">
                                <option selected disabled value="">Choose Pathway</option>
                                <?php
                                    foreach($pathway->result() as $path){
                                        echo '<option value="'.$path->id_pathway.'">'.$path->nama_pathway.'</option>';
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="form-group ml-auto">
                            <label class="required" for="tahun_sertifikasi">Year</label>
                            <input class="form-control" type="number" id="tahun_sertifikasi" name="tahun_sertifikasi" placeholder="Example: 2020" required="required">
                        </div>

                        <div class="form-group ml-auto">
                            <label for="bukti_sertifikasi">Certificate</label>
                            <input class="form-control" type="file" id="bukti_sertifikasi" name="bukti_sertifikasi">
                        </div>

                        <input type="hidden" name="code" value="private">

                        <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block" id="submit" name="submit">Add Data Certified Member</button>
                    </form>
                </div>
                <!-- eof body -->
            </div>
        </div>
    </div>
    <!-- end of Add Certified Member Modal -->

    <!-- Delete Confirmation-->
    <?php
        foreach ($certified_member->result() as $cm) {
    ?>
    <div class="modal fade" id="deleteModal<?= $cm->id_certified_member ?>"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <a id="btn-delete" class="btn btn-danger" href="<?= base_url() ?>pages/MemberSkills/delete_data_certifiedmember/<?=$cm->id_certified_member ?>">Delete</a>
        </div>
        </div>
    </div>
    </div>
    <?php } ?>
    <!-- end of Delete Confirmation-->