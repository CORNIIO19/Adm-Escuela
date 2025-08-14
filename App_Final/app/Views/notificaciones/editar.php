<?php require_once __DIR__ . '/../header.php'; ?>
<h2>Editar Notificación</h2>
<?php if (!empty($mensaje)) echo '<p>' . htmlspecialchars($mensaje) . '</p>'; ?>
<form method="post">
    <label>Título: <input type="text" name="titulo" value="<?= htmlspecialchars($notificacion['titulo']) ?>" required></label><br><br>
    <label>Mensaje:<br>
        <textarea name="mensaje" rows="4" cols="50" required><?= htmlspecialchars($notificacion['mensaje']) ?></textarea>
    </label><br><br>
    <label>Tipo:
        <select name="tipo">
            <option value="informativa" <?= $notificacion['tipo']=='informativa'?'selected':'' ?>>Informativa</option>
            <option value="alerta" <?= $notificacion['tipo']=='alerta'?'selected':'' ?>>Alerta</option>
            <option value="recordatorio" <?= $notificacion['tipo']=='recordatorio'?'selected':'' ?>>Recordatorio</option>
        </select>
    </label><br><br>
    <button type="submit">Guardar cambios</button>
</form>
<a href="?url=Notificaciones/index">Volver a notificaciones</a>
