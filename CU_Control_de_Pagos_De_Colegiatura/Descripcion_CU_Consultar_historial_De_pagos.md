# Caso de Uso: Consultar historial general de pagos

**Nombre:** Consultar historial general de pagos  
**Autor:** Vicente G. Alfaro  
**Fecha:** Miércoles 2 de julio de 2025  

---

## Descripción

Este caso de uso describe el proceso mediante el cual el personal de Control Escolar o Tesorero accede al historial general de pagos de colegiatura registrados en el sistema. Esta consulta permite visualizar de forma consolidada todos los pagos realizados por los alumnos, organizados por fecha, grupo, grado, estatus de pago y forma de pago.

---

## Actores

- Control Escolar  
- Tesorero

---

## Precondiciones

- El usuario debe estar autenticado con un rol válido (Control Escolar o Tesorero).  
- El sistema debe contener pagos registrados asociados a alumnos.  
- Debe existir un ciclo escolar activo y definido.  
- La base de datos debe estar operativa y accesible.

---

## Flujo Normal

1. El tesorero solicita al sistema acceder al historial general de pagos.  
2. El sistema valida los permisos del tesorero y autoriza el acceso al módulo correspondiente.  
3. El tesorero indica que desea consultar los pagos registrados dentro del ciclo escolar activo.  
4. El sistema realiza una búsqueda de todos los registros de pago asociados a alumnos dentro del ciclo escolar activo.  
5. El sistema vincula cada pago con su respectivo alumno, grupo, grado y forma de pago.  
6. El sistema analiza la información para determinar el estado de pago de cada alumno por periodo (pagado, pendiente o vencido).  
7. El sistema entrega al tesorero el conjunto estructurado de información, agrupado por alumno y ordenado cronológicamente.  
8. El tesorero, con base en los resultados, puede solicitar búsquedas específicas por alumno, grupo, mes o estado de pago.  
9. El sistema aplica los filtros solicitados y presenta solo los registros que coinciden con los criterios establecidos.  

---

## Flujo Alternativo

** – No hay registros de pago disponibles**  
- El sistema informa: “No se encontraron registros de pago disponibles”.  
- El proceso finaliza sin mostrar historial.

---

## Poscondiciones

- Se accede correctamente al historial general de pagos.  
- No se altera ni modifica ningún dato del sistema.  
 
