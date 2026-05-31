<?php
namespace Tests\App;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

class AuthTest extends CIUnitTestCase {
    use FeatureTestTrait;

    public function testLoginPageLoads() {
        $result = $this->get('/login');
        $result->assertStatus(200);
        $result->assertSee('Sign in');
    }

    public function testLoginWithWrongCredentials() {
        $result = $this->post('/login', ['username' => 'fakeuser', 'password' => 'wrongpass']);
        $result->assertRedirectTo('/login');
    }

    public function testDashboardRequiresLogin() {
        $result = $this->get('/dashboard');
        $result->assertRedirectTo('/login');
    }
}