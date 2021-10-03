    <!-- Body Section -->
    <body>
        <div class="container-fluid p-4 text-center" id="bg-template-monitoring">
            <div class="row justify-content-center align-items-center text-center">
                <!-- <a class="monitoring-nav col-sm-2 col-md-2" href="< ?= base_url() ?>pages/Home/course_on_trending">Course on Trending</a> -->
                <a class="monitoring-nav col-sm-2 col-md-2" href="<?= base_url() ?>pages/Home/member_dsc_summary">Member DSC Summary</a>
                <a class="monitoring-nav col-sm-2 col-md-2 target" href="<?= base_url() ?>pages/Home/apprentice_summary">Apprenticeship Summary</a>
                <a class="monitoring-nav col-sm-2 col-md-2" href="<?= base_url() ?>pages/Home/training_certification_summary">Training - Certification Summary</a>
                <a class="monitoring-nav col-sm-2 col-md-2" href="<?= base_url() ?>pages/Home/usecase_summary">Use Case Summary</a>
                <a class="monitoring-nav col-sm-2 col-md-2" href="<?= base_url() ?>pages/TalentCapability/talent_capability_result">Talent Capability</a>
				<a class="monitoring-nav col-sm-2 col-md-2" href="<?= base_url() ?>pages/Home/workload_summary">Workload Summary</a>
            </div>
        </div>

        <div class="container-fluid p-4" id="bg-template-graph">
            <h1 class="mb-4 text-center">Apprentice Summary</h1>
            <hr>

            <?php
                if($this->session->flashdata('msg')){
                    echo $this->session->flashdata('msg');
                }
            ?>

            <div class="row justify-content-center align-items-center text-center">
                <div class="col-sm-4 col-md-4 mb-2" data-aos="zoom-in-right" data-aos-duration="1000">
                    <?php 
                        if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
                    ?>        
                        <a class="text-dark" href="<?= base_url() ?>pages/DscMember/apprenticeship">
                            <h6>Total Apprentice</h6>
                        </a>
                        
                    <?php 
                        }
                        else {
                    ?>        
                        <a class="text-dark">
                            <h6>Total Apprentice</h6>
                        </a>
                    <?php 
                        }
                    ?>
                    
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="<?= base_url() ?>public/assets/images/apprentice.png" alt="apprentice" srcset="" width="50%">
                        <h1><?= $total_internship ?></h1>
                    </div>
                </div>

                <div class="col-sm-4 col-md-4 mb-2" data-aos="zoom-in-left" data-aos-duration="1000">
                    <?php 
                        if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
                    ?>        
                        <a class="text-dark" href="<?= base_url() ?>pages/DscMember/apprenticeship">
                            <h6 class="text-center">Total Apprentice Dismissal</h6>
                        </a>
                        
                    <?php 
                        }
                        else {
                    ?>        
                        <a class="text-dark">
                            <h6 class="text-center">Total Apprentice Dismissal</h6>
                        </a>
                    <?php 
                        }
                    ?>
                    
                    <div id="internship_expired" width="100%" height="100%"></div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="mb-2 col-sm-12 col-md-12" data-aos="fade-up" data-aos-duration="1000">
                    <?php 
                        if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
                    ?>        
                        <a class="text-dark" href="<?= base_url() ?>pages/DscMember/apprenticeship">
                            <h6>Total Apprentice Contract Expired</h6>
                        </a>
                        
                    <?php 
                        }
                        else {
                    ?>        
                        <a class="text-dark">
                            <h6>Total Apprentice Contract Expired</h6>
                        </a>
                    <?php 
                        }
                    ?>
                    
                    <div id="contract_expiredApprentice" style="height: 500px" width="100%" height="100%"></div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="mb-2 col-sm-12 col-md-12" data-aos="fade-up" data-aos-duration="1000">
                    <?php 
                        if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
                    ?>        
                        <a class="text-dark" href="<?= base_url() ?>pages/DscMember/retired_apprentice">
                            <h6>Total Retired Apprentice</h6>
                        </a>
                        
                    <?php 
                        }
                        else {
                    ?>        
                        <a class="text-dark">
                            <h6>Total Retired Apprentice</h6>
                        </a>
                    <?php 
                        }
                    ?>
                    
                    <div id="dscAlumniApprentice" style="height: 500px" width="100%" height="100%"></div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="mb-2 col-sm-12 col-md-12" data-aos="fade-up" data-aos-duration="1000">
                    <?php 
                        if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
                    ?>        
                        <a class="text-dark" href="<?= base_url() ?>pages/DscMember/apprenticeship">
                            <h6>Total Apprentice by Year</h6>
                        </a>
                        
                    <?php 
                        }
                        else {
                    ?>        
                        <a class="text-dark">
                            <h6>Total Apprentice by Year</h6>
                        </a>
                    <?php 
                        }
                    ?>
                    
                    <div id="graphApprYear" style="height: 500px" width="100%" height="100%"></div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="mb-2 col-sm-12 col-md-12" data-aos="fade-up" data-aos-duration="1000">
                    <?php 
                        if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
                    ?>        
                        <a class="text-dark" href="<?= base_url() ?>pages/DscMember/apprenticeship">
                            <h6>Total Apprentice by University</h6>
                        </a>
                        
                    <?php 
                        }
                        else {
                    ?>        
                        <a class="text-dark">
                            <h6>Total Apprentice by University</h6>
                        </a>
                    <?php 
                        }
                    ?>

                    <div id="graphApprUniv" style="height: 500px" width="100%" height="100%"></div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="mb-2 col-sm-12 col-md-12" data-aos="fade-up" data-aos-duration="1000">
                    <?php 
                        if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
                    ?>        
                        <a class="text-dark" href="<?= base_url() ?>pages/DscMember/apprenticeship">
                            <h6>Total Apprentice by Supervisor</h6>
                        </a>
                        
                    <?php 
                        }
                        else {
                    ?>        
                        <a class="text-dark">
                            <h6>Total Apprentice by Supervisor</h6>
                        </a>
                    <?php 
                        }
                    ?>
                    
                    <div id="graphApprSpv" style="height: 500px" width="100%" height="100%"></div>
                </div>
            </div>
            <hr>
        </div>
    </body>
    <!-- End of Body Section -->