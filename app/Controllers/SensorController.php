<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteContext as RouteContext;

class SensorController
{

    public function Record(Request $request, Response $response)
    {
        $route = RouteContext::fromRequest($request)->getRoute();
        
        $html = $this->twig->render('FrontPage.twig', ["routeName" => $route->getName()]);

        // Get the request data and send it to the api.
        $temp = "0";
        $location = "Odense SØ";
        

        $response->getBody()->write($html);
        return $response;
    }
}