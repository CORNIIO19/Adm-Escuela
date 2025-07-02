# **Caso de Uso: Ver Asistencia**

**Nombre:** Ver Asistencia  
 **Autor:** Gustavo Angel Aragon Aragon  
 **Fecha:** Miércoles 2 de julio de 2025

---

### **Descripción**

Este caso de uso describe el proceso mediante el cual los usuarios autorizados (profesor, tutor o alumno) pueden consultar el historial de asistencia registrado en el sistema para un grupo o estudiante específico.

---

### **Actores**

* Alumno

* Profesor

* Tutor

---

### **Precondiciones**

* El usuario debe haber iniciado sesión con un rol válido (profesor, tutor o alumno).

* Debe existir un grupo asignado al alumno o al profesor.

* Deben existir registros de asistencia previos en la base de datos.

* El sistema debe estar operativo y conectado correctamente a la base de datos.

---

###  **Flujo Normal**

1. El usuario accede al módulo de control de asistencia desde el menú principal.

2. El sistema verifica el rol y los permisos del usuario.

3. El usuario selecciona el grupo, materia o estudiante del cual desea ver la asistencia.

4. El sistema consulta los registros de asistencia almacenados.

5. El sistema muestra al usuario la lista de asistencias (presentes, ausencias, justificadas, etc.) en formato tabla o calendario.

---

### **Flujos Alternativos**

**– No hay registros de asistencia:**

* El sistema muestra el mensaje: “No se han encontrado registros de asistencia”.

* El usuario puede volver al menú principal o seleccionar otro grupo/estudiante.

**– Error de conexión con la base de datos:**

* El sistema informa del problema de conexión.

* El usuario no podrá visualizar la asistencia hasta que se restablezca el servicio.

---

###  **Poscondiciones**

* El usuario obtiene una vista clara y actualizada del historial de asistencia.

* No se modifica ningún dato, ya que es solo una acción de consulta.
