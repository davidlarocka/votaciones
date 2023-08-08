
# App Sistema de registro de votos Desis

## ¿Cómo levantar el ambiente con docker? 

##  Pre Requisito: 

Tener instalado Docker

ver: https://docs.docker.com/engine/install/ubuntu/


# levantar el ambiente 
una vez instalado docker ir al directorio raiz de proyecto donde está el archivo docker-compose.yml y correr el siguiente comando

```
sudo docker-compose up 

```

Esto levantará los siguientes contenedores :
## -php8.0 
## -nginx:lastest version
## -postgres:12

Además levantará 

## -adminer 

Para visualizar/gestionar la BD.

Podrá ingresar por la siguiente url: 

http://0.0.0.0:8084/

en la configuración podrás entrar con usuario: postgres,  clave:  postgres, servidor: db, Base de datos: app_desis. OJO, esto solo es en desarrollo... 


# DB

El contenedor db carga un Postgres-12 con todas las configuraciones necesarias para interactuar con los demás contenedores y con la app.

La base de datos ya está precargada en el contenedor de postgres y la data se persiste en el directorio "postgres-data" (no es necesario cargar un backup). 

Sin embargo, si desea levantar el ambiente sin usar docker deberá restaurar el siguiente backup: 

```
SQL/backup.sql 

```
# Ingresar al sistema

Para ingresar a la vista Home deberá colocar en el navegador la siguiente url: 

```
http://0.0.0.0/app/index.php 

```

# Arquitectura de la App
La app está construida en PHP puro (sin framework), dividido en estructura MVC( models-views-controllers) en los siguientes directorios

## controllers/HomeController.php 
Contiene la logica de servicios.

## models/voteModel.php 
Contiene la conexión a db y los métodos que interactuan con el modelo de datos.

## views/HomeTemplate.php 
Contiene la vista html de la pagina inicial y los llamados a las fuentes y recursos css y JS.

## helpers/Viewer.php 
Contiene una clase que ayuda al controlador a llamar a la vista html renderizando una plantilla.

## config/config.php 
Contiene los datos de configuración para accesos a las tablas de la BD.

## index.php 
Funciona como enrutador de las peticiones http a la app.