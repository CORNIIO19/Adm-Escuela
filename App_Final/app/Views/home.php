<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="home-container">
        <h2>Bienvenido, <?php echo htmlspecialchars($user['nombre']); ?> (<?php echo htmlspecialchars($user['tipo']); ?>)</h2>
        <ul class="home-menu">

            <?php if($user['tipo'] === 'Administrador' || $user['tipo'] === 'Control Escolar'): ?>
                <li><a href="../Controllers/index.php">Ir a Index</a></li>
                <li><a href="?url=CrearCuenta">Crear Cuenta</a></li>
                <li><a href="?url=GestionUsuarios/index">Gestionar Usuarios</a></li>
                <li><a href="?url=Notificaciones/index">Notificaciones</a></li>
                <li><a href="?url=CrearGrupo/form">Crear Grupo</a></li>
                <li><a href="?url=AsignarAlumnosGrupo/form">Asignar Alumnos a Grupo</a></li>
                <li><a href="?url=AsignarProfesorGrupo/form">Asignar Profesor a Grupo</a></li>
            <?php elseif($user['tipo'] === 'Profesor'): ?>
                <li><a href="?url=CrearGrupo/form">Crear Grupo</a></li>
                <li><a href="?url=AsignarAlumnosGrupo/form">Asignar Alumnos a Grupo</a></li>
                <li><a href="?url=AsignarProfesorGrupo/form">Asignar Profesor a Grupo</a></li>
            <?php endif; ?>
            <li><a href="?url=HistorialPagos/index">Historial de Pagos</a></li>
            <li><a href="?url=RegistrarPago/form">Registrar Pago</a></li>
            <li><a href="?url=Auth/logout">Cerrar Sesión</a></li>
        </ul>
    </div>
</body>
</html>