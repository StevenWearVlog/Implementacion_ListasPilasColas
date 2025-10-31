<?php
// modificar_cliente.php
include "data.php";

function safe($v){ return htmlspecialchars((string)$v, ENT_QUOTES); }

$clientes = &$_SESSION['clientes_arrendatarios']; // referencia para modificar directamente
$mensaje = '';

if (!isset($clientes) || count($clientes) === 0) {
    // No hay clientes
    $mensaje = "No hay clientes arrendatarios registrados.";
}

// Si se envió el formulario de actualización
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion']) && $_POST['accion'] === 'actualizar') {
    $idx = isset($_POST['idx']) ? intval($_POST['idx']) : null;
    if ($idx === null || !isset($clientes[$idx])) {
        $mensaje = "Cliente no válido.";
    } else {
        // Campos permitidos a actualizar
        $campos = ['nombres','telefono','direccion','profesion','lugarTrabajo','descripcionPropiedad','salario'];
        foreach ($campos as $f) {
            if (isset($_POST[$f])) $clientes[$idx][$f] = $_POST[$f];
        }
        $mensaje = "Cliente actualizado correctamente.";
    }
}

// Si se seleccionó un cliente para editar (GET)
$editar_idx = isset($_GET['editar']) ? intval($_GET['editar']) : null;
$cliente_actual = null;
if ($editar_idx !== null && isset($clientes[$editar_idx])) {
    $cliente_actual = $clientes[$editar_idx];
}
?>
<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>Modificar cliente</title></head>
<body>
<h2>Modificar / Actualizar cliente arrendatario</h2>

<?php if ($mensaje): ?><p><?= $mensaje ?></p><?php endif; ?>

<?php if (empty($clientes)): ?>
  <p>No hay clientes para modificar. <a href="index.php">Volver</a></p>
  <?php exit; ?>
<?php endif; ?>

<!-- Lista de clientes con enlace para editar -->
<h3>Selecciona un cliente</h3>
<ul>
  <?php foreach ($clientes as $i => $c): ?>
    <li>
      <?= safe($c['nombres'] ?? 'N/A') ?> —
      <?= safe($c['telefono'] ?? '') ?> —
      <a href="?editar=<?= $i ?>">Editar</a>
    </li>
  <?php endforeach; ?>
</ul>

<?php if ($cliente_actual !== null): ?>
  <hr>
  <h3>Editar cliente: <?= safe($cliente_actual['nombres'] ?? '') ?></h3>
  <form method="POST">
    <input type="hidden" name="accion" value="actualizar">
    <input type="hidden" name="idx" value="<?= $editar_idx ?>">
    Nombre: <input type="text" name="nombres" value="<?= safe($cliente_actual['nombres'] ?? '') ?>" required><br>
    Teléfono: <input type="text" name="telefono" value="<?= safe($cliente_actual['telefono'] ?? '') ?>"><br>
    Dirección: <input type="text" name="direccion" value="<?= safe($cliente_actual['direccion'] ?? '') ?>"><br>
    Profesión: <input type="text" name="profesion" value="<?= safe($cliente_actual['profesion'] ?? '') ?>"><br>
    Lugar de trabajo: <input type="text" name="lugarTrabajo" value="<?= safe($cliente_actual['lugarTrabajo'] ?? '') ?>"><br>
    Descripción propiedad: <input type="text" name="descripcionPropiedad" value="<?= safe($cliente_actual['descripcionPropiedad'] ?? '') ?>"><br>
    Salario: <input type="number" name="salario" value="<?= safe($cliente_actual['salario'] ?? '') ?>"><br><br>
    <button type="submit">Actualizar cliente</button>
  </form>
<?php endif; ?>

<p><a href="index.php">Volver al menú</a></p>
</body>
</html>
