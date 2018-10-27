Para ejecutar esta aplicacion web desarrollada con el framework LARAVEL 5.4 se requieren:

- PHP 7.2.*
- MySQL 14.14.*

1.- Modificar los siguientes campos del archivo .env
	DB_CONNECTION=mysql		//Gestor de base da datos
	DB_HOST=127.0.0.1		//Direccion host de su servidor
	DB_PORT=3306			//Puerto del servidor de base de datos
	DB_DATABASE=seguimientott	//Nombre de la base de datos
	DB_USERNAME=root		//Usuario de la base de datos
	DB_PASSWORD=root		//Contraseña de la base de datos
2.- Crear una base de datos llamada seguimientott en mysql con el siguiente comando:
	'create database seguimientott;'
3.- Importar en tu base de datos el archivo que incluye el proyecto llamado base.sql
4.- Dara unas credeenciales por defecto de administrador las cuales son:
	-user: admin@monitoreott.com
	-password: admin
5.- Mover el proyecto al servidor PHP.
6.- Abrir el navegador en la direccion localhost:8000/public/
