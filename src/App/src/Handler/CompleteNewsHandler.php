<?php

declare(strict_types=1);

namespace App\Handler;

use Laminas\Diactoros\Response\HtmlResponse;
use Mezzio\Template\TemplateRendererInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class CompleteNewsHandler implements RequestHandlerInterface
{
    private TemplateRendererInterface $templeRenderer;

    public function __construct(TemplateRendererInterface $templateRenderer)
    {
        $this->templeRenderer = $templateRenderer;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return new HtmlResponse($this->templeRenderer->render('app::complete-news'));
    }
}