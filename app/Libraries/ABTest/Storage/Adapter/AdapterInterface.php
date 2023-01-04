<?php

namespace App\Libraries\ABTest\Storage\Adapter;
interface AdapterInterface
{
    /**
     * Checks if exists
     *
     * @param string $identifier Element identifier
     *
     * @return bool
     */
    public function has(string $identifier): bool;

    /**
     * Get identifier data
     *
     * @param string $identifier Element identifier
     *
     * @return mixed Element data
     */
    public function get(string $identifier): mixed;

    /**
     * Set value for identifier
     *
     * @param string $identifier Element identifier
     * @param mixed  $value      Value of element
     *
     * @return bool
     */
    public function set(string $identifier, mixed $value): bool;

    /**
     * Retrieve all identifier
     *
     * @return array All identifiers
     */
    public function all();

    /**
     * Remove identifier
     *
     * @param string $identifier Element identifier
     */
    public function remove($identifier);

    /**
     * Clears all elements
     */
    public function clear();
}
