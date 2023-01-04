<?php

namespace App\Libraries\ABTest\Variation;

use App\Libraries\ABTest\Test\Test;

interface VariationInterface
{

    /**
     * Get the identifier name
     *
     * @return string
     */
    public function getIdentifier(): string;

    /**
     * Run variation
     * 
     * @param array $tests Tests to run
     * @param array $data  Data to test
     * 
     * @return Test Selected test to use
     * 
     * @throws Exception
     */
    public function run(array $tests, array $data): Test;
}
