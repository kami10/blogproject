<?php

declare(strict_types=1);

namespace App\Handler;

use Mezzio\Template\TemplateRendererInterface;
use Psr\Container\ContainerInterface;
use Psr\Http\Server\RequestHandlerInterface;


class PostHandlerFactory
{
    public function __invoke(ContainerInterface $container): RequestHandlerInterface
    {
        $templateRenderer = $container->get(TemplateRendererInterface::class);

        return new PostHandler($templateRenderer);

    }
}