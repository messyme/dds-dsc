    <!-- Body Section -->
    <body>
        <div class="container-fluid p-4 text-center" id="bg-template-monitoring">
            <div class="row justify-content-center align-items-center text-center">
                <!-- <a class="monitoring-nav col-sm-2 col-md-2" href="< ?= base_url() ?>pages/Home/course_on_trending">Course on Trending</a> -->
                <a class="monitoring-nav col-sm-2 col-md-2" href="<?= base_url() ?>pages/Home/member_dsc_summary">Member DSC Summary</a>
                <a class="monitoring-nav col-sm-2 col-md-2" href="<?= base_url() ?>pages/Home/apprentice_summary">Apprenticeship Summary</a>
                <a class="monitoring-nav col-sm-2 col-md-2 target" href="<?= base_url() ?>pages/Home/training_certification_summary">Training - Certification Summary</a>
                <a class="monitoring-nav col-sm-2 col-md-2" href="<?= base_url() ?>pages/Home/usecase_summary">Use Case Summary</a>
                <a class="monitoring-nav col-sm-2 col-md-2" href="<?= base_url() ?>pages/TalentCapability/talent_capability_result">Talent Capability</a>
				<a class="monitoring-nav col-sm-2 col-md-2" href="<?= base_url() ?>pages/Home/workload_summary">Workload Summary</a>
            </div>
        </div>

        <div class="container-fluid p-4" id="bg-template-graph">
            <h1 class="mb-4 text-center">Member Skills Summary</h1>
            <hr>

            <?php
                if($this->session->flashdata('msg')){
                    echo $this->session->flashdata('msg');
                }
            ?>

            <div class="row justify-content-center align-items-center text-center">
                <div class="col-sm-6 col-md-6 mb-2" data-aos="fade-down" data-aos-duration="1500">
                    <h6 class="text-center">Total Trained & Certified Members</h6><br>
                    <div id="trained_certified_pie" width="100%" height="100%"></div>
                </div>
            </div>

            <div class="row justify-content-center align-items-center text-center">
                <div class="col-sm-3 col-md-3 mb-2" data-aos="zoom-in-right" data-aos-duration="1500">
                    <?php 
                        if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
                    ?>        
                        <a class="text-dark" href="<?= base_url() ?>pages/MemberSkills">
                            <h6>Total Trained Members</h6>
                        </a>
                    <?php 
                        }
                        else {
                    ?>        
                        <a class="text-dark">
                            <h6>Total Trained Members</h6>
                        </a>
                    <?php 
                        }
                    ?>
                    
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="<?= base_url() ?>public/assets/images/training/training-members.png" alt="member-dsc" srcset="" width="50%">
                        <h1><?= $total_trained_member ?></h1>
                    </div>
                </div>

                <div class="col-sm-3 col-md-3 mb-2" data-aos="zoom-in-left" data-aos-duration="1500">
                    <?php 
                        if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
                    ?>        
                        <a class="text-dark" href="<?= base_url() ?>pages/MemberSkills/certified_member">
                            <h6>Total Certified Members</h6>
                        </a>
                    <?php 
                        }
                        else {
                    ?>        
                        <a class="text-dark">
                            <h6>Total Certified Members</h6>
                        </a>
                    <?php 
                        }
                    ?>
                    
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="<?= base_url() ?>public/assets/images/training/certificated-members.png" alt="member-dsc" srcset="" width="50%">
                        <h1><?= $total_certified_member ?></h1>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="mb-2 col-sm-12 col-md-12" data-aos="fade-up" data-aos-duration="1000">
                    <?php 
                        if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
                    ?>        
                        <a class="text-dark" href="<?= base_url() ?>pages/MemberSkills">
                            <h6>Total Trained Members by Training Names</h6>
                        </a>
                    <?php 
                        }
                        else {
                    ?>        
                        <a class="text-dark">
                            <h6>Total Trained Members by Training Names</h6>
                        </a>
                    <?php 
                        }
                    ?>
                    
                    <div id="trained_member_pertahun" style="height: 500px" width="100%" height="100%"></div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="mb-2 col-sm-12 col-md-12" data-aos="fade-up" data-aos-duration="1000">
                    <?php 
                        if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
                    ?>        
                        <a class="text-dark" href="<?= base_url() ?>pages/MemberSkills/certified_member">
                            <h6>Total Certified Members by Certifications Names</h6>
                        </a>                        
                    <?php 
                        }
                        else {
                    ?>        
                        <a class="text-dark">
                            <h6>Total Certified Members by Certifications Names</h6>
                        </a>
                    <?php 
                        }
                    ?>
                    
                    <div id="certified_member_pertahun" style="height: 500px" width="100%" height="100%"></div>
                </div>
            </div>
        </div>
    </body>
    <!-- End of Body Section -->