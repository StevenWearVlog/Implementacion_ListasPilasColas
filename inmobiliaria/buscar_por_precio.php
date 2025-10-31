<?php include "data.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Buscar por precio</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h2>Buscar Propiedades por Precio</h2>

  <form method="POST">
    <input type="number" name="precio" placeholder="Ingrese precio de alquiler" required>
    <button type="submit">Buscar</button>
  </form>

  <?php
  if ($_POST) {
    $valor = $_POST['precio'];
    echo "<h3>Propiedades con precio de $$valor:</h3><ul>";
    foreach ($_SESSION['propiedades'] as $p) {
      if ($p['precio'] == $valor) {
        echo "<li>{$p['direccion']} ({$p['zona']})</li>";
      }
    }
    echo "</ul>";
  }
  ?>

  <p><a href="index.php">Volver</a></p>
</div>
</body>
</html>
