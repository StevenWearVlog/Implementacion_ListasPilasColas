<?php
// registrar_alquiler.php
include "data.php";

function safe($v){ return htmlspecialchars((string)$v, ENT_QUOTES); }

// Obtener listas
$clientes = $_SESSION['clientes_arrendatarios'] ?? [];
$propiedades = $_SESSION['propiedades'] ?? [];
$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cliente_idx = isset($_POST['cliente']) ? intval($_POST['cliente']) : null;
    $prop_snr = $_POST['propiedad'] ?? null;
    $fecha = $_POST['fecha'] ?? date('Y-m-d');

    if ($cliente_idx === null || !isset($clientes[$cliente_idx])) {
        $mensaje = "Cliente no válido.";
    } elseif (!$prop_snr) {
        $mensaje = "Propiedad no seleccionada.";
    } else {
        // Buscamos la propiedad por snr
        $prop = null;
        foreach ($propiedades as $p) {
            if (isset($p['snr']) && $p['snr'] === $prop_snr) { $prop = $p; break; }
        }
        if (!$prop) {
            $mensaje = "Propiedad no encontrada.";
        } else {
            // Crear registro de alquiler (objeto simple como array)
            $registro = [
                'cliente' => $clientes[$cliente_idx],
                'propiedad' => $prop,
                'fecha_registro' => $fecha
            ];
            // Encolar (FIFO): push al final
            $_SESSION['cola_alquileres'][] = $registro;
            $mensaje = "Alquiler registrado en la cola para el cliente <b>" . safe($clientes[$cliente_idx]['nombres']) . "</b> y la propiedad <b>" . safe($prop['direccion']) . "</b> (SNR: " . safe($prop_snr) . ").";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>Registrar alquiler</title></head>
<body>
<h2>Registrar alquiler (cola FIFO)</h2>

<?php if ($mensaje): ?>
  <p><?= $mensaje ?></p>
<?php endif; ?>

<?php if (empty($clientes) || empty($propiedades)): ?>
  <p><strong>Atención:</strong> Debes tener al menos 1 cliente y 1 propiedad registrados para crear un alquiler.</p>
  <a href="index.php">Volver</a>
  <?php exit; ?>
<?php endif; ?>

<form method="POST">
  <label>Cliente:</label>
  <select name="cliente" required>
    <?php foreach ($clientes as $i => $c): ?>
      <option value="<?= $i ?>"><?= safe($c['nombres']) ?> — <?= safe($c['telefono'] ?? '') ?></option>
    <?php endforeach; ?>
  </select><br><br>

  <label>Propiedad (SNR - Dirección):</label>
  <select name="propiedad" required>
    <?php foreach ($propiedades as $p): 
        $label = (isset($p['snr']) ? $p['snr'] : 'N/A') . " — " . ($p['direccion'] ?? '');
    ?>
      <option value="<?= safe($p['snr'] ?? '') ?>"><?= safe($label) ?></option>
    <?php endforeach; ?>
  </select><br><br>

  <label>Fecha (yyyy-mm-dd):</label>
  <input type="date" name="fecha" value="<?= date('Y-m-d') ?>"><br><br>

  <button type="submit">Agregar a la cola</button>
</form>

<hr>
<h3>Cola actual de alquileres (primeros en procesar aparecen arriba)</h3>
<?php if (empty($_SESSION['cola_alquileres'])): ?>
  <p>No hay alquileres en cola.</p>
<?php else: ?>
  <ol>
    <?php foreach ($_SESSION['cola_alquileres'] as $r): ?>
      <li>
        Cliente: <?= safe($r['cliente']['nombres'] ?? 'N/A') ?> —
        Propiedad: <?= safe($r['propiedad']['direccion'] ?? 'N/A') ?> (SNR: <?= safe($r['propiedad']['snr'] ?? '') ?>) —
        Fecha: <?= safe($r['fecha_registro'] ?? '') ?>
      </li>
    <?php endforeach; ?>
  </ol>
<?php endif; ?>

<p><a href="index.php">Volver al menú</a></p>
</body>
</html>
