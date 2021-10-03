
    <?php
        foreach($member_dsc->result() as $md){
    ?>
    <div class="modal fade" id="editMember<?= $md->nik ?>"  role="dialog" aria-labelledby="editMemberLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editMemberLabel">Edit Member</h5>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/DscMember/editDataDscAlumni" enctype="multipart/form-data">

                        <div class="form-group ml-auto">
                            <label class="required" for="nik">NIK</label>
                            <input type="text" class="form-control" id="nik" name="nik" value="<?= $md->nik ?>">
                            <input type="hidden" name="nik" value="<?= $md->nik ?>">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="nama_member">Name</label>
                            <input type="text" class="form-control text-uppercase" id="nama_member" name="nama_member" value="<?= $md->nama_member ?>" required="required">
                        </div>
                        <div class="form-group">
                            <label class="required" for="id_status">Status</label>
                            <select class="form-control" id="id_status" name="id_status" required="required">
                                <option disabled value="">Choose Status</option>
                                <?php
                                    foreach($status->result() as $st){
                                        if($st->id_status == $md->id_status){
                                            echo '<option value="'.$st->id_status.'" class="'.$st->id_status.'" selected>'.$st->id_status.' - '.$st->nama_status.'</option>';
                                        } else {
                                            echo '<option value="'.$st->id_status.'" class="'.$st->id_status.'">'.$st->id_status.' - '.$st->nama_status.'</option>'; 
                                        }
                                    }
                                ?>
                            </select>
                        </div>

                        <input type="hidden" name="code" value="private">

                        <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block" id="submit">Edit Data Member</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <!-- End of Edit Member Modal -->