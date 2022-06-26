<?php

namespace App\Service;

use Psr\Container\ContainerInterface;
use Laminas\Db\Adapter\Adapter;

class DbServiceFactory{
    public function __invoke(ContainerInterface $container)
    {
        $adapter = new Adapter([
            'driver'   => 'Mysqli',
            'database' => 'blog_db',
            'username' => 'root',
            'password' => 'root',
        ]);

        return new DbService($adapter);
    }
}
