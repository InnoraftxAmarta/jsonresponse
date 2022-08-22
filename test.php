<?php

$url="https://ir-dev-d9.innoraft-sites.com/jsonapi/node/services";
//  Initiate curl
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_URL,$url);
// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Set the url

// Execute
$result=curl_exec($ch);

curl_close($ch);
header('Content-Type: application/json; charset=utf-8');
// Will dump a beauty json :3

var_dump(json_decode($result, true));
print_r($result);

// var_dump($result);
// echo $result->data;
?>