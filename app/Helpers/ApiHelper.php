<?php

namespace App\Helpers;

class ApiHelper{

    public function GetHighTemp(){
        // call api and get the high temp for the day.
        $options = array(
            'http' => array(
                 'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'Get',
            )
        );
        $context  = stream_context_create($options);
        return file_get_contents("http://172.20.10.5/api/gethighesttemperature", false, $context);
    }

    public function GetLowTemp(){
        // call api and get the high temp for the day.
        $options = array(
            'http' => array(
                 'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'Get',
            )
        );
        $context  = stream_context_create($options);
        return file_get_contents("http://172.20.10.5/api/getlowesttemperature", false, $context);
    }
    
    public function RegisterTemp($url, $data){
        // call the api and update with a new temp reading
        $options = array(
            'http' => array(
                 'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        return file_get_contents($url, false, $context);
    }
}