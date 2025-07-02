# Caso de Uso: Asignar alumnos a grupo

**Nombre:** Asignar alumnos a grupo  
**Autor:** Vicente G. Alfaro  
**Fecha:** Miércoles 2 de julio de 2025  

---

## Descripción

Este caso de uso describe el proceso mediante el cual el personal de Control Escolar o el Administrador asigna a uno o varios alumnos previamente registrados a un grupo escolar dentro de un ciclo activo. Esta funcionalidad es esencial para la organización académica y para habilitar el seguimiento de los alumnos en términos de asistencia, calificaciones y actividades.

---

## Actores

- Control Escolar  
- Administrador

---

## Precondiciones

- El usuario debe estar autenticado con un rol válido (Control Escolar o Administrador).  
- Debe existir al menos un grupo activo en el ciclo escolar vigente.  
- Los alumnos deben estar previamente registrados y sin grupo asignado en el ciclo.  
- El grupo debe tener disponibilidad (no haber alcanzado el cupo máximo establecido).  
- El sistema debe estar operativo y conectado a la base de datos.  

---

## Flujo Normal

1. El usuario solicita al sistema acceder al módulo de asignación de alumnos a grupo.  
2. El sistema verifica los permisos del usuario y permite el acceso.  
3. El usuario indica el grupo al que desea asignar a los alumnos.  
4. El sistema verifica que el grupo existe, pertenece al ciclo escolar activo y tiene cupo disponible.  
5. El usuario solicita ver la lista de alumnos sin asignar en ese ciclo escolar.  
6. El sistema recupera los alumnos elegibles (registrados, activos y sin grupo asignado en el ciclo).  
7. El usuario selecciona uno o varios alumnos para asignar.  
8. El sistema valida que los alumnos seleccionados no estén ya asignados en otro grupo del mismo ciclo.  
9. El sistema registra la relación entre el grupo y los alumnos seleccionados.  
10. El sistema actualiza el estado de los alumnos como “Asignado” y reduce la capacidad disponible del grupo.  
11. El sistema confirma al usuario que la asignación fue exitosa e indica el número de alumnos asignados.  

---

## Flujo Alternativo

**– Grupo no disponible**  
- El sistema muestra: “El grupo seleccionado está inactivo o ha alcanzado su capacidad máxima”.  
- El usuario debe seleccionar otro grupo o esperar a que se habilite cupo.  

**–No hay alumnos elegibles**  
- El sistema informa: “No hay alumnos registrados o disponibles para asignar”.  
- El proceso finaliza sin asignación.  

**–Alumno ya asignado en otro grupo**  
- El sistema excluye automáticamente al alumno de la selección.  
- Notifica al usuario con el mensaje: “Este alumno ya está asignado en otro grupo”.  

---

## Poscondiciones

- Los alumnos seleccionados quedan formalmente asignados a un grupo escolar en el sistema.  
- El grupo actualiza su capacidad restante.  
- Cada alumno queda vinculado a un grupo 
