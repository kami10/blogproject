<?php

namespace App\Handler;

use Psr\Container\ContainerInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Mezzio\Template\TemplateRendererInterface;

class AdminHandlerFactory{
    public function __invoke(ContainerInterface $container): RequestHandlerInterface
    {
        $templateRenderer = $container->get(TemplateRendererInterface::class);
        return new AdminHandler($templateRenderer);
    }
}
