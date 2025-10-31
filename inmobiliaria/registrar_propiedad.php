<?php include "data.php"; ?>
<h2>Registrar Propiedad</h2>
<form method="POST">
  SNR: <input type="text" name="snr" required><br>
  Dirección: <input type="text" name="direccion"><br>
  Teléfono: <input type="text" name="telefono"><br>
  Barrio: <input type="text" name="barrio"><br>
  Zona: <input type="text" name="zona"><br>
  Precio alquiler: <input type="number" name="precio"><br>
  Descripción: <input type="text" name="descripcion"><br>
  <button type="submit">Guardar</button>
</form>

<?php
if ($_POST) {
  $_POST['disponible'] = true;
  $_SESSION['propiedades'][] = $_POST;
  echo "<p>Propiedad registrada correctamente.</p>";
}
?>
<a href="index.php">Volver</a>
