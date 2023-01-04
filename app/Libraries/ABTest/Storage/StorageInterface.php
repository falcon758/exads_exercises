<?php

namespace App\Libraries\ABTest\Storage;

interface StorageInterface
{
    /**
     * Checks if the test exists
     *
     * @param string $identifier Tests identifier name
     * 
     * @return bool
     */
    public function has(string $identifier): bool;

    /**
     * Get test data
     *
     * @param string $identifier Tests identifier name
     * 
     * @return mixed
     */
    public function get(string $identifier): mixed;

    /**
     * Sets test value for a test
     *
     * @param string $identifier Tests identifier name
     * @param mixed  $value      Value to set
     * 
     * @return void
     */
    public function set(string $identifier, mixed $value): void;

    /**
     * Get all data
     *
     * @return mixed
     */
    public function all(): mixed;

    /**
     * Clears test.
     * 
     * @return void
     */
    public function clear(): void;
}
