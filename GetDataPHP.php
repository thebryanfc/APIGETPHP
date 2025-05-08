<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obtener Datos de un API desde PHP</title>
</head>
<body>
    <?php
    //Inicializa una nueva sesión de CURL
    $ch = curl_init();

    $url = 'https://pokeapi.co/api/v2/pokemon/7/';

    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    if(curl_error($ch)){
        $error_msg= curl_error($ch);
        echo"Error al conectarse a la API";
    }
    else{
        curl_close($ch);

        $pokemon_data = json_decode($response, true);

        echo '<H1>'. $pokemon_data['name']. '</H1>';
        echo '<img src="'. $pokemon_data['sprites']['front_default'].'" alt= "'. $pokemon_data['name']. '">';
        echo '<ul>';
        echo '<li><strong> Nombre: </strong>'. $pokemon_data['name']. '</li>';
        echo '<li><strong> Altura: </strong>'. $pokemon_data['height']. '</li>';
        echo '<li><strong> Anchura: </strong>'. $pokemon_data['weight']. '</li>';

        echo '<li><strong> Habilidades: </strong>';
        echo '<ul>';
        foreach ($pokemon_data['abilities'] as $ability){

            echo '<li>'. $ability['ability']['name']. '</li>';

        }
        echo '</ul>';
        echo '</li>';
        echo '</ul>';
    }
    ?>
</body>
    <p>Bryan Yaziel Figueroa Castillo</p>
</html>