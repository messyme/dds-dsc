  <!-- Body Section -->
  <style>
    p {
        margin: 0 !important;
        padding: 0 !important;
    }

    .field-name{
        font-size: 20px;   
        font-weight: 550;
    }

    .field-value{
        color: gray;
        font-weight: 550;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

  </style>

  <body>
    <div class="container p-4" id="bg-template">
        <h1 class="mb-4">My Profile</h1>
        <hr>
        <div class="row d-flex align-items-center">
            <div class="col-lg-3 col-md-5 mb-4">
                <?php 
                    if (!empty($member_dsc->user_photo)) {
                    $user_photo = '<img src="data:image/'.$member_dsc->user_photo_type.';base64,'.base64_encode($member_dsc->user_photo).'" width="225" height="300">';
                    } else {
                        $foto = base_url('/public/assets/uploads/user_photo/user_temp.png');
                        $user_photo = '<img src='.$foto." ".'width="225" height="300">';
                    };
                ?>
                <?= $user_photo ?>
            </div>

            <div class="col-lg-9 col-md-7">
                <h1 class="mb-4"><?= $member_dsc->nama_member ?></h1>
                <hr>
                <div class="row" id="row1">
                    <div id="usecase_leader" class="mb-4 col-lg-4 col-md-6">
                        <p class="field-name">NIK</p>
                        <p class="field-value"><?= $member_dsc->nik ?></p>
                    </div>

                    <div id="tribe" class="mb-4 col-lg-4 col-md-6">
                        <p class="field-name">Cluster Education</p>
                        <p class="field-value"><?= $member_dsc->cluster_ed_desc ?></p>
                    </div>

                    <div id="groups" class="mb-4 col-lg-4 col-md-6">
                        <p class="field-name">Education Background</p>
                        <p class="field-value"><?= $member_dsc->ed_bg_desc ?></p>
                    </div>

                    <div id="tribe" class="mb-4 col-lg-4 col-md-6">
                        <p class="field-name">Status</p>
                        <p class="field-value"><?= $member_dsc->nama_status ?></p>
                    </div>

                    <div id="usecase_leader" class="mb-4 col-lg-4 col-md-6">
                        <p class="field-name">Position</p>
                        <p class="field-value"><?= $member_dsc->nama_posisi ?></p>
                    </div>

                    <div id="groups" class="mb-4 col-lg-4 col-md-6">
                        <p class="field-name">Band</p>
                        <p class="field-value"><?= $member_dsc->nama_band ?></p>
                    </div>

                    <div id="usecase_leader" class="mb-4 col-lg-4 col-md-6">
                        <p class="field-name">Position Type</p>
                        <p class="field-value"><?= $member_dsc->nama_posisi_type ?></p>
                    </div>

                    <div id="usecase_leader" class="mb-4 col-lg-4 col-md-6">
                        <p class="field-name">Position Level</p>
                        <p class="field-value"><?= $member_dsc->nama_posisi_level ?></p>
                    </div>

                    <div id="tribe" class="mb-4 col-lg-4 col-md-6">
                        <p class="field-name">Contract Started</p>
                        <p class="field-value"><?= $member_dsc->kontrak_mulai ?></p>
                    </div>

                    <div id="groups" class="mb-4 col-lg-4 col-md-6">
                        <p class="field-name">Contract Finished</p>
                        <p class="field-value"><?= $member_dsc->kontrak_selesai ?></p>
                    </div>
                </div>
                <?php if($member_dsc->verify_data == 1){ ?>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#requestEdit<?= $member_dsc->nik ?>"><em class="fas fa-edit"></em>&nbsp; Request Edit</button>
                <?php } else { ?>
                <button type="button" class="btn btn-secondary btn-sm" disabled><em class="fas fa-edit"></em>&nbsp; Edit Requested</button>
                <?php } ?>
            </div>
        </div>

        <hr class="mt-4">

        <h1 class="mb-4 mt-4" id="certificate">Certification</h1>

        <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addCertificate"><em class="fas fa-plus"></em> Add Certificate</button>

        <?php
            if($this->session->flashdata('msgCertificate')){
                echo $this->session->flashdata('msgCertificate');
            }
        ?>

        <table id="no_export_5" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Certificate Name</th>
                    <th>Pathway</th>
                    <th>Year</th>
                    <th>Certificate</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    foreach($certification->result() as $c){
                ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td class="text-uppercase"><?= $c->nama_sertifikasi ?></td>
                    <td class="text-uppercase"><?= $c->nama_pathway ?></td>
                    <td class="text-uppercase"><?= $c->tahun_sertifikasi ?></td>
                    <td class="text-uppercase"><a href="../public/assets/uploads/sertifikasi/<?= $c->bukti_sertifikasi ?>"><?= $c->bukti_sertifikasi ?></a></td>
                    <td>
                        <div class="btn-group">
                            <a href="<?= base_url('pages/Profile/getEditCertifiedMember/'.$c->id_certified_member); ?>" type="button" class="btn btn-sm btn-primary"><em class="fas fa-edit"></em> Edit</a>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteCertificate<?= $c->id_certified_member  ?>"><em class="fas fa-trash"></em> Delete</button>
                        </div>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Certificate Name</th>
                    <th>Pathway</th>
                    <th>Year</th>
                    <th>Certificate</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>

        <hr class="mt-4">

        <h1 class="mb-4 mt-4" id="training">Training</h1>

        <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addTraining"><em class="fas fa-plus"></em> Add Training</button>

        <?php
            if($this->session->flashdata('msg')){
                echo $this->session->flashdata('msg');
            }
        ?>

        <table id="no_export_2" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Training Name</th>
                    <th>Pathway</th>
                    <th>Year</th>
                    <th>Certificate</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    foreach($training->result() as $t){
                ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td class="text-uppercase"><?= $t->nama_pelatihan ?></td>
                    <td class="text-uppercase"><?= $t->nama_pathway ?></td>
                    <td class="text-uppercase"><?= $t->tahun_pelatihan ?></td>
                    <td class="text-uppercase"><a href="../public/assets/uploads/training/<?= $t->bukti_pelatihan ?>"><?= $t->bukti_pelatihan ?></a></td>
                    <td>
                        <div class="btn-group">
                            <a href="<?= base_url('pages/Profile/getEditTrainedMember/'.$t->id_trained_member); ?>" type="button" class="btn btn-sm btn-primary"><em class="fas fa-edit"></em> Edit</a>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteTraining<?= $t->id_trained_member  ?>"><em class="fas fa-trash"></em> Delete</button>
                        </div>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Training Name</th>
                    <th>Pathway</th>
                    <th>Year</th>
                    <th>Certificate</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>

        <hr class="mt-4">

        <h1 id="trainingSuggestion" class="mb-4 mt-4">Proposed Training</h1>
        
        <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addTrainingSuggestion"><em class="fas fa-plus"></em> Add Training Suggestion</button>

        <?php
            if($this->session->flashdata('msgTrainingSuggestion')){
                echo $this->session->flashdata('msgTrainingSuggestion');
            }
        ?>

        <table id="no_export_6" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Training Name</th>
                    <th>Pathway</th>
                    <th>Training Source</th>
                    <th>Quarter</th>
                    <th>Year</th>
                    <?php if ($this->session->userdata('role') != 'user_logged_in') { ?>
                    <th>Actions</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    foreach($usulan->result() as $u){
                ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td class="text-uppercase"><?= $u->nama_training ?></td>
                    <td class="text-uppercase"><?= $u->nama_pathway ?></td>
                    <td class="text-uppercase"><a href="<?= $u->training_source ?>"><?= $u->training_source ?></a></td>
                    <td class="text-uppercase"><?= $u->kuartal ?></td>
                    <td class="text-uppercase"><?= $u->year ?></td>
                    <?php if ($this->session->userdata('role') != 'user_logged_in') { ?>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editTrainingSuggestion<?= $u->id_usulan ?>"><em class="fas fa-edit"></em> Edit</button>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteTrainingSuggestion<?= $u->id_usulan  ?>"><em class="fas fa-trash"></em> Delete</button>
                        </div>
                    </td>
                    <?php } ?>
                </tr>
                
                <?php
                    }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Training Name</th>
                    <th>Pathway</th>
                    <th>Training Source</th>
                    <th>Quarter</th>
                    <th>Year</th>
                    <?php if ($this->session->userdata('role') != 'user_logged_in') { ?>
                    <th>Actions</th>
                    <?php } ?>
                </tr>
            </tfoot>
        </table>

        <hr class="mt-4">

        <h1 id="certificationSuggestion" class="mb-4 mt-4">Proposed Certification</h1>
        
        <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addCertificationSuggestion"><em class="fas fa-plus"></em> Add Certification Suggestion</button>

        <?php
            if($this->session->flashdata('msgCertificationSuggestion')){
                echo $this->session->flashdata('msgCertificationSuggestion');
            }
        ?>

        <table id="no_export_7" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Certification Name</th>
                    <th>Pathway</th>
                    <th>Certification Source</th>
                    <th>Quarter</th>
                    <th>Year</th>
                    <?php if ($this->session->userdata('role') != 'user_logged_in') { ?>
                    <th>Actions</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    foreach($usulan_cert->result() as $u){
                ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td class="text-uppercase"><?= $u->nama_certification ?></td>
                    <td class="text-uppercase"><?= $u->nama_pathway ?></td>
                    <td class="text-uppercase"><a href="<?= $u->certification_source ?>"><?= $u->certification_source ?></a></td>
                    <td class="text-uppercase"><?= $u->kuartal ?></td>
                    <td class="text-uppercase"><?= $u->year ?></td>
                    <?php if ($this->session->userdata('role') != 'user_logged_in') { ?>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editCertificationSuggestion<?= $u->id_usulan_cert ?>"><em class="fas fa-edit"></em> Edit</button>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteCertificationSuggestion<?= $u->id_usulan_cert  ?>"><em class="fas fa-trash"></em> Delete</button>
                        </div>
                    </td>
                    <?php } ?>
                </tr>
                
                <?php
                    }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Certification Name</th>
                    <th>Pathway</th>
                    <th>Certification Source</th>
                    <th>Quarter</th>
                    <th>Year</th>
                    <?php if ($this->session->userdata('role') != 'user_logged_in') { ?>
                    <th>Actions</th>
                    <?php } ?>
                </tr>
            </tfoot>
        </table>

        <hr class="mt-4">

        <h1 class="mb-4 mt-4" id="useCase">Use Cases</h1>

        <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addUseCase"><em class="fas fa-plus"></em> Add Use Case</button>

        <?php
            if($this->session->flashdata('msgUseCase')){
                echo $this->session->flashdata('msgUseCase');
            }
        ?>

        <table id="six_row_order" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Use Case Name</th>
                    <th>Role</th>
                    <th>Group Name</th>
                    <th>Tribe Name</th>
                    <th>Squad Name</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    foreach($usecases->result() as $u){
                ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <?php if ($this->session->userdata('role') == 'member_logged_in') { ?>
                        <td class="text-uppercase clickable-row" data-href="<?= base_url() ?>pages/AssignedUsecase/detailusecase/<?= $u->id_usecase ?>"><?= $u->nama_usecase ?></td>
                    <?php } elseif ($this->session->userdata('role') == 'superadmin_logged_in' || $this->session->userdata('role') == 'admin_logged_in'){ ?>
                        <td class="text-uppercase clickable-row" data-href="<?= base_url() ?>pages/Assignments/detailusecase/<?= $u->id_usecase ?>"><?= $u->nama_usecase ?></td>
                    <?php } ?>
                    <td><?= $u->usecase_leader == 1 ? 'LEADER' : 'MEMBER' ?></td>
                    <td class="text-uppercase"><?= $u->nama_groups ?></td>
                    <td class="text-uppercase"><?= $u->nama_tribe ?></td>
                    <td class="text-uppercase"><?= $u->nama_squad ?></td>
                    <td class="text-uppercase"><?= $u->deskripsi_status ?></td>
                </tr>
                
                <?php
                    }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Use Case Name</th>
                    <th>Role</th>
                    <th>Group Name</th>
                    <th>Tribe Name</th>
                    <th>Squad Name</th>
                    <th>Status</th>
                </tr>
            </tfoot>
        </table>

        <hr class="mt-4">

        <h1 id="okrmember" class="mb-4 mt-4">OKR Member</h1>
          <hr>

          <?php if ($this->session->userdata('type') == 'member') { ?>
              <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addOKRMember"><em class="fas fa-plus"></em> Add OKR Member</button>
          <?php } ?>

          <?php if ($avg_okr_member > 0) { ?>
            <button type="button" class="mb-4 btn btn-success" disabled><?= $avg_okr_member?>%</button>
          <?php }else{ ?>
            <button type="button" class="mb-4 btn btn-success" disabled>0%</button>
          <?php } ?>

          <?php
            if ($this->session->flashdata('msgOKRMember')) {
                echo $this->session->flashdata('msgOKRMember');
            }
            ?>

          <table id="no_export_9" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Use Case</th>
                      <th>Codification</th>
                      <th>Category OKR</th>
                      <th>Objective</th>
                      <th>Key Result</th>
                      <th>Definition of Done</th>
                      <th>Quarter</th>
                      <th>Year</th>
                      <th>Complexity</th>
                      <th>Type of Output</th>
                      <th>Unit</th>
                      <th>Target</th>
                      <th>Start</th>
                      <th>End</th>
                      <th>Type of Formula</th>
                      <th>Progress</th>
                      <th>Detail Progress</th>
                      <?php if ($this->session->userdata('type') == 'member') { ?>
                          <th>Action</th>
                      <?php } ?>
                  </tr>
              </thead>
              <tbody>
                  <?php
                    $i = 1;
                    foreach ($okr_member->result() as $om) {
                    ?>
                      <tr>
                          <td><?= $i++ ?></td>
                          <td class="text-uppercase"><?= $om->nama_usecase ?></td>
                          <td class="text-uppercase"><?= $om->kodifikasi ?></td>
                          <td class="text-uppercase"><?= $om->nama_category_okr ?></td>
                          <td class="text-uppercase"><?= $om->objective ?></td>
                          <td class="text-uppercase"><?= $om->key_result ?></td>
                          <td class="text-uppercase"><?= $om->definition_of_done ?></td>
                          <td class="text-uppercase"><?= $om->quarter ?></td>
                          <td class="text-uppercase"><?= $om->year ?></td>
                          <td class="text-uppercase"><?= $om->nama_complexity_okr ?></td>
                          <td class="text-uppercase"><?= $om->nama_too_okr ?></td>
                          <td class="text-uppercase"><?= $om->unit ?></td>
                          <td class="text-uppercase"><?= $om->target ?></td>
                          <td class="text-uppercase"><?= $om->start ?></td>
                          <td class="text-uppercase"><?= $om->end ?></td>
                          <td class="text-uppercase"><?= $om->nama_tof_okr ?></td>
                          <td class="text-uppercase"><?= $om->progress ?>%</td>
                          <td class="text-uppercase"><?= $om->detail_progress ?></td>
                          <?php if ($this->session->userdata('type') == 'member') { ?>
                              <td>
                                  <div class="btn-group">
                                      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editOKRMember<?= $om->id_okr_member ?>"><em class="fas fa-edit"></em> Edit</button>
                                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteOKRMember<?= $om->id_okr_member  ?>"><em class="fas fa-trash"></em> Delete</button>
                                  </div>
                              </td>
                          <?php } ?>
                      </tr>

                  <?php
                    }
                    ?>
              </tbody>
              <tfoot>
                  <tr>
                      <th>No</th>
                      <th>Use Case</th>
                      <th>Codification</th>
                      <th>Category OKR</th>
                      <th>Objective</th>
                      <th>Key Result</th>
                      <th>Definition of Done</th>
                      <th>Quarter</th>
                      <th>Year</th>
                      <th>Complexity</th>
                      <th>Type of Output</th>
                      <th>Unit</th>
                      <th>Target</th>
                      <th>Start</th>
                      <th>End</th>
                      <th>Type of Formula</th>
                      <th>Progress</th>
                      <th>Detail Progress</th>
                      <?php if ($this->session->userdata('type') == 'member') { ?>
                          <th>Action</th>
                      <?php } ?>
                  </tr>
              </tfoot>
          </table>

        <hr class="mt-4">

        <h1 id="subordinate" class="mb-4 mt-4">Subordinate</h1>
            <hr>

            <?php if ($this->session->userdata('type') == 'member') { ?>
                <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addSubordinate"><em class="fas fa-plus"></em> Add Subordinate</button>
            <?php } ?>

            <?php
                if($this->session->flashdata('msgSubordinate')){
                    echo $this->session->flashdata('msgSubordinate');
                }
            ?>

            <table id="no_export_8" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>NIK</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Band</th>
                        <th>Position Type</th>
                        <th>Position Level</th>
                        <th>Status</th>
                        <?php if ($this->session->userdata('type') == 'member') { ?>
                        <th>Action</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($subordinate->result() as $s){
                    ?>
                    <tr>
                        <td class="text-uppercase"><?= $s->nik ?></td>
                        <td class="text-uppercase"><?= $s->nama_member ?></td>
                        <td class="text-uppercase"><?= $s->nama_posisi ?></td>
                        <td class="text-uppercase"><?= $s->nama_band ?></td>
                        <td class="text-uppercase"><?= $s->nama_posisi_type ?></td>
                        <td class="text-uppercase"><?= $s->nama_posisi_level ?></td>
                        <td class="text-uppercase"><?= $s->nama_status ?></td>
                        <?php if ($this->session->userdata('type') == 'member') { ?>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteSubordinate<?= $s->id_superior_subordinate  ?>"><em class="fas fa-trash"></em> Delete</button>
                            </div>
                        </td>
                        <?php } ?>
                    </tr>
                    
                    <?php
                        }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>NIK</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Band</th>
                        <th>Position Type</th>
                        <th>Position Level</th>
                        <th>Status</th>
                        <?php if ($this->session->userdata('type') == 'member') { ?>
                        <th>Action</th>
                        <?php } ?>
                    </tr>
                </tfoot>
            </table>

            <hr class="mt-4">

            <h1 id="subordinateInternship" class="mb-4 mt-4">Subordinate Apprentice</h1>
            <hr>

            <?php if ($this->session->userdata('type') == 'member') { ?>
                <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addInternship"><em class="fas fa-plus"></em> Add Subordinate Apprentice</button>
            <?php } ?>

            <?php
                if($this->session->flashdata('msgSubordinateInternship')){
                    echo $this->session->flashdata('msgSubordinateInternship');
                }
            ?>

            <table id="no_export" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Educational Background</th>
                        <th>University</th>
                        <?php if ($this->session->userdata('type') == 'member') { ?>
                        <th>Action</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 1;
                        foreach($subordinate_internship->result() as $s){
                    ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td class="text-uppercase"><?= $s->nama_mahasiswa ?></td>
                        <td class="text-uppercase"><?= $s->ed_bg_desc ?></td>
                        <td class="text-uppercase"><?= $s->nama_universitas ?></td>
                        <?php if ($this->session->userdata('type') == 'member') { ?>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editInternship<?= $s->nim ?>"><em class="fas fa-edit"></em> Edit</button>
                                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#resignInternship<?= $s->nim ?>"><em class="fas fa-times"></em> Resign</button>
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteInternship<?= $s->nim  ?>"><em class="fas fa-trash"></em> Delete</button>
                            </div>
                        </td>
                        <?php } ?>
                    </tr>
                    
                    <?php
                        }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Educational Background</th>
                        <th>University</th>
                        <?php if ($this->session->userdata('type') == 'member') { ?>
                        <th>Action</th>
                        <?php } ?>
                    </tr>
                </tfoot>
            </table>

            <hr class="mt-4">

    </div>

    <script>
    
        <?php if($this->session->flashdata('msgTrainingSuggestion')){ ?>
            document.getElementById('trainingSuggestion').scrollIntoView();
        <?php } ?>

        <?php if($this->session->flashdata('msgCertificationSuggestion')){ ?>
            document.getElementById('certificationSuggestion').scrollIntoView();
        <?php } ?>

        <?php if($this->session->flashdata('msgUseCase')){ ?>
            document.getElementById('useCase').scrollIntoView();
        <?php } ?>

        <?php if($this->session->flashdata('msgCertificate')){ ?>
            document.getElementById('certificate').scrollIntoView();
        <?php } ?>

        <?php if($this->session->flashdata('msg')){ ?>
            document.getElementById('training').scrollIntoView();
        <?php } ?>

        <?php if($this->session->flashdata('msgSubordinate')){ ?>
            document.getElementById('subordinate').scrollIntoView();
        <?php } ?>

        <?php if($this->session->flashdata('msgSubordinateInternship')){ ?>
            document.getElementById('subordinateInternship').scrollIntoView();
        <?php } ?>

        <?php if($this->session->flashdata('msgOKRMember')){ ?>
            document.getElementById('okrmember').scrollIntoView();
        <?php } ?>

    </script>
    <script>
          jQuery(document).ready(function($) {
              $(".clickable-row").click(function() {
                  window.location = $(this).data("href");
              });
          });
      </script>

  </body>
  <!-- End of Body Section -->