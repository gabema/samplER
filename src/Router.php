<?php

namespace ER\SamplER;

use DI\Container;
use ER\SamplER\Api\ApiController;
use ER\SamplER\FrontEnd\FrontendController;
use Slim\Factory\AppFactory;
use Slim\Routing\RouteCollectorProxy;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

// If using a routing framework this should be the ONLY reference
// to a require/include statement
require __DIR__ . '/../vendor/autoload.php';

// Create Container
$container = new Container();
AppFactory::setContainer($container);

// Set view in Container
$container->set('view', function() {
    return Twig::create('src/Templates/', ['cache' => 'cache']);
});

$app = AppFactory::create();

$app->addErrorMiddleware(true, true, true);

$app->group('/api', function(RouteCollectorProxy $group){
    $group->get('/me', ApiController::class . ':me');
});
$app->group('/app', function($group) {
    $group->get('/hello/{name}', FrontendController::class . ':hello');
})->add(TwigMiddleware::createFromContainer($app));

if (defined('RUNNING_UNIT_TEST')) {
    return $app;
}

$app->run();
