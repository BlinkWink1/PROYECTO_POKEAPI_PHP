<?php

require_once 'consts.php'; // Incluye el archivo de constantes
require_once 'functions.php'; // Incluye el archivo de funciones
require_once 'classes/Pokemon.php'; // Incluye la clase Pokemon

// Obtener datos del primer Pokémon (Pikachu)
$pokemon1 = Pokemon::fetch_and_create_pokemon(API_URL, 25); // Crea un objeto Pokemon para Pikachu
$pokemon1_data = $pokemon1->get_data(); // Obtiene los datos de Pikachu como un array

// Obtener datos del segundo Pokémon (Charizard)
$pokemon2 = Pokemon::fetch_and_create_pokemon(API_URL, 6); // Crea un objeto Pokemon para Charizard
$pokemon2_data = $pokemon2->get_data(); // Obtiene los datos de Charizard como un array
?>

<?php render_template('head', ["title" => "Información de Pokémon"]); ?> 

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <?php render_template('main', $pokemon1_data); ?> 
        </div>
        <div class="col-md-6">
            <?php render_template('main', $pokemon2_data); ?> 
        </div>
    </div>
</div>