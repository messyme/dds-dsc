  <!-- Body Section -->
  <body>
    <div class="container p-4" id="bg-template">
        <h1 class="mb-4">Edit Trained Members</h1>
        <hr>

        <?php
            if($this->session->flashdata('msg')){
                echo $this->session->flashdata('msg');
            }
        ?>

        <form role="form" method="post" action="<?= base_url() ?>pages/MemberSkills/updateDataTrainedMember" enctype="multipart/form-data">
            <div class="form-group ml-auto" hidden>
                <label class="required" for="nik">Name</label>
                <input type="text" class="form-control" value="<?= $member_select[0]->nik ?> - <?= $member_select[0]->nama_member ?>">
                <input type="hidden" id="nik" name="nik" value="<?= $member_select[0]->nik ?>">
            </div>

            <div class="form-group ml-auto">
                <label class="required" for="nama_pelatihan">Training Name</label>
                <input class="form-control" type="text" id="nama_pelatihan" name="nama_pelatihan" placeholder="Example: Deep Learning" required="required" value="<?= $member_select[0]->nama_pelatihan; ?>">
            </div>

            <div class="form-group ml-auto">
                <label class="required" for="id_pathway">Training Pathway</label>
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
                <label class="required" for="tahun_pelatihan">Year</label>
                <input class="form-control" type="number" id="tahun_pelatihan" name="tahun_pelatihan" placeholder="Example: 2020" required="required" value="<?= $member_select[0]->tahun_pelatihan; ?>">
            </div>

            <div class="form-group ml-auto">
                <label for="bukti_pelatihan">Certificate</label>
                <div>
                <?php if(strlen($member_select[0]->bukti_pelatihan) == 1 ) : ?>
                    
                    <img id="dataImage" src="<?= base_url('/public/assets/uploads/training/no-image-available.png'); ?>" alt="" width="300" height="200" style="margin-bottom: 20px;">

                    <?php else : ?>
                    <a href="<?= base_url('/public/assets/uploads/training/'.$member_select[0]->bukti_pelatihan); ?>">
                    <img id="dataImage" src="<?= base_url('/public/assets/uploads/training/'.$member_select[0]->bukti_pelatihan); ?>" alt="" width="300" height="200" style="margin-bottom: 20px;">
                    </a>
                <?php endif ?>    
                </div>    
                <input class="form-control" type="file" id="bukti_pelatihan" name="bukti_pelatihan">
            </div>

            <input type="hidden" name="id_trained_member" value="<?= $member_select[0]->id_trained_member ; ?>">

            <div class="d-flex flex-row-reverse">
                <div >
                    <button type="submit" class="btn btn-success btn-block" id="submit">Edit Data</button> 
                </div>
                <div style="margin-right: 30px;">
                    <a href="<?= base_url(); ?>pages/MemberSkills" type="button" class="btn btn-danger" role="button">Cancel</a>  
                </div>
            </div>
        </form>
    </div>
  </body>
  <!-- End of Body Section -->