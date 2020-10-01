<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteContext as RouteContext;
use App\Helpers\ApiHelper;

class SensorController
{

    public function Record(Request $request, Response $response, $args)
    {
        $route = RouteContext::fromRequest($request)->getRoute();
        
        $html = $this->twig->render('FrontPage.twig', ["routeName" => $route->getName()]);

        $registerTime = date("Y-m-d H:i:s");
        $temperature = $args['temperature'];
        $location = "Odense SØ";
        $url = "http://172.20.10.5/api/insertTemp";
        $data = array("temperature"=>$temperature,"registerTime"=>$registerTime, "location"=>$location);

        ApiHelper::RegisterTemp($url, $data);

        $response->getBody()->write($html);
        return $response;
    }
}