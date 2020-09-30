<?php
// use for each controller.
use App\Controllers\HomeController;
use App\Controllers\SensorController;

// define all routes for application
$app->get('/', HomeController::class . ':FrontPage')->setName("frontPage");


// post temp data.
$app->post('/sensor/record', SensorController::class . ':Record')->setName("sensorReading");