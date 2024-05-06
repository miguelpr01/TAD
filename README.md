# Naturfit

##Preparación previa a ejecutar el proyecto

**Debido a las limitaciones de los servicios de SMTP que los creadores del proyecto tienen disponibles, para acceder a la funcionalidad de los emails automatizados deberá contactar a Rodrigo Bautista en rbauhern@gmail.com con la dirección de correo electrónico a la que quiere que lleguen las notificaciones de la aplicación. Esto se debe a que la dirección se ha de añadir como un recipiente autorizado en Mailgun. Las notificaciones de la aplicación serán considerados como Spam en su servicio de email.**

Desde un terminal en la carpeta base del proyecto:
1. Ejecute `composer install`
2. Ejecute `npm i`
3. Ejecute `php artisan migrate`. 
*Asegúrese de tener la base de datos ejecutándose con los parámetros establecidos en el archivo .env*
4. Ejecute `php artisan db:seed`
   

##Para ejecutar el proyecto: 

1. Abra dos terminales en la carpeta base del proyecto.
2. Ejecute `npm run dev` en una
3. Ejecute `php artisan serve` en otra


