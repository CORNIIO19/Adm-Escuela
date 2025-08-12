<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Cuenta</title>
    <link rel="stylesheet" href="css/style.css">
    <script>
    function mostrarCampos() {
        var tipo = document.getElementById('tipo').value;
        document.getElementById('campos-profesor').style.display = tipo === 'Profesor' ? 'block' : 'none';
        document.getElementById('campos-tutor').style.display = tipo === 'Tutor' ? 'block' : 'none';
        document.getElementById('campos-alumno').style.display = tipo === 'Alumno' ? 'block' : 'none';
    }
    </script>
</head>
<body onload="mostrarCampos()">
    <?php include 'header.php'; ?>
    <div class="login-container">
        <h2>Crear Cuenta</h2>
        <?php if(isset($mensaje)) echo '<p>'.$mensaje.'</p>'; ?>
    <form method="POST" action="?url=CrearCuenta/guardar">
            <input type="text" name="nombre" placeholder="Nombre" required>
            <input type="text" name="username" placeholder="Usuario" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <select name="tipo" id="tipo" onchange="mostrarCampos()" required>
                <option value="">Selecciona tipo de usuario</option>
                <option value="Administrador">Administrador</option>
                <option value="Control Escolar">Control Escolar</option>
                <option value="Profesor">Profesor</option>
                <option value="Tutor">Tutor</option>
                <option value="Alumno">Alumno</option>
            </select>
            <div id="campos-profesor" style="display:none;">
                <input type="text" name="info_extra[especialidad]" placeholder="Especialidad">
                <input type="text" name="info_extra[grado]" placeholder="Grado académico">
            </div>
            <div id="campos-tutor" style="display:none;">
                <input type="text" name="info_extra[telefono]" placeholder="Teléfono">
                <input type="email" name="info_extra[email]" placeholder="Email">
            </div>
            <div id="campos-alumno" style="display:none;">
                <input type="text" name="info_extra[matricula]" placeholder="Matrícula">
                <input type="text" name="info_extra[grupo]" placeholder="Grupo">
                <input type="text" name="info_extra[tutor_username]" placeholder="Usuario del Tutor (obligatorio)">
            </div>
            <button type="submit">Crear</button>
        </form>
    </div>
</body>
</html>
