  <!-- Body Section -->
  <body>
    <div class="container p-4" id="bg-template">
        <?php
            if($this->session->userdata('msg')){
                echo $this->session->userdata('msg');
            }
        ?>
        
        <h1 class="mb-4">Edit Data Apprentice</h1>
        <hr>
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 col-s-12 col-xs-12 ">
            
            <form role="form" method="post" action="<?= base_url() ?>pages/DscMember/edit_data_internship">

                <div class="form-group ml-auto">
                    <label class="required" for="nama_mahasiswa">Name</label>
                    <input type="text" class="form-control text-uppercase" id="nama_mahasiswa" name="nama_mahasiswa" value="<?= $member_select[0]->nama_mahasiswa ?>" required="required">
                </div>

                <div class="form-group">
                    <label class="required" for="groups">Cluster Education</label>
                    <select class="select2bs4 form-control" id="cluster_ed" name="id_cluster_ed" required="required">
                        <option value="">Choose Cluster Education</option>
                        <?php foreach($cluster_ed->result() as $clustered){ ?>
                            <option <?php echo $member_select[0]->id_cluster_ed == $clustered->id_cluster_ed ? 'selected="selected"' : '' ?> 
                                value="<?php echo $clustered->id_cluster_ed ?>"><?php echo $clustered->cluster_ed_desc ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <div class="form-group">
                        <label class="required" for="id_ed_bg">Educational Background</label>
                        <select class="select2bs4 form-control" id="ed_bg" name="id_ed_bg" required="required">
                            <option value="">Choose Educational Background</option>
                            <?php foreach ($ed_bg->result() as $edbg) { ?>
                                <option <?php echo $member_select[0]->id_ed_bg == $edbg->id_ed_bg ? 'selected="selected"' : '' ?> 
                                    class="<?php echo $edbg->id_cluster_ed ?>" value="<?php echo $edbg->id_ed_bg ?>"><?php echo $edbg->ed_bg_desc ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="required" for="nik">Supervisor</label>
                    <select class="select2bs4 form-control" id="nik" name="nik" required="required">
                        <option disabled value="">Choose SPV</option>
                        <?php
                            foreach($member_dsc->result() as $md){
                                if($md->nik == $member_select[0]->nik){
                                    echo '<option value="'.$md->nik.'" class="'.$md->nik.'" selected>'.$md->nik.' - '.$md->nama_member.'</option>';
                                } else {
                                    echo '<option value="'.$md->nik.'" class="'.$md->nik.'">'.$md->nik.' - '.$md->nama_member.'</option>'; 
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="required" for="kode_universitas">University</label>
                    <select class="select2bs4 form-control" id="kode_universitas" name="kode_universitas" required="required">
                        <option disabled value="">Choose University</option>
                        <?php
                            foreach($universitas->result() as $univ){
                                if($univ->kode_universitas == $member_select[0]->kode_universitas){
                                    echo '<option value="'.$univ->kode_universitas.'" class="'.$univ->kode_universitas.'" selected>'.$univ->kode_universitas.' - '.$univ->nama_universitas.'</option>';
                                } else {
                                    echo '<option value="'.$univ->kode_universitas.'" class="'.$univ->kode_universitas.'">'.$univ->kode_universitas.' - '.$univ->nama_universitas.'</option>'; 
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group ml-auto">
                    <label class="required" for="tahun_intern">Year</label>
                    <input type="number" class="form-control text-uppercase" id="tahun_intern" name="tahun_intern" value="<?= $member_select[0]->tahun_intern ?>" required="required">
                </div>
                <div class="form-group ml-auto">
                    <label for="kontrak_mulai_internship">Contract Started</label>
                    <input class="form-control" type="date" id="kontrak_mulai_internship" name="kontrak_mulai_internship" value="<?= $member_select[0]->kontrak_mulai_internship ?>">
                </div>
                <div class="form-group ml-auto">
                    <label for="kontrak_selesai_internship">Contract Finished</label>
                    <input class="form-control" type="date" id="kontrak_selesai_internship" name="kontrak_selesai_internship" value="<?= $member_select[0]->kontrak_selesai_internship ?>">
                </div>

                <input name="nim" value="<?= $member_select[0]->nim; ?>" hidden>
        
                <div class="d-flex flex-row-reverse">
                    <div >
                        <button type="submit" class="btn btn-success" id="submit">Edit Data</button> 
                    </div>
                    <div style="margin-right: 30px;">
                        <a href="<?= base_url() ?>pages/DscMember/apprenticeship" type="button" class="btn btn-danger" role="button">Cancel</a>  
                    </div>
                </div>              
            </form>
            </div>
        </div>
    </div>
  </body>
  <!-- End of Body Section -->