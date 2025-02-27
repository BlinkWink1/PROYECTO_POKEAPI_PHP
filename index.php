<?php

require_once 'consts.php';
require_once 'functions.php';
require_once 'classes/Pokemon.php';

// Obtener datos del primer Pokémon (Pikachu)
$pokemon1 = Pokemon::fetch_and_create_pokemon(API_URL, 25);

// Obtener datos del segundo Pokémon (Charizard)
$pokemon2 = Pokemon::fetch_and_create_pokemon(API_URL, 6);
?>

<?php render_template('head', ["title" => "Información de Pokémon"]); ?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <?php render_template('main', $pokemon1->get_data()); ?>
        </div>
        <div class="col-md-6">
            <?php render_template('main', $pokemon2->get_data()); ?>
        </div>
    </div>
</div>e
