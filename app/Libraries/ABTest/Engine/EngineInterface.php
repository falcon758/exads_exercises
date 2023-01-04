<?php

namespace App\Libraries\ABTest\Engine;

use App\Libraries\ABTest\Test\TestInterface;

interface EngineInterface
{
    /**
     * Get all tests
     *
     * @return array
     */
    public function getTests(): array;

    /**
     * Get a test from the engine
     *
     * @param string $test Test identifier
     * 
     * @return TestInterface
     */
    public function getTest($test): TestInterface;

    /**
     * Adds a test to the Engine
     *
     * @param TestInterface $test
     * 
     * @return void
     */
    public function addTest(TestInterface $test): void;

    /**
     * Starts the engine
     *
     * @return TestInterface
     */
    public function start(): TestInterface;
}
