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
<div class="container">
    <header
      class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <div class="col-md-3 mb-2 mb-md-0">
        <img src="<?= FOLDER_PUBLIC_ASSETS ?>/img/background/LOGO.png" alt="Logo" width="125" height="125"
          class="d-inline-block align-text-top">
      </div>

      <ul class="nav col-12 justify-content-center mx-auto">
        <h1>Editar Usuario</h1>
      </ul>
    </header>
  </div>
  <div class="container">
    <div class="pedido-container">
            <?php foreach ($services as $index => $service): ?>
                <div class="pedido-box">
                    <div class="icon-usuario-container">
                        <img src="../../public/assets/img/logos/person-circle.svg" class="btn icon-usuario">
                    </div>
                    <h5><?= htmlspecialchars($service['name_service']) ?></h5>

                    <div class="icon-container">
                        <a href="<?= URL_CONTROLLER ?>/services/edit/<?= $service['id_services'] ?>" class="btn btn-icon">
                            <img src="../../public/assets/img/logos/pencil.svg">
                        </a>
                        <a href="<?= URL_CONTROLLER ?>/services/showId/<?= $service['id_services'] ?>" class="btn btn-icon">
                            <img src="../../public/assets/img/logos/eye.svg" alt="Icono Ojo">
                        </a>
                        <a href="<?= URL_CONTROLLER ?>/services/viewDelete/<?= $service['id_services'] ?>" class="btn btn-icon"
                            onclick="return confirm('¿Estás seguro de eliminar este usuario?');">
                            <img src="../../public/assets/img/logos/x-circle.svg">
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

            </div>
    <footer class="bg-black text-white text-center py-3">
        <p>&copy; 2024 Servicios Administrativos</p>
    </footer>
</body>

</html>