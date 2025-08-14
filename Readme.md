# Documentación del sistema de Administración de Escuela

Este proyecto tiene como objetivo el desarrollar un sistema de gestión escolar que permitirá a los usuarios de tipo administrador, docentes, control escolar, estudiantes y tutores interactuar con funcionalidades acorde a sus necesidades lo requieran.

Para el desarrollo del sistema se ocuparon diferentes herramientas y tecnologías que permitieron llevar a cabo el proyecto de manera eficiente, que a continuación se describirán:

- **Patrón de Arquitectura MVC (Modelo-Vista-Controlador)**: esto nos permitió estructurar el proyecto de manera modular, separando la lógica del sistema, la presentación o vistas con las cuales interactuaría el usuario y los modelos necesarios que el sistema usaría para guardar y operar datos de la base de datos, lo que facilitó la implementación y la escalabilidad del sistema.

- **SQL**: Para almacenar los datos de manera estructurada y eficiente, se utilizó el lenguaje SQL para desarrollar las tablas y los datos necesarios para un correcto funcionamiento.

- **PHP**: Se utilizó PHP como lenguaje de programación principal para el desarrollo de la lógica del sistema, permitiendo la interacción con la base de datos y la generación de las vistas necesarias para la presentación de la información.

- **HTML/CSS**: Se utilizó HTML y CSS para la creación de las vistas y la presentación de la información al usuario, permitiendo una interfaz amigable y fácil de usar.

- **Visual Studio Code**: Como herramienta principal para desarrollar el sistema se utilizó el IDE de programación Visual Studio Code, el cual proporcionó un entorno de desarrollo eficiente y flexible, con soporte para extensiones que facilitaron la escritura del código.

- **MySQL Workbeanch**: Para la gestión de la base de datos se utilizó MySQL, un sistema de gestión de bases de datos relacional que permitió almacenar y manipular la información de manera eficiente.

- **XAMPP**: Para facilitar la prueba del sistema, se utilizó XAMPP, un paquete que incluye Apache, MySQL y PHP, permitiendo crear un entorno de servidor local de manera sencilla, principalmente para desplegar un servidor local en el cual pudiéramos probar el funcionamiento de las distintas partes de la aplicación.

- **UML**: Se utilizó UML (Lenguaje de Modelado Unificado) para la representación gráfica de los diferentes componentes del sistema, permitiendo visualizar de manera clara la estructura y el comportamiento del mismo.

- **Markdown**: Se utilizó Markdown para la documentación del sistema, permitiendo crear documentos de texto plano con formato de manera sencilla.

---

Como punto de partida, el desarrollo se planteó en distintas fases o partes en las cuales podemos identificar principalmente cuatro: análisis, diseño y modelado, por último la implementación. Para lograr esto, se llevó a cabo un análisis de requerimientos y se definieron los casos de uso para cada tipo de usuario, con el objetivo de conocer las necesidades del usuario o tratar de suponerlas, logrando así definir y delimitar las posibles funcionalidades que integrarán el sistema.

Posteriormente se realizó la descripción de cada caso de uso que se tenía como objetivo implementar en el sistema, con el cual se definieron los flujos con los cuales el usuario interactuaría. Asimismo, se mostraron posibles errores o fallas que el usuario tendría si no se cumplen los requisitos establecidos, necesarios para el correcto funcionamiento del sistema. Esto nos permitió visibilizar de mejor manera la lógica de cada caso de uso, además de proporcionar una base sólida para pasos posteriores.

Por último, se realizaron los diagramas de secuencia, en los que buscamos principalmente mostrar la interacción de los diferentes objetos del sistema, lo cual nos permitió visualizar mejor la lógica de los casos de uso, así como en la descripción detallada. Además, se pudieron definir de manera anticipada algunos aspectos como los métodos o funcionalidades que se ocuparían para los requisitos del proyecto. El beneficio principal de esto fue que, al hacer un diseño previo de la lógica del sistema, se espera lograr un correcto funcionamiento del mismo.

Estas etapas del proyecto nos permitieron tener una mejor comprensión de la lógica del sistema y de los requerimientos de los usuarios, lo cual es fundamental para el desarrollo exitoso del mismo, anticipándonos a las etapas de análisis, diseño y modelado antes de pasar a la fase de implementación.

---

## **Asignación de Casos de uso**

Para priorizar el correcto desarrollo del sistema se realizó una asignación a cada miembro del grupo, de los cuales tuvimos como resultado lo siguiente:

- **OMAR JHONATAN SOSA BOBADILLA**  
  - GESTIÓN DE INFORMACIÓN DE USUARIO  
  - NOTIFICACIONES  

- **GUSTAVO ANGEL ARAGÓN ARAGÓN**  
  - CONTROL ASISTENCIA  
  - CONTROL DE ACTIVIDADES/TAREAS  

- **VICENTE GARCÍA ALFARO**  
  - PAGO DE COLEGIATURAS  
  - CONTROL/GESTIÓN DE GRUPOS ESCOLARES  

- **CARLOS ADRIÁN ABAD SEGUNDO**  
  - CONTROL DE MATERIAS  
  - CONTROL DE CALIFICACIONES DE ALUMNOS  

---

## **Estructura de las carpetas**

Este proyecto sigue una estructura de carpetas organizada para facilitar el desarrollo y mantenimiento del código. A continuación se detalla la estructura del proyecto y lo que podrá encontrar en cada una:

- **App_Final**:  
  En ella encontrará la aplicación del sistema de administración escolar, el código fuente y lo necesario para su funcionamiento.
  - **app**  
    Aquí se encuentra la lógica de la aplicación, incluyendo los controladores, modelos y vistas.
    - **Controllers**  
      En esta carpeta se encuentra la lógica de los controladores de la aplicación.
    - **Config**  
      En esta carpeta se encuentra el archivo de conexión a la base de datos utilizando la clase PDO para poder usar los métodos y objetos de esta clase y lograr una conexión entre los datos de la base de datos y de la aplicación.
    - **Models**  
      En esta carpeta se encuentra la lógica de los modelos de los datos que la aplicación maneje.
    - **Views**  
      En esta carpeta se encuentran las vistas con las cuales el usuario interactúa.
  - **core**  
    En esta se encuentra el sistema de enrutamiento de la aplicación. Su función principal es: analizar la URL solicitada para posteriormente determinar qué controlador y método deben ejecutarse, para cargar el controlador correspondiente y pasarle los parámetros necesarios.
  - **public**  
    En esta carpeta se encuentran los archivos públicos de la aplicación, como hojas de estilo y scripts.
    - **css**  
      En esta carpeta se encuentran los archivos de estilo CSS de la aplicación.
    - **index.php**  
      En esta carpeta se encuentra el archivo de entrada de la aplicación.
  - **Scripts**  
    En esta carpeta se encuentran los scripts de creación y población de la base de datos de la aplicación.

- **CU_GESTION_DE_INFORMACION_DE_USUARIO**  
- **CU_NOTIFICACIONES**  
- **CU_CONTROL_ASISTENCIA**  
- **CU_CONTROL_DE_ACTIVIDADES_TAREAS**  
- **CU_PAGO_DE_COLEGIATURAS**  
- **CU_CONTROL_GESTION_DE_GRUPOS_ESCOLARES**  
- **CU_CONTROL_DE_MATERIAS**  
- **CU_CONTROL_DE_CALIFICACIONES_DE_ALUMNOS**  
  En estas carpetas se encuentran los diagramas y modelos que utilizamos para generar los casos de uso, la descripción de cada caso de uso y el diagrama de secuencia del sistema. Estos están hechos con la herramienta PlantUML y Markdown para documentar el sistema.
- **Readme.md**  
  Este archivo contiene la documentación del sistema y las instrucciones para su instalación y uso.

---

## **Instrucciones de instalación**

Para poder instalar y ejecutar de manera correcta este proyecto, se recomienda seguir los siguientes pasos:

1. Clonar el repositorio

```bash
git clone https://github.com/CORNIIO19/Adm-Escuela.git
```

2. Ejecutar el script de creación de la base de datos:
Como segundo paso se deberá hacer la ejecución del script de creación de la base de datos, el cual se encuentra en la carpeta de App_Final/Scripts y tiene el nombre de scripts_Creacion.sql

```bash
cd App_Final/Scripts
```

3. Cambiar las credenciales de la base de datos en el archivo de configuración.
Dentro de la carpeta **App_Final/App/Config** se encuentra el archivo **database.php**, ademas en la carpeta **App_Final/App/Models** se encuentran el archivo **Database.php** . En estos archivos se deben modificar las siguientes líneas con las credenciales de su base de datos:

```php
    private $host = 'localhost';
    private $db_name = 'gestion_escuela';
    private $username = '';
    private $password = '';
    public $conn;
```

Con las respectivas claves de acceso a su conexion de su manejador de base de datos.

4. Entrada al sistema
Para acceder al sistema, ejecute su servidor local y abra su navegador y diríjase a la siguiente URL:

```php
localhost/App_Final/public/index.php
```

**el sietema por default viene con una cuenta de administrador las cuales las credenciales son las siguientes:**

**usuario:admin**
**contraseña:admin123**

### **requisitos y pasos para el modulo de control de materias y calificaciones de alumnos**

Este proyecto utiliza **PHP** y la librería [PhpSpreadsheet](https://phpspreadsheet.readthedocs.io/) para importar y manejar datos desde archivos Excel.

## **Requisitos**

- PHP 8.0 o superior  
- [Composer](https://getcomposer.org/) instalado  
- Extensiones PHP:
  - **ext-gd**
  - **ext-zip**
- Servidor local (XAMPP, Laragon, etc.)

## **Instalación**

1. **Clonar el repositorio**

   ```bash
   git clone https://github.com/CORNIIO19/Adm-Escuela.git
   cd proyecto-escuela

    Instalar Composer

        Descargar desde getcomposer.org/download

        Durante la instalación, seleccionar la ruta de PHP:

    C:\xampp\php\App_Final/app/Controllers

Instalar dependencias

composer install
