
    <!-- Edit Apprentice Modal -->
    <?php
        foreach($member_internship->result() as $mi){
    ?>
    <div class="modal fade" id="editIntern<?= $mi->nim ?>"  role="dialog" aria-labelledby="editInternLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editInternLabel">Edit Apprentice</h5>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/DscMember/edit_data_internshipAlumni">

                        <div class="form-group ml-auto" hidden>
                            <label class="required" for="nim">NIM</label>
                            <input type="text" class="form-control" id="nim" name="nim" value="<?= $mi->nim ?>">
                            <input type="hidden" name="nim" value="<?= $mi->nim ?>">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="nama_mahasiswa">Name</label>
                            <input type="text" class="form-control text-uppercase" id="nama_mahasiswa" name="nama_mahasiswa" value="<?= $mi->nama_mahasiswa ?>" required="required">
                        </div>
                        
                        <input type="hidden" name="code" value="private">

                        <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block" id="submit">Put back</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <!-- End of Apprentice -->