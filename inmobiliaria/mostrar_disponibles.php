<?php include "data.php"; ?>
<h2>Propiedades disponibles</h2>
<ul>
<?php
foreach ($_SESSION['propiedades'] as $p) {
  if ($p['disponible'])
    echo "<li>{$p['direccion']} ({$p['zona']}) - \${$p['precio']}</li>";
}
?>
</ul>
<a href="index.php">Volver</a>
