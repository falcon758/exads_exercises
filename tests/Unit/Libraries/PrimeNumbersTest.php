<?php

namespace Tests\Feature;

use App\Libraries\PrimeNumbers\PrimeNumber;
use PHPUnit\Framework\TestCase;

class PrimeNumbersTest extends TestCase
{
    /**
     * Test a prime number
     *
     * @return void
     */
    public function test_prime_number()
    {
        $primeNumber = new PrimeNumber();
        $primeNumber->setNumber(3);

        $this->assertTrue($primeNumber->setNumber(3)->isPrime(), '3 should be prime');
    }

    /**
     * Test a non prime number
     *
     * @return void
     */
    public function test_non_prime_number()
    {
        $primeNumber = new PrimeNumber();
        $primeNumber->setNumber(4);

        $this->assertFalse($primeNumber->setNumber(4)->isPrime(), '4 should not be prime');
    }

    /**
     * Test prime factors
     *
     * @return void
     */
    public function test_prime_factors()
    {
        $primeNumber = new PrimeNumber();
        $primeNumber->setNumber(4);

        $this->assertEquals([2], $primeNumber->setNumber(4)->getPrimeFactors(), 'Prime factors are not correct.');
    }
}
