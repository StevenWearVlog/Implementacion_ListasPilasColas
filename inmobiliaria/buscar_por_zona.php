<?php include "data.php"; ?>
<h2>Buscar propiedades por zona y presupuesto</h2>
<form method="POST">
  Zona: <input type="text" name="zona" required><br>
  Presupuesto máximo: <input type="number" name="max" required><br>
  <button type="submit">Buscar</button>
</form>

<?php
if ($_POST) {
  $zona = $_POST['zona']; $max = $_POST['max'];
  echo "<h3>Propiedades en zona $zona con precio <= $max:</h3><ul>";
  foreach ($_SESSION['propiedades'] as $p) {
    if ($p['zona'] == $zona && $p['precio'] <= $max && $p['disponible'])
      echo "<li>{$p['direccion']} - \${$p['precio']}</li>";
  }
  echo "</ul>";
}
?>
<a href="index.php">Volver</a>

