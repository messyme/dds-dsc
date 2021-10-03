<!-- Loader  -->
<!-- <div class="loader_bg">
  <div class="loader"></div>
  <p>Loading...</p>
</div> -->

<!-- Header Section -->
<header>
  <nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <a class="navbar-brand" href="<?= base_url() ?>pages/Home"> <img src="<?= base_url() ?>public/assets/images/logo_insight/logo-3.png" alt=""> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="icon-bar top-bar"></span>
      <span class="icon-bar middle-bar"></span>
      <span class="icon-bar bottom-bar"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Home
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?= base_url() ?>pages/Home">About Us</a>
            <a class="dropdown-item" href="<?= base_url() ?>pages/Home/organization_structure">Organization Structure</a>
            <a class="dropdown-item" href="<?= base_url() ?>pages/Home/assignments_mind_mapping">Assignment Mind Mapping</a>
            <a class="dropdown-item" href="<?= base_url() ?>pages/Home/member_dsc_summary">Monitoring System</a>
          </div>
        </li>
        <?php
        if ($this->session->userdata('role') == 'member_logged_in') {
        ?>
          <li class="nav-item ">
            <a class="nav-link " href="<?= base_url() ?>pages/AssignedUsecase" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
              Assigned Use Case
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>pages/TalentCapability" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
              Talent Capability
            </a>
          </li>
        <?php
        }
        ?>
        <?php
        if (($this->session->userdata('role') != 'member_logged_in')) {
        ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              DSC Members
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?= base_url() ?>pages/DscMember">All Members</a>
              <a class="dropdown-item" href="<?= base_url() ?>pages/DscMember/member_dsc_contract">Contract Members</a>
              <a class="dropdown-item" href="<?= base_url() ?>pages/DscMember/retired_member">Retired Members</a>
              <a class="dropdown-item" href="<?= base_url() ?>pages/DscMember/apprenticeship">Apprentice</a>
              <a class="dropdown-item" href="<?= base_url() ?>pages/DscMember/retired_apprentice">Retired Apprentice</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Member Skills
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?= base_url() ?>pages/MemberSkills">Trained Members</a>
              <a class="dropdown-item" href="<?= base_url() ?>pages/MemberSkills/certified_member">Certified Members</a>
              <a class="dropdown-item" href="<?= base_url() ?>pages/MemberSkills/proposed_training">Proposed Training</a>
              <a class="dropdown-item" href="<?= base_url() ?>pages/MemberSkills/proposed_certification">Proposed Certification</a>
              <a class="dropdown-item" href="<?= base_url() ?>pages/TalentCapability/talent_capability_summary">Talent Capability</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Assignments
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?= base_url() ?>pages/Assignments">Member in Assignments</a>
              <a class="dropdown-item" href="<?= base_url() ?>pages/Assignments/apprentice_in_assignment">Apprentice in Assignments</a>
              <a class="dropdown-item" href="<?= base_url() ?>pages/Assignments/group_list">Group of Tribe</a>
              <a class="dropdown-item" href="<?= base_url() ?>pages/Assignments/tribe_list">Tribes</a>
              <a class="dropdown-item" href="<?= base_url() ?>pages/Assignments/squad_list">Squads</a>
              <a class="dropdown-item" href="<?= base_url() ?>pages/Assignments/usecase_list">Use Cases</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Jira Software
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?= base_url() ?>pages/JiraSoftware">Rewarding Jira</a>
              <a class="dropdown-item" href="<?= base_url() ?>pages/JiraSoftware/monitoring_jira">Monitoring Jira</a>
            </div>
          </li>
          <?php
          if ($this->session->userdata('role') == 'superadmin_logged_in') {
          ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Talent Recommendation
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?= base_url() ?>pages/TalentRecommendation">Benchmarks of Qualification</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Access Log
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?= base_url() ?>pages/AccessLog">Super Admin</a>
                <a class="dropdown-item" href="<?= base_url() ?>pages/AccessLog/access_log_admin">Admin</a>
                <a class="dropdown-item" href="<?= base_url() ?>pages/AccessLog/access_log_guest">Guest</a>
                <a class="dropdown-item" href="<?= base_url() ?>pages/AccessLog/access_log_member">Member</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Account Data
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?= base_url() ?>pages/Account">All User</a>
                <a class="dropdown-item" href="<?= base_url() ?>pages/Account/Member">All Member</a>
              </div>
            </li>
            <?php
          }
          ?>
          <?php
          if ($this->session->userdata('role') == 'superadmin_logged_in' || $this->session->userdata('role') == 'admin_logged_in') {
          ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Other Data
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?= base_url() ?>pages/OtherDataDscMembers">DSC Members</a>
              <a class="dropdown-item" href="<?= base_url() ?>pages/OtherDataAssignment">Assignments</a>
              <a class="dropdown-item" href="<?= base_url() ?>pages/OtherDataTalentCapability">Talent Capability</a>
              <a class="dropdown-item" href="<?= base_url() ?>pages/OtherDataWorkload">Workload</a>
            </div>
          </li>
          <?php
          }
          ?>
        <?php
        }
        ?>
      </ul>

      <ul class="nav navbar-nav navbar-right ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-user-circle"></i>
            <?= $this->session->userdata['nama'] ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php
            if ($this->session->userdata('role') == 'member_logged_in') {
            ?>
              <a id="user_profile" class="dropdown-item" href="<?= base_url() ?>pages/Profile">Profile</a>
            <?php
            }
            ?>
            <a id="logout" class="dropdown-item" href="<?= base_url() ?>pages/Login/logout">Logout</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</header>
<!-- End of Header Section -->