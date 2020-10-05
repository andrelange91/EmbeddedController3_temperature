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
        // $options = array(
        //     'http' => array(
        //          'header'  => "Content-type: application/json",
        //         'method'  => 'POST',
        //         'content' => http_build_query($data)
        //     )
        // );
        // $context  = stream_context_create($options);
        // return file_get_contents($url, false, $context);


        $curl = curl_init();

        curl_setopt_array($curl, [
        CURLOPT_PORT => "80",
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($data),
        CURLOPT_HTTPHEADER => [
            "content-type: application/json"
        ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        var_dump($err);
        die();
        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        echo $response;
        }
    }
}