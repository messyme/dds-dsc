    <!-- Body Section -->
  <body>
    <div class="container p-4" id="bg-template">
        <?php
            if($this->session->userdata('msg')){
                echo $this->session->userdata('msg');
            }
        ?>

        <h1 class="mb-4">Edit Members in Assignments (Apprentice)</h1>
        <hr>
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 col-s-12 col-xs-12 ">
                <form role="form" method="post" action="<?= base_url() ?>pages/Assignments/memberAssignmentAppEditData">
                    <div class="form-group">
                        <label class="required" for="nim">Name</label>
                        <select class="boks form-control select2member" id="nim" name="nim" required="required">
                            <option selected disabled>Choose Name</option>
                                <?php foreach($member_dsc_internship->result() as $md) : ?>
                                        <option class="text-uppercase" value="<?= $md->nim; ?>" <?= $member_select[0]->nim == $md->nim ? 'selected' : '' ?>><?= $md->nim; ?> - <?= $md->nama_mahasiswa; ?></option>; 
                                <?php endforeach ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="required">Status</label>
                        <select class="boks form-control" name="status_member" id="status_member" required="required">
                            <option disabled selected>Pilih Status Member</option>
                            <?php if($member_select[0]->status_member == 'Dedicated'){ ?>
                            <option value="Dedicated" selected>Dedicated</option>
                            <?php } else { ?>
                            <option value="Dedicated">Dedicated</option>
                            <?php } ?>
                            <?php if($member_select[0]->status_member == 'Managed Service'){ ?>
                            <option value="Managed Service" selected>Managed Service</option>
                            <?php } else { ?>
                            <option value="Managed Service">Managed Service</option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="required" for="groups">Groups</label>
                        <select class="select2bs4 form-control" id="groups" name="id_groups" required="required">
                            <option value="">Pilih Group</option>
                            <?php foreach ($groups->result() as $n_groups) { ?>
                                <option <?php echo $member_select[0]->id_groups == $n_groups->id_groups ? 'selected="selected"' : '' ?> 
                                    value="<?php echo $n_groups->id_groups ?>"><?php echo $n_groups->nama_groups ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="required" for="tribe">Tribe</label>
                        <select class="select2bs4 form-control" id="tribe" name="id_tribe" required="required">
                            <option value="">Pilih Tribe</option>
                            <?php foreach ($tribe->result() as $n_tribe) { ?>
                                <option <?php echo $member_select[0]->id_tribe == $n_tribe->id_tribe ? 'selected="selected"' : '' ?> 
                                    class="<?php echo $n_tribe->id_groups ?>" value="<?php echo $n_tribe->id_tribe ?>"><?php echo $n_tribe->nama_tribe ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="required" for="squad">Squad</label>
                        <select class="select2bs4 form-control" id="squad" name="id_squad" required="required">
                            <option value="">Pilih Squad</option>
                            <?php foreach ($squad->result() as $n_squad) { ?>
                                <option <?php echo $member_select[0]->id_squad == $n_squad->id_squad ? 'selected="selected"' : '' ?> 
                                    class="<?php echo $n_squad->id_tribe ?>" value="<?php echo $n_squad->id_squad ?>"><?php echo $n_squad->nama_squad ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="required" for="usecase">Usecase</label>
                        <select class="select2bs4 form-control" id="usecase" name="id_usecase" required="required">
                            <option value="">Pilih Usecase</option>
                            <?php foreach ($usecase->result() as $n_usecase) { ?>
                                <option <?php echo $member_select[0]->id_usecase == $n_usecase->id_usecase ? 'selected="selected"' : '' ?> 
                                    class="<?php echo $n_usecase->id_squad ?>" value="<?php echo $n_usecase->id_usecase ?>"><?php echo $n_usecase->nama_usecase ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <input name="id_member_usecase" value="<?= $member_select[0]->id; ?>" hidden>
        
                    <div class="d-flex flex-row-reverse">
                        <div >
                            <button type="submit" class="btn btn-success" id="submit">Edit Data</button> 
                        </div>
                        <div style="margin-right: 30px;">
                            <a href="<?= base_url() ?>pages/Assignments/apprentice_in_assignment" type="button" class="btn btn-danger" role="button">Cancel</a>  
                        </div>
                    </div>  
                </form>
            </div>
        </div>
    </div>
  </body>
  <!-- End of Body Section -->