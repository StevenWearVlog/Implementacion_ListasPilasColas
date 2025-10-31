<?php include "data.php"; ?>
<h2>Registrar propiedad alquilada</h2>
<form method="POST">
  SNR de la propiedad: <input type="text" name="snr" required>
  <button type="submit">Registrar</button>
</form>

<?php
if ($_POST) {
  $snr = $_POST['snr'];
  foreach ($_SESSION['propiedades'] as &$p) {
    if ($p['snr'] == $snr && $p['disponible']) {
      $p['disponible'] = false;
      array_push($_SESSION['pila_alquiladas'], $p); // pila (LIFO)
      echo "<p>Propiedad {$p['direccion']} marcada como alquilada.</p>";
      break;
    }
  }
}
?>
<a href="index.php">Volver</a>