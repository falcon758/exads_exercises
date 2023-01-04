<?php

namespace App\Libraries\ABTest\Test;

use App\Libraries\ABTest\Test\Filter\FilterInterface;

interface TestInterface
{
    /**
     * Get identifier name
     *
     * @return string
     */
    public function getIdentifier(): string;

    /**
     * Set filter
     *
     * @param FilterInterface $filter
     */
    public function setFilter(FilterInterface $filter): void;

    /**
     * Get variant
     *
     * @return FilterInterface
     */
    public function getFilter(): FilterInterface;
}
