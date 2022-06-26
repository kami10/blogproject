<?php

namespace App\Service;

use Laminas\Cache\Service\StorageAdapterFactoryInterface;
use Psr\Container\ContainerInterface;

class CacheServiceFactory
{
    public function __invoke(ContainerInterface $container)
    {
        /** @var StorageAdapterFactoryInterface $storageFactory */
        $storageFactory = $container->get(StorageAdapterFactoryInterface::class);
        // Via array configuration:
        $cache = $storageFactory->createFromArrayConfiguration([
            'adapter' => 'redis',
            'name' => 'redis',
            'options' => [
                'ttl' => 3600,
                'server' => [
                    'host' => '127.0.0.1',
                    'port' => 6379,
                ],
            ],
            'plugins' => [
                [
                    'name' => 'exception_handler',
                    'options' => [
                        'throw_exceptions' => false,
                    ],
                ],
            ],
        ]);
        return new CacheService($cache);
    }
}