    <!-- Body Section -->
    <body>
        <div class="container-fluid p-4 text-center" id="bg-template-monitoring">
            <div class="row justify-content-center align-items-center text-center">
                <!-- <a class="monitoring-nav col-sm-2 col-md-2" href="< ?= base_url() ?>pages/Home/course_on_trending">Course on Trending</a> -->
                <a class="monitoring-nav col-sm-2 col-md-2 target" href="<?= base_url() ?>pages/Home/member_dsc_summary">Member DSC Summary</a>
                <a class="monitoring-nav col-sm-2 col-md-2" href="<?= base_url() ?>pages/Home/apprentice_summary">Apprenticeship Summary</a>
                <a class="monitoring-nav col-sm-2 col-md-2" href="<?= base_url() ?>pages/Home/training_certification_summary">Training - Certification Summary</a>
                <a class="monitoring-nav col-sm-2 col-md-2" href="<?= base_url() ?>pages/Home/usecase_summary">Use Case Summary</a>
                <a class="monitoring-nav col-sm-2 col-md-2" href="<?= base_url() ?>pages/TalentCapability/talent_capability_result">Talent Capability</a>
				<a class="monitoring-nav col-sm-2 col-md-2" href="<?= base_url() ?>pages/Home/workload_summary">Workload Summary</a>
            </div>
        </div>

        <div class="container-fluid p-4" id="bg-template-graph">
            <h1 class="mb-4 text-center">DSC Member Summary</h1>
            <hr>

            <?php
                if($this->session->flashdata('msg')){
                    echo $this->session->flashdata('msg');
                }
            ?>

            <div class="row justify-content-center align-items-center text-center">
                <div class="col-sm-4 col-md-4 mb-2" data-aos="fade-down" data-aos-duration="1000">
                    <?php 
                        if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
                    ?>        
                        <a class="text-dark" href="<?= base_url() ?>pages/DscMember">
                            <h6>Total DSC Members</h6>
                        </a>
                        
                    <?php 
                        }
                        else {
                    ?>        
                        <a class="text-dark">
                            <h6>Total DSC Members</h6>
                        </a>
                    
                    <?php 
                        }
                    ?>

                        <div class="d-flex align-items-center justify-content-center">
                            <img src="<?= base_url() ?>public/assets/images/member_summary/member-dsc.png" alt="member-dsc" srcset="" width="50%">
                            <h1><?= $total_member ?></h1>
                        </div>
                </div>
            </div>

            <div class="row justify-content-center align-items-center text-center">
                <div class="col-sm-4 col-md-4 mb-2" data-aos="zoom-in-right" data-aos-duration="1000">
                    <?php 
                        if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
                    ?>        
                        <a class="text-dark" href="<?= base_url() ?>pages/DscMember">
                            <h6>Total Organic</h6>
                        </a>
                        
                    <?php 
                        }
                        else {
                    ?>        
                        <a class="text-dark">
                            <h6>Total Organic</h6>
                        </a>
                    
                    <?php 
                        }
                    ?>
                    
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="<?= base_url() ?>public/assets/images/member_summary/organic.png" alt="member-organic" srcset="" width="50%">
                        <h1><?= $total_member_organik ?></h1>
                    </div>
                </div>

                <div class="col-sm-4 col-md-4 mb-2" data-aos="fade-up" data-aos-duration="1000">
                    <?php 
                        if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
                    ?>        
                        <a class="text-dark" href="<?= base_url() ?>pages/DscMember">
                            <h6>Total Employee Mobility</h6>
                        </a>
                        
                    <?php 
                        }
                        else {
                    ?>        
                        <a class="text-dark">
                            <h6>Total Employee Mobility</h6>
                        </a>
                    
                    <?php 
                        }
                    ?>
                    
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="<?= base_url() ?>public/assets/images/member_summary/employee-mobility.png" alt="member-organic" srcset="" width="50%">
                        <h1><?= $total_emp_mob ?></h1>
                    </div>
                </div>

                <div class="col-sm-4 col-md-4 mb-2" data-aos="zoom-in-left" data-aos-duration="1000">
                    <?php 
                        if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
                    ?>        
                        <a class="text-dark" href="<?= base_url() ?>pages/DscMember">
                            <h6>Total Digital Talent</h6>
                        </a>
                        
                    <?php 
                        }
                        else {
                    ?>        
                        <a class="text-dark">
                            <h6>Total Digital Talent</h6>
                        </a>
                    
                    <?php 
                        }
                    ?>

                    <div class="d-flex align-items-center justify-content-center">
                        <img src="<?= base_url() ?>public/assets/images/member_summary/digital-talent.png" alt="member-organic" srcset="" width="50%">
                        <h1><?= $total_digital_talent ?></h1>
                    </div>
                </div>

                <div class="col-sm-4 col-md-4 mb-2" data-aos="zoom-in-right" data-aos-duration="1000">
                    <?php 
                        if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
                    ?>        
                        <a class="text-dark" href="<?= base_url() ?>pages/DscMember">
                            <h6>Total Pro Hire</h6>
                        </a>
                        
                    <?php 
                        }
                        else {
                    ?>        
                        <a class="text-dark">
                            <h6>Total Pro Hire</h6>
                        </a>
                    
                    <?php 
                        }
                    ?>
                    
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="<?= base_url() ?>public/assets/images/member_summary/pro-hire.png" alt="member-organic" srcset="" width="50%">
                        <h1><?= $total_emp_prohire ?></h1>
                    </div>
                </div>

                <div class="col-sm-4 col-md-4 mb-2" data-aos="fade-up" data-aos-duration="1000">
                    <?php 
                        if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
                    ?>        
                        <a class="text-dark" href="<?= base_url() ?>pages/DscMember">
                            <h6>Total Outsource</h6>
                        </a>
                        
                    <?php 
                        }
                        else {
                    ?>        
                        <a class="text-dark">
                            <h6>Total Outsource</h6>
                        </a>
                    
                    <?php 
                        }
                    ?>
                    
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="<?= base_url() ?>public/assets/images/member_summary/outsource.png" alt="member-organic" srcset="" width="50%">
                        <h1><?= $total_emp_outsource ?></h1>
                    </div>
                </div>

                <div class="col-sm-4 col-md-4 mb-2" data-aos="zoom-in-left" data-aos-duration="1000">
                    <?php 
                        if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
                    ?>        
                        <a class="text-dark" href="<?= base_url() ?>pages/DscMember">
                            <h6>Total Probation</h6>
                        </a>
                        
                    <?php 
                        }
                        else {
                    ?>        
                        <a class="text-dark">
                            <h6>Total Probation</h6>
                        </a>                    
                    <?php 
                        }
                    ?>
                    
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="<?= base_url() ?>public/assets/images/member_summary/total-probation.png" alt="member-organic" srcset="" width="50%">
                        <h1><?= $total_emp_probation ?></h1>
                    </div>
                </div>
            </div>
            <hr>
            <!-- chart Contract Expired -->           
            <div class="row">
                <div class="mb-2 col-sm-12 col-md-12" data-aos="fade-up" data-aos-duration="1000">
                    <?php 
                        if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
                    ?>        
                        <a class="text-dark" href="<?= base_url() ?>pages/DscMember/member_dsc_contract">
                            <h6>Total DSC Members Contract Expired</h6>
                        </a>
                        
                    <?php 
                        }
                        else {
                    ?>        
                        <a class="text-dark">
                            <h6>Total DSC Members Contract Expired</h6>
                        </a>                    
                    <?php 
                        }
                    ?>
                    
                    <div id="contract_expired" style="height: 500px" width="100%" height="100%"></div>
                </div>
            </div>
            <!-- end chart Contract Expired -->  
            <hr>
            <!-- chart DSC Alumni --> 
            <div class="row">
                <div class="mb-2 col-sm-12 col-md-12" data-aos="fade-up" data-aos-duration="1000">
                    <?php 
                        if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
                    ?>        
                        <a class="text-dark" href="<?= base_url() ?>pages/DscMember/retired_member">
                            <h6>Total DSC Alumni</h6>
                        </a>
                        
                    <?php 
                        }
                        else {
                    ?>        
                        <a class="text-dark">
                            <h6>Total DSC Alumni</h6>
                        </a>                  
                    <?php 
                        }
                    ?>
                    
                    <div id="dscAlumni" style="height: 500px" width="100%" height="100%"></div>
                </div>
            </div>
            <!-- end chart DSC Alumni --> 
            <hr>
            <!-- Members Position -->
            <div class="row">
                <div class="mb-2 col-sm-12 col-md-12" data-aos="fade-up" data-aos-duration="1000">
                    <?php 
                        if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
                    ?>        
                        <a class="text-dark" href="<?= base_url() ?>pages/DscMember/">
                            <h6>Total Members by Position</h6>
                        </a>
                        
                    <?php 
                        }
                        else {
                    ?>        
                        <a class="text-dark">
                            <h6>Total Members by Position</h6>
                        </a>               
                    <?php 
                        }
                    ?>
                    
                    <div id="graphPosition" style="height: 500px" width="100%" height="100%"></div>
                </div>
            </div>
            <!-- End Members Position -->
            <hr>
            <!-- Members Band -->
            <div class="row">
                <div class="mb-2 col-sm-12 col-md-12" data-aos="fade-up" data-aos-duration="1000">
                    <?php 
                        if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
                    ?>        
                        <a class="text-dark" href="<?= base_url() ?>pages/DscMember/">
                            <h6>Total Members by Band</h6>
                        </a>
                        
                    <?php 
                        }
                        else {
                    ?>        
                        <a class="text-dark">
                            <h6>Total Members by Band</h6>
                        </a>              
                    <?php 
                        }
                    ?>
                    
                    <div id="graphBand" style="height: 500px" width="100%" height="100%"></div>
                </div>
            </div>
            <!-- Members Band -->
        </div>
    </body>
    <!-- End of Body Section -->