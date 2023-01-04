<?php

declare(strict_types=1);

namespace App\Services;

/**
 * Class PrimeNumbersService
 *
 * @package App\Services
 */

 use App\Libraries\PrimeNumbers\PrimeNumber;

class PrimeNumbersService
{
    const MAX_PRIME_RANGE = 1E10;

    /**
     * @var PrimeNumber
     */
    private PrimeNumber $primeNumber;

    /**
     * @param PrimeNumber $primeNumber
     */
    public function __construct(PrimeNumber $primeNumber)
    {
        $this->primeNumber = $primeNumber;
    }

    /**
     * Get prime factors range
     *
     * @return array
     * 
     * @throws InvalidArgumentException
     */
    public function getPrimeFactorsRange(int $start, int $end): array
    {
        // Check if start and end range are valid
        if ($start <= 0 || $end < $start || $end > self::MAX_PRIME_RANGE) {
            throw new \InvalidArgumentException('Start and end range should have a valid range.');
        }

        $primeFactors = [];

        $primeNumbers = $this->primeNumber;

        // Loop through all range numbers
        for ($number = $start; $number <= $end; $number++) {
            $primeNumbers->setNumber($number);

            $primeFactors[$number] = [
                'factors' => $primeNumbers->getPrimeFactors(),
                'isPrime' => $primeNumbers->isPrime(),
            ]; 
        }

        return $primeFactors;
    }
}
