# **Caso de Uso: Crear Actividad para el Grupo**

**Nombre:** Crear Actividad para el Grupo  
 **Autor:** Gustavo Ángel Aragón Aragón  
 **Fecha:** Miércoles 2 de julio de 2025

---

### **Descripción**

Este caso de uso describe cómo el profesor crea y publica una nueva actividad para un grupo específico. La actividad quedará disponible para que los alumnos puedan consultarla, realizarla y enviarla para su posterior evaluación.

---

### **Actor**

* Profesor

---

###  **Precondiciones**

* El profesor debe haber iniciado sesión con su cuenta.

* El profesor debe tener al menos un grupo asignado.

* El sistema debe estar en funcionamiento y conectado a la base de datos.

* Debe existir un grupo válido para asignar la actividad.

---

### **Flujo Normal**

1. El profesor accede al módulo de actividades del sistema.

2. El sistema verifica la identidad y permisos del usuario.

3. El profesor selecciona el grupo al que desea asignar la actividad.

4. El profesor ingresa los datos de la nueva actividad:

   * Título de la actividad

   * Descripción

   * Fecha de entrega

   * Ponderación o valor de la calificación

   * Instrucciones adicionales (opcional)

5. El sistema valida los datos ingresados (e.g., que la fecha de entrega sea válida).

6. El profesor confirma la creación de la actividad.

7. El sistema registra la actividad en la base de datos y la asocia al grupo seleccionado.

8. El sistema muestra un mensaje de confirmación de actividad creada exitosamente.

9. La actividad queda visible para los alumnos del grupo en el sistema.

---

### **Flujos Alternativos**

* **Datos incompletos o inválidos:**  
   El sistema muestra un mensaje indicando los errores de validación y permite que el profesor corrija la información antes de continuar.

* **El profesor no tiene grupos asignados:**  
   El sistema indica: “No tienes grupos asignados actualmente”.  
   El proceso se detiene.

* **Error en conexión con la base de datos:**  
   Se muestra el mensaje: “Error de conexión con la base de datos”.  
   El proceso queda interrumpido hasta que se restablezca el servicio.

---

###  **Poscondiciones**

* La actividad queda registrada y vinculada al grupo seleccionado.

* La actividad está disponible para consulta y envío por parte de los alumnos.

* Se registra la fecha y hora de creación de la actividad.

* El profesor puede editar o eliminar la actividad si el sistema lo permite.
