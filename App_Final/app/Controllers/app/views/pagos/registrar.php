<?php /* app/views/pagos/registrar.php */ ?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Registrar Pago</title></head>
<body>
<h1>Registrar Pago Mensual</h1>

<?php if (!empty($mensaje)): ?>
  <p><strong><?= htmlspecialchars($mensaje) ?></strong></p>
<?php elseif (!empty($_GET['msg'])): ?>
  <p><strong><?= htmlspecialchars($_GET['msg']) ?></strong></p>
<?php endif; ?>

<form method="post" action="?url=RegistrarPago/store">
  <label>Alumno:</label>
  <select name="alumno_id" required>
    <option value="">Seleccione</option>
    <?php foreach ($alumnos as $a): ?>
      <option value="<?= $a['id'] ?>"><?= htmlspecialchars($a['matricula'].' - '.$a['nombre'].' '.$a['apellido']) ?></option>
    <?php endforeach; ?>
  </select><br><br>

  <label>Fecha de Pago:</label> <input type="date" name="fecha_pago" value="<?= date('Y-m-d') ?>" required><br><br>
  <label>Mes Pagado:</label>
  <select name="mes_pagado" required>
    <?php $meses=['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
  foreach($meses as $m){ echo "<option value='$m'>$m</option>"; } ?>
  </select><br><br>
  <label>Año:</label> <input type="number" name="anio" value="<?= date('Y') ?>" min="2000" max="2100" required><br><br>
  <label>Monto:</label> <input type="number" step="0.01" name="monto" required><br><br>
  <label>Forma de Pago:</label>
  <select name="forma_pago" required>
    <option value="efectivo">Efectivo</option>
    <option value="transferencia">Transferencia</option>
  </select><br><br>

  <button type="submit">Registrar</button>
</form>

<p><a href="?route=pagos/historial">Ver historial</a></p>
</body>
</html>
