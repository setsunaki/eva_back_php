# Evaluacion Back-end

Desarrolo de un API Rest con PHP utilizando el framework laravel, en el cual se tienen los endpoint los cuales seran utilizados desde la aplicacion
de ReactJs.

## Requisitos Previos

Tener [PHP](https://www.php.net/) y [Composer](https://getcomposer.org/) instalados.

## Instalación

1. Clona este repositorio: `git clone https://github.com/setsunaki/eva_back_php.git`
2. Accede al directorio del proyecto: `cd nombre-del-proyecto`
3. Copia el archivo de configuración: `cp .env.example .env`
4. Configura tu archivo `.env` con la información necesaria (base de datos).

## Configuración

Para configurar la base de datos se debe ejecutar el archivo `database.sql`
el cual creara el Schema de la bd junto a una pequeña muestra de datos, este archivo se debe ejecutar 
en MySQL.

Luego se tiene que configurar el .env con los siguientes datos:
```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=api_eva
   DB_USERNAME=eva
   DB_PASSWORD=
```
teniendo todo esto configurado ejecutar el siguiente comando.

```bash
php artisan serve

