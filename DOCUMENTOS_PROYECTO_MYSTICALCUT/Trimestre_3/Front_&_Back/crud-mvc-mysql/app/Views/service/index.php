<?php

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include_once FOLDER_VIEWS_CSS . 'style.php'; ?>
  <title><?= $title ?></title>
</head>

<body>
    <header class="bg-black py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <img src="<?= FOLDER_PUBLIC_ASSETS ?>/img/LOGO.png" alt="Logo" width="125" height="125">
            <h1 class="text-white">Servicios</h1>
            <a href="verPerfilADM.html">
                <img src="<?= FOLDER_PUBLIC_ASSETS ?>/img/salida.png" alt="Salir" width="60" height="60">
            </a>
        </div>
    </header>

    <main class="container my-4">
        <div class="text-end mb-3">
            <button class="btn btn-success" onclick="window.location.href='crearNuevoServicioADM.html';">Agregar Servicio</button>
        </div>

        <div class="row">
            <?php foreach ($services as $service): ?>
                <div class="col-md-6 mb-4">
<div class="card">
                        <img src="<?= FOLDER_PUBLIC_ASSETS ?>/img/<?= htmlspecialchars($service['image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($service['title']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($service['title']) ?></h5>
                            <p class="card-text"><?= htmlspecialchars($service['description']) ?></p>
                            <a href="editarServiciosADM.html?id=<?= $service['id'] ?>" class="btn btn-primary">Editar</a>
                            <a href="eliminarServicio.php?id=<?= $service['id'] ?>" class="btn btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este servicio?');">Eliminar</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <footer class="bg-black text-white text-center py-3">
        <p>&copy; 2024 Servicios Administrativos</p>
    </footer>
</body>

</html>