<?php

for($i=0;$i<=15;$i++){

$ch = curl_init("https://ir-dev-d9.innoraft-sites.com/jsonapi/node/services");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

curl_close($ch);

$data = json_decode($response, true);

$redirect = $data["data"][$i]["links"]["self"]["href"];

// var_dump($data);
// echo $data["data"][15]["links"]["self"]["href"];

$ch1 = curl_init($redirect);

curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);

$response1 = curl_exec($ch1);

curl_close($ch1);

$data2 = json_decode($response1,true);

$redirect2 = $data2["data"]["relationships"]["field_image"]["links"]["related"]["href"];

$ch2 = curl_init($redirect2);

curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);

$response2 = curl_exec($ch2);

curl_close($ch2);

$data3 = json_decode($response2,true);

$redirect3 = $data3["data"]["attributes"]["uri"]["url"];

$img = "https://ir-dev-d9.innoraft-sites.com".$redirect3;

echo $img."<br>";

echo "<img src='$img'>";

// $img = "";

}

// foreach($data as $res){

//     // echo $res["data"];

// }

?>

    
