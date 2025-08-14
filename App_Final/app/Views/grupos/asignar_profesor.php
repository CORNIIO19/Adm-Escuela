<?php
require_once __DIR__ . '/../header.php';
?>

<h2>Asignar Profesor a Grupo</h2>
<?php if (isset($mensaje)) { echo '<p>' . htmlspecialchars($mensaje) . '</p>'; } ?>
<form method="post" action="?url=AsignarProfesorGrupo/asignar">
    <label>Grupo:
        <select name="grupo_id" required>
            <option value="">Seleccione un grupo</option>
            <?php foreach ($grupos as $grupo): ?>
                <option value="<?= $grupo['id'] ?>"><?= htmlspecialchars($grupo['nombre']) ?> (<?= htmlspecialchars($grupo['turno']) ?>)</option>
            <?php endforeach; ?>
        </select>
    </label><br><br>
    <label>Profesor disponible:</label><br>
    <select name="profesor_id" required>
        <option value="">Seleccione un profesor</option>
        <?php foreach ($profesores as $profesor): ?>
            <option value="<?= $profesor['id'] ?>"><?= htmlspecialchars($profesor['nombre']) ?> <?= htmlspecialchars($profesor['apellido']) ?></option>
        <?php endforeach; ?>
    </select><br><br>
    <button type="submit">Asignar</button>
</form>
<a href="/Prueba2_fixed/public/?url=Home">Volver al inicio</a>
