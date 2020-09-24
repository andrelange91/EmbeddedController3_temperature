<?php
// use for each controller.
use App\Controllers\HomeController;

// define all routes for application
$app->get('/', HomeController::class . ':FrontPage')->setName("frontPage");


