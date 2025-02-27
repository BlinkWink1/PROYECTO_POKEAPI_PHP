<?php

declare(strict_types=1); // Habilita el modo estricto de tipos

class Pokemon
{
    // Declaración de los atributos privados de la clase Pokemon
    public function __construct(
        private string $name, // Nombre del Pokémon
        private int $id, // ID del Pokémon
        private string $image_url, // URL de la imagen del Pokémon
        private int $weight, // Peso del Pokémon
        private int $height, // Altura del Pokémon
        private int $base_experience, // Experiencia base del Pokémon
        private string $species_name, // Nombre de la especie del Pokémon
        private string $color // Color del Pokémon
    ) {
    }

    // Función estática para obtener y crear una instancia de Pokemon desde la API
    public static function fetch_and_create_pokemon(string $api_url, int $pokemon_id): Pokemon
    {
        // Construcción de la URL para la petición a la API
        $url = $api_url . $pokemon_id;
        // Obtención de los datos de la API
        $result = file_get_contents($url);
        // Decodificación de los datos JSON en un array asociativo
        $data = json_decode($result, true);

        // Obtención de la experiencia base
        $baseExperience = $data['base_experience'];

        // Obtención del nombre de la especie
        $speciesUrl = $data['species']['url'];
        $speciesResult = file_get_contents($speciesUrl);
        $speciesData = json_decode($speciesResult, true);
        $speciesName = $speciesData['name'];

        // Obtención del color del pokemon
        $colorUrl = $speciesData['color']['url'];
        $colorResult = file_get_contents($colorUrl);
        $colorData = json_decode($colorResult, true);
        $color = $colorData['name'];

        // Creación y retorno de una nueva instancia de Pokemon con los datos obtenidos
        return new self(
            $data['name'],
            $data['id'],
            $data['sprites']['front_default'],
            $data['weight'],
            $data['height'],
            $baseExperience,
            $speciesName,
            $color
        );
    }

    // Función para obtener los datos del objeto como un array asociativo
    public function get_data(): array
    {
        return get_object_vars($this);
    }
}