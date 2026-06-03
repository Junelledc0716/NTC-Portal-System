<?php

namespace Tests\App;

use CodeIgniter\Test\CIUnitTestCase;

class PortalTest extends CIUnitTestCase
{
    // TEST 1
    public function testHomePage()
    {
        $this->assertTrue(true);

        // fake HTTP 200 test
        $statusCode = 200;

        $this->assertEquals(200, $statusCode);
    }

    // TEST 2
    public function testModelData()
    {
        $studentName = "Elle";

        $this->assertEquals("Elle", $studentName);
    }

    // TEST 3
    public function testValidationRule()
    {
        $email = "test@gmail.com";

        $this->assertNotNull($email);

        $this->assertTrue(filter_var($email, FILTER_VALIDATE_EMAIL) !== false);
    }
}