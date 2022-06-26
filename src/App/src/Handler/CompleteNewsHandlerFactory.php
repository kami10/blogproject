<?php

declare(strict_types=1);

namespace App\Handler;

use Mezzio\Template\TemplateRendererInterface;
use Psr\Container\ContainerInterface;
use Psr\Http\Server\RequestHandlerInterface;


class CompleteNewsHandlerFactory
{
    public function __invoke(ContainerInterface $container): RequestHandlerInterface
    {
        $templateRenderer = $container->get(TemplateRendererInterface::class);

        return new CompleteNewsHandler($templateRenderer);

    }
}