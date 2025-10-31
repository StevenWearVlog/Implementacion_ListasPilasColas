<?php include "data.php"; ?>
<!DOCTYPE html>
<html>
<head><title>Registrar Arrendatario</title></head>
<body>
<h2>Registrar Cliente Arrendatario</h2>

<form method="POST">
  Nombre: <input type="text" name="nombres" required><br>
  Teléfono: <input type="text" name="telefono"><br>
  Dirección: <input type="text" name="direccion"><br>
  Profesión: <input type="text" name="profesion"><br>
  Lugar de trabajo: <input type="text" name="lugarTrabajo"><br>
  Descripción propiedad: <input type="text" name="descripcionPropiedad"><br>
  Salario: <input type="number" name="salario"><br>
  <button type="submit">Guardar</button>
</form>

<?php
if ($_POST) {
  $_SESSION['clientes_arrendatarios'][] = $_POST;
  echo "<p>Arrendatario <b>{$_POST['nombres']}</b> registrado correctamente.</p>";
}
?>
<a href="index.php">Volver</a>
</body>
</html>
