<?php

namespace App\Libraries\ABTest\Storage\Adapter;

class Session implements AdapterInterface
{
    /**
     * Session name
     *
     * @var string
     */
    protected $sessionName;
    
    /**
     * Data array to save
     *
     * @var array|null
     */
    protected $data;

    /**
     * Constructor
     * 
     * @param string $sessionName Session name
     */
    public function __construct($sessionName)
    {
        $this->sessionName = $sessionName;

        $this->loadData();
    }

    /**
     * Loads already existing data
     * 
     * @return void
     */
    protected function loadData(): void
    {
        if (is_array($this->data)) {
            return;
        }

        $data = session($this->sessionName);

        if (!$data) {
            $this->data = [];
            return;
        }

        $sessionData = json_decode($data, true);

        if (is_null($sessionData)) {
            $this->data = [];
            return;
        }

        $this->data = $sessionData;
    }

    /**
     * Save data
     * 
     * @return bool
     */
    protected function save(): bool
    {
        $data = $this->data;

        if (!is_array($data) || count($data) === 0) {
            return false;
        }

        session([$this->sessionName => json_encode($data)]);

        return true;
    }

    /**
     * Checks if exists
     *
     * @param string $identifier Element identifier
     *
     * @return bool
     */
    public function has(string $identifier): bool
    {
        return array_key_exists($identifier, $this->data);
    }

    /**
     * Get identifier data
     *
     * @param mixed $identifier Element identifier
     *
     * @return mixed Element data
     */
    public function get(string $identifier): mixed
    {
        if (!$this->has($identifier)) {
            return null;
        }

        return $this->data[$identifier];
    }

    /**
     * Set value for identifier
     *
     * @param string $identifier Element identifier
     * @param mixed  $value      Value of element
     *
     * @return bool
     */
    public function set(string $identifier, mixed $value): bool
    {        
        $this->data[$identifier] = $value;

        return $this->save();
    }

    /**
     * Retrieve all identifiers
     *
     * @return array All identifiers
     */
    public function all()
    {
        return $this->data;
    }

    /**
     * Remove identifier
     *
     * @param string $identifier Element identifier
     */
    public function remove($identifier)
    {
        if (!$this->has($identifier)) {
            return false;
        }

        unset($this->data[$identifier]);

        $this->save();
    }

    /**
     * Clears all elements
     */
    public function clear()
    {
        $this->data = [];
        $this->save();
    }
}
