<?php
require_once __DIR__ . '/../header.php';
?>

<h2>Asignar Alumnos a Grupo</h2>
<?php if (isset($mensaje)) { echo '<p>' . htmlspecialchars($mensaje) . '</p>'; } ?>
<form method="post" action="?url=AsignarAlumnosGrupo/asignar">
    <label>Grupo:
        <select name="grupo_id" required>
            <option value="">Seleccione un grupo</option>
            <?php foreach ($grupos as $grupo): ?>
                <option value="<?= $grupo['id'] ?>"><?= htmlspecialchars($grupo['nombre']) ?> (<?= htmlspecialchars($grupo['turno']) ?>, cupo: <?= $grupo['cupo_disponible'] ?>)</option>
            <?php endforeach; ?>
        </select>
    </label><br><br>
    <label>Alumnos disponibles:</label><br>
    <?php if (count($alumnos) > 0): ?>
        <?php foreach ($alumnos as $alumno): ?>
            <input type="checkbox" name="alumnos[]" value="<?= $alumno['id'] ?>"> <?= htmlspecialchars($alumno['nombre']) ?> <?= htmlspecialchars($alumno['apellido']) ?><br>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No hay alumnos disponibles para asignar.</p>
    <?php endif; ?>
    <br>
    <button type="submit">Asignar</button>
</form>
<a href="/Prueba2_fixed/public/?url=Home">Volver al inicio</a>
