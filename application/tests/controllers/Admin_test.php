<?php
/**
 * Part of ci-phpunit-test
 *
 * @author     Kenji Suzuki <https://github.com/kenjis>
 * @license    MIT License
 * @copyright  2015 Kenji Suzuki
 * @link       https://github.com/kenjis/ci-phpunit-test
 */

class Admin_test extends TestCase {
    // test for if user already logged in
    // login
    public function test_admin_login()
    {
        $this->request('POST', 'pages/Login',['username'=>'superadmin-samuel','password'=>'J6gDEXs1yUxB7ssa9QtDRsk=']);
        $this->request('GET', ['pages/Home', 'index']);
        $this->assertResponseCode(404);
    }
    // end of login

    // Get memberdsc
    public function test_admin_index()
    {
        $this->request('POST', 'pages/Login',['username'=>'superadmin-samuel','password'=>'J6gDEXs1yUxB7ssa9QtDRsk=']);
        $this->request('GET', ['pages/DscMember', 'index']);
        $this->assertResponseCode(404);
    }
    // end of Get memberdsc

    // Get err404
    public function test_err404()
    {
        $this->request('GET', ['err404', 'index']);
        $this->assertResponseCode(404);
    }
    // end of Get err404

    // Get err404
    public function test_err404_2()
    {
        $this->request('GET', ['pages/test', 'index']);
        $this->assertResponseCode(404);
    }
    // end of Get err404

    // Get memberdsc kontrak
    public function test_admin_member_dsc_kontrak()
    {
        $this->request('POST', 'pages/Login',['username'=>'superadmin-samuel','password'=>'J6gDEXs1yUxB7ssa9QtDRsk=']);
        $this->request('GET', ['pages/DscMember', 'member_dsc_contract']);
        $this->assertResponseCode(404);
    }
    // end of Get memberdsc kontrak

    // Get internship
    public function test_admin_member_internship()
    {
        $this->request('POST', 'pages/Login',['username'=>'superadmin-samuel','password'=>'J6gDEXs1yUxB7ssa9QtDRsk=']);
        $this->request('GET', ['pages/DscMember', 'apprenticeship']);
        $this->assertResponseCode(404);
    }
    // end of Get internship

    // Get university
    public function test_admin_university()
    {
        $this->request('POST', 'pages/Login',['username'=>'superadmin-samuel','password'=>'J6gDEXs1yUxB7ssa9QtDRsk=']);
        $this->request('GET', ['pages/DscMember', 'university']);
        $this->assertResponseCode(404);
    }
    // end of Get university

    // Get Member in Assignment
    public function test_admin_member_in_assignment()
    {
        $this->request('POST', 'pages/Login',['username'=>'superadmin-samuel','password'=>'J6gDEXs1yUxB7ssa9QtDRsk=']);
        $this->request('GET', ['pages/Assignments', 'index']);
        $this->assertResponseCode(404);
    }
    // end of Get Member in Assignment

    // Get Groups
    public function test_admin_group_list()
    {
        $this->request('POST', 'pages/Login',['username'=>'superadmin-samuel','password'=>'J6gDEXs1yUxB7ssa9QtDRsk=']);
        $this->request('GET', ['pages/Assignments', 'group_list']);
        $this->assertResponseCode(404);
    }
    // end of Get Groups

    // Get Tribe
    public function test_admin_tribe_list()
    {
        $this->request('POST', 'pages/Login',['username'=>'superadmin-samuel','password'=>'J6gDEXs1yUxB7ssa9QtDRsk=']);
        $this->request('GET', ['pages/Assignments', 'tribe_list']);
        $this->assertResponseCode(404);
    }
    // end of Get Tribe

    // Get Squad
    public function test_admin_squad_list()
    {
        $this->request('POST', 'pages/Login',['username'=>'superadmin-samuel','password'=>'J6gDEXs1yUxB7ssa9QtDRsk=']);
        $this->request('GET', ['pages/Assignments', 'squad_list']);
        $this->assertResponseCode(404);
    }
    // end of Get Squad

    // Get Use Case
    public function test_admin_usecase_list()
    {
        $this->request('POST', 'pages/Login',['username'=>'superadmin-samuel','password'=>'J6gDEXs1yUxB7ssa9QtDRsk=']);
        $this->request('GET', ['pages/Assignments', 'usecase_list']);
        $this->assertResponseCode(404);
    }
    // end of Get Use Case

    // Get Certified Member
    public function test_admin_certified_member()
    {
        $this->request('POST', 'pages/Login',['username'=>'superadmin-samuel','password'=>'J6gDEXs1yUxB7ssa9QtDRsk=']);
        $this->request('GET', ['pages/MemberSkills', 'certified_member']);
        $this->assertResponseCode(404);
    }
    // end of Get Certified Member

    // Get Certification
    public function test_admin_certification_list()
    {
        $this->request('POST', 'pages/Login',['username'=>'superadmin-samuel','password'=>'J6gDEXs1yUxB7ssa9QtDRsk=']);
        $this->request('GET', ['pages/MemberSkills', 'certification_programs']);
        $this->assertResponseCode(404);
    }
    // end of Get Certification

    // Get Trained Member
    public function test_admin_trained_member()
    {
        $this->request('POST', 'pages/Login',['username'=>'superadmin-samuel','password'=>'J6gDEXs1yUxB7ssa9QtDRsk=']);
        $this->request('GET', ['pages/MemberSkills', 'index']);
        $this->assertResponseCode(404);
    }
    // end of Get Trained Member

    // Get Training
    public function test_admin_training_list()
    {
        $this->request('POST', 'pages/Login',['username'=>'superadmin-samuel','password'=>'J6gDEXs1yUxB7ssa9QtDRsk=']);
        $this->request('GET', ['pages/MemberSkills', 'training_programs']);
        $this->assertResponseCode(404);
    }
    // end of Get Training

    // Get Admin
    public function test_admin_data_admin()
    {
        $this->request('POST', 'pages/Login',['username'=>'superadmin-samuel','password'=>'J6gDEXs1yUxB7ssa9QtDRsk=']);
        $this->request('GET', ['pages/Account', 'index']);
        $this->assertResponseCode(404);
    }
    // end of Get Admin

    // Get access_log_admin
    public function test_admin_access_log_admin()
    {
        $this->request('POST', 'pages/Login',['username'=>'superadmin-samuel','password'=>'J6gDEXs1yUxB7ssa9QtDRsk=']);
        $this->request('GET', ['pages/AccessLog', 'access_log_admin']);
        $this->assertResponseCode(404);
    }
    // end of Get access_log_admin

    // Get search_keyword
    public function test_admin_search_keyword()
    {
        $this->request('POST', 'pages/Login',['username'=>'superadmin-samuel','password'=>'J6gDEXs1yUxB7ssa9QtDRsk=']);
        $this->request('GET', ['pages/SearchResult', 'index']);
        $this->assertResponseCode(404);
    }
    // end of Get search_keyword

    // Monitoring System
    public function test_admin_monitoring()
    {
        $this->request('POST', 'pages/Login',['username'=>'superadmin-samuel','password'=>'J6gDEXs1yUxB7ssa9QtDRsk=']);
        $this->request('GET', ['pages/Home', 'member_dsc_summary']);
        $this->assertResponseCode(404);
    }
    // end of Monitoring System

    // Band
    public function test_admin_band()
    {
        $this->request('POST', 'pages/Login',['username'=>'superadmin-samuel','password'=>'J6gDEXs1yUxB7ssa9QtDRsk=']);
        $this->request('GET', ['pages/DscMember', 'band']);
        $this->assertResponseCode(404);
    }
    // end of Band

    // Posisi
    public function test_admin_posisi()
    {
        $this->request('POST', 'pages/Login',['username'=>'superadmin-samuel','password'=>'J6gDEXs1yUxB7ssa9QtDRsk=']);
        $this->request('GET', ['pages/DscMember', 'posisi']);
        $this->assertResponseCode(404);
    }
    // end of Posisi

    // Status
    public function test_admin_status()
    {
        $this->request('POST', 'pages/Login',['username'=>'superadmin-samuel','password'=>'J6gDEXs1yUxB7ssa9QtDRsk=']);
        $this->request('GET', ['pages/DscMember', 'status']);
        $this->assertResponseCode(404);
    }
    // end of Status

    //  member_in_assignmentApp
    public function test_admin_member_in_assignmentApp()
    {
        $this->request('POST', 'pages/Login',['username'=>'superadmin-samuel','password'=>'J6gDEXs1yUxB7ssa9QtDRsk=']);
        $this->request('GET', ['pages/Assignments', 'apprentice_in_assignment']);
        $this->assertResponseCode(404);
    }
    // end of  member_in_assignmentApp
    
    // end of test if user IS logged in

    // test for if user is NOT logged in
    // login
    public function test_admin_loginb()
    {
        $this->request('GET', ['pages/Home', 'index']);
        $this->assertResponseCode(404);
    }
    // end of login

    // Get memberdsc
    public function test_admin_index_b()
    {
        $this->request('GET', ['pages/memberdsc', 'index']);
        $this->assertResponseCode(404);
    }
    // end of Get memberdsc
    
    // Get memberdsc kontrak
    public function test_admin_member_dsc_kontrak_b()
    {
        $this->request('GET', ['pages/memberdsc', 'member_dsc_contract']);
        $this->assertResponseCode(404);
    }
    // end of Get memberdsc kontrak

    // Get internship
    public function test_admin_member_internship_b()
    {
        $this->request('GET', ['pages/memberdsc', 'apprenticeship']);
        $this->assertResponseCode(404);
    }
    // end of Get internship

    // Get university
    public function test_admin_university_b()
    {
        $this->request('GET', ['pages/memberdsc', 'university']);
        $this->assertResponseCode(404);
    }
    // end of Get university

    // Get Member in Assignment
    public function test_admin_member_in_assignment_b()
    {
        $this->request('GET', ['pages/Assignments', 'member_in_assignment']);
        $this->assertResponseCode(404);
    }
    // end of Get Member in Assignment

    // Get Groups
    public function test_admin_group_list_b()
    {
        $this->request('GET', ['pages/Assignments', 'group_list']);
        $this->assertResponseCode(404);
    }
    // end of Get Groups

    // Get Tribe
    public function test_admin_tribe_list_b()
    {
        $this->request('GET', ['pages/Assignments', 'tribe_list']);
        $this->assertResponseCode(404);
    }
    // end of Get Tribe

    // Get Squad
    public function test_admin_squad_list_b()
    {
        $this->request('GET', ['pages/Assignments', 'squad_list']);
        $this->assertResponseCode(404);
    }
    // end of Get Squad

    // Get Use Case
    public function test_admin_usecase_list_b()
    {
        $this->request('GET', ['pages/Assignments', 'usecase_list']);
        $this->assertResponseCode(404);
    }
    // end of Get Use Case

    // Get Certified Member
    public function test_admin_certified_member_b()
    {
        $this->request('GET', ['pages/MemberSkills', 'certified_member']);
        $this->assertResponseCode(404);
    }
    // end of Get Certified Member

    // Get Certification
    public function test_admin_certification_list_b()
    {
        $this->request('GET', ['pages/MemberSkills', 'certification_programs']);
        $this->assertResponseCode(404);
    }
    // end of Get Certification

    // Get Trained Member
    public function test_admin_trained_member_b()
    {
        $this->request('GET', ['pages/MemberSkills', 'index']);
        $this->assertResponseCode(404);
    }
    // end of Get Trained Member

    // Get Training
    public function test_admin_training_list_b()
    {
        $this->request('GET', ['pages/MemberSkills', 'training_programs']);
        $this->assertResponseCode(404);
    }
    // end of Get Training

    // Get Admin
    public function test_admin_data_admin_b()
    {
        $this->request('GET', ['pages/Account', 'index']);
        $this->assertResponseCode(404);
    }
    // end of Get Admin

    // Get search_keyword
    public function test_admin_search_keyword_b()
    {
        $this->request('GET', ['pages/SearchResult', 'index']);
        $this->assertResponseCode(404);
    }
    // end of Get search_keyword

    // Get access_log_admin
    public function test_admin_access_log_admin_b()
    {
        $this->request('GET', ['pages/AccessLog', 'access_log_admin']);
        $this->assertResponseCode(404);
    }
    // end of Get access_log_admin

    // Monitoring System
    public function test_admin_monitoring_b()
    {
        $this->request('GET', ['pages/Home', 'member_dsc_summary']);
        $this->assertResponseCode(404);
    }
    // end of Monitoring System

    // Band
    public function test_admin_band_b()
    {
        $this->request('GET', ['pages/memberdsc', 'band']);
        $this->assertResponseCode(404);
    }
    // end of Band

    // Posisi
    public function test_admin_posisi_b()
    {
        $this->request('GET', ['pages/memberdsc', 'posisi']);
        $this->assertResponseCode(404);
    }
    // end of Posisi

    // Status
    public function test_admin_status_b()
    {
        $this->request('GET', ['pages/memberdsc', 'status']);
        $this->assertResponseCode(404);
    }
    // end of Status

    //  member_in_assignmentApp
    public function test_admin_member_in_assignmentApp_b()
    {
        $this->request('GET', ['pages/Assignments', 'apprentice_in_assignment']);
        $this->assertResponseCode(404);
    }
    // end of  member_in_assignmentApp

}
