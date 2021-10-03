  <!-- Body Section -->
  <body>
    <?php
        if($this->session->flashdata('msg')){
            echo $this->session->flashdata('msg');
        }
    ?>
    <div class="container p-4" id="bg-template">
        <h1 class="mb-4">DSC Profile Description</h1>

        <form action="<?= base_url('pages/Home/updateDscProfile'); ?>" method="POST">
            <?php foreach($contetDscProfile as $dsc) : ?>
            <label for="descriptionDscProfile"> DSC Profile Description</label>
            <textarea class="form-control" id="descriptionMission" name="descriptionDscProfile" rows="4"><?= $dsc->deskripsi; ?></textarea>
            <div class="col-md-12 mt-4" style="margin-bottom: 50px;">
                <button class="btn btn-primary float-right" type="submit">Update</button>
            </div>
            <?php endforeach ?>
        </form>
    </div>

    <div class="container p-4" id="bg-template">
        <h1 class="mb-4">Group Head Greeting</h1>
        
        <form method="POST" action="<?= base_url('pages/Home/updateGroupHead'); ?>" enctype="multipart/form-data">
            <div class="row">
                <?php foreach($contentGroupHead as $gh) : ?>
                <?php $foto =  'data:image/'.$gh->file_type.';base64,'.base64_encode($gh->foto).''?>            
                <div class="col-md-5 col-sm-12 col-xs-12 mb-2">
                    <img id="imgTarget" class="rounded-circle"  src="<?= $foto; ?>" height="260" width="260" alt="">
                    <div class="form-group">
                        <label for="fotoGroup">Choose Photo Group Head </label>
                        <input type="file" class="form-control-file" id="fotoGroup" name="fotoGroup" >
                        <small>Uploaded file should only be a PNG image below 10mb.</small>
                    </div>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12 ">
                    <label for="descriptionMission">Group Head Greeting Description</label>
                    <textarea class="form-control" id="descriptionGroupHead" name="descriptionGroupHead" rows="6"><?= $gh->sambutan; ?></textarea>
                    <label for="descriptionMission">Group Head Name</label>
                    <input class="form-control" id="nameGroupHead" name="nameGroupHead" value="<?= $gh->name_group; ?>"></input>
                </div>
                <input type="text" name="fotoText" id="fotoText" value="<?= $foto; ?>" hidden/>
                <div class="col-md-12 mt-4" >
                    <button class="btn btn-primary float-right" id="updateProfile">Update</button>
                </div>
                <?php endforeach ?>
            </div>
        </form>
    </div>

    <div class="container p-4" id="bg-template">
        <h1 class="mb-4">Vision Description</h1>
        
        <form method="POST" action="<?= base_url('pages/Home/updateVision'); ?>">
            <?php foreach($contentVisiMisi as $vis): ?>
            <label for="descriptionVision">Vision Description</label>
            <textarea class="form-control" id="descriptionVision" name="descriptionVision" rows="4"><?= $vis->visi; ?></textarea>

            <!-- <h1 class="mb-4">Mission Description</h1>
            <label for="descriptionMission">Mission Description</label>
            <textarea class="form-control" id="descriptionMission" name="descriptionMission" rows="4">< ?= $vis->misi; ?></textarea> -->
            <div class="col-md-12 mt-4" style="margin-bottom: 50px;">
                <button class="btn btn-primary float-right" type="submit">Update</button>
            </div>
            <?php endforeach ?>
        </form>
    </div>
  </body>
  <!-- End of Body Section -->