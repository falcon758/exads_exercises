<?php

namespace Tests\Feature;

use App\Libraries\ASCII\ASCII;
use App\Services\ASCIIService;
use PHPUnit\Framework\TestCase;
use Exception;

class ASCIIRangeTest extends TestCase
{
    /**
     * Test a valid number range
     *
     * @return void
     */
    public function test_valid_number_range()
    {
        $service = new ASCIIService(new ASCII);
        $ascii   = $service->getASCIIRange('B', 'D');

        $this->assertEquals(3, count($ascii['ascii'] ?? []));
    }

    /**
     * Test a non valid number range
     *
     * @return void
     */
    public function test_non_valid_number_range()
    {
        $this->expectException(Exception::class);
        
        $service = new ASCIIService(new ASCII);
        $service->getASCIIRange('R', 'D');
    }
}
