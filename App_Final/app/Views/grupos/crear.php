<?php
require_once __DIR__ . '/../header.php';
?>

<h2>Crear Nuevo Grupo</h2>
<?php if (isset($mensaje)) { echo '<p>' . htmlspecialchars($mensaje) . '</p>'; } ?>
<form method="post" action="">
    <label>Nombre del grupo: <input type="text" name="nombre" required></label><br>
    <label>Turno:
        <select name="turno" required>
            <option value="matutino">Matutino</option>
            <option value="vespertino">Vespertino</option>
        </select>
    </label><br>
    <label>Cupo: <input type="number" name="cupo" min="1" required></label><br>
    <label>Estatus:
        <select name="estatus">
            <option value="activo">Activo</option>
            <option value="inactivo">Inactivo</option>
        </select>
    </label><br>
    <button type="submit">Crear Grupo</button>
</form>
<a href="/Prueba2_fixed/public/?url=Home">Volver al inicio</a>
