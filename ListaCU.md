# **Lista de Importancia de Casos de Uso**

## **NOMENCLATURA PARA DESIGNAR IMPORTANCIA DE LOS CASOS DE USO:**
- **A: Alta**

    Son **funciones esenciales** para que el sistema cumpla su propósito. **Su ausencia impide el funcionamiento correcto**, afecta procesos clave o limita funcionalidades críticas. Deben desarrollarse en las primeras etapas del proyecto.

    - **A1**: Caso de uso indispensable. El sistema depende de él para cumplir con su función principal. Su ausencia impide el funcionamiento del sistema.

    - **A2**: Caso de uso crítico. Aunque el sistema puede operar sin él, lo hace de manera limitada o ineficiente. Su ausencia reduce significativamente la utilidad o rendimiento.

    - **A3**: Caso de uso relevante. No impide la operación del sistema, pero es necesario para habilitar funciones clave o estratégicas.

- **M: Media**


    Los casos de uso de **importancia Media (M)** no son críticos para el funcionamiento base del sistema, pero su ausencia puede afectar la usabilidad, fluidez o valor percibido por el usuario.

    - **M1**: El sistema puede funcionar sin este caso de uso, pero su ausencia afecta la experiencia del usuario. Normalmente se desprende de un nivel A1 (Alta prioridad).

    - **M2**: El caso de uso añade funcionalidades deseables o complementarias. Su ausencia no afecta la lógica del negocio, pero sí reduce el atractivo o la eficiencia para el usuario final.

    - **M3**: Funcionalidad utilizada ocasionalmente o en contextos específicos. Es útil para ciertos perfiles de usuario o en escenarios particulares, pero prescindible en el flujo general.

- **B: Baja**

    Los casos de uso de importancia Baja (B) son prescindibles sin afectar la operación del sistema. Se consideran "nice to have".

    - **B1**: Funcionalidad estética, de personalización o conveniencia. Su ausencia no altera la operación ni la experiencia básica del usuario.

    - **B2**: Casos de uso pensados para mantener engagement o diferenciación con respecto a la competencia. No afectan la funcionalidad interna ni la percepción de estabilidad del sistema.

    - **B3**: Funcionalidad experimental, futura o pensada para escalabilidad. No tiene impacto actual y puede ser descartada sin consecuencia alguna.

------------------------------------------------------------------------------------------

## **Casos de Usos de gestion de Usuarios**
NOTA: este Caso de uso sirve para Revisar, actores: adm y control escolar.
1. gestionar la informacio de los usuarios --> A1

## **Casos de Uso Alta de Usuarios**
1. Ingresar Informacion de Usuario --> A1 --- asignacion de roles
2. Ver Informacion de Usuario --> M1
3. Modificar Informacion de Usuario --> A2

## **Casos de uso Asignacion de Grupos**
1. Asignar grupos -> A1
2. Ver grupos asignados --> M1
3. Modificar grupos asignados --> A2

## **Casos de Calificaciones** 
1. Ver calificacion --> M1
2. Modificar calificacion -->A2
3. Asignar Calificacion --> A1

## **Casos de Uso Pagos de colegiatura** 
1. Entrega de Recibo --> M3
2. Registro Pago Efectivo --> A3
3. Obtener adeudo de pago --> A1
4. Hacer pago Digital _**Nota: este caso de uso la inicia el tutor sin que intervenga en de cuentas**_ --> A1
5. Verificar Historial de Pago --> A3

## **Casos de Uso Tareas**
1. Ver Tarea --> A2
2. Entregar Tarea --> A1
3. Asignar Tareas --> A1
4. Calificar Tareas --> A2
5. Modificar Calificacion de Tareas --> A3

## **Casos de Uso Control de Asistencia** 
1. Reportar Asistencia --> M1
2. Verificar Asistencia --> A1
3. Modificar Asistencia --> M2
4. Ver Reporte de Asistencia --> B1

## **Casos de Uso de Informe Escolar**


