# Proyecto PokéAPI

Este proyecto PHP tiene como objetivo mostrar información detallada de Pokémon utilizando la PokéAPI. Utiliza una API pública para obtener los datos y los muestra en una interfaz web sencilla y fácil de usar.

## Estructura del Proyecto

El proyecto está organizado en los siguientes archivos y carpetas:

* `index.php`: Archivo principal que controla el flujo de la aplicación.
* `consts.php`: Define la URL de la PokéAPI.
* `functions.php`: Contiene funciones útiles para la aplicación, como renderizar templates y obtener datos de la API.
* `classes/Pokemon.php`: Define la clase `Pokemon` que maneja los datos de los Pokémon.
* `templates/head.php`: Define la cabecera HTML de la página.
* `templates/main.php`: Define el contenido principal de la página.

## PokéAPI

El proyecto utiliza la API `https://pokeapi.co/api/v2/pokemon/` para obtener los datos de los Pokémon. Esta API devuelve un objeto JSON con la siguiente estructura (ejemplo para Pikachu):

```json
{
  "abilities": [...],
  "base_experience": 112,
  "forms": [...],
  "game_indices": [...],
  "height": 4,
  "held_items": [...],
  "id": 25,
  "is_default": true,
  "location_area_encounters": "[https://pokeapi.co/api/v2/pokemon/25/encounters](https://pokeapi.co/api/v2/pokemon/25/encounters)",
  "moves": [...],
  "name": "pikachu",
  "order": 35,
  "past_types": [],
  "species": {
    "name": "pikachu",
    "url": "[https://pokeapi.co/api/v2/pokemon-species/25/](https://pokeapi.co/api/v2/pokemon-species/25/)"
  },
  "sprites": {
    "back_default": "[https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/back/25.png](https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/back/25.png)",
    "back_female": null,
    "back_shiny": "[https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/back/shiny/25.png](https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/back/shiny/25.png)",
    "back_shiny_female": null,
    "front_default": "[https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/25.png](https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/25.png)",
    "front_female": null,
    "front_shiny": "[https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/shiny/25.png](https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/shiny/25.png)",
    "front_shiny_female": null,
    "other": {...},
    "versions": {...}
  },
  "stats": [...],
  "types": [...],
  "weight": 60
}
```

* `abilities`: Un array de habilidades del Pokémon.
* `base_experience`: La experiencia base que se obtiene al derrotar al Pokémon.
* `forms`: Un array de las formas del Pokémon.
* `height`: La altura del Pokémon en decímetros.
* `id`: El ID del Pokémon.
* `name`: El nombre del Pokémon.
* `sprites`: Un objeto que contiene las URLs de las imágenes del Pokémon.
* `stats`: Un array de las estadísticas del Pokémon.
* `types`: Un array de los tipos del Pokémon.
* `weight`: El peso del Pokémon en hectogramos.

## Cómo Funciona

* El archivo `index.php` realiza una petición a la API definida en `consts.php`.
* La clase `Pokemon` en `classes/Pokemon.php` procesa la respuesta JSON y crea un objeto con los datos del Pokémon.
* Los datos se pasan a los templates `head.php` y `main.php` para generar la página web.
* Se utiliza Bootstrap para el diseño responsivo y la presentación de los datos.

## Adaptación a Otras APIs

Para adaptar este proyecto a otra API, debes:

1.  Cambiar la URL en `consts.php`.
2.  Modificar la clase `Pokemon` para que coincida con la estructura de datos de la nueva API.
3.  Ajustar los templates para mostrar los datos de la nueva API.