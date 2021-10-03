  <!-- Body Section -->
  <body>
    <div class="container p-4" id="bg-template">
        <h1 class="mb-4">Edit Certified Member</h1>
        <hr>

        <?php
            if($this->session->flashdata('msg')){
                echo $this->session->flashdata('msg');
            }
        ?>

        <form role="form" method="post" action="<?= base_url() ?>pages/Profile/updateDataCertifiedMember" enctype="multipart/form-data">
            <div class="form-group ml-auto" hidden>
                <label class="required" for="nik">Name</label>
                <input type="text" class="form-control" value="<?= $member_dsc->nik ?> - <?= $member_dsc->nama_member ?>">
                <input type="hidden" id="nik" name="nik" value="<?= $member_dsc->nik ?>">
            </div>

            <div class="form-group ml-auto">
                <label class="required" for="nama_sertifikasi">Certificate Name</label>
                <input class="form-control" type="text" id="nama_sertifikasi" name="nama_sertifikasi" placeholder="Example: 2020" required="required" value="<?= $member_select[0]->nama_sertifikasi; ?>">
            </div>

            <div class="form-group ml-auto">
                <label class="required" for="id_pathway">Certificate Pathway</label>
                <br>
                <select class="select2bs4 form-control" id="id_pathway" name="id_pathway" required="required">
                    <option selected disabled value="">Choose Pathway</option>
                    <?php
                        foreach($pathway->result() as $path){
                            if($path->id_pathway == $member_select[0]->id_pathway){
                                echo '<option value="'.$path->id_pathway.'" selected>'.$path->nama_pathway.'</option>';
                            } else {
                                echo '<option value="'.$path->id_pathway.'">'.$path->nama_pathway.'</option>';
                            }
                        }
                    ?>
                </select>
            </div>

            <div class="form-group ml-auto">
                <label class="required" for="tahun_sertifikasi">Year</label>
                <input class="form-control" type="number" id="tahun_sertifikasi" name="tahun_sertifikasi" placeholder="Example: 2020" required="required" value="<?= $member_select[0]->tahun_sertifikasi; ?>">
            </div>

            <div class="form-group ml-auto">
                <label for="bukti_sertifikasi">Certificate</label>
                <div>
                <?php if(strlen($member_select[0]->bukti_sertifikasi) == 1 ) : ?>
                    
                    <img id="dataImage" src="<?= base_url('/public/assets/uploads/sertifikasi/no-image-available.png'); ?>" alt="" width="300" height="200" style="margin-bottom: 20px;">

                    <?php else : ?>
                    <a href="<?= base_url('/public/assets/uploads/sertifikasi/'.$member_select[0]->bukti_sertifikasi); ?>">
                    <img id="dataImage" src="<?= base_url('/public/assets/uploads/sertifikasi/'.$member_select[0]->bukti_sertifikasi); ?>" alt="" width="300" height="200" style="margin-bottom: 20px;">
                    </a>
                <?php endif ?>    
                </div>
                <input class="form-control" type="file" id="bukti_sertifikasi" name="bukti_sertifikasi">
            </div>

            <input hidden value="<?= $member_select[0]->id_certified_member ; ?>" name="id_certified_member">

            <div class="d-flex flex-row-reverse">
                <div >
                    <button type="submit" class="btn btn-success btn-block" id="submit">Edit Data</button> 
                </div>
                <div style="margin-right: 30px;">
                    <a href="<?= base_url(); ?>pages/Profile" type="button" class="btn btn-danger" role="button">Cancel</a>  
                </div>
            </div>

            
        </form>
    </div>
  </body>
  <!-- End of Body Section -->