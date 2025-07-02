# Caso de Uso: Crear nueva materia

**Nombre:** Crear nueva matera 
**Autor:** Adrian Abad
**Fecha:** Miércoles 2 de julio de 2025  

---

## Descripción

Permite al administrador dar de alta en el sistema una nueva materia la cual posteriormente se asigna a los grupos


---

## Actores

- Administrador 

---

## Precondiciones

- El administrador ha iniciado secion correctamente
- Debe existir la materia 
- debe existir un plan de estudio

---

## Flujo Normal

1. El administrador entra en la seccion de gestion de materias
2. Seleciona la opcion de Crear una nueva materia
3. Se muestra algun formulario para llenar los parametros de la materia
4. El administrador procede a llenar el formulario
5. Se confirma el registro 
6. El sistema valida que los campos se encuentren completos
7. Se guardan los datos de la materia

---

## Flujo Alternativo

**– Materia duplicada**  
- El sistema detecta que la materia ya existe 
- Muestra mensaje de error
- Vuelve al formulario
---

## Poscondiciones

- La materia se queda registrada en el sistema para futuras asignaciones 