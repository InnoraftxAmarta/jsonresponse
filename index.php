<?php

$curl = curl_init();

// curl_setopt_array($curl, array(
//     CURLOPT_URL => "https://ir-dev-d9.innoraft-sites.com/jsonapi/node/services" ,
//     CURLOPT_HTTPHEADER => array(
//         "Content-Type: text/plain"
//     ),
// ));

$response = curl_exec($curl);
$response = json_decode($response,true);
 echo $response->data->attributes->body;
//  var_dump($response);
curl_close($curl);



echo $curl;

?>