<?php include "data.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Propiedades disponibles</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h2>Propiedades disponibles</h2>
  <ul>
    <?php
    foreach ($_SESSION['propiedades'] as $p) {
      if ($p['disponible'])
        echo "<li>{$p['direccion']} ({$p['zona']}) - \${$p['precio']}</li>";
    }
    ?>
  </ul>
  <p><a href="index.php">Volver</a></p>
</div>
</body>
</html>
