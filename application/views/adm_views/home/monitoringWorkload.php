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
                <a class="monitoring-nav col-sm-1 col-md-1 target" href="<?= base_url() ?>pages/Home/workload_summary">Workload Summary</a>
                <a class="monitoring-nav col-sm-1 col-md-1" href="<?= base_url() ?>pages/Home/okr_summary">OKR Summary</a>
            </div>
        </div>

        <div class="container-fluid p-4" id="bg-template-graph">
            <h1 class="mb-4 text-center">Workload Summary</h1>
            <hr>

            <?php
            if ($this->session->flashdata('msg')) {
                echo $this->session->flashdata('msg');
            }
            ?>

            <div class="row justify-content-center align-items-center text-center mb-4">
                <!-- Use Cases -->
                <div class="col-md-4 col-sm-12 mb-4" data-aos="zoom-in-right" data-aos-duration="1000">
                    <?php 
                        if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
                    ?>        
                        <a class="text-dark" href="<?= base_url() ?>pages/Assignments/usecase_list">
                            <h6>Total Underload Use Cases</h6>
                        </a>
                    <?php 
                        }
                        else {
                    ?>        
                        <a class="text-dark">
                            <h6>Total Underload Use Cases</h6>
                        </a>
                    <?php 
                        }
                    ?>
                        
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="<?= base_url() ?>public/assets/images/workload/usecase-underload.png" alt="member-dsc" srcset="" width="50%">
                        <h1 class="text-center"><?= $countUsecase[0]->Underload ?></h1>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12 mb-4" data-aos="fade-up" data-aos-duration="1000">
                    <?php 
                        if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
                    ?>        
                        <a class="text-dark" href="<?= base_url() ?>pages/Assignments/usecase_list">
                            <h6>Total Balanced Use Cases</h6>
                        </a>
                    <?php 
                        }
                        else {
                    ?>        
                        <a class="text-dark">
                            <h6>Total Balanced Use Cases</h6>
                        </a>
                    <?php 
                        }
                    ?>
                        
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="<?= base_url() ?>public/assets/images/workload/usecase-balance.png" alt="member-dsc" srcset="" width="50%">
                        <h1 class="text-center"><?= $countUsecase[0]->Balanced ?></h1>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12 mb-4" data-aos="zoom-in-left" data-aos-duration="1000">
                    <?php 
                        if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
                    ?>        
                        <a class="text-dark" href="<?= base_url() ?>pages/Assignments/usecase_list">
                            <h6>Total Overload Use Cases</h6>
                        </a>
                    <?php 
                        }
                        else {
                    ?>        
                        <a class="text-dark">
                            <h6>Total Overload Use Cases</h6>
                        </a>
                    <?php 
                        }
                    ?>
                        
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="<?= base_url() ?>public/assets/images/workload/usecase-overload.png" alt="member-dsc" srcset="" width="50%">
                        <h1 class="text-center"><?= $countUsecase[0]->Overload ?></h1>
                    </div>
                </div>

                <!-- Members -->
                <div class="col-md-4 col-sm-12" data-aos="zoom-in-right" data-aos-duration="1000">
                    <?php 
                        if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
                    ?>        
                        <a class="text-dark" href="<?= base_url() ?>pages/Assignments/usecase_list">
                            <h6>Total Underload Members</h6>
                        </a>
                    <?php 
                        }
                        else {
                    ?>        
                        <a class="text-dark">
                            <h6>Total Underload Members</h6>
                        </a>
                    <?php 
                        }
                    ?>
                    
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="<?= base_url() ?>public/assets/images/workload/member-underload.png" alt="member-dsc" srcset="" width="50%">
                        <h1 class="text-center"><?= $countMember[0]->Underload ?></h1>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12" data-aos="fade-up" data-aos-duration="1000">
                    <?php 
                        if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
                    ?>        
                        <a class="text-dark" href="<?= base_url() ?>pages/Assignments/usecase_list">
                            <h6>Total Balanced Members</h6>
                        </a>
                    <?php 
                        }
                        else {
                    ?>        
                        <a class="text-dark">
                            <h6>Total Balanced Members</h6>
                        </a>
                    <?php 
                        }
                    ?>
                        
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="<?= base_url() ?>public/assets/images/workload/member-balance.png" alt="member-dsc" srcset="" width="50%">
                        <h1 class="text-center"><?= $countMember[0]->Balanced ?></h1>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12" data-aos="zoom-in-left" data-aos-duration="1000">
                    <?php 
                        if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
                    ?>        
                        <a class="text-dark" href="<?= base_url() ?>pages/Assignments/usecase_list">
                            <h6>Total Overload Members</h6>
                        </a>
                    <?php 
                        }
                        else {
                    ?>        
                        <a class="text-dark">
                            <h6>Total Overload Members</h6>
                        </a>
                    <?php 
                        }
                    ?>
                        
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="<?= base_url() ?>public/assets/images/workload/member-overload.png" alt="member-dsc" srcset="" width="50%">
                        <h1 class="text-center"><?= $countMember[0]->Overload ?></h1>
                    </div>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="mb-2 col-sm-12 col-md-12" data-aos="fade-up" data-aos-duration="1500">
                    <?php 
                        if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
                    ?>        
                        <a class="text-dark" href="<?= base_url() ?>pages/Assignments">
                            <h6>Use Cases - Members Relationship Diagram</h6>
                        </a>
                    <?php 
                        }
                        else {
                    ?>        
                        <a class="text-dark">
                            <h6>Use Cases - Members Relationship Diagram</h6>
                        </a>
                    <?php 
                        }
                    ?>
                    
                    <div id="network" style="margin-top: 15px; background-color: #F4FAFD" width="100%" height="100%"></div>
                </div>
            </div>

            <hr>

        </div>
    </body>
    <!-- End of Body Section -->