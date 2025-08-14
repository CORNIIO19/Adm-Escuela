<?php /* app/views/pagos/historial.php */ ?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Historial General de Pagos</title></head>
<body>
<h1>Historial General de Pagos</h1>

<form method="get">
  <input type="hidden" name="route" value="pagos/historial">
  <input type="text" name="alumno" placeholder="Alumno o matrícula" value="<?= htmlspecialchars($filtros['alumno'] ?? '') ?>">
  <select name="mes">
    <option value="">Mes</option>
    <?php $meses=['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
  foreach($meses as $m){$sel=(isset($filtros['mes'])&&$filtros['mes']===$m)?'selected':'';echo "<option $sel value='$m'>$m</option>";} ?>
  </select>
  <input type="number" name="anio" placeholder="Año" value="<?= htmlspecialchars($filtros['anio'] ?? '') ?>" min="2000" max="2100">
  <select name="estatus">
    <option value="">Estatus</option>
  <?php foreach (['pagado','pendiente','vencido'] as $e){$sel=(isset($filtros['estatus'])&&$filtros['estatus']===$e)?'selected':'';echo "<option value='$e' $sel>".ucfirst($e)."</option>";} ?>
  </select>
  <button type="submit">Filtrar</button>
</form>

<?php if (empty($pagos)): ?>
  <p><em>No se encontraron registros de pago disponibles.</em></p>
<?php else: ?>
<table border="1" cellpadding="6">
  <tr><th>ID</th><th>Matrícula</th><th>Alumno</th><th>Fecha</th><th>Mes</th><th>Año</th><th>Monto</th><th>Forma</th><th>Estatus</th></tr>
  <?php foreach ($pagos as $p): ?>
  <tr>
    <td><?= $p['id'] ?></td>
    <td><?= htmlspecialchars($p['matricula']) ?></td>
    <td><?= htmlspecialchars($p['nombre'].' '.$p['apellido']) ?></td>
    <td><?= htmlspecialchars($p['fecha_pago']) ?></td>
    <td><?= htmlspecialchars($p['mes_pagado']) ?></td>
    <td><?= htmlspecialchars($p['año']) ?></td>
    <td>$<?= number_format((float)$p['monto'],2) ?></td>
    <td><?= htmlspecialchars($p['forma_pago']) ?></td>
    <td><?= htmlspecialchars($p['estatus_pago']) ?></td>
  </tr>
  <?php endforeach; ?>
</table>
<?php endif; ?>

<p><a href="?route=pagos/registrar">Registrar pago</a></p>
</body>
</html>
