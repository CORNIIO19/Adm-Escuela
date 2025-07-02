# Caso de Uso: Registrar calificaciones de grupo

**Nombre:** Registrar calificaciomes de grupo 
**Autor:** Adrian Abad
**Fecha:** Miércoles 2 de julio de 2025  

---

## Descripción

Permite al profesor asignar las mcalificaciones a los alumnos de un grupo perteneciente a una materia ya definida


---

## Actores

- Profesor

---

## Precondiciones

- El Profesor ha iniciado secion correctamente en el sistema
- El profesor  debe tener asignado un grupo con una materia

---

## Flujo Normal

1. El profesor entra en la seccion de calificaciones
2. Selecciona el grupo y la materia que desea calificar
3. El sistema muestra la lista de alumnos inscritos en el grupo
4. El profesor introduce las calificaciones correspondientes para cada alumno
5. El profesor confirma el envio de calificaciones
6. El sistema guarda las calificaciones

---

## Flujo Alternativo

**– Alumno din calificacion**  
- El sistema alerta al profesor que hay campos vacion anter de permitir el envio de las calificaciones

**– El grupo no tiene alumnos inscritos**  
- El sistema muestra un mensaje indicando que no ahy datos registrados
---

## Poscondiciones

- Las calificaciones se quedan registradas y disponibles para la consulta
- Las calificaciones pueden ser modificadas durante el periodo escolar