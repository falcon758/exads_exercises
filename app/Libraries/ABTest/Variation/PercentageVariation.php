<?php

namespace App\Libraries\ABTest\Variation;

use App\Libraries\ABTest\Test\Filter\PercentageFilter;
use App\Libraries\ABTest\Test\Test;

class PercentageVariation implements VariationInterface
{

    /**
     * Identifier name
     *
     * @var string
     */
    private string $identifier;

    /**
     * Constructor
     *
     * @param string          $identifier Identifier name
     * @param FilterInterface $filter     Filter to apply
     */
    public function __construct(string $identifier)
    {
        if (!is_string($identifier) || $identifier === '') {
            throw new \InvalidArgumentException('Provided identifier is not a valid identifier.');
        }

        $this->identifier = $identifier;
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
     * Run variation
     * 
     * @param array $tests Tests to run
     * @param array $data  Data to test
     * 
     * @return Test Selected test to use
     * 
     * @throws Exception
     */
    public function run(array $tests, array $data): Test
    {
        if (count($tests) === 0) {
            throw new \Exception('No tests provided.');
        }

        $variation = [];

        foreach ($tests as $test) {
            $testName = $test->getIdentifier();
            $filter   = $test->getFilter();

            if (!($filter instanceof PercentageFilter)) {
                throw new \Exception('Incompatible filter provided.');
            }

            $variation[$testName] = [
                'percentage' => $filter->getPercentage(),
                'hits'       => $data[$testName]['hits'] ?? 0
            ];
        }

        $selectedTest = $this->filterTest($variation);

        return $tests[$selectedTest];
    }

    /**
     * Filter test
     * 
     * @param array $data Data to process
     * 
     * @return string Test identifier selected
     */
    private function filterTest(array $data): string
    {
        $statistics = [];

        $totalHits = $this->totalHits($data);

        foreach ($data as $test => $stats) {
            $hits       = $stats['hits'];
            $percentage = $stats['percentage'];
            
            if ($percentage === 0) {
                $statistics[$test] = 0;
                continue;
            }

            $hitPerc = $totalHits > 0 ? ($hits / $totalHits) * 100 : 0;

            $statistics[$test] = $hitPerc / $percentage;
        }

        asort($statistics);

        return key($statistics);
    }

    /**
     * Total hits
     * 
     * @param array $data Data to process
     * 
     * @return int Total hits
     */
    private function totalHits(array $data): int
    {
        $totalHits = 0;

        foreach ($data as $stats) {
            $totalHits += $stats['hits'] ?? 0;
        }

        return $totalHits;
    }
}
