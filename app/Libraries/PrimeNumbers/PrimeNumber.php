<?php

declare(strict_types=1);

namespace App\Libraries\PrimeNumbers;

class PrimeNumber implements PrimeNumberInterface
{
    /**
     * Number
     * 
     * @var int
     */
    private int $number;

    /**
     * Prime factors
     * 
     * @var array
     */
    private array $primeFactors;

    /**
     * Get number
     * 
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * Set number
     * 
     * @return PrimeNumberInterface
     */
    public function setNumber(int $number): PrimeNumberInterface
    {
        $this->number = $number;

        $this->calculatePrimeFactors();

        return $this;
    }


    /**
     * Get prime factors
     * 
     * @return array
     */
    public function getPrimeFactors(): array
    {
        return $this->primeFactors;
    }

    /**
     * Is prime number
     * 
     * @return bool
     */
    public function isPrime(): bool
    {
        $primeFactors = $this->getPrimeFactors();
        
        return count($primeFactors) === 1 && current($primeFactors) === $this->number;
    }

    /**
     * Calculate prime factors
     * 
     * Applies Sieve of Eratosthenes approach
     * 
     * @throws InvalidArgumentException
     */
    private function calculatePrimeFactors(): void
    {
        $number = $this->number;

        if ($number <= 0) {
            throw new \InvalidArgumentException('Number should be greater than 0');
        }
        
        $currentFactor = 2;
        $primeFactors  = [];

        while ($number > 1) {
            // Consecutive dividing given number
            // by an integer starting from 2 (current factor)
            if ($number % $currentFactor == 0) {
                $primeFactors[] = $currentFactor;
                $number /= $currentFactor;
            } else {
                $currentFactor++;
            }
        }

        // Save only unique factors
        $this->primeFactors = array_unique($primeFactors);
    }
}
