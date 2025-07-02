# Caso de Uso: Asignar materia a grupo

**Nombre:** Asignar matera a grupo 
**Autor:** Adrian Abad
**Fecha:** Miércoles 2 de julio de 2025  

---

## Descripción

Permite al administrador asignar las materias ya existentes en el sistema a un grupo de alumnos en especifico 


---

## Actores

- Administrador 

---

## Precondiciones

- El administrador ha iniciado secion correctamente en el sistema
- Debe existir la materia 
- Debe existir grupo de alumnos
- La materia no debe estar asignada al grupo a asignarse 

---

## Flujo Normal

1. El administrador entra en la seccion de gestion de grupos
2. Se selecciona el grupo al que desea asignar la materia
3. El sistema le muestra las materias existentes disponibles
4. El administrador seleciona la matera a asignar
5. El sistema valida que la materia no se encuentre asignada al grupo
6. Se guarda la seleccion 

---

## Flujo Alternativo

**– Materia ya  esta asignada al grupo**  
- El sistema nos muestra un mensaje de error
- El administrador seleciona otra materia o otro grupo
---

## Poscondiciones

- Puede ser visible para otras secciones como horarios, calificaciones, o inscripción