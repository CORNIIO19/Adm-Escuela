<header>
    <nav>
        <ul>
            <li><a href="?url=Home">Inicio</a></li>
            <?php if(isset($user) && ($user['tipo'] === 'Administrador' || $user['tipo'] === 'Control Escolar')): ?>
                <li><a href="?url=CrearCuenta">Crear Cuenta</a></li>
            <?php endif; ?>
            <li><a href="?url=Home">Inicio</a></li>
    <?php if (isset($user) && in_array($user['tipo'], ['Administrador', 'Control Escolar', 'Profesor'])): ?>
        <li><a href="?url=../Controllers/index.php">Gestión Académica</a></li>
    <?php endif; ?>

            <li><a href="?url=HistorialPagos/index">Historial de Pagos</a></li>
            <li><a href="?url=RegistrarPago/form">Registrar Pago</a></li>
            <li><a href="?url=Auth/logout">Cerrar Sesión</a></li>
        </ul>
    </nav>
</header>
