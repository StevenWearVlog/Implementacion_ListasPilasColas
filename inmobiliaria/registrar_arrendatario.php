<?php include "data.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registrar arrendatario</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h2>Registrar Cliente Arrendatario</h2>

  <form method="POST">
    <label>Nombre:</label>
    <input type="text" name="nombres" required>
    <label>Teléfono:</label>
    <input type="text" name="telefono">
    <label>Dirección:</label>
    <input type="text" name="direccion">
    <label>Profesión:</label>
    <input type="text" name="profesion">
    <label>Lugar de trabajo:</label>
    <input type="text" name="lugarTrabajo">
    <label>Descripción propiedad:</label>
    <input type="text" name="descripcionPropiedad">
    <label>Salario:</label>
    <input type="number" name="salario">
    <button type="submit">Guardar</button>
  </form>

  <?php
  if ($_POST) {
    $_SESSION['clientes_arrendatarios'][] = $_POST;
    echo "<p>Arrendatario <b>{$_POST['nombres']}</b> registrado correctamente.</p>";
  }
  ?>

  <p><a href="index.php">Volver</a></p>
</div>
</body>
</html>
