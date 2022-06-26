<?php

namespace App\Middleware;

use App\Service\CacheService;
use Mezzio\Helper\UrlHelper;
use Psr\Container\ContainerInterface;


class AuthenticationMiddlewareFactory
{
    public function __invoke(ContainerInterface $container): AuthenticationMiddleware
    {
        $cache = $container->get(CacheService::class);
        $urlHelper = $container->get(UrlHelper::class);
        return new AuthenticationMiddleware($urlHelper,$cache);
    }
}
