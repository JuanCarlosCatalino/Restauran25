<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Visual - Restaurante</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.23.0/sweetalert2.min.css">
     <script>
        const base_url = '<?php echo BASE_URL; ?>';
        const base_url_server = '<?php echo BASE_URL_SERVER; ?>';
        const session_session = '<?php echo $_SESSION['sesion_id']; ?>';
        const token_token = '<?php echo $_SESSION['sesion_token']; ?>';
    </script>
</head>
<body class="bg-light">

   
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
           
            <a class="navbar-brand fw-bold" href="#">
                <i class="bi bi-egg-fried"></i>
                Restaurantes
            </a>
           
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

        <section class="container-fluid">
        <div class="row" style="padding-top: 56px;"> <!-- Padding para la barra de navegación fija -->
            <!-- Barra Lateral de Navegación -->
            <div class="col-lg-2 bg-white vh-100 border-end d-none d-lg-block">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active text-dark" aria-current="page" href="<?php echo BASE_URL;?>">
                                <i class="bi bi-speedometer2 me-2"></i> Resumen
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="<?php echo BASE_URL;?>restaurantes">
                                <i class="bi bi-shop me-2"></i> Restaurantes
                            </a>
                        </li>
<!--                        <li class="nav-item">
                            <a class="nav-link text-dark" href="<?php echo BASE_URL;?>token">
                                <i class="bi bi-key me-2"></i> Tokens
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="<?php echo BASE_URL;?>clientes">
                                <i class="bi bi-people me-2"></i> Clientes API
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

    
    