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
    <h3><?= $title ?></h3>

    <div class="row">

    <form action="<?= URL_CONTROLLER ?>/user/create" method="POST">
        <div class="form-floating mb-3">
          <input type="email" class="form-control form-control-sm" id="user" name="user" placeholder="name@example.com" required>
          <label for="user">Email address</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control form-control-sm" id="password" name="password" placeholder="Password" required>
          <label for="password">Password</label>
        </div>
        <div class="form-floating">
          <input type="hidden" class="form-control form-control-sm" id="role" value="3" name="role" placeholder="Cliente" required>

        </div>
        <div class="form-floating">
        <input type="hidden" class="form-control form-control-sm" id="status" value="1" name="status" placeholder="Activo" required>

        </div>
  
        <button type="submit" class="btn btn-success mt-2 w-100">Success</button>
      </form>
    </div>


  </div>
  <?php include_once FOLDER_VIEWS_ASSETS . 'footer/footerLogin.php'; ?>
  <?php include_once FOLDER_VIEWS_JS . 'js.php'; ?>
</body>

</html>