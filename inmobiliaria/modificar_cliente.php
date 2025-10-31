<?php include "data.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Modificar cliente</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h2>Modificar Cliente Arrendatario</h2>

  <form method="POST">
    <label>Documento del cliente a modificar:</label>
    <input type="text" name="documento" placeholder="Documento" required>

    <label>Nuevo nombre (opcional):</label>
    <input type="text" name="nuevo_nombre" placeholder="Nuevo nombre">

    <label>Nuevo teléfono (opcional):</label>
    <input type="text" name="nuevo_telefono" placeholder="Nuevo teléfono">

    <button type="submit">Modificar</button>
  </form>

  <?php
  if ($_POST) {
    $doc = $_POST['documento'];
    $encontrado = false;

    foreach ($_SESSION['clientes_arrendatarios'] as &$a) {
      if ($a['documento'] == $doc) {
        if (!empty($_POST['nuevo_nombre'])) $a['nombres'] = $_POST['nuevo_nombre'];
        if (!empty($_POST['nuevo_telefono'])) $a['telefono'] = $_POST['nuevo_telefono'];
        $encontrado = true;
        break;
      }
    }

    if ($encontrado)
      echo "<p>Cliente modificado correctamente.</p>";
    else
      echo "<p>No se encontró ningún cliente con ese documento.</p>";
  }
  ?>

  <p><a href="index.php">Volver</a></p>
</div>
</body>
</html>
