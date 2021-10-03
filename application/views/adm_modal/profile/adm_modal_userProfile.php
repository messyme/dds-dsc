<!-- Request Edit Confirmation-->
<div class="modal fade" id="requestEdit<?= $member_dsc->nik ?>"  role="dialog" aria-labelledby="requestEditModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="requestEditModalLabel">Request Edit Confirmation</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Are you sure want to request edit data?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a id="btn-delete" class="btn btn-primary" href="<?= base_url() ?>pages/Profile/request_edit/<?= $member_dsc->nik ?>">Request Edit</a>
            </div>
        </div>
    </div>
</div>
<!-- end of Request Edit Confirmation-->

<!-- Add Training Modal -->
<div class="modal fade" id="addTraining"  role="dialog" aria-labelledby="addTrainingModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addTrainingModalLabel">Add Training</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/Profile/upload_training" enctype="multipart/form-data">
                    <div class="form-group ml-auto" hidden>
                        <label class="required" for="nik">NIK</label>
                        <input type="text" class="form-control" value="<?= $member_dsc->nik ?> - <?= $member_dsc->nama_member ?>">
                        <input type="hidden" id="nik" name="nik" value="<?= $member_dsc->nik ?>">
                    </div>

                    <div class="form-group ml-auto">
                        <label class="required" for="nama_pelatihan">Training Name</label>
                        <input class="form-control" type="text" id="nama_pelatihan" name="nama_pelatihan" placeholder="Example: Big Data Analytic" required="required">
                    </div>

                    <div class="form-group ml-auto">
                        <label class="required" for="id_pathway">Training Pathway</label>
                        <br>
                        <select class="form-control" id="id_pathway" name="id_pathway" required="required">
                            <option selected disabled value="">Choose Pathway</option>
                            <?php
                            foreach ($pathway->result() as $path) {
                                echo '<option value="' . $path->id_pathway . '">' . $path->nama_pathway . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group ml-auto">
                        <label class="required" for="tahun_pelatihan">Year</label>
                        <input class="form-control" type="number" id="tahun_pelatihan" name="tahun_pelatihan" placeholder="Example: 2020" required="required">
                    </div>

                    <div class="form-group ml-auto">
                        <label for="bukti_pelatihan">Certificate</label>
                        <input class="form-control" type="file" id="bukti_pelatihan" name="bukti_pelatihan">
                    </div>

                    <input type="hidden" name="code" value="private">

                    <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-block" id="submit" name="submit">Add Data Training</button>
                </form>
            </div>
            <!-- eof body -->
        </div>
    </div>
</div>
<!-- end of Add Training Modal -->

<!-- Delete Confirmation-->
<?php
foreach ($training->result() as $tm) {
?>
    <div class="modal fade" id="deleteTraining<?= $tm->id_trained_member ?>"  role="dialog" aria-labelledby="deleteTrainingModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteTrainingModalLabel">Delete Confirmation</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure want to delete this data?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a id="btn-delete" class="btn btn-danger" href="<?= base_url() ?>pages/Profile/delete_data_trainedmember/<?= $tm->id_trained_member ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- end of Delete Confirmation-->

<!-- Add Certificate Modal -->
<div class="modal fade" id="addCertificate"  role="dialog" aria-labelledby="addCertificateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addCertificateModalLabel">Add Certification</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/Profile/upload_sertifikasi" enctype="multipart/form-data">
                    <div class="form-group ml-auto" hidden>
                        <label class="required" for="nik">NIK</label>
                        <input type="text" class="form-control" value="<?= $member_dsc->nik ?> - <?= $member_dsc->nama_member ?>">
                        <input type="hidden" id="nik" name="nik" value="<?= $member_dsc->nik ?>">
                    </div>

                    <div class="form-group ml-auto">
                        <label class="required" for="nama_sertifikasi">Certificate Name</label>
                        <input class="form-control" type="text" id="nama_sertifikasi" name="nama_sertifikasi" placeholder="Example: Deep Learning" required="required">
                    </div>

                    <div class="form-group ml-auto">
                        <label class="required" for="id_pathway">Certification Pathway</label>
                        <br>
                        <select class="form-control" id="id_pathway" name="id_pathway" required="required">
                            <option selected disabled value="">Choose Pathway</option>
                            <?php
                            foreach ($pathway->result() as $path) {
                                echo '<option value="' . $path->id_pathway . '">' . $path->nama_pathway . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group ml-auto">
                        <label class="required" for="tahun_sertifikasi">Year</label>
                        <input class="form-control" type="number" id="tahun_sertifikasi" name="tahun_sertifikasi" placeholder="Example: 2020" required="required">
                    </div>

                    <div class="form-group ml-auto">
                        <label for="bukti_sertifikasi">Certificate</label>
                        <input class="form-control" type="file" id="bukti_sertifikasi" name="bukti_sertifikasi">
                    </div>

                    <input type="hidden" name="code" value="private">

                    <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-block" id="submit" name="submit">Add Certification</button>
                </form>
            </div>
            <!-- eof body -->
        </div>
    </div>
</div>
<!-- end of Add Certificate Modal -->

<!-- Delete Confirmation-->
<?php
foreach ($certification->result() as $cert) {
?>
    <div class="modal fade" id="deleteCertificate<?= $cert->id_certified_member ?>"  role="dialog" aria-labelledby="deleteCertificateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteCertificateModalLabel">Delete Confirmation</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure want to delete this data?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a id="btn-delete" class="btn btn-danger" href="<?= base_url() ?>pages/Profile/delete_data_certifiedmember/<?= $cert->id_certified_member ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- end of Delete Confirmation-->

<!-- Add Training Suggestion -->
<div class="modal fade" id="addTrainingSuggestion"  role="dialog" aria-labelledby="addTrainingSuggestionLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addTrainingSuggestionLabel">Add Proposed Training</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/Profile/add_data_usulan_training" enctype="multipart/form-data">
                    <div class="form-group ml-auto" hidden>
                        <label class="required" for="nik">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" required="required" value="<?= $member_dsc->nik ?>">
                        <input type="hidden" id="nik" name="nik" value="<?= $member_dsc->nik ?>">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="nama_training">Training Name</label>
                        <input type="text" class="form-control" id="nama_training" name="nama_training" placeholder="example : Python" required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="id_pathway">Training Pathway</label>
                        <br>
                        <select class="form-control" id="id_pathway" name="id_pathway" required="required">
                            <option selected disabled value="">Choose Pathway</option>
                            <?php
                            foreach ($pathway->result() as $path) {
                                echo '<option value="' . $path->id_pathway . '">' . $path->nama_pathway . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="training_source">Training Source</label>
                        <input type="text" class="form-control" id="training_source" name="training_source" placeholder="example : https://www.udemy.com/" required="required">
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
                    <button type="submit" class="btn btn-success btn-block" id="submit">Add Data Usulan Training</button>
                </form>
            </div>
            <!-- eof body -->
        </div>
    </div>
</div>
<!-- End of Add Training Suggestion -->

<!-- Delete Usulan Training-->
<?php
foreach ($usulan->result() as $u) {
?>
    <div class="modal fade" id="deleteTrainingSuggestion<?= $u->id_usulan ?>"  role="dialog" aria-labelledby="deleteTrainingSuggestionLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteTrainingSuggestionLabel">Delete Confirmation</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure want to delete this data?
                </div>
                <div class="modal-footer">
                    <form role="form" method="post" action="<?= base_url() ?>pages/Profile/delete_data_usulan_training/<?= $u->id_usulan ?>">
                        <div class="form-group ml-auto">
                            <input type="hidden" id="nik" name="nik" value="<?= $u->nik ?>">
                        </div>
                        <div class="form-group ml-auto">
                            <input type="hidden" id="id_usulan" name="id_usulan" value="<?= $u->id_usulan ?>">
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
<!-- end of Delete Usulan Training-->

<!-- Edit Usulan Training -->
<?php
foreach ($usulan->result() as $u) {
?>
    <div class="modal fade" id="editTrainingSuggestion<?= $u->id_usulan ?>"  role="dialog" aria-labelledby="editTrainingSuggestionLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTrainingSuggestionLabel">Edit Proposed Training</h5>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/Profile/edit_data_usulan_training">
                        <div class="form-group ml-auto">
                            <input type="hidden" id="id_usulan" name="id_usulan" value="<?= $u->id_usulan ?>">
                        </div>
                        <div class="form-group ml-auto" hidden>
                            <label class="required" for="nik">NIK</label>
                            <input type="text" class="form-control" id="nik" name="nik" required="required" value="<?= $u->nik ?>">
                            <input type="hidden" id="nik" name="nik" value="<?= $u->nik ?>">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="nama_training">Training Name</label>
                            <input type="text" class="form-control" id="nama_training" name="nama_training" required="required" value="<?= $u->nama_training ?>">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="id_pathway">Training Pathway</label>
                            <br>
                            <select class="form-control" id="id_pathway" name="id_pathway" required="required">
                                <option selected disabled value="">Choose Pathway</option>
                                <?php
                                foreach ($pathway->result() as $path) {
                                    if ($path->id_pathway == $u->id_pathway) {
                                        echo '<option value="' . $path->id_pathway . '" selected>' . $path->nama_pathway . '</option>';
                                    } else {
                                        echo '<option value="' . $path->id_pathway . '">' . $path->nama_pathway . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="training_source">Training Source</label>
                            <input type="text" class="form-control" id="training_source" name="training_source" required="required" value="<?= $u->training_source ?>">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="kuartal">Quarter</label>
                            <select class="form-control" id="kuartal" name="kuartal" required="required">
                                <option value="" selected disabled>Choose One</option>
                                <option value="q1" <?php if ($u->kuartal == 'q1') { ?> selected <?php } ?>>Q1</option>
                                <option value="q2" <?php if ($u->kuartal == 'q2') { ?> selected <?php } ?>>Q2</option>
                                <option value="q3" <?php if ($u->kuartal == 'q3') { ?> selected <?php } ?>>Q3</option>
                                <option value="q4" <?php if ($u->kuartal == 'q4') { ?> selected <?php } ?>>Q4</option>
                            </select>
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="year">Year</label>
                            <input class="form-control" type="number" id="year" name="year" value="<?= $u->year ?>">
                        </div>

                        <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block" id="submit">Edit Training Suggestion</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>
<!-- End Edit Usulan Training -->

<!-- Add Use Case -->
<div class="modal fade" id="addUseCase"  role="dialog" aria-labelledby="addUseCaseLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUseCaseLabel">Add Use Case</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/Profile/add_data_memberusecase">
                    <div class="form-group ml-auto" hidden>
                        <label class="required" for="nik">Name</label>
                        <input type="text" class="form-control" value="<?= $member_dsc->nik ?> - <?= $member_dsc->nama_member ?>">
                        <input type="hidden" id="nik" name="nik" value="<?= $member_dsc->nik ?>">
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
                        <label class="required" for="usecase2">Usecase</label>
                        <select class="select2usecase form-control" id="usecase2" name="id_usecase" required="required">
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
        </div>
    </div>
</div>
<!-- end of Add Use Case -->

<!-- Delete Confirmation-->
<?php
foreach ($usecases->result() as $u) {
?>
    <div class="modal fade" id="deleteUseCase<?= $u->id_member_usecase ?>"  role="dialog" aria-labelledby="deleteUseCaseLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteUseCaseLabel">Delete Confirmation</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure want to delete this data?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a id="btn-delete" class="btn btn-danger" href="<?= base_url() ?>pages/Profile/delete_data_memberusecase/<?= $u->id_member_usecase ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- end of Delete Confirmation-->


<!-- Add Proposed Certification -->
<div class="modal fade" id="addCertificationSuggestion"  role="dialog" aria-labelledby="addCertificationSuggestionLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addCertificationSuggestionLabel">Add Proposed Certification</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/Profile/add_data_usulan_certification" enctype="multipart/form-data">
                    <div class="form-group ml-auto" hidden>
                        <label class="required" for="nik">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" required="required" value="<?= $member_dsc->nik ?>">
                        <input type="hidden" id="nik" name="nik" value="<?= $member_dsc->nik ?>">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="nama_certification">Certification Name</label>
                        <input type="text" class="form-control" id="nama_certification" name="nama_certification" placeholder="example : Python" required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="id_pathway">Certification Pathway</label>
                        <br>
                        <select class="form-control" id="id_pathway" name="id_pathway" required="required">
                            <option selected disabled value="">Choose Pathway</option>
                            <?php
                            foreach ($pathway->result() as $path) {
                                echo '<option value="' . $path->id_pathway . '">' . $path->nama_pathway . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="certification_source">Certification Source</label>
                        <input type="text" class="form-control" id="certification_source" name="certification_source" placeholder="example : https://www.udemy.com/" required="required">
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
<!-- End of Add Proposed Certification -->

<!-- Delete Proposed Certification-->
<?php
foreach ($usulan_cert->result() as $u) {
?>
    <div class="modal fade" id="deleteCertificationSuggestion<?= $u->id_usulan_cert ?>"  role="dialog" aria-labelledby="deleteCertificationSuggestionLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteCertificationSuggestionLabel">Delete Confirmation</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure want to delete this data?
                </div>
                <div class="modal-footer">
                    <form role="form" method="post" action="<?= base_url() ?>pages/Profile/delete_data_usulan_certification/<?= $u->id_usulan_cert ?>">
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
<!-- end of Delete Proposed Certification-->

<!-- Edit Proposed Certification -->
<?php
foreach ($usulan_cert->result() as $u) {
?>
    <div class="modal fade" id="editCertificationSuggestion<?= $u->id_usulan_cert ?>"  role="dialog" aria-labelledby="editCertificationSuggestionLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCertificationSuggestionLabel">Edit Proposed Certification</h5>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/Profile/edit_data_usulan_certification">
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
                                foreach ($pathway->result() as $path) {
                                    if ($path->id_pathway == $u->id_pathway) {
                                        echo '<option value="' . $path->id_pathway . '" selected>' . $path->nama_pathway . '</option>';
                                    } else {
                                        echo '<option value="' . $path->id_pathway . '">' . $path->nama_pathway . '</option>';
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
                                <option value="q1" <?php if ($u->kuartal == 'q1') { ?> selected <?php } ?>>Q1</option>
                                <option value="q2" <?php if ($u->kuartal == 'q2') { ?> selected <?php } ?>>Q2</option>
                                <option value="q3" <?php if ($u->kuartal == 'q3') { ?> selected <?php } ?>>Q3</option>
                                <option value="q4" <?php if ($u->kuartal == 'q4') { ?> selected <?php } ?>>Q4</option>
                            </select>
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="year">Year</label>
                            <input class="form-control" type="number" id="year" name="year" value="<?= $u->year ?>">
                        </div>

                        <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block" id="submit">Edit Proposed Certification</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>
<!-- End Edit Proposed Certification -->

<!-- Add Subordinate -->
<div class="modal fade" id="addSubordinate"  role="dialog" aria-labelledby="addSubordinateLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <!-- header -->
             <div class="modal-header">
                 <h5 class="modal-title" id="addSubordinateLabel">Add Subordinate</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <!-- eof header -->
             <!-- body -->
             <div class="modal-body">
                 <form role="form" method="post" action="<?= base_url() ?>pages/Profile/add_data_subordinate" enctype="multipart/form-data">
                     <div class="form-group ml-auto">
                         <label class="required" for="nik_subordinate">Subordinate Name</label>
                         <select class="select2member form-control" id="nik_subordinate" name="nik_subordinate" required="required">
                             <option value=""></option>
                             <?php
                                foreach ($all_member->result() as $md) {
                                    echo '<option value="' . $md->nik . '">' . $md->nik . ' - ' . $md->nama_member . '</option>';
                                }
                                ?>
                         </select>
                     </div>
                     <div class="form-group ml-auto">
                         <input type="hidden" id="nik_superior" name="nik_superior" value="<?= $member_dsc->nik ?>">
                     </div>
                     <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-success btn-block" id="submit">Add Subordinate</button>
                 </form>
             </div>
             <!-- eof body -->
         </div>
     </div>
 </div>
 <!-- End Add Subordinate -->

 <!-- Delete Subordinate -->
 <?php
    foreach ($subordinate->result() as $s) {
    ?>

     <div class="modal fade" id="deleteSubordinate<?= $s->id_superior_subordinate ?>"  role="dialog" aria-labelledby="deleteSubordinateModal" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="deleteSubordinateModal">Delete Confirmation</h5>
                     <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">×</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     Are you sure want to delete this data?
                 </div>
                 <div class="modal-footer">
                     <form role="form" method="post" action="<?= base_url() ?>pages/Profile/delete_data_subordinate/<?= $s->id_superior_subordinate ?>">
                         <div class="form-group ml-auto">
                             <input type="hidden" id="nik_superior" name="nik_superior" value="<?= $s->nik_superior ?>">
                         </div>
                         <div class="form-group ml-auto">
                             <input type="hidden" id="nik_subordinate" name="nik_subordinate" value="<?= $s->nik_subordinate ?>">
                         </div>
                         <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                         <button type="submit" class="btn btn-danger" id="submit">Delete</button>
                     </form>
                 </div>
             </div>
         </div>
     </div>

 <?php } ?>
 <!-- End Delete Subordinate -->

 <!-- Add Apprentice Modal -->
<div class="modal fade" id="addInternship"  role="dialog" aria-labelledby="addInternshipLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addInternshipLabel">Add Data Apprentice</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/Profile/add_data_internship">
                    <div class="form-group ml-auto">
                        <label class="required" for="nama_mahasiswa">Name</label>
                        <input type="text" class="text-uppercase form-control" id="nama_mahasiswa" name="nama_mahasiswa" placeholder="example : Ahmad" required="required">
                    </div>
                    <div class="form-group">
                        <label class="required" for="groups">Cluster Education</label>
                        <select class="select2clustered form-control" id="cluster_ed" name="id_cluster_ed" required="required">
                            <option value="">Choose Cluster Education</option>
                            <?php foreach ($cluster_ed->result() as $clustered) { ?>
                                <option <?php echo $cluster_ed_selected == $clustered->id_cluster_ed ? 'selected="selected"' : '' ?> value="<?php echo $clustered->id_cluster_ed ?>"><?php echo $clustered->cluster_ed_desc ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="required" for="id_ed_bg">Educational Background</label>
                        <select class="select2edbg form-control" id="ed_bg" name="id_ed_bg" required="required">
                            <option value="">Choose Educational Background</option>
                            <?php foreach ($ed_bg->result() as $edbg) { ?>
                                <option <?php echo $ed_bg_selected == $edbg->id_cluster_ed ? 'selected="selected"' : '' ?> class="<?php echo $edbg->id_cluster_ed ?>" value="<?php echo $edbg->id_ed_bg ?>"><?php echo $edbg->ed_bg_desc ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="nik">Supervisor</label>
                        <select class="select2member form-control" id="nik" name="nik" required="required" readonly>
                            <?php
                                echo '<option value="' . $member_dsc->nik . '">' . $member_dsc->nik . ' - ' . $member_dsc->nama_member . '</option>';
                            ?>
                        </select>
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="kode_universitas">University</label>
                        <select class="select2univ form-control" id="kode_universitas" name="kode_universitas" required="required">
                            <option selected disabled>Choose University</option>
                            <?php
                            foreach ($universitas->result() as $univ) {
                                echo '<option value="' . $univ->kode_universitas . '">' . $univ->kode_universitas . ' - ' . $univ->nama_universitas . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="tahun_intern">Year</label>
                        <input type="number" class="text-uppercase form-control" id="tahun_intern" name="tahun_intern" placeholder="example : 2020" required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label for="kontrak_mulai_internship">Contract Started</label>
                        <input class="form-control" type="date" id="kontrak_mulai_internship" name="kontrak_mulai_internship">
                    </div>
                    <div class="form-group ml-auto">
                        <label for="kontrak_selesai_internship">Contract Finished</label>
                        <input class="form-control" type="date" id="kontrak_selesai_internship" name="kontrak_selesai_internship">
                    </div>

                    <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-block" id="submit">Add Data Apprentice</button>
                </form>
            </div>
            <!-- eof body -->
        </div>
    </div>
</div>
<!-- end of Apprentice Modal -->

<!-- Edit Apprentice Modal -->
<?php
foreach ($subordinate_internship->result() as $s) {
?>
<div class="modal fade" id="editInternship<?= $s->nim ?>"  role="dialog" aria-labelledby="editInternshipLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="editInternshipLabel">Edit Data Apprentice</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/Profile/edit_data_internship/<?= $s->nim ?>">
                    <div class="form-group ml-auto">
                        <label class="required" for="nama_mahasiswa">Name</label>
                        <input type="text" class="text-uppercase form-control" id="nama_mahasiswa" name="nama_mahasiswa" value="<?= $s->nama_mahasiswa ?>">
                    </div>
                    <div class="form-group">
                        <label class="required" for="groups">Cluster Education</label>
                        <select class="select2clustered form-control" id="cluster_ed" name="id_cluster_ed" required="required">
                            <option selected disabled value="">Choose Cluster Education</option>
                            <?php
                                foreach ($cluster_ed->result() as $c) {
                                    if ($c->id_cluster_ed == $s->id_cluster_ed) {
                                        echo '<option value="' . $c->id_cluster_ed . '" selected>' . $c->cluster_ed_desc . '</option>';
                                    } else {
                                        echo '<option value="' . $c->id_cluster_ed . '">' . $c->cluster_ed_desc . '</option>';
                                    }
                                }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="required" for="id_ed_bg">Educational Background</label>
                        <select class="select2edbg form-control" id="ed_bg" name="id_ed_bg" required="required">
                            <option selected disabled value="">Choose Educational Background</option>
                            <?php
                                foreach ($ed_bg->result() as $ed) {
                                    if ($ed->id_ed_bg == $s->id_ed_bg) {
                                        echo '<option value="' . $ed->id_ed_bg . '" selected>' . $ed->ed_bg_desc . '</option>';
                                    } else {
                                        echo '<option value="' . $ed->id_ed_bg . '">' . $ed->ed_bg_desc . '</option>';
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="nik">Supervisor</label>
                        <select class="select2member form-control" id="nik" name="nik" required="required" readonly>
                            <?php
                                echo '<option value="' . $member_dsc->nik . '">' . $member_dsc->nik . ' - ' . $member_dsc->nama_member . '</option>';
                            ?>
                        </select>
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="kode_universitas">University</label>
                        <select class="select2univ form-control" id="kode_universitas" name="kode_universitas" required="required">
                            <option selected disabled value="">Choose University</option>
                            <?php
                                foreach ($universitas->result() as $uni) {
                                    if ($uni->kode_universitas == $s->kode_universitas) {
                                        echo '<option value="' . $uni->kode_universitas . '" selected>' . $uni->nama_universitas . '</option>';
                                    } else {
                                        echo '<option value="' . $uni->kode_universitas . '">' . $uni->nama_universitas . '</option>';
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="tahun_intern">Year</label>
                        <input type="number" class="text-uppercase form-control" id="tahun_intern" name="tahun_intern" value=<?= $s->tahun_intern ?>>
                    </div>
                    <div class="form-group ml-auto">
                        <label for="kontrak_mulai_internship">Contract Started</label>
                        <input class="form-control" type="date" id="kontrak_mulai_internship" name="kontrak_mulai_internship" value=<?= $s->kontrak_mulai_internship ?>>
                    </div>
                    <div class="form-group ml-auto">
                        <label for="kontrak_selesai_internship">Contract Finished</label>
                        <input class="form-control" type="date" id="kontrak_selesai_internship" name="kontrak_selesai_internship" value=<?= $s->kontrak_selesai_internship ?>>
                    </div>

                    <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-block" id="submit">Edit Data Apprentice</button>
                </form>
            </div>
            <!-- eof body -->
        </div>
    </div>
</div>
<?php
}
?>
<!-- end of Edit Apprentice Modal -->

<!-- Delete Apprentice Confirmation-->
<?php
foreach ($subordinate_internship->result() as $mi) {
?>
    <div class="modal fade" id="deleteInternship<?= $mi->nim ?>"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure want to delete this data?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a id="btn-delete" class="btn btn-danger" href="<?= base_url() ?>pages/Profile/delete_data_internship/<?= $mi->nim ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- end of Delete Apprentice Confirmation-->

<!-- resign Apprentice Confirmation-->
<?php
foreach ($subordinate_internship->result() as $mi) {
?>
    <div class="modal fade" id="resignInternship<?= $mi->nim ?>"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Resign Confirmation</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure <b><?= $mi->nama_mahasiswa; ?></b> has resign ?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
                    <a id="btn-delete" class="btn btn-danger" href="<?= base_url() ?>pages/Profile/update_statusAlumni_internship/<?= $mi->nim ?>">Yes</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- end of resign Apprentice Confirmation-->

<!-- Add Usecase OKR Member -->
<div class="modal fade" id="addOKRMember" role="dialog" aria-labelledby="addOKRMemberLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addOKRMemberLabel">Add OKR Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/Profile/add_data_okr_member">
                <input type="hidden" id="okr_member_member" name="okr_member_member" required="required" value="<?= $member_dsc->nik ?>">
                    <div class="form-group">
                        <label class="required" for="usecase2">Usecase</label>
                        <select class="form-control" name="id_usecase" required="required">
                            <option value="">Choose Usecase</option>
                            <?php foreach ($usecases->result() as $n_usecase) { 
                                echo '<option value="' . $n_usecase->id_usecase . '">' . $n_usecase->nama_usecase . '</option>';
                             }; ?>
                        </select>
                        
                    </div>

                    <div class="form-group ml-auto">
                        <label class="required" for="kodifikasi">Codification</label>
                        <input type="text" class="text-uppercase form-control" id="kodifikasi" name="okr_member_kodifikasi" placeholder="Example : A.1/B.1/C.1" required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="category_okr">Category OKR</label>
                        <select class="form-control" id="category_okr" name="okr_member_category_okr" required="required">
                            <option value="" selected disabled>Choose Category</option>
                            <?php
                            foreach ($category_okr->result() as $co) {
                                echo '<option value="' . $co->id_category_okr . '">' . $co->nama_category_okr . '</option>';
                            };
                            ?>
                        </select>
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="okr_member_objective">Objective</label>
                        <input type="text" class="text-uppercase form-control" id="okr_member_objective" name="okr_member_objective" placeholder="Example : dashboard" required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="okr_member_key_result">Key Result</label>
                        <input type="text" class="text-uppercase form-control" id="okr_member_key_result" name="okr_member_key_result" placeholder="Example : Customer & Marketing Analytic" required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="dod">Definition of Done</label>
                        <input type="text" class="text-uppercase form-control" id="dod" name="okr_member_dod" placeholder="Example : dashboard selesai" required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="okr_member_quarter">Quarter</label>
                        <input type="text" class="text-uppercase form-control" id="okr_member_quarter" name="okr_member_quarter" placeholder="Example : Q1,Q2,Q3/Q1-Q4" required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="okr_member_year">Year</label>
                        <input type="number" class="text-uppercase form-control" id="okr_member_year" name="okr_member_year" placeholder="Example: 2021" required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="assignee">Assignee</label>
                        <input type="text" class="text-uppercase form-control" id="okr_member_assignee" name="okr_member_assignee" required="required" value="<?= $member_dsc->nik ?>" readonly>
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="complexity">Complexity</label>
                        <select class="form-control" id="complexity" name="okr_member_complexity" required="required">
                            <option value="" selected disabled>Choose One</option>
                            <?php
                            foreach ($complexity_okr->result() as $cx) {
                                echo '<option value="' . $cx->id_complexity_okr . '">' . $cx->nama_complexity_okr . '</option>';
                            };
                            ?>
                        </select>
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="type_of_output">Type of Output</label>
                        <select class="form-control type_of_output_add_member" id="type_of_output" name="okr_member_type_of_output" required="required">
                            <option value="" selected disabled>Choose One</option>
                            <?php
                            foreach ($too_okr->result() as $too) {
                                echo '<option value="' . $too->id_too_okr . '">' . $too->nama_too_okr . '</option>';
                            };
                            ?>
                        </select>
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="unit">Unit</label>
                        <input type="text" class="text-uppercase form-control add_member_unit" id="unit" name="unit" placeholder="Example :  %/Rp/Hari/Jam" required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="target">Target</label>
                        <input type="number" class="text-uppercase form-control add_member_target" id="target" name="target" placeholder="Example : 100/10000/7/24" required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="start">Start</label>
                        <input type="date" class="form-control add_member_start" name="start" required="required" />
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="end">End</label>
                        <input type="date" class="form-control add_member_end" name="end" required="required" />
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="type_of_formula">Type of Formula</label>
                        <select class="form-control" id="type_of_formula" name="okr_member_type_of_formula" required="required">
                            <option value="" selected disabled>Choose One</option>
                            <?php
                            foreach ($tof_okr->result() as $tof) {
                                echo '<option value="' . $tof->id_tof_okr . '">' . $tof->nama_tof_okr . '</option>';
                            };
                            ?>
                        </select>
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="progress">Progress (%)</label>
                        <input type="number" class="form-control " name="progress" placeholder="Example : 50" required="required" />
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="progress">Detail Progress</label>
                        <input type="text" class="form-control " name="detail_progress" placeholder="Example : 74 hour per month" required="required" />
                    </div>

                    <!-- <input type="hidden" name="id_usecase" value="<?= $usecase->id_usecase ?>"> -->

                    <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-block" id="submit">Add OKR Member</button>
                </form>
            </div>
            <!-- eof body -->
        </div>
    </div>
</div>
<!-- end of Add Usecase OKR Member -->

<!-- Edit Usecase OKR Member-->
<?php
foreach ($okr_member->result() as $om) {
?>
    <div class="modal fade" id="editOKRMember<?= $om->id_okr_member ?>" role="dialog" aria-labelledby="editOKRMemberLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editOKRMemberLabel">Edit OKR Member</h5>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/Profile/edit_data_okr_member">
                        <div class="form-group ml-auto">
                            <label class="required" for="usecase">Use Case</label>
                            <select class="form-control" id="usecase" name="id_usecase" required="required">
                                <option value="" selected disabled>Choose One</option>
                                <?php
                                foreach ($usecases->result() as $uc) {
                                    if ($uc->id_usecase == $om->id_usecase) {
                                        echo '<option value="' . $uc->id_usecase . '" selected>' . $uc->nama_usecase . '</option>';
                                    } else {
                                        echo '<option value="' . $uc->id_usecase . '">' . $uc->nama_usecase . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="kodifikasi">Codification</label>
                            <input type="text" class="text-uppercase form-control" id="kodifikasi" name="okr_member_kodifikasi_new" value="<?= $om->kodifikasi ?>" placeholder="Example : A.1/B.1/C.1" required="required">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="category_okr">Category OKR</label>
                            <select class="form-control" id="category_okr" name="okr_member_category_okr_new" required="required">
                                <option value="" selected disabled>Choose One</option>
                                <?php
                                foreach ($category_okr->result() as $co) {
                                    if ($co->id_category_okr == $om->category_okr) {
                                        echo '<option value="' . $co->id_category_okr . '" selected>' . $co->nama_category_okr . '</option>';
                                    } else {
                                        echo '<option value="' . $co->id_category_okr . '">' . $co->nama_category_okr . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="okr_member_objective">Objective</label>
                            <input type="text" class="text-uppercase form-control" id="okr_member_objective" name="okr_member_objective_new" value="<?= $om->objective ?>" placeholder="Example : dashboard" required="required">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="okr_member_key_result">Key Result</label>
                            <input type="text" class="text-uppercase form-control" id="okr_member_key_result" name="okr_member_key_result_new" value="<?= $om->key_result ?>" placeholder="Example : Customer & Marketing Analytic" required="required">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="dod">Definition of Done</label>
                            <input type="text" class="text-uppercase form-control" id="dod" name="okr_member_dod_new" value="<?= $om->definition_of_done ?>" placeholder="Example : dashboard selesai" required="required">
                        </div>

                        <div class="form-group ml-auto">
                            <label class="required" for="okr_member_quarter">Quarter</label>
                            <input type="text" class="text-uppercase form-control" id="okr_member_quarter" name="okr_member_quarter_new" value="<?= $om->quarter ?>" placeholder="Example : Q1,Q2,Q3/Q1-Q4" required="required">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="okr_member_year">Year</label>
                            <input type="number" class="text-uppercase form-control" id="okr_member_year" name="okr_member_year_new" value="<?= $om->year ?>" placeholder="Example : 2021" required="required">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="complexity">Complexity</label>
                            <select class="form-control" id="complexity" name="okr_member_complexity_new" required="required">
                                <option value="" selected disabled>Choose One</option>
                                <?php
                                foreach ($complexity_okr->result() as $cx) {
                                    if ($cx->id_complexity_okr == $om->complexity) {
                                        echo '<option value="' . $cx->id_complexity_okr . '" selected>' . $cx->nama_complexity_okr . '</option>';
                                    } else {
                                        echo '<option value="' . $cx->id_complexity_okr . '">' . $cx->nama_complexity_okr . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="type_of_output">Type of Output</label>
                            <select class="form-control type_of_output_member" id="type_of_output_member" name="okr_member_type_of_output_new" required="required">
                                <option value="" selected disabled>Choose One</option>
                                <?php
                                foreach ($too_okr->result() as $too) {
                                    if ($too->id_too_okr == $om->type_of_output) {
                                        echo '<option value="' . $too->id_too_okr . '" selected>' . $too->nama_too_okr . '</option>';
                                    } else {
                                        echo '<option value="' . $too->id_too_okr . '">' . $too->nama_too_okr . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="unit">Unit</label>
                            <input type="text" class="text-uppercase form-control unit_member" id="unit" name="unit" value="<?= $om->unit ?>" placeholder="Example :  %/Rp/Hari/Jam" required="required">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="unit">Target</label>
                            <input type="number" class="text-uppercase form-control target_member" id="target" name="target" value="<?= $om->target ?>" placeholder="Example : 100/10000/7/24" required="required">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="start">Start</label>
                            <input type="date" class="form-control start_member" name="start" value="<?= $om->start ?>" required="required" />
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="end">End</label>
                            <input type="date" class="form-control end_member" name="end" value="<?= $om->end ?>" required="required" />
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="type_of_formula">Type of Formula</label>
                            <select class="form-control" id="type_of_formula" name="okr_member_type_of_formula_new" required="required">
                                <option value="" selected disabled>Choose One</option>
                                <?php
                                foreach ($tof_okr->result() as $tof) {
                                    if ($tof->id_tof_okr == $om->type_of_formula) {
                                        echo '<option value="' . $tof->id_tof_okr . '" selected>' . $tof->nama_tof_okr . '</option>';
                                    } else {
                                        echo '<option value="' . $tof->id_tof_okr . '">' . $tof->nama_tof_okr . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group ml-auto">
                            <label class="required" for="progress">Progress (%)</label>
                            <input type="number" class="form-control " name="progress_new" value="<?= $om->progress ?>" required="required" />
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="progress">Detail Progress</label>
                            <input type="text" class="form-control " name="detail_progress_new" value="<?= $om->detail_progress ?>" required="required" />
                        </div>

                        <input type="hidden" name="id_okr_member" value="<?= $om->id_okr_member ?>">

                        <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block" id="submit">Edit OKR Member</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>
<!-- End of Edit Usecase OKR Member -->

<!-- Delete Usecase OKR Member -->
<?php
foreach ($okr_member->result() as $om) {
?>

    <div class="modal fade" id="deleteOKRMember<?= $om->id_okr_member ?>" role="dialog" aria-labelledby="deleteOKRMemberLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteOKRMemberLabel">Delete Confirmation</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure want to delete this data?
                </div>
                <div class="modal-footer">
                    <form role="form" method="post" action="<?= base_url() ?>pages/Profile/delete_data_okr_member/<?= $om->id_okr_member ?>">
                        <div class="form-group ml-auto">
                            <input type="hidden" id="id_usecase" name="id_usecase" value="<?= $om->id_usecase ?>">
                        </div>

                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger" id="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php } ?>
<!-- End of Delete Usecase OKR Member -->