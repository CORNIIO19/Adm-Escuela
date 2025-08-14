<?php require_once __DIR__ . '/../header.php'; ?>
<h2>Crear Notificación</h2>
<?php if (!empty($mensaje)) echo '<p>' . htmlspecialchars($mensaje) . '</p>'; ?>
<form method="post">
    <label>Título: <input type="text" name="titulo" required></label><br><br>
    <label>Mensaje:<br>
        <textarea name="mensaje" rows="4" cols="50" required></textarea>
    </label><br><br>
    <label>Tipo:
        <select name="tipo">
            <option value="informativa">Informativa</option>
            <option value="alerta">Alerta</option>
            <option value="recordatorio">Recordatorio</option>
        </select>
    </label><br><br>
    <button type="submit">Crear</button>
</form>
<a href="?url=Notificaciones/index">Volver a notificaciones</a>
