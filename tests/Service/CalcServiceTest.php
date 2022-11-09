<?php

// tests/Service/CalcTest.php
namespace Tests\Service;

use App\Service\CalcService;
use PHPUnit\Framework\TestCase;

class CalcServiceTest extends TestCase
{
    public function testAdd()
    {
        $calc = new CalcService();
        $result = $calc->add(30, 12);

        // assert that your calculator added the numbers correctly!
        $this->assertEquals(42, $result);
    }
}