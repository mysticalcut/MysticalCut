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
        <!-- Header Section -->
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <div class="col-md-3 mb-2 mb-md-0">
                <img src="<?= FOLDER_PUBLIC_ASSETS ?>/img/background/LOGO.png" alt="Logo" width="125" height="125"
                    class="d-inline-block align-text-top">
            </div>

            <ul class="nav col-12 justify-content-center mx-auto">
                <h1>Iniciar Sesión</h1>
            </ul>
        </header>
    </div>

    <!-- Login Form Section -->
    <div class="login-container">
        <form action="<?= URL_CONTROLLER ?>/login/logIn" method="POST" class="login-form">
            <h6 class="text-center"><?= isset($_SESSION["message"]) ? $_SESSION["message"] : "" ?></h6>

            <!-- Email Input -->
            <label for="user">Correo Electrónico</label>
            <input type="email" id="user" name="user" required placeholder="Ingresa tu correo electrónico">

            <!-- Password Input -->
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" required placeholder="Ingresa tu contraseña">

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>

            <!-- Additional Links -->
            <div class="links text-center mt-3">
                <a href="<?= URL_CONTROLLER ?>/login/viewLostPassword">Recuperar Contraseña</a>
                <a href="Registro.html">¿No tienes Usuario? Regístrate aquí</a>
                <a href="#" id="helpLink">Ayuda</a>
            </div>
        </form>
    </div>
    <?php include_once FOLDER_VIEWS_ASSETS . 'footer/footerLogin.php'; ?>
    <?php include_once FOLDER_VIEWS_JS . 'js.php'; ?>
</body>

</html>