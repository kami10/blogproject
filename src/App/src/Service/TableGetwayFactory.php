<?php

namespace App\Service;

use Psr\Container\ContainerInterface;

class TableGetwayFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $adapter = $container->get(DbService::class);
        return new TableGetway($adapter);
    }

}