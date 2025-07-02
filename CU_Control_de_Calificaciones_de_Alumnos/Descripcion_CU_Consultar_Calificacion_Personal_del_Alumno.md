# Caso de Uso: Consultar calificaciones personales

**Nombre:** Consultar calificaciones personales
**Autor:** Adrian Abad
**Fecha:** Miércoles 2 de julio de 2025  

---

## Descripción

Permite al alumno ingresar al sistema para visualizar su calificaciones previamente registradas por su profesor, sin la posibilidad de modificarla 


---

## Actores

- Alumno

---

## Precondiciones

- El alumno a iniciado seccion corectamente en el sistema
- El sistema contiene al menos una calificacion registrada para el alumno

---

## Flujo Normal

1. El accede al sistema y seleciona la opcion Mis calificaciones
2. El sistema muestra una lista de los ciclos escolares disponibles
3. El alumno seleciona su siclo o periodo academico
4. El sistmema muestra las materias cursadas en ese periodo
5. El sistema muestra las calificaciones del alumno, pero no puede modificar los datos 

---

## Flujo Alternativo

**– El alumno no no tiene calificacion registradas en ese ciclo**  
-El sistema muestra un mensaje de error
---

## Poscondiciones

- El sistema mantiene un acceso de solo lectura a esta informacion