<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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

echo "<div class='row flex-row g-0 justify-content-center'>";

echo "<div class='col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 col-xxl-4 image'>";

echo "<img class='image img-fluid' src='$img'>";

echo "</div>";
    
echo "<div class='col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 col-xxl-4 image'>";

echo "<div class='right text-break'>$title</div>";


echo "<div class='para text-break'>$dataword</div>";

echo "</div>";

echo "</div>";

 
}
else{
    echo "<div class='row flex-row-reverse flex-row g-0 justify-content-center'>";

    echo "<div class='col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 col-xxl-4 image'>";
    
    echo "<img class='image img-fluid' src='$img'>";
    
    echo "</div>";
        
    echo "<div class='col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 col-xxl-4 image'>";
    
    echo "<div class='right text-break'>$title</div>";
    
    
    echo "<div class='para text-break'>$dataword</div>";
    
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
