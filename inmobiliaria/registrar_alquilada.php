<?php include "data.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registrar propiedad alquilada</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h2>Registrar Propiedad Alquilada</h2>
  <form method="POST">
    <label>SNR de la propiedad:</label>
    <input type="text" name="snr" required>
    <button type="submit">Registrar</button>
  </form>

  <?php
  if ($_POST) {
    $snr = $_POST['snr'];
    foreach ($_SESSION['propiedades'] as &$p) {
      if ($p['snr'] == $snr && $p['disponible']) {
        $p['disponible'] = false;
        array_push($_SESSION['pila_alquiladas'], $p);
        echo "<p>Propiedad {$p['direccion']} marcada como alquilada.</p>";
        break;
      }
    }
  }
  ?>

  <p><a href="index.php">Volver</a></p>
</div>
</body>
</html>
