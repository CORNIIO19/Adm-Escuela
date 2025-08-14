<?php require_once __DIR__ . '/../header.php'; ?>
<h2>Notificaciones</h2>
<a href="?url=Notificaciones/crear">Crear nueva notificación</a>
<table border="1" cellpadding="5">
    <tr>
        <th>Título</th>
        <th>Mensaje</th>
        <th>Tipo</th>
        <th>Fecha</th>
        <th>Creador</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($notificaciones as $notificacion): ?>
    <tr>
        <td><?= htmlspecialchars($notificacion['titulo']) ?></td>
        <td><?= htmlspecialchars($notificacion['mensaje']) ?></td>
        <td><?= htmlspecialchars($notificacion['tipo']) ?></td>
        <td><?= htmlspecialchars($notificacion['fecha_creacion']) ?></td>
        <td><?= htmlspecialchars($notificacion['creador']) ?></td>
        <td>
            <a href="?url=Notificaciones/editar&id=<?= $notificacion['id'] ?>">Editar</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
