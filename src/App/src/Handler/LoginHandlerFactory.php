<?php

namespace App\Handler;

use Mezzio\Template\TemplateRendererInterface;
use Psr\Container\ContainerInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Mezzio\Helper\UrlHelper;
use App\Service\CacheService;

class LoginHandlerFactory
{
    public function __invoke(ContainerInterface $container): RequestHandlerInterface
    {
        $urlHelper = $container->get(UrlHelper::class);
        $template = $container->get(TemplateRendererInterface::class);
        $cacheService = $container->get(CacheService::class);
        return new LoginHandler($template, $urlHelper, $cacheService);
    }
}
