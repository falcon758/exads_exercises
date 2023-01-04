<?php

namespace App\Libraries\ABTest\Test\Filter;

use InvalidArgumentException;

class PercentageFilter implements FilterInterface
{
    /**
     * Identifier name
     *
     * @var string
     */
    private string $identifier;

    /**
     * Test percentage
     *
     * @var int
     */
    private int $percentage;

    /**
     * Constructor
     *
     * @param string $identifier Identifier name
     * @param int    $percentage Percentage to split
     * 
     * @throws InvalidArgumentException
     */
    public function __construct(string $identifier, int $percentage)
    {
        if (!is_string($identifier) || $identifier === '') {
            throw new \InvalidArgumentException('Provided identifier is not a valid identifier.');
        }

        $this->identifier = $identifier;

        if ($percentage < 1 || $percentage > 100) {
            throw new InvalidArgumentException('Percentage must be 1 <=> 100');
        }

        $this->percentage = $percentage;
    }

    /**
     * Get the identifier name
     *
     * @return string
     */
    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    /**
     * Get percentage
     *
     * @return int
     */
    public function getPercentage(): int
    {
        return $this->percentage;
    }
}
