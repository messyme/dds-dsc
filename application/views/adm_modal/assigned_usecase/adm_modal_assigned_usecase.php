<!-- Add Member Use Case Modal -->
<div class="modal fade" id="addMemberUseCase"  role="dialog" aria-labelledby="addMemberUseCaseLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addMemberUseCaseLabel">Add Use Case</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/AssignedUsecase/add_data_memberusecase">
                    <div class="form-group" hidden>
                        <label class="required">Name</label>
                        <select class="form-control" id="nik" name="nik" required="required" data-placeholder="Choose Nama Member" style="width: 100%;">
                            <?php
                                foreach($member_dsc->result() as $md){
                                    if($md->nik == $this->session->userdata('username')){
                                        echo '<option value="'.$md->nik.'" selected>'.$md->nik.' - '.$md->nama_member.'</option>';
                                    }
                                }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="required">Status</label>
                        <select class="boks form-control" name="status_member" id="status_member" required="required">
                            <option disabled selected value="">Choose Status Member</option>
                            <option value="Dedicated">Dedicated</option>
                            <option value="Managed Service">Managed Service</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="required" for="groups">Groups</label>
                        <select class="select2grup form-control" id="groups" name="id_groups" required="required">
                            <option value="">Choose Group</option>
                            <?php foreach ($groups->result() as $n_groups) { ?>
                                <option <?php echo $group_selected == $n_groups->id_groups ? 'selected="selected"' : '' ?> value="<?php echo $n_groups->id_groups ?>"><?php echo $n_groups->nama_groups ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="required" for="tribe">Tribe</label>
                        <select class="select2tribe form-control" id="tribe" name="id_tribe" required="required">
                            <option value="">Choose Tribe</option>
                            <?php foreach ($tribe->result() as $n_tribe) { ?>
                                <option <?php echo $tribe_selected == $n_tribe->id_groups ? 'selected="selected"' : '' ?> class="<?php echo $n_tribe->id_groups ?>" value="<?php echo $n_tribe->id_tribe ?>"><?php echo $n_tribe->nama_tribe ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="required" for="squad">Squad</label>
                        <select class="select2squad form-control" id="squad" name="id_squad" required="required">
                            <option value="">Choose Squad</option>
                            <?php foreach ($squad->result() as $n_squad) { ?>
                                <option <?php echo $squad_selected == $n_squad->id_tribe ? 'selected="selected"' : '' ?> class="<?php echo $n_squad->id_tribe ?>" value="<?php echo $n_squad->id_squad ?>"><?php echo $n_squad->nama_squad ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="required" for="usecase">Usecase</label>
                        <select class="select2usecase form-control" id="usecase" name="id_usecase" required="required">
                            <option value="">Choose Usecase</option>
                            <?php foreach ($usecase_exclude->result() as $n_usecase) { ?>
                                <option <?php echo $usecase_selected == $n_usecase->id_squad ? 'selected="selected"' : '' ?> class="<?php echo $n_usecase->id_squad ?>" value="<?php echo $n_usecase->id_usecase ?>"><?php echo $n_usecase->nama_usecase ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <input type="hidden" name="code" value="private">

                    <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-block" id="submit">Add Use Case</button>
                </form>
            </div>
            <!-- eof body -->
        </div>
    </div>
</div>
<!-- end of Add Member Use Case Modal -->