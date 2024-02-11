<?php

namespace WPC\Adapters;

/**
 * The plugin caching system.
 */
class Cache
{
    /**
     * @var string $storageName Transient storage name.
     */
    private string $storageName = "wpc_transient";

    /**
     * Storage name builder.
     *
     * @param string $name Primary name.
     * @return string Name of primary storage name.
     */
    private function storageName(string $name) : string
    {
        return sprintf("%s_%s",$this->storageName, $name);
    }

    /**
     * Set cached value.
     *
     * @param string $name Storage name.
     * @param mixed $value Contents to cache.
     * @param int $expiration Expiration time.
     * @return bool
     */
    public function set(string $name, $value, int $expiration = 0): bool
    {
        return set_transient($this->storageName($name),$value,$expiration);
    }

    /**
     * Get cached value.
     *
     * @param string $name Storage name.
     * @return mixed
     */
    public function get(string $name)
    {
        return get_transient($this->storageName($name));
    }

    /**
     * Delete cached value by name.
     *
     * @param string $name Storage name.
     * @return bool
     */
    public function delete(string $name): bool
    {
        return delete_transient($this->storageName($name));
    }
}