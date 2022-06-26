<?php

namespace App\Service;

use Laminas\Db\Adapter\Adapter;

class DbService
{
    private Adapter $adapter;

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public function getAdapter(): Adapter
    {
        return $this->adapter;
    }
}
