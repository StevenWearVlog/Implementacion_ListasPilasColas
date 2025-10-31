<?php include "data.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registrar alquiler</title>
  <link rel="stylesheet" href="style.css">
  <style>
    select, select option {
      color: #222;
      background-color: #fff;
    }
    select:focus, select:hover, option:hover {
      color: #000;
      background-color: #f0f0f0;
    }
  </style>
</head>
<body>
<div class="container">
  <h2>Registrar Alquiler</h2>


  <?php print_r($_SESSION); ?>

  <form method="POST">
    
    <select name="arrendatario" required>
      <option value="">Seleccione arrendatario</option>
      <?php foreach ($_SESSION['clientes_arrendatarios'] as $a): ?>
        <option value="<?= htmlspecialchars($a['nombres']) ?>">
          <?= htmlspecialchars($a['nombres']) ?>
        </option>
      <?php endforeach; ?>
    </select>

    
    <select name="propiedad" required>
      <option value="">Seleccione propiedad</option>
      <?php foreach ($_SESSION['propiedades'] as $p): ?>
        <?php if (!isset($p['disponible']) || $p['disponible'] === true || $p['disponible'] === 'Sí'): ?>
          <option value="<?= htmlspecialchars($p['direccion']) ?>">
            <?= htmlspecialchars($p['direccion']) ?> (<?= htmlspecialchars($p['zona']) ?>)
          </option>
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

  
    foreach ($_SESSION['propiedades'] as &$prop) {
      if ($prop['direccion'] === $_POST['propiedad']) {
        $prop['disponible'] = false;
      }
    }

    echo "<p>Alquiler registrado correctamente 📝</p>";
  }
  ?>

  <p><a href="index.php">Volver</a></p>
</div>
</body>
</html>
