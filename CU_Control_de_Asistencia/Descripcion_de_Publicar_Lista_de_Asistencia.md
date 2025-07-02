### **Caso de Uso: Publicar Lista de Asistencia**

**Nombre:** Publicar Lista de Asistencia  
 **Autor:** Gustavo Ángel Aragón Aragón  
 **Fecha:** Miércoles 2 de julio de 2025

---

###  **Descripción**

Este caso de uso describe cómo el **profesor** publica la lista de asistencia correspondiente a su grupo. Una vez publicada, esta lista se vuelve accesible para los alumnos y tutores que consulten el historial de asistencias.

---

###  **Actor**

* **Profesor**

---

 **Precondiciones**

* El profesor debe haber iniciado sesión con su cuenta.

* El profesor debe tener un grupo asignado.

* Deben existir registros de asistencia para el grupo.

* El sistema debe estar funcionando correctamente y conectado a la base de datos.

---

### **Flujo Normal**

1. El profesor accede al módulo de control de asistencia desde el sistema.

2. El sistema verifica la identidad y permisos del usuario.

3. El profesor selecciona el grupo del que desea publicar la lista.

4. El sistema muestra una vista previa de la asistencia registrada.

5. El profesor confirma la publicación.

6. El sistema marca la lista como **publicada** y la hace visible para los alumnos y tutores.

7. Se muestra una notificación de éxito.

---

### **Flujos Alternativos**

**– No hay registros de asistencia:**

* El sistema muestra: “No hay asistencias registradas para este grupo”.

* El profesor deberá registrar primero la asistencia.

**– El profesor no tiene grupos asignados:**

* El sistema indica: “No tienes grupos asignados actualmente”.

* El proceso finaliza.

**– Error de conexión:**

* Se muestra el mensaje: “Error de conexión con la base de datos”.

* El proceso queda interrumpido hasta que se restablezca el servicio.

---

###  **Poscondiciones**

* La lista de asistencia del grupo queda publicada y visible para alumnos y tutores.

* Se guarda un registro de fecha y hora de la publicación.

* El profesor puede volver a actualizar o republicar si lo desea.
