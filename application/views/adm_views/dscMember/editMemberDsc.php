  <!-- Body Section -->
  <body>
    <div class="container p-4" id="bg-template">
        <?php
            if($this->session->userdata('msg')){
                echo $this->session->userdata('msg');
            }
        ?>
        
        <h1 class="mb-4">Edit Data Member DSC</h1>
        <hr>
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 col-s-12 col-xs-12 ">
            
            <form role="form" method="post" action="<?= base_url() ?>pages/DscMember/edit_data_memberdsc">

                <div class="form-group ml-auto">
                    <label class="required" for="nama_member">Name</label>
                    <input type="text" class="form-control text-uppercase" id="nama_member" name="nama_member" value="<?= $member_select[0]->nama_member ?>" required="required">
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
                    <label class="required" for="id_status">Status</label>
                    <select class="select2bs4 form-control" id="id_status" name="id_status" required="required">
                        <option disabled value="">Choose Status</option>
                        <?php
                            foreach($status->result() as $st){
                                if($st->id_status == $member_select[0]->id_status){
                                    echo '<option value="'.$st->id_status.'" class="'.$st->id_status.'" selected>'.$st->id_status.' - '.$st->nama_status.'</option>';
                                } else {
                                    echo '<option value="'.$st->id_status.'" class="'.$st->id_status.'">'.$st->id_status.' - '.$st->nama_status.'</option>'; 
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="required" for="id_posisi">Position</label>
                    <select class="select2bs4 form-control" id="id_posisi" name="id_posisi" required="required">
                        <option disabled value="">Choose Position</option>
                        <?php
                            foreach($posisi->result() as $ps){
                                if($ps->id_posisi == $member_select[0]->id_posisi){
                                    echo '<option value="'.$ps->id_posisi.'" class="'.$ps->id_posisi.'" selected>'.$ps->id_posisi.' - '.$ps->nama_posisi.'</option>';
                                } else {
                                    echo '<option value="'.$ps->id_posisi.'" class="'.$ps->id_posisi.'">'.$ps->id_posisi.' - '.$ps->nama_posisi.'</option>'; 
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="required" for="id_posisi_type">Position Type</label>
                    <select class="select2bs4 form-control" id="id_posisi_type" name="id_posisi_type" required="required">
                        <option disabled value="">Choose Position</option>
                        <?php
                            foreach($posisi_type->result() as $pt){
                                if($pt->id_posisi_type == $member_select[0]->id_posisi_type){
                                    echo '<option value="'.$pt->id_posisi_type.'" class="'.$pt->id_posisi_type.'" selected>'.$pt->id_posisi_type.' - '.$pt->nama_posisi_type.'</option>';
                                } else {
                                    echo '<option value="'.$pt->id_posisi_type.'" class="'.$pt->id_posisi_type.'">'.$pt->id_posisi_type.' - '.$pt->nama_posisi_type.'</option>'; 
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="required" for="id_posisi_level">Position Level</label>
                    <select class="select2bs4 form-control" id="id_posisi_level" name="id_posisi_level" required="required">
                        <option disabled value="">Choose Position</option>
                        <?php
                            foreach($posisi_level->result() as $pl){
                                if($pl->id_posisi_level == $member_select[0]->id_posisi_level){
                                    echo '<option value="'.$pl->id_posisi_level.'" class="'.$pl->id_posisi_level.'" selected>'.$pl->id_posisi_level.' - '.$pl->nama_posisi_level.'</option>';
                                } else {
                                    echo '<option value="'.$pl->id_posisi_level.'" class="'.$pl->id_posisi_level.'">'.$pl->id_posisi_level.' - '.$pl->nama_posisi_level.'</option>'; 
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="required" for="id_band">Band</label>
                    <select class="select2bs4 form-control" id="id_band" name="id_band" required="required">
                        <option disabled value="">Choose Band</option>
                        <?php
                            foreach($band->result() as $bd){
                                if($bd->id_band == $member_select[0]->id_band){
                                    echo '<option value="'.$bd->id_band.'" class="'.$bd->id_band.'" selected>'.$bd->id_band.' - '.$bd->nama_band.'</option>';
                                } else {
                                    echo '<option value="'.$bd->id_band.'" class="'.$bd->id_band.'">'.$bd->id_band.' - '.$bd->nama_band.'</option>'; 
                                }
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group ml-auto">
                    <label for="kontrak_mulai">Contract Started</label>
                    <input class="form-control" type="date" id="kontrak_mulai" name="kontrak_mulai" value="<?= $member_select[0]->kontrak_mulai ?>">
                </div>
                <div class="form-group ml-auto">
                    <label for="kontrak_selesai">Contract Finished</label>
                    <input class="form-control" type="date" id="kontrak_selesai" name="kontrak_selesai" value="<?= $member_select[0]->kontrak_selesai ?>">
                </div>

                <input name="nik" value="<?= $member_select[0]->nik; ?>" hidden>
        
                <div class="d-flex flex-row-reverse">
                    <div >
                        <button type="submit" class="btn btn-success" id="submit">Edit Data</button> 
                    </div>
                    <div style="margin-right: 30px;">
                        <a href="<?= base_url() ?>pages/DscMember/member_dsc/<?= $member_select[0]->nik; ?>" type="button" class="btn btn-danger" role="button">Cancel</a>  
                    </div>
                </div>              
            </form>
            </div>
        </div>
    </div>
  </body>
  <!-- End of Body Section -->