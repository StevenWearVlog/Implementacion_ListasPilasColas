<?php include "data.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registrar alquiler</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h2>Registrar Alquiler</h2>

  <form method="POST">
    <select name="arrendatario" required>
      <option value="">Seleccione arrendatario</option>
      <?php foreach ($_SESSION['arrendatarios'] as $a): ?>
        <option value="<?= $a['nombre'] ?>"><?= $a['nombre'] ?></option>
      <?php endforeach; ?>
    </select>

    <select name="propiedad" required>
      <option value="">Seleccione propiedad</option>
      <?php foreach ($_SESSION['propiedades'] as $p): ?>
        <?php if ($p['disponible'] === 'Sí'): ?>
          <option value="<?= $p['direccion'] ?>"><?= $p['direccion'] ?> (<?= $p['zona'] ?>)</option>
        <?php endif; ?>
      <?php endforeach; ?>
    </select>

    <input type="date" name="fecha_inicio" required>
    <input type="date" name="fecha_fin" required>
    <button type="submit">Registrar</button>
  </form>

  <?php
  if ($_POST) {
    $_SESSION['alquileres'][] = $_POST;
    echo "<p>Alquiler registrado correctamente 📝</p>";
  }
  ?>

  <p><a href="index.php">Volver</a></p>
</div>
</body>
</html>
