<?php include "data.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Buscar por zona</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h2>Buscar Propiedades por Zona</h2>

  <form method="POST">
    <input type="text" name="zona" placeholder="Ingrese zona" required>
    <button type="submit">Buscar</button>
  </form>

  <?php
  if ($_POST) {
    $zona = strtolower($_POST['zona']);
    echo "<h3>Propiedades en la zona '$zona':</h3><ul>";
    foreach ($_SESSION['propiedades'] as $p) {
      if (strtolower($p['zona']) == $zona)
        echo "<li>{$p['direccion']} - Precio: {$p['precio']}</li>";
    }
    echo "</ul>";
  }
  ?>

  <p><a href="index.php">Volver</a></p>
</div>
</body>
</html>
