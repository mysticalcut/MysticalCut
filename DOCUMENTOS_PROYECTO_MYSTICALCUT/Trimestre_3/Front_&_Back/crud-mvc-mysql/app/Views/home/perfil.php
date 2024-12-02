<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="<?= FOLDER_PUBLIC_ASSETS ?>/img/background/LOGOHEADERTRANS.png">
  <?php include_once FOLDER_VIEWS_CSS . 'style.php'; ?>

  <title>Profile</title>
  
</head>

<body>
<div class="container">
<header
        class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <div class="col-md-3 mb-2 mb-md-0">
        <img src="<?= FOLDER_PUBLIC_ASSETS ?>/img/background/LOGO.png" alt="Logo" width="125" height="125"
        class="d-inline-block align-text-top">
        </div>

        <div class="col-md-3 text-end">
            <div class="dropdown d-inline">
                <a href="#" class="textnav dropdown-toggle" id="profileDropdown" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <img src="<?= FOLDER_PUBLIC_ASSETS ?>/img/background/Icono usuario.png" alt="Profile" class="icon">
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                    <li>
                        <a class="dropdown-item" href="<?=URL_CONTROLLER_HOME?>">
                            <i class="fas fa-cog me-2"></i>Perfil
                        </a>
                    </li>
                    
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item" href="<?= URL_CONTROLLER ?>/login/logOut">
                            <i class="fas fa-sign-out-alt me-2"></i> Cerrar sesión
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    </div>

  <div class="container">
    <div class="row">
      <?php foreach ($roleModules as $module): ?>

        <div class="card mx-auto" style="width: 18rem;margin:5px">
          <div class="card-body">
            <h5 class="card-title"><?= $module['module_icon'] ?> <?= $module['role_module'] ?></h5>
            <p class="card-text"><?= $module['module_description'] ?></p>
            <a href="<?= URL_CONTROLLER ?>/<?= $module['module_route'] ?>" class="btn btn-primary w-100"><?= $module['role_module'] ?></a>
          </div>
        </div>
      <?php endforeach ?>

    </div>

  </div>
  <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        </ul>
        <p class="text-center text-white"></p>
    </footer>

    <?php include_once FOLDER_VIEWS_JS . 'js.php'; ?>
</body>

</html>