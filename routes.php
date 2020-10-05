<?php
// use for each controller.
use App\Controllers\HomeController;
use App\Controllers\SensorController;

// define all routes for application
$app->get('/', HomeController::class . ':FrontPage')->setName("frontPage");


// post temp data.
$app->map(["GET", "POST"], '/sensor/record', SensorController::class . ':Record');
// $app->get('/sensor/record', SensorController::class . ':Record')->setName("sensorReading");
// $app->post('/sensor/record', SensorController::class . ':Record')->setName("sensorReading");