<main class="bg-dark text-white p-4">
    <div class="container">
        <div class="row align-items-center justify-content-center justify-content-md-start">
            <div class="col-md-auto text-center px-md-3">
                <img src="<?= $image_url; ?>" class="img-fluid rounded pokemon-image" alt="Imagen de <?= $name ?>">
            </div>
            <div class="col-md pokemon-info">
                <h3 class="text-md-start"><?= $name ?> - ID: <?= $id ?></h3>
                <p class="text-md-start">Peso: <?= $weight / 10; ?> kg</p>
                <p class="text-md-start">Altura: <?= $height / 10; ?> m</p>
                <p class="text-md-start">Experiencia base: <?= $base_experience; ?></p>
                <p class="text-md-start">Especie: <?= $species_name; ?></p>
                <p class="text-md-start">Color: <?= $color; ?></p>
            </div>
        </div>
    </div>
</main>