 <!-- Edit Member Modal -->
 <div class="modal fade" id="editMember<?= $member_dsc->nik ?>"  role="dialog" aria-labelledby="editMemberLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="editMemberLabel">Edit Member</h5>
             </div>
             <div class="modal-body">
                 <form role="form" method="post" action="<?= base_url() ?>pages/DscMember/edit_data_memberdsc">

                     <div class="form-group ml-auto">
                         <label class="required" for="nik">NIK</label>
                         <input type="text" class="form-control" id="nik" name="nik" value="<?= $member_dsc->nik ?>">
                         <input type="hidden" id="nik" name="nik" value="<?= $member_dsc->nik ?>">
                     </div>
                     <div class="form-group ml-auto">
                         <label class="required" for="nama_member">Name</label>
                         <input type="text" class="form-control text-uppercase" id="nama_member" name="nama_member" value="<?= $member_dsc->nama_member ?>" required="required">
                     </div>
                     <div class="form-group">
                         <label class="required" for="id_ed_bg">Educational Background</label>
                         <select class="form-control" id="id_ed_bg" name="id_ed_bg" required="required">
                             <option disabled value="">Choose Educational Background</option>
                             <?php
                                foreach ($ed_bg->result() as $edbg) {
                                    if ($edbg->id_ed_bg == $member_dsc->id_ed_bg) {
                                        echo '<option class="text-uppercase" value="' . $edbg->id_ed_bg . '" class="' . $edbg->id_ed_bg . '" selected>' . $edbg->id_ed_bg . ' - ' . $edbg->ed_bg_desc . '</option>';
                                    } else {
                                        echo '<option class="text-uppercase" value="' . $edbg->id_ed_bg . '" class="' . $edbg->id_ed_bg . '">' . $edbg->id_ed_bg . ' - ' . $edbg->ed_bg_desc . '</option>';
                                    }
                                }
                                ?>
                         </select>
                     </div>
                     <div class="form-group">
                         <label class="required" for="id_status">Status</label>
                         <select class="form-control" id="id_status" name="id_status" required="required">
                             <option disabled value="">Choose Status</option>
                             <?php
                                foreach ($status->result() as $st) {
                                    if ($st->id_status == $member_dsc->id_status) {
                                        echo '<option value="' . $st->id_status . '" class="' . $st->id_status . '" selected>' . $st->id_status . ' - ' . $st->nama_status . '</option>';
                                    } else {
                                        echo '<option value="' . $st->id_status . '" class="' . $st->id_status . '">' . $st->id_status . ' - ' . $st->nama_status . '</option>';
                                    }
                                }
                                ?>
                         </select>
                     </div>
                     <div class="form-group">
                         <label class="required" for="id_posisi">Position</label>
                         <select class="form-control" id="id_posisi" name="id_posisi" required="required">
                             <option disabled value="">Choose Position</option>
                             <?php
                                foreach ($posisi->result() as $ps) {
                                    if ($ps->id_posisi == $member_dsc->id_posisi) {
                                        echo '<option value="' . $ps->id_posisi . '" class="' . $ps->id_posisi . '" selected>' . $ps->id_posisi . ' - ' . $ps->nama_posisi . '</option>';
                                    } else {
                                        echo '<option value="' . $ps->id_posisi . '" class="' . $ps->id_posisi . '">' . $ps->id_posisi . ' - ' . $ps->nama_posisi . '</option>';
                                    }
                                }
                                ?>
                         </select>
                     </div>
                     <div class="form-group">
                         <label class="required" for="id_posisi_type">Position Type</label>
                         <select class="form-control" id="id_posisi_type" name="id_posisi_type" required="required">
                             <option disabled value="">Choose Position</option>
                             <?php
                                foreach ($posisi_type->result() as $pt) {
                                    if ($pt->id_posisi_type == $member_dsc->id_posisi_type) {
                                        echo '<option value="' . $pt->id_posisi_type . '" class="' . $pt->id_posisi_type . '" selected>' . $pt->id_posisi_type . ' - ' . $pt->nama_posisi_type . '</option>';
                                    } else {
                                        echo '<option value="' . $pt->id_posisi_type . '" class="' . $pt->id_posisi_type . '">' . $pt->id_posisi_type . ' - ' . $pt->nama_posisi_type . '</option>';
                                    }
                                }
                                ?>
                         </select>
                     </div>
                     <div class="form-group">
                         <label class="required" for="id_posisi_level">Position Level</label>
                         <select class="form-control" id="id_posisi_level" name="id_posisi_level" required="required">
                             <option disabled value="">Choose Position</option>
                             <?php
                                foreach ($posisi_level->result() as $pl) {
                                    if ($pl->id_posisi_level == $member_dsc->id_posisi_level) {
                                        echo '<option value="' . $pl->id_posisi_level . '" class="' . $pl->id_posisi_level . '" selected>' . $pl->id_posisi_level . ' - ' . $pl->nama_posisi_level . '</option>';
                                    } else {
                                        echo '<option value="' . $pl->id_posisi_level . '" class="' . $pl->id_posisi_level . '">' . $pl->id_posisi_level . ' - ' . $pl->nama_posisi_level . '</option>';
                                    }
                                }
                                ?>
                         </select>
                     </div>
                     <div class="form-group">
                         <label class="required" for="id_band">Band</label>
                         <select class="form-control" id="id_band" name="id_band" required="required">
                             <option disabled value="">Choose Band</option>
                             <?php
                                foreach ($band->result() as $bd) {
                                    if ($bd->id_band == $member_dsc->id_band) {
                                        echo '<option value="' . $bd->id_band . '" class="' . $bd->id_band . '" selected>' . $bd->id_band . ' - ' . $bd->nama_band . '</option>';
                                    } else {
                                        echo '<option value="' . $bd->id_band . '" class="' . $bd->id_band . '">' . $bd->id_band . ' - ' . $bd->nama_band . '</option>';
                                    }
                                }
                                ?>
                         </select>
                     </div>

                     <div class="form-group ml-auto">
                         <label for="kontrak_mulai">Contract Started</label>
                         <input class="form-control" type="date" id="kontrak_mulai" name="kontrak_mulai" value="<?= $member_dsc->kontrak_mulai ?>">
                     </div>
                     <div class="form-group ml-auto">
                         <label for="kontrak_selesai">Contract Finished</label>
                         <input class="form-control" type="date" id="kontrak_selesai" name="kontrak_selesai" value="<?= $member_dsc->kontrak_selesai ?>">
                     </div>

                     <input type="hidden" name="code" value="private">

                     <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-success btn-block" id="submit">Edit Data Member</button>
                 </form>
             </div>
         </div>
     </div>
 </div>
 <!-- End of Edit Member Modal -->

 <!-- Edit Photo Modal -->
 <div class="modal fade" id="editPhoto<?= $member_dsc->nik ?>"  role="dialog" aria-labelledby="editPhotoLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="editPhotoLabel">Edit Photo Member</h5>
             </div>
             <div class="modal-body">
                 <form role="form" method="post" action="<?= base_url() ?>pages/DscMember/edit_photo_memberdsc" enctype="multipart/form-data">

                     <div class="form-group ml-auto" hidden>
                         <label class="required" for="nik">NIK</label>
                         <input type="text" class="form-control" id="nik" name="nik" value="<?= $member_dsc->nik ?>">
                         <input type="hidden" name="nik" value="<?= $member_dsc->nik ?>">
                     </div>
                     <div class="form-group ml-auto" hidden>
                         <label class="required" for="nama_member">Name</label>
                         <input type="text" class="form-control" id="nik" name="nama_member" value="<?= $member_dsc->nama_member ?>">
                         <input type="hidden" name="nama_member" value="<?= $member_dsc->nama_member ?>">
                     </div>

                     <div class="form-group ml-auto">
                         <label for="user_photo">Photo</label>
                         <input class="form-control" type="file" id="user_photo" name="user_photo">
                         <small id="passwordHelpBlock" class="form-text text-muted">Uploaded file should only be a JPG/PNG image below 10mb.</small>
                     </div>

                     <input type="hidden" name="code" value="private">

                     <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-success btn-block" id="submit">Edit Data Member</button>
                 </form>
             </div>
         </div>
     </div>
 </div>
 <!-- End of Edit Photo Modal -->

 <!-- Delete Confirmation-->
 <div class="modal fade" id="deleteModal<?= $member_dsc->nik ?>"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                 <a id="btn-delete" class="btn btn-danger" href="<?= base_url() ?>pages/DscMember/delete_data_memberdsc/<?= $member_dsc->nik ?>">Delete</a>
             </div>
         </div>
     </div>
 </div>
 <!-- end of Delete Confirmation-->

 <!-- Add Usulan Training -->
 <div class="modal fade" id="addUsulanTraining"  role="dialog" aria-labelledby="addUsulanTrainingLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <!-- header -->
             <div class="modal-header">
                 <h5 class="modal-title" id="addUsulanTrainingLabel">Add Training Suggestion</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <!-- eof header -->
             <!-- body -->
             <div class="modal-body">
                 <form role="form" method="post" action="<?= base_url() ?>pages/DscMember/add_data_usulan_training" enctype="multipart/form-data">
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
                     <button type="submit" class="btn btn-success btn-block" id="submit">Add Data Proposed Training</button>
                 </form>
             </div>
             <!-- eof body -->
         </div>
     </div>
 </div>
 <!-- End Add Usulan Training -->

 <!-- Delete Usulan Training-->
 <?php
    foreach ($usulan->result() as $u) {
    ?>
     <div class="modal fade" id="deleteUsulanTraining<?= $u->id_usulan ?>"  role="dialog" aria-labelledby="deleteUsulanModal" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="deleteUsulanModal">Delete Confirmation</h5>
                     <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">×</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     Are you sure want to delete this data?
                 </div>
                 <div class="modal-footer">
                     <form role="form" method="post" action="<?= base_url() ?>pages/DscMember/delete_data_usulan_training/<?= $u->id_usulan ?>">
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
     <div class="modal fade" id="editUsulanTraining<?= $u->id_usulan ?>"  role="dialog" aria-labelledby="editUsulanTrainingLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="editUsulanTrainingLabel">Edit Training Suggestion</h5>
                 </div>
                 <div class="modal-body">
                     <form role="form" method="post" action="<?= base_url() ?>pages/DscMember/edit_data_usulan_training">
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
                         <button type="submit" class="btn btn-success btn-block" id="submit">Edit Data Proposed Training</button>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 <?php
    }
    ?>
 <!-- End Edit Usulan Training -->

 <!-- Add Project History -->
 <div class="modal fade" id="addProjectHistory"  role="dialog" aria-labelledby="addProjectHistoryLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <!-- header -->
             <div class="modal-header">
                 <h5 class="modal-title" id="addProjectHistoryLabel">Add Project History</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <!-- eof header -->
             <!-- body -->
             <div class="modal-body">
                 <form role="form" method="post" action="<?= base_url() ?>pages/DscMember/add_data_project_history" enctype="multipart/form-data">
                     <div class="form-group ml-auto" hidden>
                         <label class="required" for="nik">NIK</label>
                         <input type="text" class="form-control" id="nik" name="nik" required="required" value="<?= $member_dsc->nik ?>">
                         <input type="hidden" id="nik" name="nik" value="<?= $member_dsc->nik ?>">
                     </div>
                     <div class="form-group ml-auto">
                         <label class="required" for="project_name">Project Name</label>
                         <input type="text" class="form-control" id="project_name" name="project_name" placeholder="Project Name" required="required">
                     </div>
                     <div class="form-group ml-auto">
                         <label class="required" for="date_start">Date Start</label>
                         <input type="date" class="form-control" id="date_start" name="date_start" required="required">
                     </div>
                     <div class="form-group ml-auto">
                         <label class="required" for="date_end">Date End</label>
                         <input type="date" class="form-control" id="date_end" name="date_end" required="required">
                     </div>
                     <div class="form-group ml-auto">
                         <label class="required" for="project_role">Role</label>
                         <input type="text" class="form-control" id="project_role" name="project_role" placeholder="Role" required="required">
                     </div>

                     <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-success btn-block" id="submit">Add Data Usulan Training</button>
                 </form>
             </div>
             <!-- eof body -->
         </div>
     </div>
 </div>
 <!-- End Add Project History -->

 <!-- Edit Project History -->
 <?php
    foreach ($project_history->result() as $ph) {
    ?>

     <div class="modal fade" id="editProjectHistory<?= $ph->id_project_history ?>"  role="dialog" aria-labelledby="editProjectHistoryLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="editProjectHistoryLabel">Edit Project History</h5>
                 </div>
                 <div class="modal-body">
                     <form role="form" method="post" action="<?= base_url() ?>pages/DscMember/edit_data_project_history">
                         <div class="form-group ml-auto">
                             <input type="hidden" id="id_project_history" name="id_project_history" value="<?= $ph->id_project_history ?>">
                         </div>
                         <div class="form-group ml-auto" hidden>
                             <label class="required" for="nik">NIK</label>
                             <input type="text" class="form-control" id="nik" name="nik" required="required" value="<?= $ph->nik ?>">
                             <input type="hidden" id="nik" name="nik" value="<?= $ph->nik ?>">
                         </div>
                         <div class="form-group ml-auto">
                             <label class="required" for="project_name">Project Name</label>
                             <input type="text" class="form-control" id="project_name" name="project_name" required="required" value="<?= $ph->project_name ?>">
                         </div>
                         <div class="form-group ml-auto">
                             <label class="required" for="date_start">Date Start</label>
                             <input type="date" class="form-control" id="date_start" name="date_start" required="required" value="<?= $ph->date_start ?>">
                         </div>
                         <div class="form-group ml-auto">
                             <label class="required" for="date_end">Date End</label>
                             <input type="date" class="form-control" id="date_end" name="date_end" required="required" value="<?= $ph->date_end ?>">
                         </div>
                         <div class="form-group ml-auto">
                             <label class="required" for="project_role">Role</label>
                             <input type="text" class="form-control" id="project_role" name="project_role" required="required" value="<?= $ph->project_role ?>">
                         </div>

                         <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-success btn-block" id="submit">Edit Project History</button>
                     </form>
                 </div>
             </div>
         </div>
     </div>

 <?php } ?>
 <!-- End Edit Project History -->

 <!-- Delete Project History -->
 <?php
    foreach ($project_history->result() as $ph) {
    ?>

     <div class="modal fade" id="deleteProjectHistory<?= $ph->id_project_history ?>"  role="dialog" aria-labelledby="deleteProjectHistoryModal" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="deleteProjectHistoryModal">Delete Confirmation</h5>
                     <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">×</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     Are you sure want to delete this data?
                 </div>
                 <div class="modal-footer">
                     <form role="form" method="post" action="<?= base_url() ?>pages/DscMember/delete_data_project_history/<?= $ph->id_project_history ?>">
                         <div class="form-group ml-auto">
                             <input type="hidden" id="nik" name="nik" value="<?= $ph->nik ?>">
                         </div>
                         <div class="form-group ml-auto">
                             <input type="hidden" id="id_project_history" name="id_project_history" value="<?= $ph->id_project_history ?>">
                         </div>
                         <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                         <button type="submit" class="btn btn-danger" id="submit">Delete</button>
                     </form>
                 </div>
             </div>
         </div>
     </div>

 <?php } ?>
 <!-- End Delete Project History -->

 <!-- Add Asesor -->
 <div class="modal fade" id="addAsesor"  role="dialog" aria-labelledby="addAsesorLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <!-- header -->
             <div class="modal-header">
                 <h5 class="modal-title" id="addAsesorLabel">Add Assessor</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <!-- eof header -->
             <!-- body -->
             <div class="modal-body">
                 <form role="form" method="post" action="<?= base_url() ?>pages/DscMember/add_data_asesor" enctype="multipart/form-data">
                     <div class="form-group ml-auto">
                         <label class="required" for="nik_penilai">Evaluator Name</label>
                         <select class="select2member form-control" id="nik_penilai" name="nik_penilai" required="required">
                             <option value=""></option>
                             <?php
                                foreach ($all_member->result() as $md) {
                                    echo '<option value="' . $md->nik . '">' . $md->nik . ' - ' . $md->nama_member . '</option>';
                                }
                                ?>
                         </select>
                     </div>
                     <div class="form-group ml-auto">
                         <input type="hidden" id="nik_dinilai" name="nik_dinilai" value="<?= $member_dsc->nik ?>">
                     </div>
                     <div class="form-group ml-auto">
                         <label class="required" for="nilai">Score</label>
                         <input type="number" class="form-control" id="nilai" name="nilai" required="required">
                     </div>

                     <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-success btn-block" id="submit">Add Assessor</button>
                 </form>
             </div>
             <!-- eof body -->
         </div>
     </div>
 </div>
 <!-- End Add Asesor -->

 <!-- Edit Asesor -->
 <?php
    foreach ($asesor->result() as $a) {
    ?>

     <div class="modal fade" id="editAsesor<?= $a->id_asesor ?>"  role="dialog" aria-labelledby="editAsesorLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="editAsesorLabel">Edit Assessor</h5>
                 </div>
                 <div class="modal-body">
                     <form role="form" method="post" action="<?= base_url() ?>pages/DscMember/edit_data_asesor">
                         <div class="form-group ml-auto">
                             <input type="hidden" id="nik_dinilai" name="nik_dinilai" value="<?= $a->nik_dinilai ?>">
                         </div>
                         <div class="form-group ml-auto">
                             <label class="required" for="nik_penilai">Evaluator Name</label>
                             <select class="form-control" id="nik_penilai" name="nik_penilai" required="required">
                                 <option selected disabled>Choose Name</option>
                                 <?php
                                    foreach ($all_member->result() as $md) {
                                        if ($md->nik == $a->nik_penilai) {
                                            echo '<option value="' . $md->nik . '" selected>' . $md->nik . ' - ' . $md->nama_member . '</option>';
                                        } else {
                                            echo '<option value="' . $md->nik . '">' . $md->nik . ' - ' . $md->nama_member . '</option>';
                                        }
                                    }
                                    ?>
                             </select>
                         </div>
                         <div class="form-group ml-auto">
                             <label class="required" for="nilai">Score</label>
                             <input type="number" class="form-control" id="nilai" name="nilai" required="required" value="<?= $a->nilai ?>">
                         </div>
                         <div class="form-group ml-auto">
                             <input type="hidden" id="id_asesor" name="id_asesor" value="<?= $a->id_asesor ?>">
                         </div>

                         <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-success btn-block" id="submit">Edit Assessor</button>
                     </form>
                 </div>
             </div>
         </div>
     </div>

 <?php } ?>
 <!-- End Edit Asesor -->

 <!-- Delete Asesor -->
 <?php
    foreach ($asesor->result() as $a) {
    ?>

     <div class="modal fade" id="deleteAsesor<?= $a->id_asesor ?>"  role="dialog" aria-labelledby="deleteAsesorModal" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="deleteAsesorModal">Delete Confirmation</h5>
                     <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">×</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     Are you sure want to delete this data?
                 </div>
                 <div class="modal-footer">
                     <form role="form" method="post" action="<?= base_url() ?>pages/DscMember/delete_data_asesor/<?= $a->id_asesor ?>">
                         <div class="form-group ml-auto">
                             <input type="hidden" id="nik_dinilai" name="nik_dinilai" value="<?= $a->nik_dinilai ?>">
                         </div>
                         <div class="form-group ml-auto">
                             <input type="hidden" id="nik_penilai" name="nik_penilai" value="<?= $a->nik_penilai ?>">
                         </div>
                         <div class="form-group ml-auto">
                             <input type="hidden" id="id_asesor" name="id_asesor" value="<?= $a->id_asesor ?>">
                         </div>
                         <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                         <button type="submit" class="btn btn-danger" id="submit">Delete</button>
                     </form>
                 </div>
             </div>
         </div>
     </div>

 <?php } ?>
 <!-- End Delete Asesor -->

 <!-- Add Asesor -->
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
                 <form role="form" method="post" action="<?= base_url() ?>pages/DscMember/add_data_subordinate" enctype="multipart/form-data">
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
 <!-- End Add Asesor -->

 <!-- Delete Asesor -->
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
                     <form role="form" method="post" action="<?= base_url() ?>pages/DscMember/delete_data_subordinate/<?= $s->id_superior_subordinate ?>">
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
 <!-- End Delete Asesor -->


 <!-- Add Proposed Certification -->
 <div class="modal fade" id="addUsulanCertification"  role="dialog" aria-labelledby="addUsulanCertificationLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <!-- header -->
             <div class="modal-header">
                 <h5 class="modal-title" id="addUsulanCertificationLabel">Add Proposed Certification</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <!-- eof header -->
             <!-- body -->
             <div class="modal-body">
                 <form role="form" method="post" action="<?= base_url() ?>pages/DscMember/add_data_usulan_certification" enctype="multipart/form-data">
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
 <!-- End Add Proposed Certification -->

 <!-- Delete Proposed Certification-->
 <?php
    foreach ($usulan_cert->result() as $u) {
    ?>
     <div class="modal fade" id="deleteUsulanCertification<?= $u->id_usulan_cert ?>"  role="dialog" aria-labelledby="deleteUsulanCertificationModal" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="deleteUsulanCertificationModal">Delete Confirmation</h5>
                     <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">×</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     Are you sure want to delete this data?
                 </div>
                 <div class="modal-footer">
                     <form role="form" method="post" action="<?= base_url() ?>pages/DscMember/delete_data_usulan_certification/<?= $u->id_usulan_cert ?>">
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
 <!-- end of Delete Proposed Certification -->

 <!-- Edit Proposed Certification -->
 <?php
    foreach ($usulan_cert->result() as $u) {
    ?>
     <div class="modal fade" id="editUsulanCertification<?= $u->id_usulan_cert ?>"  role="dialog" aria-labelledby="editUsulanCertificationLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="editUsulanCertificationLabel">Edit Proposed Certification</h5>
                 </div>
                 <div class="modal-body">
                     <form role="form" method="post" action="<?= base_url() ?>pages/DscMember/edit_data_usulan_certification">
                         <div class="form-group ml-auto">
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