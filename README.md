
<h1 align="center"> API-PM-DTD</h1> 

Este repositorio almacena un servicio API backend que complementa la aplicación Prematch-DTD (https://github.com/IrisGomis/prematch-dtd) creada en React.


## Tecnologías🛠️  

- Laravel
- MySQL


## Podrías considerar usar: 

- XAMPP- para ejecutar la aplicación localmente.
- Postman- para ver la respuesta. 


## Instalación 💻
Una vez haya clonado este repositorio de Github , debe seguir estos pasos para ejecutar la aplicación:

- Instalar dependecias con: `composer install`  `npm install`
- Cree una base de datos MySQL (puede usar PHPMyAdmin o la línea de comandos para hacerlo)
- Cree el archivo .env (como referencia, podría usar "env.example" en la raíz del proyecto)
- Migre la base de datos con:  `php artisan migrate`  `php artisan migrate:fresh` (este comando es para actualizar los cambios a migraciones anteriores)  `php artisan migrate:fresh --seed` (el último comando es para para eliminar y recrear todas las tablas de la base de datos y luego poblarlas con datos de prueba utilizando los archivos de semillas)


## Test 🧾
- Para lanzar los test, utiliza el comando ` php artisan test`.



 ## Colaboradoras:family_woman_woman_girl_girl:
Este proyecto ha sido realizado por un equipo de 5 programadoras en formación:

| [<img src="https://avatars.githubusercontent.com/u/117082608?v=4" width=115><br><sub>Mariela Yamilex </sub>](https://github.com/MarielaYamilex70) |  [<img src="https://avatars.githubusercontent.com/u/117083641?v=4" width=115><br><sub>Iris Gomis </sub>](https://github.com/IrisGomis) |  [<img src="https://avatars.githubusercontent.com/u/117080419?v=4" width=115><br><sub>Natalia Iriarte</sub>](https://github.com/Natalia-irlo) | [<img src="https://avatars.githubusercontent.com/u/90630004?v=4" width=115><br><sub>Diana Borrajo</sub>](https://github.com/Dianab177) | [<img src="https://avatars.githubusercontent.com/u/117688044?v=4" width=115><br><sub>Irene Fernández</sub>](https://github.com/irenefl) |
| :---: | :---: | :---: | :---: | :---: |

