<header>
    <nav>
        <ul>
            <li><a href="?url=Home">Inicio</a></li>
            <?php if(isset($user) && ($user['tipo'] === 'Administrador' || $user['tipo'] === 'Control Escolar' || $user['tipo'] === 'Profesor')): ?>
                <?php if($user['tipo'] === 'Administrador' || $user['tipo'] === 'Control Escolar'): ?>
                    <li><a href="?url=CrearCuenta">Crear Cuenta</a></li>
                    <li><a href="?url=GestionUsuarios/index">Gestionar Usuarios</a></li>
                <?php endif; ?>
                <li><a href="?url=CrearGrupo/form">Crear Grupo</a></li>
                <li><a href="?url=AsignarAlumnosGrupo/form">Asignar Alumnos a Grupo</a></li>
                <li><a href="?url=AsignarProfesorGrupo/form">Asignar Profesor a Grupo</a></li>
            <?php endif; ?>
            <li><a href="?url=HistorialPagos/index">Historial de Pagos</a></li>
            <li><a href="?url=RegistrarPago/form">Registrar Pago</a></li>
            <li><a href="?url=Auth/logout">Cerrar Sesión</a></li>
        </ul>
    </nav>
</header>
