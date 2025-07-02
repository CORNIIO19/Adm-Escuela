# Caso de Uso: Asignar profesor a grupo

**Nombre:** Asignar profesor a grupo  
**Autor:** Vicente G. Alfaro  
**Fecha:** Miércoles 2 de julio de 2025  

---

## Descripción

Este caso de uso describe el proceso mediante el cual el Administrador o el personal de Control Escolar asigna a un profesor como responsable de un grupo escolar.

---

## Actores

- Administrador  
- Control Escolar

---

## Precondiciones

- El usuario debe estar autenticado con un rol válido (Administrador o Control Escolar).  
- El grupo debe existir y estar activo dentro del ciclo escolar vigente.  
- El profesor debe estar previamente registrado y activo en el sistema.  
- El grupo no debe tener un profesor ya asignado.  
- El sistema debe estar operativo y conectado a la base de datos.  

---

## Flujo Normal

1. El usuario solicita al sistema acceder al módulo de asignación de profesor a grupo.  
2. El sistema verifica los permisos del usuario y autoriza el acceso.  
3. El usuario selecciona el grupo al que desea asignar un profesor.  
4. El sistema valida que el grupo existe, está activo, no tiene un profesor asignado y pertenece a un ciclo vigente.  
5. El usuario solicita ver la lista de profesores disponibles.  
6. El sistema filtra y muestra solo a los profesores activos que no estén asignados a otro grupo del mismo turno.  
7. El usuario selecciona un profesor.  
8. El sistema registra la relación entre el grupo y el profesor en la base de datos.  
9. El sistema actualiza el estado del grupo como “con profesor asignado”.  
10. El sistema notifica al usuario que la asignación fue exitosa.  

---

## Flujo Alternativo

**– El grupo ya tiene un profesor asignado**  
- El sistema muestra el mensaje: “Este grupo ya tiene un profesor asignado”.  
- El usuario deberá elegir otro grupo o proceder con la opción de reasignación si está habilitada.  

**– No hay profesores disponibles**  
- El sistema informa que no hay profesores activos disponibles para el grupo o turno seleccionado.  
- El proceso se detiene.  

**– El profesor ya fue asignado simultáneamente**  
- El sistema detecta un cruce de asignación y bloquea el proceso.  
- Muestra el mensaje: “El profesor seleccionado ya está asignado a otro grupo con el mismo horario”.  

---

## Poscondiciones

- El grupo queda formalmente vinculado con un profesor titular en el sistema.  
- La asignación queda registrada en la base de datos.  
- El profesor podrá interactuar con el grupo en funciones académicas habilitadas.
