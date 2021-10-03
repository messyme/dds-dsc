
    <!-- Modal -->
    <div class="modal fade" id="uploadImage"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Foto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?= base_url('pages/Home/updateFotoAboutAssignment'); ?>" enctype="multipart/form-data"> 
                        <div class="form-group">
                            <label for="fotoAssignment">Choose About Assignments Image </label>
                            <input type="file" class="form-control-file" id="fotoAssignment" name="fotoAssignment" required>
                            <small>Uploaded file should only be a JPG/PNG image below 10mb.</small>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>