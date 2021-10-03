<!-- Add Usulan Certification -->
<div class="modal fade" id="addProposedCertification" role="dialog" aria-labelledby="addProposedCertificationLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="addProposedCertificationLabel">Add Proposed Certification</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- eof header -->
                <!-- body -->
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/MemberSkills/add_data_usulan_certification" enctype="multipart/form-data">
                        <div class="form-group ml-auto">
                            <label class="required" for="nik">Name</label>
                            <select class="form-control select2member" id="nik" name="nik" required>
                                <option value=""></option>
                                <?php
                                    foreach($member_dsc->result() as $md){
                                        echo '<option value="'.$md->nik.'">'.$md->nik.' - '.$md->nama_member.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="nama_certification">Certification Name</label>
                            <input type="text" class="form-control" id="nama_certification" name="nama_certification" placeholder="Example : Python" required="required">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="id_pathway">Certification Pathway</label>
                            <br>
                            <select class="form-control select2pathway" id="id_pathway" name="id_pathway" required="required">
                                <option selected disabled value="">Choose Pathway</option>
                                <?php
                                    foreach($pathway->result() as $path){
                                        echo '<option value="'.$path->id_pathway.'">'.$path->nama_pathway.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="certification_source">Certification Source</label>
                            <input type="text" class="form-control" id="certification_source" name="certification_source" placeholder="Example : https://www.udemy.com/" required="required">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="kuartal">Quarter</label>
                            <select class="form-control" id="kuartal" name="kuartal" required="required">
                                <option value="" selected disabled>Choose One</option>
                                <option value="q1">Q1</option>
                                <option value="q2">Q2</option>
                                <option value="q3">Q3</option>
                                <option value="q4">Q4</option>
                            </select>
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="year">Year</label>
                            <input class="form-control" type="number" id="year" name="year" placeholder="Example: 2021">
                        </div>

                        <input type="hidden" name="code" value="private">

                        <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block" id="submit">Add Data Proposed Certification</button>
                    </form>
                </div>
                <!-- eof body -->
            </div>
        </div>
    </div>
    <!-- End Add Usulan Certification -->

    <!-- Delete Usulan Certification-->
    <?php
        foreach($proposed_certification->result() as $u){
    ?>
    <div class="modal fade" id="deleteProposedCertification<?= $u->id_usulan_cert ?>"  role="dialog" aria-labelledby="deleteProposedCertificationModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteProposedCertificationModal">Delete Confirmation</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure want to delete this data?
                </div>
                <div class="modal-footer">
                    <form role="form" method="post" action="<?= base_url() ?>pages/MemberSkills/delete_data_usulan_certification/<?= $u->id_usulan_cert ?>">
                        <div class="form-group ml-auto">
                            <input type="hidden" id="nik" name="nik" value="<?= $u->nik ?>">
                        </div>
                        <div class="form-group ml-auto">
                            <input type="hidden" id="id_usulan_cert" name="id_usulan_cert" value="<?= $u->id_usulan_cert ?>">
                        </div>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger" id="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
    <!-- end of Delete Usulan Certification-->

    <!-- Edit Usulan Certification -->
    <?php
        foreach($proposed_certification->result() as $u){
    ?>
    <div class="modal fade" id="editProposedCertification<?= $u->id_usulan_cert ?>"  role="dialog" aria-labelledby="editProposedCertificationLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProposedCertificationLabel">Edit Proposed Certification</h5>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/MemberSkills/edit_data_usulan_certification">
                        <div class="form-group ml-auto" hidden>
                            <input type="hidden" id="id_usulan_cert" name="id_usulan_cert" value="<?= $u->id_usulan_cert ?>">
                        </div>
                        <div class="form-group ml-auto" hidden>
                            <label class="required" for="nik">NIK</label>
                            <input type="text" class="form-control" id="nik" name="nik" required="required" value="<?= $u->nik ?>">
                            <input type="hidden" id="nik" name="nik" value="<?= $u->nik ?>">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="nama_certification">Certification Name</label>
                            <input type="text" class="form-control" id="nama_certification" name="nama_certification" required="required" value="<?= $u->nama_certification ?>">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="id_pathway">Certification Pathway</label>
                            <br>
                            <select class="form-control" id="id_pathway" name="id_pathway" required="required">
                                <option selected disabled value="">Choose Pathway</option>
                                <?php
                                    foreach($pathway->result() as $path){
                                        if($path->id_pathway == $u->id_pathway){
                                            echo '<option value="'.$path->id_pathway.'" selected>'.$path->nama_pathway.'</option>';
                                        } else {
                                            echo '<option value="'.$path->id_pathway.'">'.$path->nama_pathway.'</option>';
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="certification_source">Certification Source</label>
                            <input type="text" class="form-control" id="certification_source" name="certification_source" required="required" value="<?= $u->certification_source ?>">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="kuartal">Quarter</label>
                            <select class="form-control" id="kuartal" name="kuartal" required="required">
                                <option value="" selected disabled>Choose One</option>
                                <option value="q1" <?php if($u->kuartal == 'q1'){ ?> selected <?php } ?>>Q1</option>
                                <option value="q2" <?php if($u->kuartal == 'q2'){ ?> selected <?php } ?>>Q2</option>
                                <option value="q3" <?php if($u->kuartal == 'q3'){ ?> selected <?php } ?>>Q3</option>
                                <option value="q4" <?php if($u->kuartal == 'q4'){ ?> selected <?php } ?>>Q4</option>
                            </select>
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="year">Year</label>
                            <input class="form-control" type="number" id="year" name="year" value="<?= $u->year ?>">
                        </div>

                        <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block" id="submit">Edit Data Proposed Certification</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
    <!-- End Edit Usulan Certification -->