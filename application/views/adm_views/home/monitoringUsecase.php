    <!-- Body Section -->
    <body>
        <div class="container-fluid p-4 text-center" id="bg-template-monitoring">
            <div class="row justify-content-around align-items-center text-center" style=" overflow: auto;">
                <!-- <a class="monitoring-nav col-sm-2 col-md-2" href="< ?= base_url() ?>pages/Home/course_on_trending">Course on Trending</a> -->
                <a class="monitoring-nav col-sm-1 col-md-1" href="<?= base_url() ?>pages/Home/member_dsc_summary">Member DSC Summary</a>
                <a class="monitoring-nav col-sm-1 col-md-1" href="<?= base_url() ?>pages/Home/apprentice_summary">Apprenticeship Summary</a>
                <a class="monitoring-nav col-sm-1 col-md-1" href="<?= base_url() ?>pages/Home/training_certification_summary">Training - Certification Summary</a>
                <a class="monitoring-nav col-sm-1 col-md-1 target" href="<?= base_url() ?>pages/Home/usecase_summary">Use Case Summary</a>
                <a class="monitoring-nav col-sm-1 col-md-1" href="<?= base_url() ?>pages/TalentCapability/talent_capability_result">Talent Capability</a>
                <a class="monitoring-nav col-sm-1 col-md-1" href="<?= base_url() ?>pages/Home/workload_summary">Workload Summary</a>
                <a class="monitoring-nav col-sm-1 col-md-1" href="<?= base_url() ?>pages/Home/okr_summary">OKR Summary</a>
            </div>
        </div>

        <div class="container-fluid p-4" id="bg-template-graph">
            <h1 class="mb-4 text-center">Use Case Summary</h1>
            <hr>

            <?php
                if($this->session->flashdata('msg')){
                    echo $this->session->flashdata('msg');
                }
            ?>

            <div class="row justify-content-center align-items-center text-center mb-4">
                <div class="col-md-4 col-sm-12" data-aos="fade-up" data-aos-duration="1000">
                    <?php 
                        if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
                    ?>        
                        <a class="text-dark" href="<?= base_url() ?>pages/Assignments/usecase_list">
                            <h6>Total Use Cases (In Progress)</h6>
                        </a>
                    <?php 
                        }
                        else {
                    ?>        
                        <a class="text-dark">
                            <h6>Total Use Cases (In Progress)</h6>
                        </a>
                    <?php 
                        }
                    ?>
                        
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="<?= base_url() ?>public/assets/images/usecase/in-progress.png" alt="member-dsc" srcset="" width="50%">
                        <h1 class="text-center"><?= $countUsecae[0]->inProgress ?></h1>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12" data-aos="fade-up" data-aos-duration="1000">
                    <?php 
                        if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
                    ?>        
                        <a class="text-dark" href="<?= base_url() ?>pages/Assignments/usecase_list">
                            <h6>Total Use Cases (Done)</h6>
                        </a>
                    <?php 
                        }
                        else {
                    ?>        
                        <a class="text-dark">
                            <h6>Total Use Cases (Done)</h6>
                        </a>
                    <?php 
                        }
                    ?>
                        
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="<?= base_url() ?>public/assets/images/usecase/done.png" alt="member-dsc" srcset="" width="50%">
                        <h1 class="text-center"><?= $countUsecae[0]->done ?></h1>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12" data-aos="fade-up" data-aos-duration="1000">
                    <?php 
                        if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
                    ?>        
                        <a class="text-dark" href="<?= base_url() ?>pages/Assignments/usecase_list">
                            <h6>Total Use Cases (Cancelled)</h6>
                        </a>
                    <?php 
                        }
                        else {
                    ?>        
                        <a class="text-dark">
                            <h6>Total Use Cases (Cancelled)</h6>
                        </a>
                    <?php 
                        }
                    ?>
                        
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="<?= base_url() ?>public/assets/images/usecase/cancelled.png" alt="member-dsc" srcset="" width="50%">
                        <h1 class="text-center"><?= $countUsecae[0]->cancel ?></h1>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mb-4">
                <div class="col-md-4 col-sm-12" data-aos="fade-up" data-aos-duration="1000">
                    <div class="card">
                        <div class="card-header text-center text-white" style="background-color: #93ccdd;">
                            In Progress
                        </div>
                        <div class="card-body" style="background-color: #dcdcdc; max-height: 300px; overflow: overlay;">
                            <ul class="list-group">
                            <?php $number = 0 ?>
                            <?php if(count($inprogressUsecase) == 0) : ?>
                                        <li class="list-group-item">no data</li>    
                                    <?php else :  ?>
                                        <?php foreach ($inprogressUsecase as $data) : ?>
                                            <?php $number ++ ?>
                                            <li class="list-group-item"><?= $number; ?>. <?= $data->nama_usecase; ?></li>
                                        <?php endforeach; ?>
                            <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12" data-aos="fade-up" data-aos-duration="1000">
                    <div class="card">
                        <div class="card-header text-center text-white" style="background-color: #48aac3;">
                            Done
                        </div>
                        <div class="card-body" style="background-color: #dcdcdc; max-height: 300px; overflow: overlay;">
                            <ul class="list-group">
                                <?php $numberDone = 0 ?>
                                <?php if(count($doneUsecase) == 0) : ?>
                                        <li class="list-group-item">no data</li>    
                                <?php else :  ?>
                                        <?php foreach ($doneUsecase as $data) : ?>
                                        <?php $numberDone++ ?>
                                    <li class="list-group-item"><?= $numberDone; ?>. <?= $data->nama_usecase; ?></li>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12" data-aos="fade-up" data-aos-duration="1000">
                    <div class="card">
                        <div class="card-header text-center text-white" style="background-color: #da9695; max-height: 300px; overflow: overlay;">
                            Cancelled
                        </div>
                        <div class="card-body" style="background-color: #dcdcdc;">
                            <ul class="list-group">
                            <?php $numberCancel = 0 ?>
                                    <?php if(count($cancelUsecase) == 0) : ?>
                                        <li class="list-group-item">no data</li>    
                                    <?php else :  ?>
                                        <?php foreach ($cancelUsecase as $data) : ?>
                                        <?php $numberCancel++ ?>
                                    <li class="list-group-item"><?= $numberCancel; ?>. <?= $data->nama_usecase; ?></li>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row justify-content-center align-items-center text-center">
                <div class="col-sm-3 col-md-3 mb-2" data-aos="zoom-in-right" data-aos-duration="1500">
                    <?php 
                        if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
                    ?>        
                        <a class="text-dark" href="<?= base_url() ?>pages/Assignments">
                            <h6>Total Members DSC In Assignments</h6>
                        </a>
                    <?php 
                        }
                        else {
                    ?>        
                        <a class="text-dark">
                            <h6>Total Members DSC In Assignments</h6>
                        </a>
                    <?php 
                        }
                    ?>
                        
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="<?= base_url() ?>public/assets/images/usecase/member-in-assignments.png" alt="member-dsc" srcset="" width="50%">
                        <h1><?= $total_mdscinassigments ?></h1>
                    </div>
                </div>

                <div class="col-sm-3 col-md-3 mb-2" data-aos="zoom-in-right" data-aos-duration="1500">
                    <?php 
                        if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
                    ?>        
                        <a class="text-dark" href="<?= base_url() ?>pages/Assignments">
                            <h6>Total Members DSC Not In Assignments</h6>
                        </a>
                    <?php 
                        }
                        else {
                    ?>        
                        <a class="text-dark">
                            <h6>Total Members DSC Not In Assignments</h6>
                        </a>
                    <?php 
                        }
                    ?>
                        
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="<?= base_url() ?>public/assets/images/usecase/member-not-assignments.png" alt="member-dsc" srcset="" width="50%">
                        <h1><?= $total_mdscnotinassigments ?></h1>
                    </div>
                </div>

                <div class="col-sm-3 col-md-3 mb-2" data-aos="zoom-in-left" data-aos-duration="1500">
                    <?php 
                        if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
                    ?>        
                        <a class="text-dark" href="<?= base_url() ?>pages/Assignments/apprentice_in_assignment">
                            <h6>Total Apprentice In Assignments</h6>
                        </a>
                    <?php 
                        }
                        else {
                    ?>        
                        <a class="text-dark">
                            <h6>Total Apprentice In Assignments</h6>
                        </a>
                    <?php 
                        }
                    ?>
                        
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="<?= base_url() ?>public/assets/images/usecase/apprentice-assignment.png" alt="member-dsc" srcset="" width="50%">
                        <h1><?= $total_appinassigments ?></h1>
                    </div>
                </div>

                <div class="col-sm-3 col-md-3 mb-2" data-aos="zoom-in-left" data-aos-duration="1500">
                    <?php 
                        if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
                    ?>        
                        <a class="text-dark" href="<?= base_url() ?>pages/Assignments/apprentice_in_assignment">
                            <h6>Total Apprentice Not In Assignments</h6>
                        </a>
                    <?php 
                        }
                        else {
                    ?>        
                        <a class="text-dark">
                            <h6>Total Apprentice Not In Assignments</h6>
                        </a>
                    <?php 
                        }
                    ?>
                        
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="<?= base_url() ?>public/assets/images/usecase/apprentice-not-assignment.png" alt="member-dsc" srcset="" width="50%">
                        <h1><?= $total_appnotinassigments ?></h1>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center align-items-center text-center">
                <div class="col-sm-3 col-md-3 mb-2" data-aos="zoom-in-right" data-aos-duration="1500">
                    <?php 
                        if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
                    ?>        
                        <a class="text-dark" href="<?= base_url() ?>pages/Assignments/group_list">
                            <h6>Total Group Of Tribe</h6>
                        </a>
                    <?php 
                        }
                        else {
                    ?>        
                        <a class="text-dark">
                            <h6>Total Group Of Tribe</h6>
                        </a>
                    <?php 
                        }
                    ?>
                    
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="<?= base_url() ?>public/assets/images/usecase/group-of-tribe.png" alt="member-dsc" srcset="" width="50%">
                        <h1><?= $total_groups ?></h1>
                    </div>
                </div>

                <div class="col-sm-3 col-md-3 mb-2" data-aos="zoom-in-right" data-aos-duration="1500">
                    <?php 
                        if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
                    ?>        
                        <a class="text-dark" href="<?= base_url() ?>pages/Assignments/tribe_list">
                            <h6>Total Tribes</h6>
                        </a>
                    <?php 
                        }
                        else {
                    ?>        
                        <a class="text-dark">
                            <h6>Total Tribes</h6>
                        </a>
                    <?php 
                        }
                    ?>
                        
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="<?= base_url() ?>public/assets/images/usecase/tribes.png" alt="member-dsc" srcset="" width="50%">
                        <h1><?= $total_tribe ?></h1>
                    </div>
                </div>

                <div class="col-sm-3 col-md-3 mb-2" data-aos="zoom-in-left" data-aos-duration="1500">
                    <?php 
                        if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
                    ?>        
                        <a class="text-dark" href="<?= base_url() ?>pages/Assignments/squad_list">
                            <h6>Total Squads</h6>
                        </a>
                    <?php 
                        }
                        else {
                    ?>        
                        <a class="text-dark">
                            <h6>Total Squads</h6>
                        </a>
                    <?php 
                        }
                    ?>
                        
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="<?= base_url() ?>public/assets/images/usecase/total-squad.png" alt="member-dsc" srcset="" width="50%">
                        <h1><?= $total_squad ?></h1>
                    </div>
                </div>

                <div class="col-sm-3 col-md-3 mb-2" data-aos="zoom-in-left" data-aos-duration="1500" data-aos="fade-up" data-aos-duration="1500">
                    <?php 
                        if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
                    ?>        
                        <a class="text-dark" href="<?= base_url() ?>pages/Assignments/usecase_list">
                            <h6>Total Use Cases</h6>
                        </a>
                    <?php 
                        }
                        else {
                    ?>        
                        <a class="text-dark">
                            <h6>Total Use Cases</h6>
                        </a>
                    <?php 
                        }
                    ?>
                        
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="<?= base_url() ?>public/assets/images/usecase/usecases.png" alt="member-dsc" srcset="" width="50%">
                        <h1><?= $total_usecase ?></h1>
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
                            <h6>Total Members Distribution by Name of Use Cases</h6>
                        </a>
                    <?php 
                        }
                        else {
                    ?>        
                        <a class="text-dark">
                            <h6>Total Members Distribution by Name of Use Cases</h6>
                        </a>
                    <?php 
                        }
                    ?>
                        
                    <div id="member_perusecase" style="height: 1000px" width="100%" height="100%"></div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="mb-2 col-sm-12 col-md-12" data-aos="fade-up" data-aos-duration="1500">
                    <?php 
                        if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
                    ?>        
                        <a class="text-dark" href="<?= base_url() ?>pages/Assignments/apprentice_in_assignment">
                            <h6>Total Apprentice Distribution by Name of Use Cases</h6>
                        </a>
                    <?php 
                        }
                        else {
                    ?>        
                        <a class="text-dark">
                            <h6>Total Apprentice Distribution by Name of Use Cases</h6>
                        </a>
                    <?php 
                        }
                    ?>
                        
                    <div id="member_perusecaseApp" style="height: 600px" width="100%" height="100%"></div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="mb-2 col-sm-12 col-md-12" data-aos="fade-up" data-aos-duration="1500">
                    <?php 
                        if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
                    ?>        
                        <a class="text-dark" href="<?= base_url() ?>pages/Assignments">
                            <h6>Total Members Distribution by Name of Groups</h6>
                        </a>
                    <?php 
                        }
                        else {
                    ?>        
                        <a class="text-dark">
                            <h6>Total Members Distribution by Name of Groups</h6>
                        </a>
                    <?php 
                        }
                    ?>
                        
                    <div id="groupGraph" style="height: 500px" width="100%" height="100%"></div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="mb-2 col-sm-12 col-md-12" data-aos="fade-up" data-aos-duration="1500">
                    <?php 
                        if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
                    ?>        
                        <a class="text-dark" href="<?= base_url() ?>pages/Assignments/apprentice_in_assignment">
                            <h6>Total Apprentice Distribution by Name of Groups</h6>
                        </a>
                    <?php 
                        }
                        else {
                    ?>        
                        <a class="text-dark">
                            <h6>Total Apprentice Distribution by Name of Groups</h6>
                        </a>
                    <?php 
                        }
                    ?>
                        
                    <div id="groupGraphApp" style="height: 500px" width="100%" height="100%"></div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="mb-2 col-sm-12 col-md-12" data-aos="fade-up" data-aos-duration="1500">
                    <?php 
                        if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
                    ?>        
                        <a class="text-dark" href="<?= base_url() ?>pages/Assignments">
                            <h6>Total Members Distribution by Name of Tribes</h6>
                        </a>
                    <?php 
                        }
                        else {
                    ?>        
                        <a class="text-dark">
                            <h6>Total Members Distribution by Name of Tribes</h6>
                        </a>
                    <?php 
                        }
                    ?>
                        
                    <div id="member_pertribe" style="height: 500px" width="100%" height="100%"></div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="mb-2 col-sm-12 col-md-12" data-aos="fade-up" data-aos-duration="1500">
                    <?php 
                        if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
                    ?>        
                        <a class="text-dark" href="<?= base_url() ?>pages/Assignments/apprentice_in_assignment">
                            <h6>Total Apprentice Distribution by Name of Tribes</h6>
                        </a>
                    <?php 
                        }
                        else {
                    ?>        
                        <a class="text-dark">
                            <h6>Total Apprentice Distribution by Name of Tribes</h6>
                        </a>
                    <?php 
                        }
                    ?>
                        
                    <div id="member_pertribeApp" style="height: 500px" width="100%" height="100%"></div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="mb-2 col-sm-12 col-md-12">
                    <?php 
                        if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
                    ?>        
                        <a class="text-dark" href="<?= base_url() ?>pages/Assignments">
                            <h6>Total Members Distribution by Name of Squads</h6>
                        </a>
                    <?php 
                        }
                        else {
                    ?>        
                        <a class="text-dark">
                            <h6>Total Members Distribution by Name of Squads</h6>
                        </a>
                    <?php 
                        }
                    ?>
                        
                    <div id="squadGraph" style="height: 500px" width="100%" height="100%"></div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="mb-2 col-sm-12 col-md-12" data-aos="fade-up" data-aos-duration="1500">
                    <?php 
                        if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
                    ?>        
                        <a class="text-dark" href="<?= base_url() ?>pages/Assignments/apprentice_in_assignment">
                            <h6>Total Apprentice Distribution by Name of Squads</h6>
                        </a>
                    <?php 
                        }
                        else {
                    ?>        
                        <a class="text-dark">
                            <h6>Total Apprentice Distribution by Name of Squads</h6>
                        </a>
                    <?php 
                        }
                    ?>
                        
                    <div id="squadGraphApp" style="height: 500px" width="100%" height="100%"></div>
                </div>
            </div>
            <hr>
        </div>
    </body>
    <!-- End of Body Section -->