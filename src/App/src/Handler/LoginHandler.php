<?php

namespace App\Handler;

use App\Service\CacheService;
use Fig\Http\Message\RequestMethodInterface;
use Laminas\Diactoros\Response\HtmlResponse;
use Laminas\Diactoros\Response\RedirectResponse;
use Mezzio\Helper\UrlHelper;
use Mezzio\Template\TemplateRendererInterface;
use PDO;
use PDOException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Ramsey\Uuid\Uuid;

class LoginHandler implements RequestHandlerInterface
{
    private TemplateRendererInterface $templateRenderer;
    private UrlHelper $urlHelper;
    private CacheService $cacheService;

    public function __construct(TemplateRendererInterface $templateRenderer, UrlHelper $urlHelper, CacheService $cacheService)
    {
        $this->templateRenderer = $templateRenderer;
        $this->urlHelper = $urlHelper;
        $this->cacheService = $cacheService;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $showError = [
            'error' => ''
        ];
        if ($request->getMethod() === RequestMethodInterface::METHOD_POST) {
            $username = $request->getParsedBody()['username'];
            $password = $request->getParsedBody()['password'];
//            $connection = $this->connectToDb();
//            if ($connection == null) {
//                $showError['error'] = 'cant connect to db';
//            } else {
//                $sql = 'select * from tbl_user where username = ":username" and password = ":password"';
//                echo $sql;
//                $stmt = $connection->prepare($sql);
//                $stmt->execute(['username' => $username, 'password' => $password]);
//                $result = $stmt->setFetchMode(pdo::FETCH_ASSOC);
//                foreach ($stmt->fetchAll() as $key => $value) {
//                    var_dump($value);
//                    die;
//                }
           // die;
            if ($username == 'admin' && $password == 'admin') {
                $uuid = Uuid::uuid4();
                $this->cacheService->getStorage()->addItem($uuid . 'isAdmin', 'yes');
                setcookie('userHash', $uuid->toString());
                return new RedirectResponse($this->urlHelper->generate('admin'));
            } else {
                $showError['error'] = 'login failed';
            }
        }
        return new HtmlResponse($this->templateRenderer->render('app::login', $showError));
    }

//    public function connectToDb(): ?PDO
//    {
//        $servername = "localhost";
//        $username = "root";
//        $password = "root";
//
//        try {
//            $conn = new PDO("mysql:host=$servername;port=3306;dbname=blog_db", $username, $password);
//            // set the PDO error mode to exception
//            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//            return $conn;
//            // echo "Connected successfully";
//        } catch (PDOException $e) {
//            return null;
//        }
//        return null;
//    }
}
