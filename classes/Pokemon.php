<?php

declare(strict_types=1);

/**
 * Clase que representa un Pokémon.
 * Esta clase se encarga de almacenar los datos de un Pokémon y de obtener la información desde la API.
 */
class Pokemon
{
    /**
     * Constructor de la clase.
     * Recibe los atributos básicos del Pokémon y los asigna a las propiedades de la instancia.
     *
     * @param string $nombre Nombre del Pokémon.
     * @param int $identificador Identificador único del Pokémon.
     * @param string $url_imagen URL de la imagen del Pokémon.
     * @param int $peso Peso del Pokémon.
     * @param int $altura Altura del Pokémon.
     * @param int $experiencia_base Experiencia base que otorga el Pokémon.
     * @param string $nombre_especie Nombre de la especie a la que pertenece el Pokémon.
     * @param string $color Color predominante del Pokémon.
     */
    public function __construct(
        private string $nombre,
        private int $identificador,
        private string $url_imagen,
        private int $peso,
        private int $altura,
        private int $experiencia_base,
        private string $nombre_especie,
        private string $color
    ) {
    }

    /**
     * Método estático que obtiene los datos de la API y crea una instancia de Pokémon.
     *
     * @param string $ruta_api URL base de la API.
     * @param int $id_pokemon Identificador del Pokémon a obtener.
     * @return Pokemon Instancia de la clase Pokemon con los datos cargados.
     */
    public static function obtener_y_crear_pokemon(string $ruta_api, int $id_pokemon): Pokemon
    {
        // Construir la URL completa de la API concatenando la ruta base y el identificador del Pokémon
        $url = $ruta_api . $id_pokemon;
        // Obtener el contenido JSON desde la API
        $resultado = file_get_contents($url);
        // Decodificar el JSON a un array asociativo
        $datos = json_decode($resultado, true);

        // Extraer la experiencia base del Pokémon
        $experienciaBase = $datos['base_experience'];

        // Obtener los datos de la especie del Pokémon desde la URL proporcionada
        $urlEspecie = $datos['species']['url'];
        $resultadoEspecie = file_get_contents($urlEspecie);
        $datosEspecie = json_decode($resultadoEspecie, true);
        $nombreEspecie = $datosEspecie['name'];

        // Obtener el color del Pokémon desde la URL incluida en los datos de la especie
        $urlColor = $datosEspecie['color']['url'];
        $resultadoColor = file_get_contents($urlColor);
        $datosColor = json_decode($resultadoColor, true);
        $color = $datosColor['name'];

        // Crear y retornar una nueva instancia de Pokemon con todos los datos obtenidos
        return new self(
            $datos['name'],
            $datos['id'],
            $datos['sprites']['front_default'],
            $datos['weight'],
            $datos['height'],
            $experienciaBase,
            $nombreEspecie,
            $color
        );
    }

    /**
     * Método para obtener los datos del objeto en forma de array asociativo.
     * Esto permite, por ejemplo, pasar los datos a una plantilla para mostrarlos.
     *
     * @return array Array con los nombres de las propiedades y sus valores.
     */
    public function obtener_datos(): array
    {
        return get_object_vars($this);
    }
}
