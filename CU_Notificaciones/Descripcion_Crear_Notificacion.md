# **Nombre:** 
Crear una Notificación

# **Autor:**
Omar Sosa

# **Fecha:**
Indefinida

# **Descripción:**
Este caso de uso servirá para crear una notificación en el sistema, la cual puede ser enviada a los usuarios registrados, como alumnos, tutores, etc. La notificación puede contener información especifica dependiedo para lo que se requiera.

# **Actores:**
- Administrador
- Bot de notiificaciones
- Profesor

# **Precondiciones:**
Qué el usuario administrador, profesor o personal de la escuela tengan acceso y esten autentificados en el sistema, que el bot de notificaciones tenga acceso al sistema y permisos para crear notificaciones y ademas que los usuarios necesiten notificar algun aspecto relacionado con los demas casos de uso (Pago de colegiatura, Rendimiento, Acciones).

# **Flujo Normal:**
1. el Usuario con acceso y autentificacion al sistema ingresa al apartado de Notificaciones dentro de las demas secciones que lo requieran.
2. el usuario selecciona la opción de crear notificación.
3. el usuario ingresa los datos especificos dependiendo la seccion.
   - Titulo
   - Descripción
   - Fecha de envío
   - seleccion de los usuarios a los que se enviara la notificación (alumno, tutor, etc.)
   - Tipo de notificación (general, urgente, recordatorio, etc.)
4. el usuario confirma la creación de la notificación.
5. el sistema valida los datos ingresados y muestra una previsualizacion de la notificación.
6. si el usuario es el bot o una parte especifica del sistema, se crea la notificación con informacion especifica dispuesta dependiendo la accion que active el crear la notificacion.
7. el sistema guarda la notificación en la base de datos, dependiendo si el usuario quiere visualizar el historial de notificaciones o modificarla posteriormente.
8. el sistema queda en espera para enviar la notificacion.
 
# **Flujo Alternativo:**
- Si el usuario no tiene los permisos necesarios, el sistema muestra un mensaje de error y no permite la creación de la notificación.
- Si los datos ingresados son incorrectos o incompletos, el sistema muestra un mensaje de error y solicita al usuario que corrija la información antes de continuar.
- Si el usuario decide cancelar la creación de la notificación, el sistema descarta los datos ingresados y regresa al menú principal de notificaciones.

# **Postcondiciones:**
se crea una notificación en el sistema, la cual puede ser enviada a un tipo de usuarios registrados. la notificación puede contener información especifica dependiendo para lo que se requiera. y queda en espera de ser enviada en una fecha especifica o momento especifico.