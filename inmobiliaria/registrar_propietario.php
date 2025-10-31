<?php include "data.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registrar propietario</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h2>Registrar Propietario</h2>
  <form method="POST">
    <label>Nombre:</label>
    <input type="text" name="nombres" required>
    <label>Teléfono:</label>
    <input type="text" name="telefono">
    <label>Dirección:</label>
    <input type="text" name="direccion">
    <button type="submit">Guardar</button>
  </form>

  <?php
  if ($_POST) {
    $_SESSION['clientes_propietarios'][] = $_POST;
    echo "<p>Propietario <b>{$_POST['nombres']}</b> registrado.</p>";
  }
  ?>

  <p><a href="index.php">Volver</a></p>
</div>
</body>
</html>
