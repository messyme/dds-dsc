  <!-- Body Section -->
  <body>
    <div class="container p-4" id="bg-template">
        <?php
            if($this->session->userdata('msg')){
                echo $this->session->userdata('msg');
            }
        ?>
        
        <?php 
            $nik = $member_select[0]->nik;
        ?>

        <h1 class="mb-4">Edit Data Members in Assignments</h1>
        <hr>
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 col-s-12 col-xs-12 ">
            
            <form role="form" method="post" action="<?= base_url() ?>pages/Profile/memberAssignmentEditData">

                <div class="form-group ml-auto" hidden>
                    <label class="required" for="nik">Name</label>
                    <input type="text" class="form-control" value="<?= $member_dsc->nik ?> - <?= $member_dsc->nama_member ?>">
                    <input type="hidden" id="nik" name="nik" value="<?= $member_dsc->nik ?>">
                </div>
                
                <div class="form-group">
                    <label class="required">Status</label>
                    <select class="boks form-control" name="status_memberEdit" id="status_member" required="required">
                        <option disabled selected>Pilih Status Member</option>
                        <option value="Dedicated" <?php echo $member_select[0]->status_member == 'Dedicated' ? 'selected="selected"' : '' ?>>Dedicated</option>
                        <option value="Managed Service" <?php echo $member_select[0]->status_member == 'Managed Service' ? 'selected="selected"' : '' ?>>Managed Service</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="required" for="groups">Groups</label>
                    <select class="select2bs4 form-control" id="groups" name="id_groupsEdit" required="required">
                        <option value="">Pilih Group</option>
                        <?php foreach ($groups->result() as $n_groups) { ?>
                            <option <?php echo $member_select[0]->id_groups == $n_groups->id_groups ? 'selected="selected"' : '' ?> 
                                value="<?php echo $n_groups->id_groups ?>"><?php echo $n_groups->nama_groups ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label class="required" for="tribe">Tribe</label>
                    <select class="select2bs4 form-control" id="tribe" name="id_tribeEdit" required="required">
                        <option value="">Pilih Tribe</option>
                        <?php foreach ($tribe->result() as $n_tribe) { ?>
                            <option <?php echo $member_select[0]->id_tribe == $n_tribe->id_tribe ? 'selected="selected"' : '' ?> 
                                class="<?php echo $n_tribe->id_groups ?>" value="<?php echo $n_tribe->id_tribe ?>"><?php echo $n_tribe->nama_tribe ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label class="required" for="squad">Squad</label>
                    <select class="select2bs4 form-control" id="squad" name="id_squadEdit" required="required">
                        <option value="">Pilih Squad</option>
                        <?php foreach ($squad->result() as $n_squad) { ?>
                            <option <?php echo $member_select[0]->id_squad == $n_squad->id_squad ? 'selected="selected"' : '' ?> 
                                class="<?php echo $n_squad->id_tribe ?>" value="<?php echo $n_squad->id_squad ?>"><?php echo $n_squad->nama_squad ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label class="required" for="usecase">Usecase</label>
                    <select class="select2bs4 form-control" id="usecase" name="id_usecaseEdit" required="required">
                        <option value="">Pilih Usecase</option>
                        <?php foreach ($usecase->result() as $n_usecase) { ?>
                            <option <?php echo $member_select[0]->id_usecase == $n_usecase->id_usecase ? 'selected="selected"' : '' ?> 
                                class="<?php echo $n_usecase->id_squad ?>" value="<?php echo $n_usecase->id_usecase ?>"><?php echo $n_usecase->nama_usecase ?></option>
                        <?php } ?>
                    </select>
                </div>

                <input name="id_member_usecase" value="<?= $member_select[0]->id_member_usecase; ?>" hidden>
        
                <div class="d-flex flex-row-reverse">
                    <div >
                        <button type="submit" class="btn btn-success" id="submit">Edit Data</button> 
                    </div>
                    <div style="margin-right: 30px;">
                        <a href="<?= base_url() ?>pages/Profile" type="button" class="btn btn-danger" role="button">Cancel</a>  
                    </div>
                    
                </div>              
            </form>
            </div>
        </div>
    </div>
  </body>
  <!-- End of Body Section -->