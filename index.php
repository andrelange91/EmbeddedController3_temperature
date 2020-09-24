<?php

use Slim\Factory\AppFactory;
use DI\ContainerBuilder;

require __DIR__ . '/vendor/autoload.php';


// Create Container using PHP-DI
$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions(__DIR__ . "/definitions.php");

// Set container to create App with on AppFactory
AppFactory::setContainer($containerBuilder->build());
$app = AppFactory::create();

require_once __DIR__ . "/routes.php";
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true,true,true);
$app->run();
