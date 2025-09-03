<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #b71c1c, #e53935);
    }

    .login-container {
      background: #fff;
      padding: 50px 40px;
      border-radius: 15px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.25);
      text-align: center;
      width: 380px;
    }

    .login-container h1 {
      font-size: 2rem;
      margin-bottom: 10px;
      color: #b71c1c;
    }

    .login-container h4 {
      font-size: 1.1rem;
      margin-bottom: 20px;
      color: #444;
    }

    .login-container img {
      margin: 10px 0 20px;
      border-radius: 8px;
    }

    .login-container input {
      width: 100%;
      padding: 14px;
      margin: 12px 0;
      border: 1px solid #ccc;
      border-radius: 8px;
      outline: none;
      font-size: 1rem;
      transition: border 0.3s ease;
    }

    .login-container input:focus {
      border-color: #e53935;
    }

    .login-container button {
      width: 100%;
      padding: 14px;
      margin-top: 20px;
      background: #e53935;
      border: none;
      border-radius: 8px;
      color: #fff;
      font-size: 1.1rem;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .login-container button:hover {
      background: #b71c1c;
    }

    .login-container a {
      display: block;
      margin-top: 20px;
      color: #e53935;
      text-decoration: none;
      font-size: 0.95rem;
    }

    .login-container a:hover {
      text-decoration: underline;
    }
  </style>
  <!-- Sweet Alerts css -->
  <link href="<?php echo BASE_URL ?>src/view/pp/plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
  <script>
    const base_url = '<?php echo BASE_URL; ?>';
    const base_url_server = '<?php echo BASE_URL_SERVER; ?>';
  </script>
</head>

<body>
  <div class="login-container">
    <h1>Bienvenido</h1>
    <img src="https://www.creativefabrica.com/wp-content/uploads/2019/08/Restaurant-Logo-by-Koko-Store-580x386.jpg" alt="" width="85%">
    <h4>Sistema de Restaurantes</h4>
    <form id="frm_login">
      <input type="text" name="dni" id="dni" placeholder="Usuario o DNI" required>
      <input type="password" name="password" id="password" placeholder="Contraseña" required>
      <button type="submit">Ingresar</button>
    </form>
    <a href="#">¿Olvidaste tu contraseña?</a>
  </div>
</body>
<script src="<?php echo BASE_URL; ?>src/view/js/sesion.js"></script>
<!-- Sweet Alerts Js-->
<script src="<?php echo BASE_URL ?>src/view/pp/plugins/sweetalert2/sweetalert2.min.js"></script>

</html>


