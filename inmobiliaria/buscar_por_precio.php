<?php include "data.php"; ?>
<h2>Buscar propiedades por precio</h2>
<form method="POST">
  Valor de alquiler: <input type="number" name="precio" required>
  <button type="submit">Buscar</button>
</form>

<?php
if ($_POST) {
  $valor = $_POST['precio'];
  echo "<h3>Propiedades con alquiler de $$valor:</h3><ul>";
  foreach ($_SESSION['propiedades'] as $p) {
    if ($p['precio'] == $valor)
      echo "<li>{$p['direccion']} ({$p['zona']})</li>";
  }
  echo "</ul>";
}
?>
<a href="index.php">Volver</a>
