<?php
/**
 * Part of ci-phpunit-test
 *
 * @author     Kenji Suzuki <https://github.com/kenjis>
 * @license    MIT License
 * @copyright  2015 Kenji Suzuki
 * @link       https://github.com/kenjis/ci-phpunit-test
 */

class Auth_test extends TestCase {
    // login true
    // public function test_auth_login_true()
    // {
    //     $credential = [
    //         'username' => 'superadmin-samuel',
    //         'password' => 'j6gdexs1yuxb7ssa9qtdrsk='
    //     ];
    
    //     $this->request('POST', 'pages/Login/login', $credential);
    
    //     $this->assertRedirect('/pages/Login');
    // }
    // end of login true
    
    // login false
    // public function test_auth_login_false()
    // {
    //     $credential = [
    //         'username' => 'superadmin-samuel',
    //         'password' => 'J6gDEXs1yUxB7ssa9QtDRsk='
    //     ];
    
    //     $this->request('POST', 'pages/Login/login', $credential);
    
    //     $this->assertRedirect('/pages/Login');
    // }
    // end of login false

    // logout
    public function test_auth_logout()
    {
        $_SESSION['status'] = 'admin_logged_in';
        $this->request('GET', ['pages/Login', 'logout']);
        $this->assertResponseCode(404);
    }
    // end of logout
}
