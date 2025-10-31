<?php include "data.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registrar propiedad</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h2>Registrar Propiedad</h2>
  <form method="POST">
    <label>SNR:</label>
    <input type="text" name="snr" required>
    <label>Dirección:</label>
    <input type="text" name="direccion">
    <label>Teléfono:</label>
    <input type="text" name="telefono">
    <label>Barrio:</label>
    <input type="text" name="barrio">
    <label>Zona:</label>
    <input type="text" name="zona">
    <label>Precio alquiler:</label>
    <input type="number" name="precio">
    <label>Descripción:</label>
    <input type="text" name="descripcion">
    <button type="submit">Guardar</button>
  </form>

  <?php
  if ($_POST) {
    $_POST['disponible'] = true;
    $_SESSION['propiedades'][] = $_POST;
    echo "<p>Propiedad registrada correctamente.</p>";
  }
  ?>

  <p><a href="index.php">Volver</a></p>
</div>
</body>
</html>
