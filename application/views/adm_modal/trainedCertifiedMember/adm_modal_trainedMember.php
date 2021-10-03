
        <!-- Add Trained Member Modal -->
        <div class="modal fade" id="addTrainedMember" role="dialog" aria-labelledby="addTrainedMember" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="addTrainedMember">Add Data Trained Member</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- eof header -->
                <!-- body -->
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/MemberSkills/upload_training" enctype="multipart/form-data">
                        <div class="form-group ml-auto">
                            <label class="required" for="nik">Name</label>
                            <br>
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
                            <label class="required" for="nama_pelatihan">Training Name</label>
                            <input class="form-control" type="text" id="nama_pelatihan" name="nama_pelatihan" placeholder="Example: Deep Learning" required="required">
                        </div>

                        <div class="form-group ml-auto">
                            <label class="required" for="id_pathway">Training Pathway</label>
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
                            <label class="required" for="tahun_pelatihan">Year</label>
                            <input class="form-control" type="number" id="tahun_pelatihan" name="tahun_pelatihan" placeholder="Example: 2020" required="required">
                        </div>

                        <div class="form-group ml-auto">
                            <label for="bukti_pelatihan">Certificate</label>
                            <input class="form-control" type="file" id="bukti_pelatihan" name="bukti_pelatihan">
                        </div>

                        <input type="hidden" name="code" value="private">

                        <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block" id="submit" name="submit">Add Data Trained Member</button>
                    </form>
                </div>
                <!-- eof body -->
            </div>
        </div>
    </div>
    <!-- end of Add Trained Member Modal -->

    <!-- Delete Confirmation-->
    <?php
        foreach ($trained_member->result() as $tm) {
    ?>
    <div class="modal fade" id="deleteModal<?= $tm->id_trained_member ?>"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a id="btn-delete" class="btn btn-danger" href="<?= base_url() ?>pages/MemberSkills/delete_data_trainedmember/<?= $tm->id_trained_member ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>

    <!-- end of Delete Confirmation-->
   