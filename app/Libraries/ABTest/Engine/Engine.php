<?php

namespace App\Libraries\ABTest\Engine;

use App\Libraries\ABTest\Storage\Storage;
use App\Libraries\ABTest\Storage\StorageInterface;
use App\Libraries\ABTest\Test\TestInterface;
use App\Libraries\ABTest\Variation\VariationInterface;

class Engine implements EngineInterface
{
    /**
     * Storage
     *
     * @var Storage
     */
    private Storage $storage;

    /**
     * Variation
     *
     * @var VariationInterface
     */
    private VariationInterface $variation;

    /**
     * Tests array
     *
     * @var array
     */
    public $tests = [];

    /**
     * Locks engine
     *
     * @var boolean
     */
    private $locked = false;

    /**
     * Constructor
     *
     * @param StorageInterface    $storage   Storage to use
     * @param VariationInterface $variation Variation to use
     */
    public function __construct(
        StorageInterface $storage,
        VariationInterface $variation
    ) {
        $this->storage = $storage;
        $this->variation = $variation;
    }

    /**
     * Get all tests
     *
     * @return array
     */
    public function getTests(): array
    {
        return $this->tests;
    }

    /**
     * Get a test from the engine
     *
     * @param string $test Test identifier
     * 
     * @return Exception
     */
    public function getTest($test): TestInterface 
    {
        if (!isset($this->tests[$test])) {
            throw new \Exception('Test not found with name: ' . $test);
        }

        return $this->tests[$test]->getTest();
    }

    /**
     * Adds a test to the Engine
     *
     * @param TestInterface $test
     * 
     * @return void
     * 
     * @throws Exception
     */
    public function addTest(TestInterface $test): void
    {
        if ($this->locked) {
            throw new \Exception('Engine already running');
        }

        if (isset($this->tests[$test->getIdentifier()])) {
            throw new \Exception('Duplicated test: ' . $test->getIdentifier());
        }

        $this->tests[$test->getIdentifier()] = $test;
    }

     /**
     * Starts the engine
     *
     * @return TestInterface
     * 
     * @throws Exception
     */
    public function start(): TestInterface
    {
        // Check if already locked
        if ($this->locked) {
            throw new \Exception('The engine is already locked.');
        }

        // Lock engine
        $this->locked = true;

        return $this->handleTests();
    }

    /**
     * Process tests
     * 
     * @return TestInterface
     * 
     * @throws InvalidArgumentException
     */
    private function handleTests(): TestInterface
    {
        $tests = $this->tests;

        if (count($tests) === 0) {
            throw new \InvalidArgumentException('Nothing to test.');
        }

        $test = $this->variation->run($tests, $this->storage->all());

        $testName = $test->getIdentifier();

        $data = $this->storage->get($testName);

        if (!$data) {
            $data['hits'] = 0;
        }

        $data['hits'] += 1;

        $this->storage->set($testName, $data);

        return $test;
    }
}
