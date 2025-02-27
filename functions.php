<?php

declare(strict_types=1); // Habilita el modo estricto de tipos

function render_template(string $template, array $data = [])
{
    extract($data); // Extrae las variables del array $data
    require "templates/$template.php"; // Incluye el archivo de template
}

function get_data(string $url): array
{
    $result = file_get_contents($url); // Obtiene el contenido de la URL
    $data = json_decode($result, true); // Decodifica el JSON en un array asociativo
    return $data; // Devuelve el array de datos
}