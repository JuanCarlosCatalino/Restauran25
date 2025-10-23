<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurante - Login</title>
    <link rel="stylesheet" type="text/css" href="src/view/login/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="src/view/login/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="src/view/login/css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="src/view/login/css/iofrm-theme38.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
      <script>
            const base_url = '<?php echo BASE_URL; ?>';
            const base_url_server = '<?php echo BASE_URL_SERVER; ?>';
        </script>
</head>
<body>
    <div class="form-body">
        <div class="iofrm-layout">
            <div class="img-holder">
                <div class="bg bg-framed"></div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <div class="website-logo-inside logo-normal">
                            <a href="">
                                <div class="logo">
                                    <img class="logo-size" src="src/view/login/images/logo-light.svg" alt="">
                                </div>
                            </a>
                        </div>
                        <h3 class="font-md">Sistema de gestión integral de restaurantes.</h3>
                        <p>Acceso a la herramienta más poderosa de toda la industria del diseño y la web.</p>
                        <form id="frm_login">
                            <input class="form-control" type="text" name="dni" id="dni" placeholder="E-mail Address" required>
                            <input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
                            <div class="form-button d-flex">
                                <button id="submit" type="submit" class="btn btn-primary">Ingresar</button>
                                <a href="src/view/login/register32.php" class="btn btn-outline-primary">Crear cuenta</a>
                            </div>
                        </form>
                        <div class="other-links">
                            <span>O inicia sesión con</span><a href="#"><i class="fab fa-facebook-f"></i></a><a href="#"><i class="fab fa-google"></i></a><a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="src/view/login/js/jquery.min.js"></script>
<script src="src/view/login/js/bootstrap.bundle.min.js"></script>
<script src="src/view/login/js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script src="<?php echo BASE_URL; ?>src/view/js/sesion.js"></script>
</body>
</html>