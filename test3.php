<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<?php
require __DIR__ . '/vendor/autoload.php';

$client = new GuzzleHttp\Client;

for($i=15;$i>=12;$i--){

$response = $client->request("GET","https://ir-dev-d9.innoraft-sites.com/jsonapi/node/services");

$res = $response->getBody();

$res = json_decode($res);

// var_dump($res);

$data = $res->data[$i]->relationships->field_image->links->related->href;

// $client = new Client(['base_uri' => 'https://ir-dev-d9.innoraft-sites.com/jsonapi/node/services']);

// var_dump($data);

// echo $data;

$image = $client->request("GET","$data");

$imgres = $image->getBody();


$imgres = json_decode($imgres);

// var_dump($imgres);

$title = $res->data[$i]->attributes->field_secondary_title->value;

$dataword = $res->data[$i]->attributes->field_services->value;

$img = "https://ir-dev-d9.innoraft-sites.com".$imgres->data->attributes->uri->url;

// var_dump($img);

// echo $img;

if($i%2!=0){

echo "<div class='con'>";

echo "<div class='leftcon'>";

echo "<img class='image' src='$img'>";

echo "</div>";
    
echo "<div class='rightcon'>";

echo "<div class='right'>$title</div>";


echo "<div class='para'>$dataword</div>";

echo "</div>";
echo "</div>";

 
}
else{
    echo "<div class='con'>";

    echo "<div class='rightcon'>";

 echo "<img class='image' src='$img'>";

 echo "</div>";
    
echo "<div class='leftcon'>";

 echo "<div class='right'>$title</div>";


 echo "<div class='para'>$dataword</div>";

 echo "</div>";

echo "</div>";

}


// echo $response->getStatusCode(), "\n";

// $arr = json_decode($response->getBody());

// echo $arr;
}
?>
</body>
</html>
