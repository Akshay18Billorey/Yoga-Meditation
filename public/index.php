<?php
use Slim\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Factory\AppFactory;
use Psr\Http\Message\ServerRequestInterface as RequestInterface;
use SlimFramework\Middleware\ExampleAfterMiddleware;
use SlimFramework\Middleware\ExampleBeforeMiddleware;
// use SlimFramework\vendor\slim\slim\Slim\Middleware\ExampleAfterMiddleware;
// use SlimFramework\vendor\slim\slim\Slim\Middleware\ExampleBeforeMiddleware;


use Slim\Routing\RouteCollectorProxy;

require __DIR__ . '/../vendor/autoload.php';
require 'connect.php';
// require 'form.php';

$app = AppFactory::create();
$errorMiddleware = $app->addErrorMiddleware(true, true, false);
// $errorMiddleware = $app->addErrorMiddleware(true, true, false);
// $app->add(ExampleAfterMiddleware::class);
// $app->add(ExampleBeforeMiddleware::class);
$beforeMiddleware = function (RequestInterface $request, RequestHandlerInterface $handler) {
    $response = $handler->handle($request);
    $existingContent = (string) $response->getBody();

    $response = new Response();
    $response->getBody()->write('BEFORE' . $existingContent);

    return $response;
};
$afterMiddleware = function (RequestInterface $request,RequestHandlerInterface $handler) {
    $response = $handler->handle($request);
    $response->getBody()->write('AFTER');
    return $response;
};





$routes = require __DIR__ . '/../app/routes.php';
$routes($app);

$app->run();
// $app->add($beforeMiddleware);
// $app->add($afterMiddleware);


// $middleware = require __DIR__ . '/../app/middleware.php';
// $middleware($app);

// $factory = new \PsrJwt\Factory\Jwt();

// $builder = $factory->builder();

// $token = $builder->setSecret('!secReT$123*')
//     ->setPayloadClaim('uid', 12)
//     ->build();

// echo $token->getToken();


// $app = AppFactory::create();
// $errormiddleware = $app->addErrorMiddleware(true,true,false); 
// require_once('apiInsert.php');
// require_once('apiUpdate.php');


// $app->get('/hello/{name}', function (RequestInterface $request, ResponseInterface $response, array $args) {
//     $name = $args['name'];
//     $response->getBody()->write("Hello, $name");
   
//     return $response;
// })->add($beforeMiddleware)->add($afterMiddleware);


// $app->get('/user/{name}', function (RequestInterface $request, ResponseInterface $response, array $args) {
//    $name = $args['name'];
//    $response->getBody()->write("Hello, $name");

//    return $response;
// });


// $app->get('/fetchall',function(Request $request, Response $response, array $args){
//     require_once('insertingData.php');
//     return $response;
// });

// $app->post('/singleData',function(Request $request, Response $response, array $args){
//     require_once('singleData.php');
//     return $response;
// });    

// $app->post('/apiIns',function(Request $request, Response $response, array $args){
//     require_once('apiInsert.php');
//     return $response;
// });

// $app->put('/apiUp',function(Request $request, Response $response, array $args){
//     require_once('apiUpdate.php');
//     return $response;
// });

// function ($request, $response, $next) {
//     $response->getBody()->write('BEFORE');
//     $response = $next($request, $response);
//     $response->getBody()->write('AFTER');

//     return $response;
// }; 

// $app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
//     $name = $args['name'];
//     $response->getBody()->write("Hello, $name");
    
//     return $response;
// });

// $app->post('/' ,function(Request $request, Response $response, array 
// $args){
//     $name = $_POST["name"];
//     $email = $_POST["email"];
//     $password = $_POST["Password"];
//     $sql = "Name = '$name',Email = '$email' and Password = '$password'";
//     // $result = $con->query($sql);
//     // echo $result;
//     echo json_encode($sql);
// });




// use Psr\Http\Message\ResponseInterface as Response;
// use Psr\Http\Message\ServerRequestInterface as Request;
// use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
// use Slim\Factory\AppFactory;
// use Slim\Routing\RouteCollectorProxy;

// require __DIR__ . '/../vendor/autoload.php';

// $app = AppFactory::create();

// $app->get('/', function (Request $request, Response $response) {
//     $response->getBody()->write('Hello World');
//     return $response;
// });

// $app->group('/utils', function (RouteCollectorProxy $group) {
//     $group->get('/date', function (Request $request, Response $response) {
//         $response->getBody()->write(date('Y-m-d H:i:s'));
//         return $response;
//     });
    
//     $group->get('/time', function (Request $request, Response $response) {
//         $response->getBody()->write((string)time());
//         return $response;
//     });
// })->add(function (Request $request, RequestHandler $handler) use ($app) {
//     $response = $handler->handle($request);
//     $dateOrTime = (string) $response->getBody();

//     $response = $app->getResponseFactory()->createResponse();
//     $response->getBody()->write('It is now ' . $dateOrTime . '. Enjoy!');

//     return $response;
// });

// $app->run();