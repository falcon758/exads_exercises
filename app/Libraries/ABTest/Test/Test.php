<?php

namespace App\Libraries\ABTest\Test;

use App\Libraries\ABTest\Test\Filter\FilterInterface;

class Test implements TestInterface
{
    /**
     * Identifier name
     *
     * @var string
     */
    private string $identifier;

    /**
     * Filter to use
     *
     * @var FilterInterface
     */
    private FilterInterface $filter;

    /**
     * Constructor
     *
     * @param string          $identifier Identifier name
     * @param FilterInterface $filter     Filter to apply
     * 
     * @throws InvalidArgumentException
     */
    public function __construct(string $identifier, FilterInterface $filter)
    {
        if (!is_string($identifier) || $identifier === '') {
            throw new \InvalidArgumentException('Provided identifier is not a valid identifier.');
        }

        $this->identifier = $identifier;
        $this->setFilter($filter);
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
     * Set filter
     *
     * @param FilterInterface $filter Filter to use
     * 
     * @return void
     */
    public function setFilter(FilterInterface $filter): void
    {
        $this->filter = $filter;
    }

    /**
     * Get filter
     *
     * @return FilterInterface
     */
    public function getFilter(): FilterInterface
    {
        return $this->filter;
    }
}
