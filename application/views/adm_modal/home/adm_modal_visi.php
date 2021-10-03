
    <!-- Modal -->
    <div class="modal fade" id="uploadImage"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?= base_url('pages/Home/updateFotoStrukturOrganisasi'); ?>" enctype="multipart/form-data"> 
                        <div class="form-group">
                            <label for="fotoOrganitation">Choose Organization Structure Image </label>
                            <input type="file" class="form-control-file" id="fotoOrganitation" name="fotoOrganitation">
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

   <!-- Modal -->
<div class="modal fade" id="myModal"  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Foto Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="height: 500px; width: 500px;">
      <div id="my-image" class="center-block"></div>
        <!-- <img class="my-image" height="200" width="200" src="<?php echo 'data:image/'.$contentGroupHead[0]->file_type.';base64,'.base64_encode($contentGroupHead[0]->foto).'' ?>" />     -->
    </div>
      <div class="modal-footer">
        <button id="cancelCropBtn" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="cropImageBtn" type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>