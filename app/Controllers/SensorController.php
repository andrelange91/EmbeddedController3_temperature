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
        if(strtolower($request->getMethod()) == "get"){
            die("hello");
        }
        $route = RouteContext::fromRequest($request)->getRoute();
        
        // $html = $this->twig->render('FrontPage.twig', ["routeName" => $route->getName()]);

        $data = [];

        parse_str($request->getBody()->getContents(), $data);

        $registerTime = date('Y-m-d H:i:s');
        $temperature = $data['Temperature'];
        $location = $data['Location'];

        $url = "http://10.130.17.33/api/insertTemp";
        $data = array("Temperature"=>$temperature,"RegisterTime"=>$registerTime, "Location"=>$location);

        ApiHelper::RegisterTemp($url, $data);

        $response->getBody()->write("Data Recorded");
        return $response;
    }
}
