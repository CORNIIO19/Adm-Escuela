# **Nombre:** 
Modificar la inforcion de algun usuario registrado en el sistema

# **Autor:**
Omar Sosa

# **Fecha:**
Indefinida

# **Descripción:**
Este caso de uso servirá para modificar la informacion personal de algun usuario, hacer alguna correccion en el nombre del usuario, modificar su direccion registrada, etc, informacion que tenga que ser validada por el personal, ademas en este caso de uso no se podra eliminar unicamente actualizar.

# **Actores:**
- Administrador
- Control Escolar 

# **Precondiciones:**
Qué el usuario administrador, Control Escolar esten autenticados en el sistema y con los permisos necesarios para modificar la informacion de los usuarios registrados, que el usuario al que se desee modificar la informacion exista en el sistema.

# **Flujo Normal:**
1. los usuarios involucrados en el caso de uso y con acceso al sistema y con autorizacion para modificar la informacion de los usuarios, ingresan al apartado de Gestion de Informacion de Usuario y en.
2. el usuario busca al usuario al que se le desea modificar la informacion, por algun medio de identificacion especifico.
3. el usuario selecciona la opcion de modificar informacion del usuario.
4. se muesta al usuario a infromacion del usuario que se desee modificar
5. mediante un boton se podra seleccionar la informacion que se desea modificar para despues se le muestre una entrada en la que podra modificar la informacion, por ejemplo: 
   - Nombre
   - Direccion
   - Telefono
   - Correo electronico
6. el usuario modifica la informacion que se desea cambiar, y confirma la modificacion de la informacion.
7. el sistema valida los datos ingresados y muestra una previsualizacion de la informacion modificada.
8. el usuario confirma la modificacion de la informacion del usuario.
9. el sistema guarda la informacion modificada en la base de datos.

# **Flujo Alternativo:**
- Si el usuario no tiene los permisos necesarios, el sistema muestra un mensaje de error y no permite la modificación de la información.
- Si los datos ingresados son incorrectos o incompletos, el sistema muestra un mensaje de error y solicita al usuario que corrija la información antes de continuar y limpia los datos modificados.
- Si el usuario decide cancelar la modificación de la información, el sistema descarta los datos ingresados y regresa al menú principal de gestión de información de usuario.
- Si el usuario intenta modificar un campo que no es editable, el sistema muestra un mensaje de error y no permite la modificación de ese campo.

# **Postcondiciones:**
Una ves que se modifique la informacion del usuario, el sistema actualiza la informacion del usuario en la base de datos, y se le envia una notificacion al usuario que se le modifico la informacion, para que este pueda verificar que la informacion es correcta, si no es asi el usuario puede solicitar una correccion de la informacion.