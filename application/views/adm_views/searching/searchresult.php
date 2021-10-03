  <!-- Body Section -->
  <style>
      * {
          -webkit-box-sizing: border-box;
          box-sizing: border-box;
      }

      #notfound {
          position: relative;
          height: 90vh;
      }

      #notfound .notfound {
          position: absolute;
          left: 50%;
          top: 50%;
          -webkit-transform: translate(-50%, -50%);
          -ms-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
      }

      .notfound {
          max-width: 920px;
          width: 100%;
          line-height: 1.4;
          text-align: center;
          padding-left: 15px;
          padding-right: 15px;
      }


      .notfound h2 {
          font-family: 'Maven Pro', sans-serif;
          font-size: 35px;
          color: #000;
          font-weight: 900;
          text-transform: uppercase;
          margin: 0px;
      }

      .notfound p {
          font-family: 'Maven Pro', sans-serif;
          font-size: 16px;
          color: #000;
          font-weight: 400;
          text-transform: uppercase;
          margin-top: 15px;
      }

      .notfound a {
          font-family: 'Maven Pro', sans-serif;
          font-size: 14px;
          text-decoration: none;
          text-transform: uppercase;
          background: #189cf0;
          display: inline-block;
          padding: 16px 38px;
          border: 2px solid transparent;
          border-radius: 40px;
          color: #fff;
          font-weight: 400;
          -webkit-transition: 0.2s all;
          transition: 0.2s all;
      }

      .notfound a:hover {
          background-color: #fff;
          border-color: #189cf0;
          color: #189cf0;
      }

      @media only screen and (max-width: 480px) {
          .notfound .notfound-404 h1 {
              font-size: 162px;
          }

          .notfound h2 {
              font-size: 26px;
          }
      }
  </style>

  <body>
      <?php if (empty($member_dsc->result() || $member_alumni->result() || $member_apprentice->result() ||
            $member_Aretired->result() || $member_kontrak->result() || $trained_member->result() || $certified_member->result()
            || $member_assignments->result() || $AssignmentApp->result() || $jirareward->result() || ($jiramonitoring) || $searchgruptribe->result() || $searchtribe->result() || $searchusecase->result() || $searchsquad->result())) { ?>

          <div id="notfound" class="container-fluid p-4">
              <div class="notfound">
                  <br>
                  <br><br><br>
                  <br><br>
                  <h2>We are sorry, Data Not Found!</h2>
                  <img src="<?= base_url() ?>public/assets/images/page-not-found.png" srcset="" width="40%">
                  <p>The keyword contains <b>"<?php echo $keyword; ?>"</b> you are looking for might have been removed had its name changed or is temporarily unavailable.</p>
                  <a href="<?= base_url() ?>pages/Home">Back To Homepage</a>
              </div>
          </div>
      <?php } else { ?>

          <div class="container-fluid p-4 text-center" id="bg-template-monitoring">
              <h4 class="mb-2 text-center">Search Result <b>"<?php echo $keyword; ?>"</b></h4>
          </div>

          <div class="container-fluid p-4" id="bg-template-graph">
              <?php if (!empty($member_dsc->result())) { ?>
                  <div class="row">
                      <div class="mb-2 col-sm-12 col-md-12">
                          <h6 class="mb-4"><a class="monitoring-nav col-sm-2 col-md-2 " href="<?= base_url() ?>pages/DscMember"> List of All DSC Members </a></h6>
                          <table class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                              <thead>
                                  <tr>
                                      <th>NIK</th>
                                      <th>Photo</th>
                                      <th>Name</th>
                                      <th>Status</th>
                                      <th>Positions</th>
                                      <th>Band</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                    foreach ($member_dsc->result() as $md) {
                                        if (!empty($md->user_photo)) {
                                            $user_photo = '<img src="data:image/' . $md->user_photo_type . ';base64,' . base64_encode($md->user_photo) . '" width="75" height="75">';
                                        } else {
                                            $user_photo = '<img src="../public/assets/uploads/user_photo/user_temp.png" width="75" height="75">';
                                        };
                                    ?>
                                      <tr>
                                          <td><?= $md->nik ?></td>
                                          <td><?= $user_photo ?></td>
                                          <td class="text-uppercase"><?= $md->nama_member ?></td>
                                          <td class="text-uppercase"><?= $md->nama_status ?></td>
                                          <td class="text-uppercase"><?= $md->nama_posisi ?></td>
                                          <td class="text-uppercase"><?= $md->nama_band ?></td>
                                      </tr>

                                  <?php
                                    }
                                    ?>
                              </tbody>
                              <tfoot>
                                  <tr>
                                      <th>NIK</th>
                                      <th>Photo</th>
                                      <th>Name</th>
                                      <th>Status</th>
                                      <th>Positions</th>
                                      <th>Band</th>
                                  </tr>
                              </tfoot>
                          </table>
                      </div>
                  </div>
                  <br>
                  <hr>
              <?php
                }

                if (!empty($member_alumni->result())) { ?>
                  <div class="row">
                      <div class="mb-2 col-sm-12 col-md-12">
                          <h6 class="mb-4"><a class="monitoring-nav col-sm-2 col-md-2 " href="<?= base_url() ?>pages/DscMember/retired_member"> List of DSC Alumni</a></h6>
                          <table class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                              <thead>
                                  <tr>
                                      <th>NIK</th>
                                      <th>Photo</th>
                                      <th>Name</th>
                                      <th>Status</th>
                                      <th>Positions</th>
                                      <th>Band</th>
                                      <th>Contract Started</th>
                                      <th>Contract Finished</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                    foreach ($member_alumni->result() as $mk) {
                                        if (!empty($mk->user_photo)) {
                                            $user_photo = '<img src="data:image/' . $mk->user_photo_type . ';base64,' . base64_encode($mk->user_photo) . '" width="75" height="75">';
                                        } else {
                                            $foto = base_url('/public/assets/uploads/user_photo/user_temp.png');
                                            $user_photo = '<img src=' . $foto . " " . 'width="75" height="75">';
                                        };
                                    ?>
                                      <tr>
                                          <td><?= $mk->nik ?></td>
                                          <td><?= $user_photo; ?></td>
                                          <td class="text-uppercase"><?= $mk->nama_member ?></td>
                                          <td class="text-uppercase"><?= $mk->nama_status ?></td>
                                          <td class="text-uppercase"><?= $mk->nama_posisi ?></td>
                                          <td class="text-uppercase"><?= $mk->nama_band ?></td>
                                          <td><?= $mk->kontrak_mulai ?></td>
                                          <td><?= $mk->kontrak_selesai ?></td>
                                      </tr>

                                  <?php
                                    }
                                    ?>
                              </tbody>
                              <tfoot>
                                  <tr>
                                      <th>NIK</th>
                                      <th>Photo</th>
                                      <th>Name</th>
                                      <th>Status</th>
                                      <th>Positions</th>
                                      <th>Band</th>
                                      <th>Contract Started</th>
                                      <th>Contract Finished</th>
                                  </tr>
                              </tfoot>
                          </table>
                      </div>
                  </div>
                  <br>
                  <hr>
              <?php
                }

                if (!empty($member_apprentice->result())) { ?>
                  <div class="row">
                      <div class="mb-2 col-sm-12 col-md-12">
                          <h6 class="mb-4"><a class="monitoring-nav col-sm-2 col-md-2 " href="<?= base_url() ?>pages/DscMember/apprenticeship"> List of Apprentice</a></h6>
                          <?php
                            if ($this->session->flashdata('msg')) {
                                echo $this->session->flashdata('msg');
                            }
                            ?>

                          <table class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                              <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>Name</th>
                                      <th>Year</th>
                                      <th>Supervisor</th>
                                      <th>University</th>
                                      <th>Contract Started</th>
                                      <th>Contract Finished</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                    $i = 1;
                                    foreach ($member_apprentice->result() as $mi) {
                                    ?>
                                      <tr>
                                          <td><?= $i++ ?></td>
                                          <td class="text-uppercase"><?= $mi->nama_mahasiswa ?></td>
                                          <td class="text-uppercase"><?= $mi->tahun_intern ?></td>
                                          <td class="text-uppercase"><?= $mi->nama_member ?></td>
                                          <td class="text-uppercase"><?= $mi->nama_universitas ?></td>
                                          <td><?= $mi->kontrak_mulai_internship ?></td>
                                          <td><?= $mi->kontrak_selesai_internship ?></td>
                                      </tr>

                                  <?php
                                    }
                                    ?>
                              </tbody>
                              <tfoot>
                                  <tr>
                                      <th>No</th>
                                      <th>Name</th>
                                      <th>Year</th>
                                      <th>Supervisor</th>
                                      <th>University</th>
                                      <th>Contract Started</th>
                                      <th>Contract Finished</th>
                                  </tr>
                              </tfoot>
                          </table>
                      </div>
                  </div>
                  <br>
                  <hr>
              <?php
                }

                if (!empty($member_Aretired->result())) { ?>
                  <div class="row">
                      <div class="mb-2 col-sm-12 col-md-12">
                          <h6 class="mb-4"><a class="monitoring-nav col-sm-2 col-md-2 " href="<?= base_url() ?>pages/DscMember/retired_apprentice"> List of DSC Alumni (Apprentice)</a></h6>
                          <?php
                            if ($this->session->flashdata('msg')) {
                                echo $this->session->flashdata('msg');
                            }
                            ?>

                          <table class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                              <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>Name</th>
                                      <th>Supervisor</th>
                                      <th>University</th>
                                      <th>Year</th>
                                      <th>Contract Started</th>
                                      <th>Contract Finished</th>

                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                    $i = 1;
                                    foreach ($member_Aretired->result() as $mi) {
                                    ?>
                                      <tr>
                                          <td><?= $i++ ?></td>
                                          <td class="text-uppercase"><?= $mi->nama_mahasiswa ?></td>
                                          <td class="text-uppercase"><?= $mi->nama_member ?></td>
                                          <td class="text-uppercase"><?= $mi->nama_universitas ?></td>
                                          <td><?= $mi->tahun_intern ?></td>
                                          <td><?= $mi->kontrak_mulai_internship ?></td>
                                          <td><?= $mi->kontrak_selesai_internship ?></td>
                                      </tr>

                                  <?php
                                    }
                                    ?>
                              </tbody>
                              <tfoot>
                                  <tr>
                                      <th>No</th>
                                      <th>Name</th>
                                      <th>Supervisor</th>
                                      <th>University</th>
                                      <th>Year</th>
                                      <th>Contract Started</th>
                                      <th>Contract Finished</th>
                                  </tr>
                              </tfoot>
                          </table>
                      </div>
                  </div>
                  <br>
                  <hr>

              <?php
                }
                if (!empty($member_kontrak->result())) { ?>
                  <div class="row">
                      <div class="mb-2 col-sm-12 col-md-12">
                          <h6 class="mb-4"><a class="monitoring-nav col-sm-2 col-md-2 " href="<?= base_url() ?>pages/DscMember/member_dsc_contract"> List of DSC Members (Contract)</a></h6>
                          <?php
                            if ($this->session->flashdata('msg')) {
                                echo $this->session->flashdata('msg');
                            }
                            ?>

                          <table class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                              <thead>
                                  <tr>
                                      <th>NIK</th>
                                      <th>Photo</th>
                                      <th>Name</th>
                                      <th>Status</th>
                                      <th>Positions</th>
                                      <th>Band</th>
                                      <th>Contract Started</th>
                                      <th>Contract Finished</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                    foreach ($member_kontrak->result() as $mk) {
                                        // if (is_null($mk->user_photo)) {
                                        //     $user_photo = 'user_temp.png';
                                        // }else{
                                        //     $user_photo = $mk->user_photo;
                                        // }
                                        if (!empty($mk->user_photo)) {
                                            $user_photo = '<img src="data:image/' . $mk->user_photo_type . ';base64,' . base64_encode($mk->user_photo) . '" width="75" height="75">';
                                        } else {
                                            $foto = base_url('/public/assets/uploads/user_photo/user_temp.png');
                                            $user_photo = '<img src=' . $foto . " " . 'width="75" height="75">';
                                        };
                                    ?>
                                      <tr>
                                          <td><?= $mk->nik ?></td>
                                          <td><?= $user_photo ?></td>
                                          <td class="text-uppercase"><?= $mk->nama_member ?></td>
                                          <td class="text-uppercase"><?= $mk->nama_status ?></td>
                                          <td class="text-uppercase"><?= $mk->nama_posisi ?></td>
                                          <td class="text-uppercase"><?= $mk->nama_band ?></td>
                                          <td><?= $mk->kontrak_mulai ?></td>
                                          <td><?= $mk->kontrak_selesai ?></td>
                                      </tr>

                                  <?php
                                    }
                                    ?>
                              </tbody>
                              <tfoot>
                                  <tr>
                                      <th>NIK</th>
                                      <th>Photo</th>
                                      <th>Name</th>
                                      <th>Status</th>
                                      <th>Positions</th>
                                      <th>Band</th>
                                      <th>Contract Started</th>
                                      <th>Contract Finished</th>
                                  </tr>
                              </tfoot>
                          </table>
                      </div>
                  </div>
                  <br>
                  <hr>
              <?php
                }
                if (!empty($trained_member->result())) { ?>
                  <div class="row">
                      <div class="mb-2 col-sm-12 col-md-12">
                          <h6 class="mb-4"><a class="monitoring-nav col-sm-2 col-md-2 " href="<?= base_url() ?>pages/MemberSkills"> List of Trained Members</a></h6>
                          <?php
                            if ($this->session->flashdata('msg')) {
                                echo $this->session->flashdata('msg');
                            }
                            ?>

                          <table class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                              <thead>
                                  <tr>
                                      <th>NIK</th>
                                      <th>Name</th>
                                      <th>Training Names</th>
                                      <th>Year</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                    foreach ($trained_member->result() as $tm) {
                                    ?>
                                      <tr>
                                          <td><?= $tm->nik ?></td>
                                          <td class="text-uppercase"><?= $tm->nama_member ?></td>
                                          <td class="text-uppercase"><?= $tm->nama_pelatihan ?></td>
                                          <td><?= $tm->tahun_pelatihan ?></td>
                                      </tr>

                                  <?php
                                    }
                                    ?>
                              </tbody>
                              <tfoot>
                                  <tr>
                                      <th>NIK</th>
                                      <th>Name</th>
                                      <th>Training Names</th>
                                      <th>Year</th>
                                  </tr>
                              </tfoot>
                          </table>
                      </div>
                  </div>
                  <br>
                  <hr>
              <?php
                }
                if (!empty($certified_member->result())) { ?>
                  <div class="row">
                      <div class="mb-2 col-sm-12 col-md-12">
                          <h6 class="mb-4"><a class="monitoring-nav col-sm-2 col-md-2 " href="<?= base_url() ?>pages/MemberSkills/certified_member"> List of Certified Member</a></h6>
                          <?php
                            if ($this->session->flashdata('msg')) {
                                echo $this->session->flashdata('msg');
                            }
                            ?>

                          <table class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                              <thead>
                                  <tr>
                                      <th>NIK</th>
                                      <th>Name</th>
                                      <th>Certifications Names</th>
                                      <th>Year</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                    foreach ($certified_member->result() as $cm) {
                                    ?>
                                      <tr>
                                          <td><?= $cm->nik ?></td>
                                          <td class="text-uppercase"><?= $cm->nama_member ?></td>
                                          <td class="text-uppercase"><?= $cm->nama_sertifikasi ?></td>
                                          <td><?= $cm->tahun_sertifikasi ?></td>
                                      </tr>

                                  <?php
                                    }
                                    ?>
                              </tbody>
                              <tfoot>
                                  <tr>
                                      <th>NIK</th>
                                      <th>Name</th>
                                      <th>Certifications Names</th>
                                      <th>Year</th>
                                  </tr>
                              </tfoot>
                          </table>
                      </div>
                  </div>
                  <br>
                  <hr>
              <?php
                }
                if (!empty($member_assignments->result())) { ?>
                  <div class="row">
                      <div class="mb-2 col-sm-12 col-md-12">
                          <h6 class="mb-4"><a class="monitoring-nav col-sm-2 col-md-2 " href="<?= base_url() ?>pages/Assignments"> List of Member In Assignments </a></h6>
                          <?php
                            if ($this->session->flashdata('msg')) {
                                echo $this->session->flashdata('msg');
                            }
                            ?>

                          <table class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                              <thead>
                                  <tr>
                                      <th>Groups</th>
                                      <th>Tribes</th>
                                      <th>Use Cases</th>
                                      <th>Squads</th>
                                      <th>NIK</th>
                                      <th>Name</th>
                                      <th>Status</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                    foreach ($member_assignments->result() as $mu) {
                                    ?>
                                      <tr>
                                          <td class="text-uppercase"><?= $mu->nama_groups ?></td>
                                          <td class="text-uppercase"><?= $mu->nama_tribe ?></td>
                                          <td class="text-uppercase"><?= $mu->nama_usecase ?></td>
                                          <td class="text-uppercase"><?= $mu->nama_squad ?></td>
                                          <td><?= $mu->nik ?></td>
                                          <td class="text-uppercase"><?= $mu->nama_member ?></td>
                                          <td class="text-uppercase"><?= $mu->status_member ?></td>
                                      </tr>

                                  <?php
                                    }
                                    ?>
                              </tbody>
                              <tfoot>
                                  <tr>
                                      <th>Groups</th>
                                      <th>Tribes</th>
                                      <th>Use Cases</th>
                                      <th>Squads</th>
                                      <th>NIK</th>
                                      <th>Name</th>
                                      <th>Status</th>
                                  </tr>
                              </tfoot>
                          </table>
                      </div>
                  </div>
                  <br>
                  <hr>
              <?php
                }

                if (!empty($AssignmentApp->result())) { ?>
                  <div class="row">
                      <div class="mb-2 col-sm-12 col-md-12">
                          <h6 class="mb-4"><a class="monitoring-nav col-sm-2 col-md-2 " href="<?= base_url() ?>pages/Assignments/apprentice_in_assignment"> List of Apprentice In Assignments </a></h6>
                          <?php
                            if ($this->session->flashdata('msg')) {
                                echo $this->session->flashdata('msg');
                            }
                            ?>

                          <table class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                              <thead>
                                  <tr>
                                      <th>Groups</th>
                                      <th>Tribes</th>
                                      <th>Use Cases</th>
                                      <th>Squads</th>
                                      <th>Name</th>
                                      <th>Status</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                    foreach ($AssignmentApp->result() as $mu) {
                                    ?>
                                      <tr>
                                          <td class="text-uppercase"><?= $mu->nama_groups ?></td>
                                          <td class="text-uppercase"><?= $mu->nama_tribe ?></td>
                                          <td class="text-uppercase"><?= $mu->nama_usecase ?></td>
                                          <td class="text-uppercase"><?= $mu->nama_squad ?></td>
                                          <td class="text-uppercase"><?= $mu->nama_mahasiswa ?></td>
                                          <td class="text-uppercase"><?= $mu->status_member ?></td>
                                      </tr>
                                  <?php
                                    }
                                    ?>
                              </tbody>
                              <tfoot>
                                  <tr>
                                      <th>Groups</th>
                                      <th>Tribes</th>
                                      <th>Use Cases</th>
                                      <th>Squads</th>
                                      <th>Name</th>
                                      <th>Status</th>
                                  </tr>
                              </tfoot>
                          </table>
                      </div>
                  </div>
                  <br>
                  <hr>
              <?php
                }
                if (!empty($jirareward->result())) { ?>
                  <div class="row">
                      <div class="mb-2 col-sm-12 col-md-12">
                          <h6 class="mb-4"><a class="monitoring-nav col-sm-2 col-md-2 " href="<?= base_url() ?>pages/JiraSoftware"> Rewarding Jira</a></h6>
                          <?php
                            if ($this->session->flashdata('msg')) {
                                echo $this->session->flashdata('msg');
                            }
                            ?>

                          <table class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                              <thead>
                                  <tr>
                                      <th>Rank</th>
                                      <th>Nama</th>
                                      <th>Date Point</th>
                                      <th>Raw</th>
                                      <th>WV</th>
                                      <th>Epic Tracking</th>
                                      <th>Last Update</th>
                                      <th>Raw (NoA)</th>
                                      <th>WV (NoA)</th>
                                      <th>Raw (Mean)</th>
                                      <th>WV</th>
                                      <th>PWA (NoA)</th>
                                      <th>PWA (LoD)</th>
                                      <th>Total PWA</th>
                                      <th>RA (%)</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                    $i = 1;
                                    foreach ($jirareward->result() as $drj) {
                                    ?>
                                      <tr>
                                          <td><?= $i++ ?></td>
                                          <td class="text-uppercase"><?= $drj->nama_member ?></td>
                                          <td class="text-uppercase"><?= $drj->date_point ?></td>
                                          <td class="text-uppercase"><?= $drj->raw ?></td>
                                          <td class="text-uppercase"><?= $drj->wv ?></td>
                                          <td class="text-uppercase"><?= $drj->epic_tracking ?></td>
                                          <td class="text-uppercase"><?= $drj->last_updated ?></td>
                                          <td class="text-uppercase"><?= $drj->raw_noa ?></td>
                                          <td class="text-uppercase"><?= $drj->wv_noa ?></td>
                                          <td class="text-uppercase"><?= $drj->raw_mean ?></td>
                                          <td class="text-uppercase"><?= $drj->wv_raw_mean ?></td>
                                          <td class="text-uppercase"><?= $drj->pwa_noa ?></td>
                                          <td class="text-uppercase"><?= $drj->pwa_lod ?></td>
                                          <td class="text-uppercase"><?= $drj->total_pwa ?></td>
                                          <td class="text-uppercase"><?= $drj->ra ?>%</td>
                                      </tr>
                                  <?php
                                    }
                                    ?>
                              </tbody>
                              <tfoot>
                                  <tr>
                                      <th>Rank</th>
                                      <th>Nama</th>
                                      <th>Date Point</th>
                                      <th>Raw</th>
                                      <th>WV</th>
                                      <th>Epic Tracking</th>
                                      <th>Last Update</th>
                                      <th>Raw (NoA)</th>
                                      <th>WV (NoA)</th>
                                      <th>Raw (Mean)</th>
                                      <th>WV</th>
                                      <th>PWA (NoA)</th>
                                      <th>PWA (LoD)</th>
                                      <th>Total PWA</th>
                                      <th>RA (%)</th>
                                  </tr>
                              </tfoot>
                          </table>
                      </div>
                  </div>
                  <br>
                  <hr>
              <?php
                }
                if (!empty($jiramonitoring)) { ?>
                  <div class="row">
                      <div class="mb-2 col-sm-12 col-md-12">
                          <h6 class="mb-4"><a class="monitoring-nav col-sm-2 col-md-2 " href="<?= base_url() ?>pages/JiraSoftware/monitoring_jira"> Monitoring Jira</a></h6>
                          <?php
                            if ($this->session->flashdata('msg')) {
                                echo $this->session->flashdata('msg');
                            }
                            ?>

                          <table class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                              <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>Use Cases</th>
                                      <th>Key</th>
                                      <th>Kanban</th>
                                      <th>To Do</th>
                                      <th>In Progress</th>
                                      <th>Done</th>
                                      <th>Last Updated</th>
                                      <th>Performance</th>
                                      <th>Updating</th>
                                      <th>Last Monitored</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                    $i = 1;
                                    foreach ($jiramonitoring as $monitor) {
                                    ?>

                                      <tr>
                                          <td><?= $i++ ?></td>
                                          <td class="text-uppercase"><?= $monitor->nama_usecase ?></td>
                                          <td class="text-uppercase"><?= $monitor->key ?></td>
                                          <td class="text-uppercase"><?= $monitor->kanban ?></td>
                                          <td class="text-uppercase"><?= $monitor->todo ?></td>
                                          <td class="text-uppercase"><?= $monitor->in_progress ?> </td>
                                          <td class="text-uppercase"><?= $monitor->done ?></td>
                                          <td class="text-uppercase"><?= $monitor->last_updated ?></td>
                                          <td class="text-uppercase"><?= $monitor->performance ?></td>
                                          <td class="text-uppercase"><?= $monitor->updating ?></td>
                                          <td class="text-uppercase"><?= $monitor->monitored ?></td>

                                      </tr>
                                  <?php
                                    }
                                    ?>
                              </tbody>
                              <tfoot>
                                  <tr>
                                      <th>No</th>
                                      <th>Use Cases</th>
                                      <th>Key</th>
                                      <th>Kanban</th>
                                      <th>To Do</th>
                                      <th>In Progress</th>
                                      <th>Done</th>
                                      <th>Last Updated</th>
                                      <th>Performance</th>
                                      <th>Updating</th>
                                      <th>Last Monitored</th>

                                  </tr>
                              </tfoot>
                          </table>
                      </div>
                  </div>
                  <br>
                  <hr>
              <?php
                }
                if (!empty($searchgruptribe->result())) { ?>
                  <div class="row">
                      <div class="mb-2 col-sm-12 col-md-12">
                          <h6 class="mb-4"><a class="monitoring-nav col-sm-2 col-md-2 " href="<?= base_url() ?>pages/Assignments/group_list"> List of Grup of Tribe</a></h6>
                          <table class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                              <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>Groups Name</th>

                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                    $i = 1;
                                    foreach ($searchgruptribe->result() as $g) {
                                    ?>
                                      <tr>
                                          <td><?= $i++ ?></td>
                                          <td class="text-uppercase"><?= $g->nama_groups ?></td>

                                      </tr>

                                  <?php
                                    }
                                    ?>
                              </tbody>
                              <tfoot>
                                  <tr>
                                      <th>No</th>
                                      <th>Groups Name</th>
                                  </tr>
                              </tfoot>
                          </table>
                      </div>
                  </div>
                  <br>
                  <hr>
              <?php
                }
                if (!empty($searchtribe->result())) { ?>
                  <div class="row">
                      <div class="mb-2 col-sm-12 col-md-12">
                          <h6 class="mb-4"><a class="monitoring-nav col-sm-2 col-md-2 " href="<?= base_url() ?>pages/Assignments/tribe_list"> List of Tribe</a></h6>
                          <table class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                              <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>Tribes Names</th>
                                      <th>Groups Names</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                    $i = 1;
                                    foreach ($searchtribe->result() as $t) {
                                    ?>
                                      <tr>
                                          <td><?= $i++ ?></td>
                                          <td class="text-uppercase"><?= $t->nama_tribe ?></td>
                                          <td class="text-uppercase"><?= $t->nama_groups ?></td>
                                      </tr>

                                  <?php
                                    }
                                    ?>
                              </tbody>
                              <tfoot>
                                  <tr>
                                      <th>No</th>
                                      <th>Tribes Names</th>
                                      <th>Groups Names</th>
                                  </tr>
                              </tfoot>
                          </table>
                      </div>
                  </div>
                  <br>
                  <hr>
              <?php
                }
                if (!empty($searchsquad->result())) { ?>
                  <div class="row">
                      <div class="mb-2 col-sm-12 col-md-12">
                          <h6 class="mb-4"><a class="monitoring-nav col-sm-2 col-md-2 " href="<?= base_url() ?>pages/Assignments/squad_list"> List of Squad</a></h6>
                          <table class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                              <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>Squads Name</th>
                                      <th>Tribes Name</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                    $i = 1;
                                    foreach ($searchsquad->result() as $s) {
                                    ?>
                                      <tr>
                                          <td><?= $i++ ?></td>
                                          <td class="text-uppercase"><?= $s->nama_squad ?></td>
                                          <td class="text-uppercase"><?= $s->nama_tribe ?></td>
                                      </tr>

                                  <?php
                                    }
                                    ?>
                              </tbody>
                              <tfoot>
                                  <tr>
                                      <th>No</th>
                                      <th>Squads Name</th>
                                      <th>Tribes Name</th>
                                  </tr>
                              </tfoot>
                          </table>
                      </div>
                  </div>
                  <br>
                  <hr>
              <?php
                }
                if (!empty($searchusecase->result())) { ?>
                  <div class="row">
                      <div class="mb-2 col-sm-12 col-md-12">
                          <h6 class="mb-4"><a class="monitoring-nav col-sm-2 col-md-2 " href="<?= base_url() ?>pages/Assignments/usecase_list"> List of Usecase</a></h6>
                          <table class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                              <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>Use Cases Names</th>
                                      <th>Squads Names</th>
                                      <th>Status Usecase</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                    $i = 1;
                                    foreach ($searchusecase->result() as $u) {
                                    ?>
                                      <tr>
                                          <td><?= $i++ ?></td>
                                          <td class="text-uppercase"><?= $u->nama_usecase ?></td>
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
                                      <th>Use Cases Names</th>
                                      <th>Squads Names</th>
                                      <th>Status Usecase</th>
                                  </tr>
                              </tfoot>
                          </table>
                      </div>
                  </div>
                  <br>
                  <hr>
              <?php
                }
                ?>
          </div>
      <?php
        }

        ?>
  </body>


  <!-- End of Body Section -->