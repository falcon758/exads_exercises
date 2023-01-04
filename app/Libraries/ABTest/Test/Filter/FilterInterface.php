<?php

namespace App\Libraries\ABTest\Test\Filter;

interface FilterInterface
{
    /**
     * Get the identifier name
     *
     * @return string
     */
    public function getIdentifier(): string;
}
