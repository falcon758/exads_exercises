<?php

namespace Tests\Feature;

use App\Libraries\PrimeNumbers\PrimeNumber;
use App\Services\PrimeNumbersService;
use PHPUnit\Framework\TestCase;
use Exception;

class PrimeNumbersRangeTest extends TestCase
{
    /**
     * Test a valid number range
     *
     * @return void
     */
    public function test_valid_number_range()
    {
        $service = new PrimeNumbersService(new PrimeNumber);
        $primeFactors = $service->getPrimeFactorsRange(1, 10);

        $this->assertEquals(10, count($primeFactors));
    }

    /**
     * Test a non valid number range
     *
     * @return void
     */
    public function test_non_valid_number_range()
    {
        $this->expectException(Exception::class);
        
        $service = new PrimeNumbersService(new PrimeNumber);
        $service->getPrimeFactorsRange(2, 1);
    }
}
