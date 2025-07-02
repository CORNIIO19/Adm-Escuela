# **Nombre:** 
Modificar una notificacion creada en el sistema

# **Autor:**
Omar Sosa

# **Fecha:**
Indefinida

# **Descripción:**
Este caso de uso servirá cuando el usuario necesite modificar una notificacion creada por si mismo , ya sea para corregir algun error o actualizar la informacion de la notificacion. Este caso de uso no permite eliminar una notificacion, solo actualizarla.

# **Actores:**
- Administrador
- Bot de notiificaciones
- Profesor

# **Precondiciones:**
Qué el usuario administrador, profesor o personal de la escuela tengan acceso y esten autentificados en el sistema, que exista una notificacion creada por el usuario que se desea modificar (unicamente que tenga relacion con el usuario que la creo).

# **Flujo Normal:**
1. El usuario con acceso y autentificacion al sistema ingresa al apartado de Notificaciones dentro de las demas secciones que lo requieran.
2. El usuario selecciona la notificacion que desea modificar de la lista de notificaciones creadas por el usuario.
3. El usuario selecciona la opción de modificar notificación.
4. Se muestra al usuario la informacion de la notificacion que se desea modificar.
5. Mediante un boton se podra seleccionar la informacion que se desea modificar para despues se le muestre una entrada en la que podra modificar la informacion, por ejemplo: 
   - Titulo
   - Descripción
   - Fecha de envío
   - Selección de los usuarios a los que se enviara la notificación (alumno, tutor, etc.)
   - Tipo de notificación (general, urgente, recordatorio, etc.)
6. El usuario modifica la informacion que se desea cambiar, y confirma la modificación de la información.
7. El sistema valida los datos ingresados y muestra una previsualizacion de la notificación
8. el sistema guarda la notificacion modificada
# **Flujo Alternativo:**
- Si el usuario no tiene los permisos necesarios, el sistema muestra un mensaje de error y no permite la modificación de la notificación.
- Si los datos ingresados son incorrectos o incompletos, el sistema muestra un mensaje de error y solicita al usuario que corrija la información antes de continuar y limpia los datos modificados.
- si la notifiacion no existe o no fue creada por el usuario, el sistema muestra un mensaje de error y no permite la modificacion de la notificacion.
- Si el usuario decide cancelar la modificación de la notificación, el sistema descarta los datos ingresados y regresa al menú principal de notificaciones.
- Si el usuario intenta modificar un campo que no es editable, el sistema muestra un mensaje de error y no permite la modificación de ese campo.

# **Postcondiciones:**
la notificacion se modifica en el sistema y se actualiza la informacion de la notificacion en la base de datos. y queda en espera de ser enviada en una fecha especifica o momento especifico.