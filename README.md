
# App para registro de votos Desis

## Cómo levantar el ambiente con docker? 

##  Prerequesito: 

Tener instalado docker

ver: https://docs.docker.com/engine/install/ubuntu/


# levantar el ambiente 
una vez instalado docker ir al directorio raiz de proyecto donde está el archivo docker-compose.yml y correr el siguiente comando

```
sudo docker-compose up 

```

esto levantará los siguientes contenedores :
## -php8.0 
## -nginx:lastest version
## -postgres:12

Ademas levantará 

## -adminer 

para visualizar/gestionar la BD.

podrá ingresar por la siguiente url: 

http://0.0.0.0:8084/

en la configuración podrás entrar con usuario: postgres,  clave:  postgres, servidor: db, Base de datos: app_desis. OJO, esto solo es en desarrollo... 


# DB

el contenedor db carga un Postgres-12 con todas las configuraciones necesarias para interactuar con los demás contenedores y con la app.

La base de datos ya está precargada en el contenedor de postgres y la data se persiste en el directorio "postgres-data" (no es necesario cargar un backup). 

Sin embargo, si desea levantar el ambiente sin usar docker deberá restaurar el siguiente backup: 

```
SQL/backup.sql 

```
# Ingresar al sistema

Para ingresar a la primera vista deberá colocar en el navegador la siguiente url: 

```
http://0.0.0.0/app/index.php 

```
