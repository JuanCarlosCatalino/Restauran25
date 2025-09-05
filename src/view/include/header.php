<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Restaurante</title>
 <link href="<?php echo BASE_URL ?>src/view/css/style.css" rel="stylesheet" type="text/css" />
     <script>
        const base_url = '<?php echo BASE_URL; ?>';
        const base_url_server = '<?php echo BASE_URL_SERVER; ?>';
        const session_session = '<?php echo $_SESSION['sesion_id']; ?>';
        const token_token = '<?php echo $_SESSION['sesion_token']; ?>';
    </script>
</head>
<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <h2>🍽 Limoncito</h2>
    <ul>
      <li><a href="#">🏠 Inicio</a></li>
      <li><a href="#">📋 Pedidos</a></li>
      <li><a href="#">🍴 Menú</a></li>
      <li><a href="#">👥 Clientes</a></li>
      <li><a href="#">👨‍🍳 Empleados</a></li>
      <li><a href="#">⚙️ Configuración</a></li>
    </ul>
  </div>