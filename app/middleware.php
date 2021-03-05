<?php

use Slim\App;
use SlimFramework\Middleware\ExampleAfterMiddleware;
use SlimFramework\Middleware\ExampleBeforeMiddleware;
// use SlimFramework\vendor\slim\slim\Slim\Middleware\ExampleAfterMiddleware;
// use SlimFramework\vendor\slim\slim\Slim\Middleware\ExampleBeforeMiddleware;
return function (App $app){
    //$app->addErrorMiddleware(true, true, false);
    //$errorMiddleware = $app->addErrorMiddleware(true, true, false);
    $app->add(\ExampleAfterMiddleware::class);
    $app->add(\ExampleBeforeMiddleware::class);

};