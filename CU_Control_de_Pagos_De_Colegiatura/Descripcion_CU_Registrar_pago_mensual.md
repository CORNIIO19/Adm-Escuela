# Caso de Uso: Pagos de colegiatura

**Nombre:** Pagos de colegiatura  
**Autor:** Vicente G. Alfaro  
**Fecha:** Miércoles 2 de julio de 2025  

---

## Descripción

Este caso de uso describe el proceso mediante el cual el personal de Control Escolar o Tesorero registra manualmente el pago mensual de colegiatura de un alumno en el sistema. El pago se realiza exclusivamente en efectivo o transferencia.

---

## Actores

- Control Escolar  
- Tesorero

---

## Precondiciones

- El usuario debe estar autenticado con un rol válido (Control Escolar o Tesorero).  
- El alumno debe estar registrado y activo en el sistema.  
- El sistema debe tener cargado el calendario de pagos con sus montos correspondientes.  

---

## Flujo Normal

1. El usuario (Control Escolar o Tesorero) inicia el proceso de registro de pago mensual.  
2. El sistema solicita al usuario identificar al alumno al que se desea registrar el pago.  
3. El usuario proporciona un dato de identificación del alumno (matrícula, nombre u otro identificador único).  
4. El sistema verifica la existencia del alumno y su estatus activo.  
5. El sistema consulta y recupera el historial de pagos del alumno, incluyendo los meses pendientes.  
6. El usuario selecciona el periodo (mes y año) correspondiente al pago que se desea registrar.  
7. El sistema verifica que el periodo seleccionado sea válido (ni pagado previamente, ni fuera del ciclo activo).  
8. El sistema registra en la base de datos el pago.  
9. El sistema actualiza automáticamente el estado de pago del alumno para el periodo registrado como “al corriente”.  
10. El sistema genera un comprobante de pago con la información registrada (fecha, alumno, monto, responsable del registro).  
11. El sistema notifica al usuario que el proceso ha sido completado exitosamente.  

---

## Flujo Alternativo

**– Alumno no encontrado**  

- El sistema muestra un mensaje de error: "Alumno no registrado".
- El usuario deberá registrar al alumno antes de continuar.  

**– Mes ya pagado**  

- El sistema notifica: "El mes seleccionado ya ha sido cubierto"
- El proceso se detiene y no se registra el pago duplicado.

– El monto no coincide

- El sistema detecta que el monto no corresponde al valor definido en el calendario.  
- Se muestra el mensaje: "Se debe cubrir el total del pago".  
- El proceso se detiene hasta que el monto ingresado sea corregido.  

---

## Poscondiciones

- El pago queda registrado correctamente en el sistema.  
- El estado de pago del alumno se actualiza como “al corriente”.  
- Se genera un recibo con la información del pago.  
