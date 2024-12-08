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
      <nav id="navbar-example" class="navbar navbar-expand-lg navbar-dark bg-black fixed-top encabezado">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <div class="col-md-3 d-flex justify-content-center">
                    <img src="../../../public/assets/img/LOGO.png" alt="Logo" width="125" height="125"
                        class="d-inline-block align-text-top">
                </div> 
                <div class="d-flex flex-column">
                    <a class="navbar-brand" href="#">Servicios</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#cortes">Cortes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#barbas">Barbas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#cejas">Cejas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tintes">Tintes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#combos">Combos</a>
                        </li>
                    </ul>
                    <a href="verPerfilADM.html" class="textnav">
                        <img src="../../../public/assets/img/salida.png" alt="Cart" class="icon" width="60" height="60">
                    </a>
                </div>
            </div>
        </nav>
    </header>
</div>

<main class="container mt-5 pt-5">
        <div class="container4">
            <img src="../../../public/assets/img/editar perfil 2.png" alt="Descripción de la imagen" class="small-icon">
            <button class="boton1" id="add-product"
                onclick="window.location.href='crearNuevoServicioADM.html';">Agregar</button>
        </div>
       
        <div class="row justify-content-center">
            <!-- Left Column: Services -->
            <div class="col-md-8">
                <section id="cortes" class="section">
                    <h2 class="section-title text-center">Cortes</h2>
                    <div class="d-flex flex-column align-items-center">

                        <!-- Primer servicio -->
                        <div class="card mb-4 w-75">
                            <div class="card-body d-flex">
                                <div class="service-image">
                                    <img src="../../../public/assets/img/corte7.jpg" alt="Corte 7" class="img-fluid"
                                        style="max-width: 150px; margin-right: 15px;">
                                    <div class="switch-container">
                                    </div>
                                </div>

                                <div class="service-details">
                                    <h5 class="card-title">Corte 7</h5>
                                    <p class="card-text">
                                    <?php foreach ($services as $service): ?> 
                        <a href="<?= URL_CONTROLLER ?>/services/edit/<?= $service['id_services'] ?>" class="btn btn-icon" class="btn btn-edit">Editar </a>
                        <a href="<?= URL_CONTROLLER ?>/services/delete/<?= $service['id_services'] ?>" class="btn btn-icon" class="btn btn-edit">eliminar </a></p>
                        <?php endforeach; ?>
                                    
                                </div>
                                
                            </div>
                        </div>

                        <!-- Segundo servicio -->
                        <div class="card mb-4 w-75">
                            <div class="card-body d-flex">
                                <div class="service-image">
                                    <img src="../../../public/assets/img/wolfcut.jpg" alt="Wolf Cut" class="img-fluid"
                                        style="max-width: 150px; margin-right: 15px;">
                                    <div class="switch-container">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="toggleActivo"
                                                onchange="toggleConfirmation(event)">
                                            <label class="form-check-label" for="toggleInactivo"></label>
                                        </div>
                                    </div>
                                </div>
                                

                                 <div class="services-container">
        <?php if (!empty($services)) : ?>
            <?php foreach ($services as $service) : ?>
                <div class="card">

                    <div class="card-content">
                    <a href="<?= URL_CONTROLLER ?>/services/edit/<?= $service['id_services'] ?>" class="btn btn-icon">  
                        </a>
                        <?php echo htmlspecialchars($service['name']); ?>
                        <p><?php echo htmlspecialchars($service['description']); ?></p>
                    </div>
                    <div class="card-actions">
                        <a href="services/edit/<?php echo $service['id']; ?>" class="btn btn-edit">Editar</a>
                        <a href="services/delete/<?php echo $service['id']; ?>" class="btn btn-delete">Seleccione para eliminar</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No hay servicios disponibles.</p>
        <?php endif; ?>
    </div>

                            </div>
                        </div>

                        <!-- Tercer servicio -->
                        <div class="card mb-4 w-75">
                            <div class="card-body d-flex">
                                <div class="service-image">
                                    <img src="../../../public/assets/img/mullet.jpg" alt="Mullet" class="img-fluid"
                                        style="max-width: 150px; margin-right: 15px;">
                                    <div class="switch-container">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="toggleActivo"
                                                onchange="toggleConfirmation(event)">
                                            <label class="form-check-label" for="toggleInactivo"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="service-details">
                                    <h5 class="card-title">Mullet</h5>
                                    <p class="card-text">El corte mullet es un estilo que juega con dos extensiones: más
                                        corto en la parte superior de la cabeza y los lados, y más largo en la parte de
                                        atrás.</p>
                                    <button class="btn btn-custom"
                                        onclick="window.location.href='editarServiciosADM.html'"
                                        data-service-id="corte7">Editar</button>
                                    <button class="btn btn-custom select-service" data-service-id="Mullet">Seleccione
                                        para eliminar</button>
                                </div>
                            </div>
                        </div>

                        <!-- Nuevo servicio con imagen a la izquierda -->
                        <div class="card mb-4 w-75">
                            <div class="card-body d-flex">
                                <div class="service-image">
                                    <img src="../../../public/assets/img/signointerrogacion.jpg" alt="Otros"
                                        class="img-fluid" style="max-width: 150px; margin-right: 15px;">
                                </div>
                                <div class="service-details">
                                    <h5 class="card-title">Otros</h5>
                                    <p class="card-text"> Si no encontraste tu corte preferido, escribelo aqui para
                                        agendar tu cita.</p>
                                    <!-- Barra de entrada de texto -->
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control"
                                            placeholder="Escribe el nombre del corte que Deseas"
                                            aria-label="Buscar corte">
                                    </div>
                                    <button class="btn btn-custom select-service" data-service-id="Otros">Seleccionar
                                        para eliminar</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>

                <section id="barbas" class="section">
                    <h2 class="section-title text-center">Barbas</h2>
                    <div class="d-flex flex-column align-items-center">

                        <!-- Primer servicio -->
                        <div class="card mb-4 w-75">
                            <div class="card-body d-flex">
                                <div class="service-image">
                                    <img src="../../../public/assets/img/BarbaCortaCuadrada.jpg"
                                        alt="Barba Corta Cuadrada" class="img-fluid"
                                        style="max-width: 150px; margin-right: 15px;">
                                    <div class="switch-container">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="toggleActivo"
                                                onchange="toggleConfirmation(event)">
                                            <label class="form-check-label" for="toggleInactivo"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="service-details">
                                    <h5 class="card-title">Barba Corta Cuadrada</h5>
                                    <p class="card-text">La barba corta cuadrada se parece a una barba completa, pero
                                        sus laterales son más finos y están recortados con precisión.</p>
                                    <button class="btn btn-custom"
                                        onclick="window.location.href='editarServiciosADM.html'"
                                        data-service-id="corte7">Editar</button>
                                    <button class="btn btn-custom select-service"
                                        data-service-id="Barba Corta Cuadrada">Seleccione para eliminar</button>
                                </div>
                            </div>
                        </div>

                        <!-- Segundo servicio -->
                        <div class="card mb-4 w-75">
                            <div class="card-body d-flex">
                                <div class="service-image">
                                    <img src="../../../public/assets/img/barbacandadco.jpg" alt="Barba Candado"
                                        class="img-fluid" style="max-width: 150px; margin-right: 15px;">
                                    <div class="switch-container">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="toggleActivo"
                                                onchange="toggleConfirmation(event)">
                                            <label class="form-check-label" for="toggleInactivo"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="service-details">
                                    <h5 class="card-title">Barba Candado</h5>
                                    <p class="card-text">La barba circular, también conocida como candado, se resume
                                        principalmente en la banda de la barbilla y el bigote, que se unen formando un
                                        círculo.</p>
                                    <button class="btn btn-custom"
                                        onclick="window.location.href='editarServiciosADM.html'"
                                        data-service-id="corte7">Editar</button>
                                    <button class="btn btn-custom select-service"
                                        data-service-id="Barba Candado">Seleccione para eliminar</button>
                                </div>
                            </div>
                        </div>

                        <!-- Tercer servicio -->
                        <div class="card mb-4 w-75">
                            <div class="card-body d-flex">
                                <div class="service-image">
                                    <img src="../../../public/assets/img/barbabalbo.jpg" alt="Barba Balbo"
                                        class="img-fluid" style="max-width: 150px; margin-right: 15px;">
                                    <div class="switch-container">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="toggleActivo"
                                                onchange="toggleConfirmation(event)">
                                            <label class="form-check-label" for="toggleInactivo"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="service-details">
                                    <h5 class="card-title">Barba Balbo</h5>
                                    <p class="card-text">Al reunir un bigote de manillar, un parche de barbilla y una
                                        correa de barbilla, lo importante a tener en cuenta de la Balbo es que el bigote
                                        nunca debe tocar la barba.</p>
                                    <button class="btn btn-custom"
                                        onclick="window.location.href='editarServiciosADM.html'"
                                        data-service-id="corte7">Editar</button>
                                    <button class="btn btn-custom select-service"
                                        data-service-id="Barba Balbo">Seleccione para eliminar</button>
                                </div>
                            </div>
                        </div>

                        <!-- Nuevo servicio con imagen a la izquierda -->
                        <div class="card mb-4 w-75">
                            <div class="card-body d-flex">
                                <div class="service-image">
                                    <img src="../../../public/assets/img/signointerrogacion.jpg" alt="Otros"
                                        class="img-fluid" style="max-width: 150px; margin-right: 15px;">
                                </div>
                                <div class="service-details">
                                    <h5 class="card-title">Otros</h5>
                                    <p class="card-text"> Si no encontraste tu Barba preferida, escribelo aqui para
                                        agendar tu cita.</p>
                                    <!-- Barra de entrada de texto -->
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control"
                                            placeholder="Escribe el nombre de tu barba que Deseas"
                                            aria-label="Buscar corte">
                                    </div>
                                    <button class="btn btn-custom select-service" data-service-id="Otros">Seleccionar
                                        para eliminar</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>

                <section id="cejas" class="section">
                    <h2 class="section-title text-center">Cejas</h2>
                    <div class="d-flex flex-column align-items-center">

                        <!-- Primer servicio -->
                        <div class="card mb-4 w-75">
                            <div class="card-body d-flex">
                                <div class="service-image">
                                    <img src="../../../public/assets/img/cejasshaep.png" alt="Sharp angle"
                                        class="img-fluid" style="max-width: 150px; margin-right: 15px;">
                                    <div class="switch-container">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="toggleActivo"
                                                onchange="toggleConfirmation(event)">
                                            <label class="form-check-label" for="toggleInactivo"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="service-details">
                                    <h5 class="card-title">Sharp angle</h5>
                                    <p class="card-text">Son un tipo de cejas las cuales son rectas y termina en forma
                                        de pico hacia abajo.</p>
                                    <button class="btn btn-custom"
                                        onclick="window.location.href='editarServiciosADM.html'"
                                        data-service-id="corte7">Editar</button>
                                    <button class="btn btn-custom select-service"
                                        data-service-id="Sharp angle">Seleccione para eliminar</button>
                                </div>
                            </div>
                        </div>

                        <!-- Segundo servicio -->
                        <div class="card mb-4 w-75">
                            <div class="card-body d-flex">
                                <div class="service-image">
                                    <img src="../../../public/assets/img/cejaround.png" alt="Round" class="img-fluid"
                                        style="max-width: 150px; margin-right: 15px;">
                                    <div class="switch-container">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="toggleActivo"
                                                onchange="toggleConfirmation(event)">
                                            <label class="form-check-label" for="toggleInactivo"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="service-details">
                                    <h5 class="card-title">Round</h5>
                                    <p class="card-text">Son un tipo de cejas las cuales son redondeadas de principio a
                                        fin.</p>
                                    <button class="btn btn-custom"
                                        onclick="window.location.href='editarServiciosADM.html'"
                                        data-service-id="corte7">Editar</button>
                                    <button class="btn btn-custom select-service" data-service-id="Round">Seleccione
                                        para eliminar</button>
                                </div>
                            </div>
                        </div>

                        <!-- Tercer servicio -->
                        <div class="card mb-4 w-75">
                            <div class="card-body d-flex">
                                <div class="service-image">
                                    <img src="../../../public/assets/img/cejasflat.jpg" alt="Flat" class="img-fluid"
                                        style="max-width: 150px; margin-right: 15px;">
                                    <div class="switch-container">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="toggleActivo"
                                                onchange="toggleConfirmation(event)">
                                            <label class="form-check-label" for="toggleInactivo"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="service-details">
                                    <h5 class="card-title">Flat</h5>
                                    <p class="card-text">Son un tipo de cejas que son rectas y terminan en una pequeña
                                        curva.</p>
                                    <button class="btn btn-custom"
                                        onclick="window.location.href='editarServiciosADM.html'"
                                        data-service-id="corte7">Editar</button>
                                    <button class="btn btn-custom select-service" data-service-id="Flat">Seleccione para
                                        eliminar</button>
                                </div>
                            </div>
                        </div>

                        <!-- Nuevo servicio con imagen a la izquierda -->
                        <div class="card mb-4 w-75">
                            <div class="card-body d-flex">
                                <div class="service-image">
                                    <img src="../../../public/assets/img/signointerrogacion.jpg" alt="Otros"
                                        class="img-fluid" style="max-width: 150px; margin-right: 15px;">
                                </div>
                                <div class="service-details">
                                    <h5 class="card-title">Otros</h5>
                                    <p class="card-text"> Si no encontraste tus Cejas preferidas, escribelo aqui para
                                        agendar tu cita.</p>
                                    <!-- Barra de entrada de texto -->
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control"
                                            placeholder="Escribe el nombre de las cejas que Deseas"
                                            aria-label="Buscar corte">
                                    </div>
                                    <button class="btn btn-custom select-service" data-service-id="Otros">Seleccionar
                                        para eliminar</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>

                <section id="tintes" class="section">
                    <h2 class="section-title text-center">Tintes</h2>
                    <div class="d-flex flex-column align-items-center">

                        <!-- Primer servicio -->
                        <div class="card mb-4 w-75">
                            <div class="card-body d-flex">
                                <div class="service-image">
                                    <img src="../../../public/assets/img/tintemechas.jpg" alt="Tinte Mechas"
                                        class="img-fluid" style="max-width: 150px; margin-right: 15px;">
                                    <div class="switch-container">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="toggleActivo"
                                                onchange="toggleConfirmation(event)">
                                            <label class="form-check-label" for="toggleInactivo"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="service-details">
                                    <h5 class="card-title">Tinte Mechas</h5>
                                    <p class="card-text">Se seleccionan varias partes del cabello que son teñidas de un
                                        color diferente al resto de la melena y nos da la posibilidad.</p>
                                    <button class="btn btn-custom"
                                        onclick="window.location.href='editarServiciosADM.html'"
                                        data-service-id="corte7">Editar</button>
                                    <button class="btn btn-custom select-service"
                                        data-service-id="Tinte Mechas">Seleccione para eliminar</button>
                                </div>
                            </div>
                        </div>

                        <!-- Segundo servicio -->
                        <div class="card mb-4 w-75">
                            <div class="card-body d-flex">
                                <div class="service-image">
                                    <img src="../../../public/assets/img/tinteclasico.jpg" alt="Tinte Clasico"
                                        class="img-fluid" style="max-width: 150px; margin-right: 15px;">
                                    <div class="switch-container">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="toggleActivo"
                                                onchange="toggleConfirmation(event)">
                                            <label class="form-check-label" for="toggleInactivo"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="service-details">
                                    <h5 class="card-title">Tinte Clasico</h5>
                                    <p class="card-text">Tinte tradicional para cambiar tu color de pelo y lograr un
                                        acabado lo más natural posible.</p>
                                    <button class="btn btn-custom"
                                        onclick="window.location.href='editarServiciosADM.html'"
                                        data-service-id="corte7">Editar</button>
                                    <button class="btn btn-custom select-service"
                                        data-service-id="Tinte Clasico">Seleccione para eliminar</button>
                                </div>
                            </div>
                        </div>

                        <!-- Tercer servicio -->
                        <div class="card mb-4 w-75">
                            <div class="card-body d-flex">
                                <div class="service-image">
                                    <img src="../../../public/assets/img/tintebicolor.jpg" alt="Tinte bicolor"
                                        class="img-fluid" style="max-width: 150px; margin-right: 15px;">
                                    <div class="switch-container">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="toggleActivo"
                                                onchange="toggleConfirmation(event)">
                                            <label class="form-check-label" for="toggleInactivo"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="service-details">
                                    <h5 class="card-title">Tinte bicolor</h5>
                                    <p class="card-text">Dividiendo el pelo por la mitad o creando líneas en el cabello.
                                    </p>
                                    <button class="btn btn-custom"
                                        onclick="window.location.href='editarServiciosADM.html'"
                                        data-service-id="corte7">Editar</button>
                                    <button class="btn btn-custom select-service"
                                        data-service-id="Tinte bicolor">Seleccione para eliminar</button>
                                </div>
                            </div>
                        </div>

                        <!-- Nuevo servicio con imagen a la izquierda -->
                        <div class="card mb-4 w-75">
                            <div class="card-body d-flex">
                                <div class="service-image">
                                    <img src="../../../public/assets/img/signointerrogacion.jpg" alt="Otros"
                                        class="img-fluid" style="max-width: 150px; margin-right: 15px;">
                                </div>
                                <div class="service-details">
                                    <h5 class="card-title">Otros</h5>
                                    <p class="card-text"> Si no encontraste tu Tinte preferido, escribelo aqui para
                                        agendar tu cita.</p>
                                    <!-- Barra de entrada de texto -->
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control"
                                            placeholder="Escribe el nombre del Tinte que Deseas"
                                            aria-label="Buscar corte">
                                    </div>
                                    <button class="btn btn-custom select-service" data-service-id="otros">Seleccionar
                                        para eliminar</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>

                <section id="combos" class="section">
                    <h2 class="section-title text-center">Combos</h2>
                    <div class="d-flex flex-column align-items-center">

                        <!-- Primer servicio -->
                        <div class="card mb-4 w-75">
                            <div class="card-body d-flex">
                                <div class="service-image">
                                    <img src="../../../public/assets/img/combo01.png" alt="Combo 1" class="img-fluid"
                                        style="max-width: 150px; margin-right: 15px;">
                                    <div class="switch-container">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="toggleActivo"
                                                onchange="toggleConfirmation(event)">
                                            <label class="form-check-label" for="toggleInactivo"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="service-details">
                                    <h5 class="card-title">Combo 1</h5>
                                    <p class="card-text">Incluye " Corte 7 + Barba tipo candado + Cejas tipo Sharp angle
                                        + Tinte Clasico "</p>
                                    <button class="btn btn-custom"
                                        onclick="window.location.href='editarServiciosADM.html'"
                                        data-service-id="corte7">Editar</button>
                                    <button class="btn btn-custom select-service" data-service-id="Combo 1">Seleccione
                                        para eliminar</button>
                                </div>
                            </div>
                        </div>

                        <!-- Segundo servicio -->
                        <div class="card mb-4 w-75">
                            <div class="card-body d-flex">
                                <div class="service-image">
                                    <img src="../../../public/assets/img/combo01.png" alt="Combo 2<" class="img-fluid"
                                        style="max-width: 150px; margin-right: 15px;">
                                    <div class="switch-container">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="toggleActivo"
                                                onchange="toggleConfirmation(event)">
                                            <label class="form-check-label" for="toggleInactivo"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="service-details">
                                    <h5 class="card-title">Combo 2</h5>
                                    <p class="card-text">Incluye " Corte clasico + Barba tipo candado + Tinte Bicolor ".
                                    </p>
                                    <button class="btn btn-custom"
                                        onclick="window.location.href='editarServiciosADM.html'"
                                        data-service-id="corte7">Editar</button>
                                    <button class="btn btn-custom select-service" data-service-id="Combo 2">Seleccione
                                        para eliminar</button>
                                </div>
                            </div>
                        </div>

                        <!-- Tercer servicio -->
                        <div class="card mb-4 w-75">
                            <div class="card-body d-flex">
                                <div class="service-image">
                                    <img src="../../../public/assets/img/combo01.png" alt="Combo 3" class="img-fluid"
                                        style="max-width: 150px; margin-right: 15px;">
                                    <div class="switch-container">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="toggleActivo"
                                                onchange="toggleConfirmation(event)">
                                            <label class="form-check-label" for="toggleInactivo"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="service-details">
                                    <h5 class="card-title">Combo 3</h5>
                                    <p class="card-text">Incluye " Corte mullet + Tinte Mechas con pelo largo o corto "
                                    </p>
                                    <button class="btn btn-custom"
                                        onclick="window.location.href='editarServiciosADM.html'"
                                        data-service-id="corte7">Editar</button>
                                    <button class="btn btn-custom select-service" data-service-id="Combo 3">Seleccione
                                        para eliminar</button>
                                </div>
                            </div>
                        </div>

                        <!-- Nuevo servicio con imagen a la izquierda -->
                        <div class="card mb-4 w-75">
                            <div class="card-body d-flex">
                                <div class="service-image">
                                    <img src="../../../public/assets/img/signointerrogacion.jpg" alt="Otros"
                                        class="img-fluid" style="max-width: 150px; margin-right: 15px;">
                                </div>
                                <div class="service-details">
                                    <h5 class="card-title">Otros</h5>
                                    <p class="card-text"> Si no encontraste tu Combo preferido, escribelo aqui para
                                        agendar tu cita.</p>
                                    <!-- Barra de entrada de texto -->
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control"
                                            placeholder="Escribe el tipo de combo que Deseas" aria-label="Buscar corte">
                                    </div>
                                    <button class="btn btn-custom select-service" data-service-id="corte7">Seleccionar
                                        para eliminar</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
            </div>
        </div>
    </main>
  <div class="container">
    <div class="pedido-container">
            <?php foreach ($services as $index => $service): ?>
                <div class="pedido-box">
                    <div class="icon-usuario-container">
                        <img src="../../public/assets/img/logos/person-circle.svg" class="btn icon-usuario">
                    </div>
                    <h5><?= htmlspecialchars($service['name_service']) ?></h5>

   

                    <div class="icon-container">

                    <div class="card-actions">
                        <a href="<?= URL_CONTROLLER ?>/services/edit/<?= $service['id_services'] ?>" class="btn btn-icon" class="btn btn-edit">Editar </a>
                        
                        <a href="<?= URL_CONTROLLER ?>/services/delete/<?= $service['id_services'] ?>" class="btn btn-icon" class="btn btn-edit">eliminar </a>
                    </div>
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
    <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        </ul>
        <p class="text-center text-white"></p>
    </footer>
    <?php include_once FOLDER_VIEWS_JS . 'js.php'; ?>
</body>

</html>