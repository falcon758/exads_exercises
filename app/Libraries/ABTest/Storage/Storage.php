<?php

namespace App\Libraries\ABTest\Storage;

use App\Libraries\ABTest\Storage\Adapter\AdapterInterface;

class Storage implements StorageInterface
{
    /**
     * @var AdapterInterface
     */
    private $adapter;

    /**
     * @param AdapterInterface $adpterInterface
     */
    public function __construct(AdapterInterface $adpterInterface)
    {
        $this->adapter = $adpterInterface;
    }

    /**
     * Checks if the test exists
     *
     * @param string $identifier Tests identifier name
     * 
     * @return bool
     */
    public function has(string $identifier): bool
    {
        return $this->adapter->has($identifier);
    }

    /**
     * Get test data
     *
     * @param string $identifier Tests identifier name
     * 
     * @return mixed
     */
    public function get(string $identifier): mixed
    {
        return $this->adapter->get($identifier);
    }

    /**
     * Sets test value for a test
     *
     * @param string $identifier Test identifier name
     * @param mixed  $value      Value to set
     * 
     * @return void
     */
    public function set(string $identifier, mixed $value): void
    {
        $this->adapter->set($identifier, $value);
    }

    /**
     * Get all
     *
     * @return mixed
     */
    public function all(): mixed
    {
        return $this->adapter->all();
    }

    /**
     * Clears test.
     * 
     * @return void
     */
    public function clear(): void
    {
        $this->adapter->clear();
    }
}
