<?php

namespace App\Service;

use Laminas\Cache\Storage\StorageInterface;

class CacheService
{
    private StorageInterface $storage;

    /**
     * @param StorageInterface $storage
     */
    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage;
    }

    public function getStorage(): StorageInterface
    {
        return $this->storage;
    }

}