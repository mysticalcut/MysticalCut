<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once FOLDER_VIEWS_CSS . 'style.php'; ?>
    <?php include_once FOLDER_VIEWS_CSS . 'verycrearusuario.php'; ?>
    <title><?= $title ?></title>
</head>

<body>
    <?php include_once FOLDER_VIEWS_ASSETS . 'nav/navBar.php'; ?>

    <div class="container">
        <header
            class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <ul class="nav col-12 justify-content-center mx-auto">
                <h1>Usuarios</h1>
            </ul>
        </header>

        <div class="d-flex align-items-center justify-content-between w-100 mb-3">
            <div>
                <a href="<?= URL_CONTROLLER ?>/user/viewCreate" class="btn btn-agregar">
                    <img src="../../public/assets/img/logos/person-plus-fill.svg"
                        style="width: 20px; height: 20px; margin-right: 5px;">Agregar
                </a>
            </div>

            <div class="input-group" style="max-width: 300px;">
                <input type="text" class="form-control" placeholder="Buscar usuario..." aria-label="Buscar usuario">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false"></button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#">A......Z</a></li>
                    <li><a class="dropdown-item" href="#">Z......A</a></li>
                    <li><a class="dropdown-item" href="#">Fecha de registro</a></li>
                    <li><a class="dropdown-item" href="#">Último pedido</a></li>
                </ul>
            </div>
        </div>

        <div class="pedido-container">
            <table class="table">
                <thead>
                    <tr>

                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($factures as $index => $facture): ?>
                        <tr>

                            <td><?= $facture['id_factura'] ?></td>
                            <td><?= $facture['fecha'] ?></td>
                            <td>$<?= $facture['valor_total'] ?></td>
                            <td><?= $facture['user_fk'] ?></td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>

        <div class="btn-regresar mt-3">
            <button class="back-button btn btn-secondary"
                onclick="window.location.href='verPerfilADM.html';">Regresar</button>
        </div>
    </div>

    <?php include_once FOLDER_VIEWS_ASSETS . 'footer/footer.php'; ?>
    <?php include_once FOLDER_VIEWS_JS . 'js.php'; ?>
</body>

</html>