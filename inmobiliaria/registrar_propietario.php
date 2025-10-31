<?php include "data.php"; ?>
<h2>Registrar Propietario</h2>
<form method="POST">
  Nombre: <input type="text" name="nombres" required><br>
  Teléfono: <input type="text" name="telefono"><br>
  Dirección: <input type="text" name="direccion"><br>
  <button type="submit">Guardar</button>
</form>

<?php
if ($_POST) {
  $_SESSION['clientes_propietarios'][] = $_POST;
  echo "<p>Propietario <b>{$_POST['nombres']}</b> registrado.</p>";
}
?>
<a href="index.php">Volver</a>
