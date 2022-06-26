<?php

namespace App\Middleware;

use App\Service\CacheService;
use Laminas\Diactoros\Response\RedirectResponse;
use Mezzio\Helper\UrlHelper;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class AuthenticationMiddleware implements MiddlewareInterface
{
    private UrlHelper $urlHelper;
    private CacheService $cacheService;

    public function __construct(urlHelper $urlHelper,CacheService $cacheService)
    {
        $this->urlHelper = $urlHelper;
        $this->cacheService = $cacheService;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $key = $request->getCookieParams()['userHash'].'isAdmin';
        $redisValue = $this->cacheService->getStorage()->getItem($key);
        //var_dump($redisValue);
        //var_dump($request->getCookieParams());
        //die;
        //$isAdmin = false;
        if ($redisValue !== 'yes') {
            $url = $this->urlHelper->generate('login');
            return new RedirectResponse($url);
        }
        return $handler->handle($request);
    }
}
