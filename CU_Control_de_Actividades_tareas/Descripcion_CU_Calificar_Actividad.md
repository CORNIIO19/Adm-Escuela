### **Caso de Uso: Calificar Actividad**

**Nombre:** Calificar Actividad  
 **Autor:** Gustavo Ángel Aragón Aragón  
 **Fecha:** Miércoles 2 de julio de 2025

---

### **Descripción**

Este caso de uso describe cómo el profesor asigna calificaciones a una actividad previamente enviada por los alumnos. Una vez calificada, los resultados pueden ser consultados por alumnos y tutores.

---

### **Actor**

Profesor

---

### **Precondiciones**

* El profesor debe haber iniciado sesión con su cuenta.

* El profesor debe tener al menos un grupo asignado.

* Debe existir una o más actividades previamente creadas y enviadas por los alumnos.

* El sistema debe estar en funcionamiento y conectado a la base de datos.

---

###  **Flujo Normal**

1. El profesor accede al módulo de actividades del sistema.

2. El sistema verifica la identidad y permisos del usuario.

3. El profesor selecciona el grupo y la actividad a calificar.

4. El sistema muestra las entregas de los alumnos correspondientes a esa actividad.

5. El profesor revisa cada entrega y asigna una calificación.

6. El sistema registra las calificaciones en la base de datos.

7. Se muestra un mensaje de confirmación de calificación exitosa.

---

###  **Flujos Alternativos**

**– No hay entregas disponibles:**

* El sistema muestra: “No se han recibido entregas para esta actividad”.

* El proceso queda en espera o finaliza.

**– El profesor no tiene grupos asignados:**

* El sistema indica: “No tienes grupos asignados actualmente”.

* El proceso se detiene.

**– Error en conexión con la base de datos:**

* Se muestra el mensaje: “Error de conexión con la base de datos”.

* El proceso queda interrumpido hasta que se restablezca el servicio.

---

###  **Poscondiciones**

* Las calificaciones de la actividad quedan registradas y visibles para los alumnos y tutores.

* Se guarda una marca de tiempo de cuándo fue calificada cada entrega.

* El profesor puede modificar las calificaciones si el sistema lo permite.
