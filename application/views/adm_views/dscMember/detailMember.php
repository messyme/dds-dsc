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
        <div class="row">
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
                    <div id="member_name" class="mb-4 col-lg-4 col-md-6">
                        <p class="field-name">NIK</p>
                        <p class="field-value"><?= $member_dsc->nik ?></p>
                    </div>

                    <div id="cluster_ed" class="mb-4 col-lg-4 col-md-6">
                        <p class="field-name">Cluster Education</p>
                        <p class="field-value"><?= $member_dsc->cluster_ed_desc ?></p>
                    </div>

                    <div id="ed_bg" class="mb-4 col-lg-4 col-md-6">
                        <p class="field-name">Education Background</p>
                        <p class="field-value"><?= $member_dsc->ed_bg_desc ?></p>
                    </div>

                    <div id="status" class="mb-4 col-lg-4 col-md-6">
                        <p class="field-name">Status</p>
                        <p class="field-value"><?= $member_dsc->nama_status ?></p>
                    </div>

                    <div id="position" class="mb-4 col-lg-4 col-md-6">
                        <p class="field-name">Position</p>
                        <p class="field-value"><?= $member_dsc->nama_posisi ?></p>
                    </div>

                    <div id="band" class="mb-4 col-lg-4 col-md-6">
                        <p class="field-name">Band</p>
                        <p class="field-value"><?= $member_dsc->nama_band ?></p>
                    </div>

                    <div id="position_type" class="mb-4 col-lg-4 col-md-6">
                        <p class="field-name">Position Type</p>
                        <p class="field-value"><?= $member_dsc->nama_posisi_type ?></p>
                    </div>

                    <div id="position_level" class="mb-4 col-lg-4 col-md-6">
                        <p class="field-name">Position Level</p>
                        <p class="field-value"><?= $member_dsc->nama_posisi_level ?></p>
                    </div>

                    <div id="position_type" class="mb-4 col-lg-4 col-md-6">
                        <p class="field-name">Occupancy Rate</p>
                        <p class="field-value"><?= $member_dsc->occupancy_rate ?></p>
                    </div>

                    <div id="position_level" class="mb-4 col-lg-4 col-md-6">
                        <p class="field-name">Occupancy Status</p>
                        <p class="field-value"><?= $member_dsc->occupancy_status ?></p>
                    </div>

                    <div id="start" class="mb-4 col-lg-4 col-md-6">
                        <p class="field-name">Started Date</p>
                        <p class="field-value"><?= $member_dsc->kontrak_mulai ?></p>
                    </div>
                </div>

                <?php if ($this->session->userdata('role') != 'user_logged_in') { ?>
                <div class="row" id="row3">
                    <div class="col-md-12">
                        <a href="<?= base_url('pages/DscMember/getMemberDscEdit/'.$member_dsc->nik); ?>" type="button" class="btn btn-sm btn-primary"><em class="fas fa-edit"></em> Edit Data</a>
                        <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#editPhoto<?= $member_dsc->nik ?>"><em class="fas fa-portrait"></em> Edit Photo</button>
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal<?= $member_dsc->nik  ?>"><em class="fas fa-trash"></em> Delete</button>
                        <a class="btn btn-sm btn-warning text-white" href="<?= base_url() ?>pages/DscMember" role="button"><i class="fas fa-window-close"></i> Back</a>
                    </div>
                </div>
                <?php } ?>

            </div>
        </div>
            <hr>

            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <h1 class="mb-4">Certification</h1>
                    <hr>
                    <table id="no_export_4" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Certificate Name</th>
                                <th>Pathway</th>
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
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="col-md-6 col-lg-6 col-md-12">
                    <h1 class="mb-4">Training</h1>
                    <hr>
                    <table id="no_export_3" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Training Name</th>
                                <th>Pathway</th>
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
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <hr class="mt-4">

            <h1 class="mb-4 mt-4">Use Cases</h1>
            <hr>

            <table id="two_row_order" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Use Case Name</th>
                        <th>Status</th>
                        <th>Tribe Name</th>
                        <th>Group Name</th>
                        <th>Squad Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 1;
                        foreach($usecase->result() as $u){
                    ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td class="text-uppercase"><?= $u->nama_usecase ?></td>
                        <td class="text-uppercase"><?= $u->deskripsi_status ?></td>
                        <td class="text-uppercase"><?= $u->nama_tribe ?></td>
                        <td class="text-uppercase"><?= $u->nama_groups ?></td>
                        <td class="text-uppercase"><?= $u->nama_squad ?></td>
                    </tr>
                    
                    <?php
                        }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Use Case Name</th>
                        <th>Status</th>
                        <th>Tribe Name</th>
                        <th>Group Name</th>
                        <th>Squad Name</th>
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
                        <!-- <th>Complexity</th>
                        <th>Type of Output</th>
                        <th>Unit</th>
                        <th>Target</th>
                        <th>Start</th>
                        <th>End</th>
                        <th>Type of Formula</th>
                        <th>Progress</th>
                        <th>Detail Progress</th>
                        <?php //if ($this->session->userdata('type') == 'member') { ?>
                            <th>Action</th>
                        <?php //} ?> -->
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
                            <!-- <td class="text-uppercase"><? //= $om->nama_complexity_okr ?></td>
                            <td class="text-uppercase"><? //= $om->nama_too_okr ?></td>
                            <td class="text-uppercase"><? //= $om->unit ?></td>
                            <td class="text-uppercase"><? //= $om->target ?></td>
                            <td class="text-uppercase"><? //= $om->start ?></td>
                            <td class="text-uppercase"><? //= $om->end ?></td>
                            <td class="text-uppercase"><? //= $om->nama_tof_okr ?></td>
                            <td class="text-uppercase"><? //= $om->progress ?>%</td>
                            <td class="text-uppercase"><? //= $om->detail_progress ?></td> -->
                            <!-- <?php // if ($this->session->userdata('type') == 'member') { ?>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editOKRMember<?= $om->id_okr_member ?>"><em class="fas fa-edit"></em> Edit</button>
                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteOKRMember<?= $om->id_okr_member  ?>"><em class="fas fa-trash"></em> Delete</button>
                                    </div>
                                </td>
                            <?php //} ?> -->
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
                        <!-- <th>Complexity</th>
                        <th>Type of Output</th>
                        <th>Unit</th>
                        <th>Target</th>
                        <th>Start</th>
                        <th>End</th>
                        <th>Type of Formula</th>
                        <th>Progress</th>
                        <th>Detail Progress</th>
                        <?php // if ($this->session->userdata('type') == 'member') { ?>
                            <th>Action</th>
                        <?php //} ?> -->
                    </tr>
                </tfoot>
            </table>

            <hr class="mt-4">

            <h1 class="mb-4 mt-4">Subordinate Apprentice</h1>
            <hr>

            <table id="no_export" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Educational Background</th>
                        <th>University</th>
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
                    </tr>
                </tfoot>
            </table>

            <hr class="mt-4">

            <h1 id="trainingSuggestion" class="mb-4 mt-4">Proposed Training</h1>
            <hr>
            
            <?php if ($this->session->userdata('type') == 'superadmin') { ?>
            <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addUsulanTraining"><em class="fas fa-plus"></em> Add Proposed Training</button>
            <?php } ?>

            <?php
                if($this->session->flashdata('msgTrainingSuggestion')){
                    echo $this->session->flashdata('msgTrainingSuggestion');
                }
            ?>

            <table id="no_export_2" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Training Name</th>
                        <th>Pathway</th>
                        <th>Training Source</th>
                        <th>Quarter</th>
                        <th>Year</th>
                        <?php if ($this->session->userdata('type') == 'superadmin') { ?>
                        <th>Action</th>
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
                        <?php if ($this->session->userdata('type') == 'superadmin') { ?>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editUsulanTraining<?= $u->id_usulan ?>"><em class="fas fa-edit"></em> Edit</button>
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteUsulanTraining<?= $u->id_usulan  ?>"><em class="fas fa-trash"></em> Delete</button>
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
                        <?php if ($this->session->userdata('type') == 'superadmin') { ?>
                        <th>Action</th>
                        <?php } ?>
                    </tr>
                </tfoot>
            </table>

            <?php 
                if ($this->session->userdata('role') != 'user_logged_in') {
            ?>

            <?php 
                if($footnoteTrainingSuggestion->username_admin){
            ?>
                <div class="mt-4" id="footnote">
                    <?= $footnoteTrainingSuggestion->username_admin ?> successfully <?= $footnoteTrainingSuggestion->activity ?> data <?= $footnoteTrainingSuggestion->page ?>-<?= $footnoteTrainingSuggestion->table_name ?> with name: <?= $footnoteTrainingSuggestion->name ?> on <?= $footnoteTrainingSuggestion->timestamp ?>
                </div>
            <?php
                }
            ?>

            <?php
                }
            ?>

            <hr class="mt-4">

            <h1 id="certificationSuggestion" class="mb-4 mt-4">Proposed Certification</h1>
            <hr>
            
            <?php if ($this->session->userdata('type') == 'superadmin') { ?>
            <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addUsulanCertification"><em class="fas fa-plus"></em> Add Proposed Certification</button>
            <?php } ?>

            <?php
                if($this->session->flashdata('msgCertificationSuggestion')){
                    echo $this->session->flashdata('msgCertificationSuggestion');
                }
            ?>

            <table id="no_export_9" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Certification Name</th>
                        <th>Pathway</th>
                        <th>Certification Source</th>
                        <th>Quarter</th>
                        <th>Year</th>
                        <?php if ($this->session->userdata('type') == 'superadmin') { ?>
                        <th>Action</th>
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
                        <?php if ($this->session->userdata('type') == 'superadmin') { ?>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editUsulanCertification<?= $u->id_usulan_cert ?>"><em class="fas fa-edit"></em> Edit</button>
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteUsulanCertification<?= $u->id_usulan_cert  ?>"><em class="fas fa-trash"></em> Delete</button>
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
                        <?php if ($this->session->userdata('type') == 'superadmin') { ?>
                        <th>Action</th>
                        <?php } ?>
                    </tr>
                </tfoot>
            </table>

            <?php 
                if ($this->session->userdata('role') != 'user_logged_in') {
            ?>

            <?php 
                if($footnoteCertificationSuggestion->username_admin){
            ?>
                <div class="mt-4" id="footnote">
                    <?= $footnoteCertificationSuggestion->username_admin ?> successfully <?= $footnoteCertificationSuggestion->activity ?> data <?= $footnoteCertificationSuggestion->page ?>-<?= $footnoteCertificationSuggestion->table_name ?> with name: <?= $footnoteCertificationSuggestion->name ?> on <?= $footnoteCertificationSuggestion->timestamp ?>
                </div>
            <?php
                }
            ?>

            <?php
                }
            ?>

            <hr class="mt-4">

            <h1 id="projectHistory" class="mb-4 mt-4">Project History (External)</h1>
            <hr>
            
            <?php if ($this->session->userdata('type') == 'superadmin') { ?>
            <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addProjectHistory"><em class="fas fa-plus"></em> Add Project History</button>
            <?php } ?>

            <?php
                if($this->session->flashdata('msgProjectHistory')){
                    echo $this->session->flashdata('msgProjectHistory');
                }
            ?>

            <table id="no_export_5" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Project Name</th>
                        <th>Date Start</th>
                        <th>Date End</th>
                        <th>Role</th>
                        <?php if ($this->session->userdata('type') == 'superadmin') { ?>
                        <th>Action</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 1;
                        foreach($project_history->result() as $ph){
                    ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td class="text-uppercase"><?= $ph->project_name ?></td>
                        <td class="text-uppercase"><?= $ph->date_start ?></td>
                        <td class="text-uppercase"><?= $ph->date_end ?></td>
                        <td class="text-uppercase"><?= $ph->project_role ?></td>
                        <?php if ($this->session->userdata('type') == 'superadmin') { ?>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editProjectHistory<?= $ph->id_project_history ?>"><em class="fas fa-edit"></em> Edit</button>
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteProjectHistory<?= $ph->id_project_history  ?>"><em class="fas fa-trash"></em> Delete</button>
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
                        <th>Project Name</th>
                        <th>Date Start</th>
                        <th>Date End</th>
                        <th>Role</th>
                        <?php if ($this->session->userdata('type') == 'superadmin') { ?>
                        <th>Action</th>
                        <?php } ?>
                    </tr>
                </tfoot>
            </table>

            <?php 
                if ($this->session->userdata('role') != 'user_logged_in') {
            ?>

            <?php 
                if($footnoteProjectHistory->username_admin){
            ?>
                <div class="mt-4" id="footnote">
                    <?= $footnoteProjectHistory->username_admin ?> successfully <?= $footnoteProjectHistory->activity ?> data <?= $footnoteProjectHistory->page ?>-<?= $footnoteProjectHistory->table_name ?> with name: <?= $footnoteProjectHistory->name ?> on <?= $footnoteProjectHistory->timestamp ?>
                </div>
            <?php
                }
            ?>

            <?php
                }
            ?>

            <hr class="mt-4">

            <h1 id="asesor" class="mb-4 mt-4">Assessor</h1>
            <hr>

            <?php if ($this->session->userdata('type') == 'superadmin') { ?>
                <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addAsesor"><em class="fas fa-plus"></em> Add Asesor</button>
            <?php } ?>

            <?php
                if($this->session->flashdata('msgAsesor')){
                    echo $this->session->flashdata('msgAsesor');
                }
            ?>

            <table id="no_export_6" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Assessor NIK</th>
                        <th>Assessor Name</th>
                        <th>Assessor Position</th>
                        <th>Assessor Band</th>
                        <th>Assessor Position Type</th>
                        <th>Assessor Position Level</th>
                        <th>Your Score</th>
                        <?php if ($this->session->userdata('type') == 'superadmin') { ?>
                        <th>Action</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($asesor->result() as $a){
                    ?>
                    <tr>
                        <td class="text-uppercase"><?= $a->nik_penilai ?></td>
                        <td class="text-uppercase"><?= $a->nama_member ?></td>
                        <td class="text-uppercase"><?= $a->nama_posisi ?></td>
                        <td class="text-uppercase"><?= $a->nama_band ?></td>
                        <td class="text-uppercase"><?= $a->nama_posisi_type ?></td>
                        <td class="text-uppercase"><?= $a->nama_posisi_level ?></td>
                        <td class="text-uppercase"><?= $a->nilai ?></td>
                        <?php if ($this->session->userdata('type') == 'superadmin') { ?>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editAsesor<?= $a->id_asesor ?>"><em class="fas fa-edit"></em> Edit</button>
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteAsesor<?= $a->id_asesor  ?>"><em class="fas fa-trash"></em> Delete</button>
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
                        <th>Assessor NIK</th>
                        <th>Assessor Name</th>
                        <th>Assessor Position</th>
                        <th>Assessor Band</th>
                        <th>Assessor Position Type</th>
                        <th>Assessor Position Level</th>
                        <th>Your Score</th>
                        <?php if ($this->session->userdata('type') == 'superadmin') { ?>
                        <th>Action</th>
                        <?php } ?>
                    </tr>
                </tfoot>
            </table>

            <?php 
                if ($this->session->userdata('role') != 'user_logged_in') {
            ?>

            <?php 
                if($footnoteAsesor->username_admin){
            ?>
                <div class="mt-4" id="footnote">
                    <?= $footnoteAsesor->username_admin ?> successfully <?= $footnoteAsesor->activity ?> data <?= $footnoteAsesor->page ?>-<?= $footnoteAsesor->table_name ?> with name: <?= $footnoteAsesor->name ?> on <?= $footnoteAsesor->timestamp ?>
                </div>
            <?php
                }
            ?>

            <?php
                }
            ?>
            
            <h3 class="mb-4 mt-4">Average Score</h3>

            <table id="no_export_avg_score" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <?php
                            $i = 0;
                            $sum = 0;
                            foreach($asesor->result() as $a){
                                $i++;
                                $sum += $a->nilai;
                        ?>
                        <?php } ?>
                        <th>Assessor Name</th>
                        <th>Score</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($asesor->result() as $a){
                    ?>
                        <tr>
                            <td class="text-uppercase"><?= $a->nama_member ?></td>
                            <td class="text-uppercase"><?= $a->nilai ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Average</th>
                        <th>
                            <?php 
                                $avg = round($sum/$i,2); 
                                if ($avg<=50){
                                    echo $avg.' (Bad)';
                                } else if ($avg<=80 && $avg>50){
                                    echo $avg.' (Good)';
                                } else if ($avg>80) {
                                    echo $avg.' (Very Good)';
                                } else {
                                    echo '0';
                                }
                            ?>
                        </th>
                    </tr>
                </tfoot>
            </table>

            <hr class="mt-4">

            <h1 id="subordinate" class="mb-4 mt-4">Subordinate</h1>
            <hr>

            <?php if ($this->session->userdata('type') == 'superadmin') { ?>
                <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addSubordinate"><em class="fas fa-plus"></em> Add Subordinate</button>
            <?php } ?>

            <?php
                if($this->session->flashdata('msgSubordinate')){
                    echo $this->session->flashdata('msgSubordinate');
                }
            ?>

            <table id="no_export_7" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>NIK</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Band</th>
                        <th>Position Type</th>
                        <th>Position Level</th>
                        <th>Status</th>
                        <?php if ($this->session->userdata('type') == 'superadmin') { ?>
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
                        <?php if ($this->session->userdata('type') == 'superadmin') { ?>
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
                        <?php if ($this->session->userdata('type') == 'superadmin') { ?>
                        <th>Action</th>
                        <?php } ?>
                    </tr>
                </tfoot>
            </table>

            <?php 
                if ($this->session->userdata('role') != 'user_logged_in') {
            ?>

            <?php 
                if($footnoteSubordinate->username_admin){
            ?>
                <div class="mt-4" id="footnote">
                    <?= $footnoteSubordinate->username_admin ?> successfully <?= $footnoteSubordinate->activity ?> data <?= $footnoteSubordinate->page ?>-<?= $footnoteSubordinate->table_name ?> with name: <?= $footnoteSubordinate->name ?> on <?= $footnoteSubordinate->timestamp ?>
                </div>
            <?php
                }
            ?>

            <?php
                }
            ?>


    </div>

    <script>
    
    <?php if($this->session->flashdata('msgTrainingSuggestion')){ ?>
        document.getElementById('trainingSuggestion').scrollIntoView();
    <?php } ?>

    <?php if($this->session->flashdata('msgCertificationSuggestion')){ ?>
        document.getElementById('certificationSuggestion').scrollIntoView();
    <?php } ?>

    <?php if($this->session->flashdata('msgProjectHistory')){ ?>
        document.getElementById('projectHistory').scrollIntoView();
    <?php } ?>

    <?php if($this->session->flashdata('msgAsesor')){ ?>
        document.getElementById('asesor').scrollIntoView();
    <?php } ?>

    <?php if($this->session->flashdata('msgSubordinate')){ ?>
        document.getElementById('subordinate').scrollIntoView();
    <?php } ?>

    <?php if($this->session->flashdata('msgOKRMember')){ ?>
            document.getElementById('okrmember').scrollIntoView();
        <?php } ?>

    </script>

  </body>
  <!-- End of Body Section -->