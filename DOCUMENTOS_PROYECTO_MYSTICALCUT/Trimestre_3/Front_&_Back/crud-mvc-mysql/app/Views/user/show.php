<?php

?>

<!DOCTYPE html>
<html lang="en">

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

            <div class="col-md-3 text-end">
                <div class="dropdown d-inline">
                    <a href="#" class="textnav dropdown-toggle" id="profileDropdown" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="<?= FOLDER_PUBLIC_ASSETS ?>/img/background/Icono usuario.png" alt="Profile"
                            class="icon">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                        <li>
                            <a class="dropdown-item" href="<?= URL_CONTROLLER_HOME ?>">
                                <i class="fas fa-cog me-2"></i>Perfil
                            </a>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= URL_CONTROLLER_INDEX ?>">
                                <i class="fas fa-sign-out-alt me-2"></i> Cerrar sesión
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
    </div>
  <div class="container">
    <h3><?= $title ?></h3>

    <div class="row">

      <form action="" method="POST">
        <div class="form-floating mb-3">
          <input type="email" class="form-control form-control-sm" id="user" name="user" placeholder="name@example.com" value="<?= $user[0]['user_email'] ?>" required disabled>
          <label for="user">Email address</label>
        </div>
        <div class="form-floating">
          <input type="password" style="text-overflow: ellipsis;"  class="form-control form-control-sm" id="password" name="password" placeholder="Password" value="<?= $user[0]['user_password'] ?>" required disabled>
          <label for="password">Password</label>
        </div>
        <select class="form-select form-select-sm mt-2" aria-label=".form-select-sm example" id="role" name="role" required disabled>
          <option disabled value>Open this select role</option>
          <?php for ($i = 0; $i < count($roles); $i++): ?>
            <?php if ($roles[$i]['role_id'] == $user[0]['role_fk']): ?>
              <option selected value="<?= $roles[$i]['role_id'] ?>"><?= $roles[$i]['role_name'] ?></option>
            <?php else: ?>
              <option value="<?= $roles[$i]['role_id'] ?>"><?= $roles[$i]['role_name'] ?></option>
            <?php endif ?>
          <?php endfor ?>
        </select>
        <select class="form-select form-select-sm mt-2" aria-label=".form-select-sm example" id="status" name="status" required disabled>
          <option disabled value>Open this select user status</option>
          <?php for ($i = 0; $i < count($status); $i++): ?>
            <?php if ($status[$i]['userStatus_id'] == $user[0]['userStatus_fk']): ?>
              <option selected value="<?= $status[$i]['userStatus_id'] ?>"><?= $status[$i]['userStatus_name'] ?></option>
            <?php else: ?>
              <option value="<?= $status[$i]['userStatus_id'] ?>"><?= $status[$i]['userStatus_name'] ?></option>
            <?php endif ?>
          <?php endfor ?>
        </select>
      </form>
    </div>


  </div>

  <?php include_once FOLDER_VIEWS_JS . 'js.php'; ?>
</body>

</html>