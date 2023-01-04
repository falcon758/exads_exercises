<?php

declare(strict_types=1);

namespace App\Libraries\PrimeNumbers;

interface PrimeNumberInterface
{
    /**
     * Get number
     * 
     * @return int
     */
    public function getNumber(): int;

    /**
     * Set number
     * 
     * @return PrimeNumberInterface
     */
    public function setNumber(int $number): PrimeNumberInterface;

    /**
     * Get prime factors
     * 
     * @return array|null
     */
    public function getPrimeFactors(): ?array;

    /**
     * Is prime
     * 
     * @return bool
     */
    public function isPrime(): bool;
}
