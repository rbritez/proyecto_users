# Proyecto CRUD Usuarios
_Proyecto realizado como demostración._

# Ecosistema de datos
_Para la realización del sistema se utilizo el siguiente stack tecnológico_
* PHP 7.3.1
* CSS
* JavaScript
* Apache 
* MySQL  
# Base de Datos
_Base de datos utilizada en la demostración_
* Nombre para la DB: proyecto_users
# Tablas
* users
# Acceso Inicial al Sistema
 _Para acceder al sistema por primera vez se debe correr 2 scripts de PHP:_

* **Database/migraciones/tablas.php** --> en donde encontramos el comando para crear la tabla.
* **Database/datos_iniciales/userData.php** --> en donde encontramos el comando para cargar en la tabla el usuario inicial para acceder al sistema.
  
_Estracto de código_
```
php -f archivo.php
```