<?php
error_reporting(0);


$icons_path = "https://www.imelcf.gob.pa/wp-content/plugins/location-weather/assets/images/icons/weather-icons/";

$city = "Pekin";

$URL = "https://api.openweathermap.org/data/2.5/weather?q=$city&appid=13a90374849f8d04b244930a0d6c3885&units=metric&lang=es";


// Obtener los datos de la API
$stringMeteo = file_get_contents($URL); // devuelve un string

// if (!$stringMeteo) {
//     echo "No se pudo obtener la información de la API";
//     exit;
// }

// print_r ($stringMeteo);

// Convertir el string en un JSON
$jsonMeteo = json_decode($stringMeteo, true);

// Obtener el icono
// ciudad -> name, icon
// ['weather']['0'] -> description, icon
// [main] -> temp, temp_min, temp_max, feels_like, humidity
// [sys] ->  sunrise, sunset

$icon_name = $jsonMeteo['weather']['0']['icon'];

$sunrise = getdate($jsonMeteo['sys']['sunrise']);
// echo strtotime()
echo ($sunrise['hours'].":".$sunrise['minutes']);
// echo "<br>";
// echo $jsonMeteo['timezone'];
// $localtime = date($jsonMeteo['sys']['sunrise']);
// // var_dump($localtime);
// echo date("Y-m-d H:i:s",$localtime);









?>

<!-- HTML  -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>City Meteo</title>
    <style>

    </style>
</head>

<body>

    <?php if ( !$stringMeteo) : ?>

        <p><?= $city ?> : nombre de ciudad incorrecto</p>

    <?php else : ?>
      
        <img src='<?= $icons_path . $icon_name . ".svg" ?>' alt="Icono del tiempo">

    <?php endif; ?>

</body>

</html>