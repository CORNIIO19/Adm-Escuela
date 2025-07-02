# **Nombre:** 
Registrar Información de Nuevo Usuario
# **Autor:**
Omar Sosa

# **Fecha:**
Indefinido

# **Descripción:**
Este caso de uso servirá para ingresar información de los usuarios, alumno, profesor, tutor, etc en el sistema junto con una asignación de cuenta,

# **Actores:**
- Administrador
- Control Escolar
# **Precondiciones:**
Qué el usuario administrador y control escolar estén acreditados en el sistema y con los permisos necesarios
# **Flujo Normal:**
1. acceder al apartado de registro de nuevo usuario
2. ingresar la información requerida en el formulario <br>    
    2.2. Nombre <br>
    2.3. Apellidos <br>
    2.4. Direcciones <br>
    
3. seleccionar el tipo de usuario (alumno, profesor, tutor, etc)
4. el usuario ingresa el correo electrónico definitivo y la contraseña temporal
5. el sistema valida la información ingresada
6. el sistema registra la información del usuario en la base de datos


# **Flujo Alternativo:**
- Si el usuario no ingresa toda la información requerida, el sistema muestra un mensaje de error indicando los campos faltantes y limpia el formulario.
- Si el correo electrónico ya está en uso, el sistema muestra un mensaje de error indicando que el correo ya está registrado, solicita uno nuevo y elimina este correo.
- Si la contraseña temporal no cumple con los requisitos de seguridad, el sistema muestra un mensaje de error indicando las reglas de la contraseña y solicita una nueva contraseña.
- Si la informacion del tipo de usuario seleccionado no es válida, el sistema muestra un mensaje de error indicando que el tipo de usuario es incorrecto y limpia el formulario.


# **Postcondiciones:**
la información del usuario queda registrado en el sistema, se le asigna un correo y contrasena temporal de acceso al sistema, además se le envía una notificacion con sus datos de acceso.