<style>

</style>
<!-- Body Section -->

<body>
      <div class="container-fluid p-4 text-center" id="bg-template-monitoring">
          <div class="row justify-content-around align-items-center text-center" style=" overflow: auto;">
              <!-- <a class="monitoring-nav col-sm-2 col-md-2" href="< ?= base_url() ?>pages/Home/course_on_trending">Course on Trending</a> -->
              <a class="monitoring-nav col-sm-1 col-md-1" href="<?= base_url() ?>pages/Home/member_dsc_summary">Member DSC Summary</a>
              <a class="monitoring-nav col-sm-1 col-md-1" href="<?= base_url() ?>pages/Home/apprentice_summary">Apprenticeship Summary</a>
              <a class="monitoring-nav col-sm-1 col-md-1" href="<?= base_url() ?>pages/Home/training_certification_summary">Training - Certification Summary</a>
              <a class="monitoring-nav col-sm-1 col-md-1" href="<?= base_url() ?>pages/Home/usecase_summary">Use Case Summary</a>
              <a class="monitoring-nav col-sm-1 col-md-1" href="<?= base_url() ?>pages/TalentCapability/talent_capability_result">Talent Capability</a>
              <a class="monitoring-nav col-sm-1 col-md-1" href="<?= base_url() ?>pages/Home/workload_summary">Workload Summary</a>
              <a class="monitoring-nav col-sm-1 col-md-1 target" href="<?= base_url() ?>pages/Home/okr_summary">OKR Summary</a>
          </div>
      </div>

      <div class="container-fluid p-4" id="bg-template-graph">
          <h1 class="mb-4 text-center">OKR Summary</h1>
          
          <hr>

          <?php
              if ($this->session->flashdata('msg')) {
                  echo $this->session->flashdata('msg');
              }
          ?>

          <div class="row justify-content-center align-items-center text-center">
              <a class="monitoring-nav col-sm-2 col-md-2" href="<?= base_url() ?>pages/Home/okr_summary_product">OKR Product</a>
              <a class="monitoring-nav col-sm-2 col-md-2" href="<?= base_url() ?>pages/Home/okr_summary_DSC">OKR DSC</a>
              <a class="monitoring-nav col-sm-2 col-md-2 target" href="<?= base_url() ?>pages/Home/okr_summary_member">OKR Member</a>
          </div>

          <hr>
          <br>

          <div class="bd-example">
                <div class="btn-group"  style="width: 200px; margin-right: 20px;">
                    <div class="md-12 mb-4  ">
                        <label for="changeFilter">Select Member</label>
                        <select class="select2bs4 form-control" id="id_member" onchange="changeMember()">
                            <option value=" " disabled selected>Choose Name</option>
                            <?php
                            foreach ($member_dsc->result() as $md) {
                                echo '<option class="text-uppercase" value="' . $md->nik . '">' . $md->nik . ' - ' . $md->nama_member . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="btn-group" style="width: 200px;">
                    <div class="md-12 mb-4  ">
                        <label for="changeFilter">Select Use Case</label>
                        <select class="select2bs4 form-control" id="id_usecase" onchange="changeUseCase()">
                            <option value=" " disabled selected>Choose Use Case</option>
                            <?php foreach ($usecase->result() as $n_usecase) { ?>
                                <option <?php echo $usecase_selected == $n_usecase->id_squad ? 'selected="selected"' : '' ?> class="<?php echo $n_usecase->id_squad ?>" value="<?php echo $n_usecase->id_usecase ?>"><?php echo $n_usecase->nama_usecase ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>

          <div class="row justify-content-center">
              <div class="col-sm-6 col-md-6 mb-2" data-aos="fade-up" data-aos-duration="1000">
                  <div class="card">
                      <div class="inner text-white">
                          
                      </div>
                  </div>
              </div>
              <div class="col-sm-2 col-md-2 mb-2" data-aos="fade-up" data-aos-duration="1000">
                  <div class="card" style="vertical-align: middle; background-color: #ffc107;">
                      <div class="inner text-white">
                          <a>Progress</a> <p></p><p></p><p></p>
                          <h3>0%<h3>
                      </div>
                      <div class="icon" style="position: absolute; color: #fff; font-size: 70px; right: 20px;">
                          <i class="bi bi-bar-chart-line-fill">
                          </i>
                      </div>
                  </div>
              </div>

              <div class="col-sm-2 col-md-2 mb-2" data-aos="fade-up" data-aos-duration="1000">
                  <div class="card" style="vertical-align: middle; background-color: #17a2b8;">
                      <div class="inner text-white">
                          <a>Objective</a> <p></p><p></p><p></p>
                          <h3>0<h3>
                      </div>
                      <div class="icon" style="position: absolute; color: #fff; font-size: 70px; right: 20px;">
                          <i class="bi bi-bullseye"></i>
                      </div>
                  </div>
              </div>

              <div class="col-sm-2 col-md-2 mb-2" data-aos="fade-up" data-aos-duration="1000">
                  <div class="card" style="vertical-align: middle; background-color: #28a745;">
                      <div class="inner text-white">
                          <a>Key Result</a> <p></p><p></p><p></p>
                          <h3>0<h3>
                      </div>
                      <div class="icon" style="position: absolute; color: #fff; font-size: 70px; right: 20px;">
                          <i class="bi bi-card-checklist"></i>
                      </div>
                  </div>
              </div>
          </div>
          
          <hr>
          
          <div class="row justify-content-center align-items-center">
              <div class="col-sm-12 col-md-12">
                  <div class="card" style="height: 350px; background-color: #fff;" data-aos="fade-up" data-aos-duration="1000">
                        <div class="inner" >
                            <h5>Details of OKR Individu</h5>
                            <div class="bd-example" style="position: absolute; vertical-align: middle; top: 10px; right: 20px;">
                                <div class="btn-group"  style="width: 200px; margin-right: 20px;">
                                    <div class="md-12 mb-4">
                                        <select class="select2bs4 form-control" id="id_member" onchange="changeMember()">
                                            <option value=" " disabled selected>Q2</option>
                                            <?php
                                            foreach ($member_dsc->result() as $md) {
                                                echo '<option class="text-uppercase" value="' . $md->nik . '">' . $md->nik . ' - ' . $md->nama_member . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="btn-group" style="width: 200px;">
                                    <div class="md-2 mb-4">
                                        <select class="select2bs4 form-control" id="id_usecase" onchange="changeUseCase()">
                                            <option value=" " disabled selected>2021</option>
                                            <?php foreach ($usecase->result() as $n_usecase) { ?>
                                                <option <?php echo $usecase_selected == $n_usecase->id_squad ? 'selected="selected"' : '' ?> class="<?php echo $n_usecase->id_squad ?>" value="<?php echo $n_usecase->id_usecase ?>"><?php echo $n_usecase->nama_usecase ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                  </div>
              </div>
          </div>

          <hr>
          
            <div class="row justify-content-center align-content-center">
                <div class="col-sm-4 col-md-4">
                    <div class="card" style="height: 350px; background-color: #fff;" data-aos="fade-up" data-aos-duration="1000">
                        <div class="inner" >
                            <h5>OKR Team Member</h5>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 col-md-8">
                    <div class="card" style="height: 350px; background-color: #fff;" data-aos="fade-up" data-aos-duration="1000">
                        <div class="inner" >
                            <h5>Team Main Objective Progress</h5>
                            <div class="card vertical-align: middle; justify-content-center align-items-center" style="height: 40px; width:100px; position: absolute; vertical-align: middle; background-color: #ffc107; top: 10px; right: 20px;">
                                <div class="inner text-center vertical-align: middle; justify-content-center align-items-center" style="height: 30px; padding: 5px;">
                                    <a>0%</a>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div>
                                
                        </div>
                    </div>
                </div>
            </div>

          

          <!-- -->
      
       
      </div>

</body>
<!-- End of Body Section -->