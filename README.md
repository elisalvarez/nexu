<h1 align="center" style="font-weight: bold;">Nexu Backend Coding Exercise 💻</h1>

<p align="center">
 <a href="#tech">Tecnologías</a> • 
 <a href="#started">Primeros pasos</a> • 
  <a href="#routes">API Endpoints</a> •
 <a href="#autors">Autores</a> •
 <a href="#feedbback">Agradecimientos</a>
</p>

<p>
    Este proyecto es un desafío de codificación que permita mostrar las habilidades e ideas de algunos de los problemas que se pueden encontrar en Nexu. Consiste en crear una aplicación de backend para un frontend ya existente.  El frontend necesita las siguientes rutas:

    GET    /brands
    GET    /brands/:id/models
    POST   /brands
    POST   /brands/:id/models
    PUT    /models/:id
    GET    /models
</p>

<h2 id="technologies">💻 Tecnologías</h2>

- PHP
- Framework Laravel
- MySQL
- Laragon

<h2 id="started">🚀 Primeros pasos</h2>

Entorno de desaarrollo.

<h3>Requisitos previos</h3>

- [Composer](https://getcomposer.org/) version 2.7.9
- [PHP](https://www.php.net/downloads.php) version 8.2.23
- [Laravel](https://laravel.com/docs/11.x) version 11.9
- Server version: 8.0.30 - MySQL 

<h3>✨ Copia mágica</h3>

How to clone your project

```bash
git clone git@github.com:elisalvarez/nexu.git
```

<h3>Configuración de variables .env</h2>

Usa el archivo `.env.example` como referencia para crear tu archivo de configuración `.env` con tus credenciales de tu servidor.

```yaml
APP_URL=http://localhost
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_nexu
DB_USERNAME=nexu_admin
DB_PASSWORD=SFPUdHeUG8cpt7nb
```

<h3>¡Hora de la aventura! 🌍 </h3>

Cómo iniciar tu proyecto

```bash
cd nexu
composer install
cp .env.example .env #Linux/macOS
copy .env.example .env #Windows
#Ajustar la configuración .env según tu entorno
php artisan key:generate
php artisan migrate:fresh --seed
php artisan cache:clear; php artisan route:clear; php artisan config:clear; php artisan view:clear; php artisan route:list
php artisan serve
```

<h2 id="routes">📍 API Endpoints</h2>

Here you can list the main routes of your API, and what are their expected request bodies.

http://localhost:8000/brands
​
| route               | description                                          
|----------------------|-----------------------------------------------------
| <kbd>GET  /brands</kbd>     | Listar todas las marcas [response details](#get-all-brands)
| <kbd>GET /brands/:id/models</kbd>     | Listado de todos los modelos de la marca [request details](#get-brand-model)
|<kbd>POST  /brands</kbd>     | Añadir nuevas marca [response details](#post-brand)
|<kbd>POST  /brands/:id/models</kbd>     | Añadir nuevo modelo a una marca [response details](#post-model-brand)
|<kbd>PUT  /models/:id</kbd>     | Editar el precio promedio de un modelo [response details](#put-model)
|<kbd>GET  /models?greater=380000&lower=400000</kbd>     | Listar de los modelos [response details](#get-models)

<h3 id="get-all-brands">GET  /brands</h3>

**RESPONSE**
```json
[
  {"id": 1, "nombre": "Acura", "average_price": 702109},
  {"id": 2, "nombre": "Audi", "average_price": 630759},
  {"id": 3, "nombre": "Bentley", "average_price": 3342575},
  {"id": 4, "nombre": "BMW", "average_price": 858702},
  {"id": 5, "nombre": "Buick", "average_price": 290371},
  "..."
]
```

<h3 id="get-brand-model">GET /brands/:id/models</h3>

**RESPONSE**
```json
[
  {"id": 1, "name": "ILX", "average_price": 303176},
  {"id": 2, "name": "MDX", "average_price": 448193},
  {"id": 1264, "name": "NSX", "average_price": 3818225},
  {"id": 3, "name": "RDX", "average_price": 395753},
  {"id": 354, "name": "RL", "average_price": 239050}
]
```

<h3 id="post-brand">POST /brands</h3>

**RESPONSE**
```json
[
    {
        "status": true,
        "message": "Marca registrada exitosamente.",
        "brand": "ToyotasS"
    }
]
```

<h3 id="post-model-brand">POST /brands/:id/models</h3>

**RESPONSE**
```json
[
   {
        "status": true,
        "message": "Marca registrada exitosamente.",
        "model_name": "Toyota",
        "model_id": 663
    }
]
```


<h3 id="put-model">PUT  /models/:id</h3>

**RESPONSE**
```json
[
    {
    "status": true,
    "message": "Modelo actualizado exitosamente.",
    "model_name": "Bentayga",
    "model_id": 1267
    }
]
```

<h3 id="get-models">GET  /models?greater=380000&lower=400000</h3>

**RESPONSE**
```json
[
  {"id": 1264, "name": "NSX", "average_price": 3818225},
  {"id": 3, "name": "RDX", "average_price": 395753}
]
```

<h3>🧑‍💻 Pruebas </h3>

Cómo ejecutar las pruebas. 

```bash
php artisan test
```

Para volver al entorno de los endpoints, después de aplicar las pruebas, ejecutar lo siguiente.

```bash
php artisan migrate:fresh --seed
php artisan cache:clear; php artisan route:clear; php artisan config:clear; php artisan view:clear; php artisan route:list
php artisan serve
```
<h3>🧑‍💻 Producción </h3>


El sitio en producción de nuestra API REST está disponible en el siguiente subdominio:

- **Subdominio de Producción**: [https://nexu.elisalvarez.com/](https://nexu.elisalvarez.com/)

Aquí podrás encontrar la API en su entorno de producción, con todas las funcionalidades activas y accesibles.

<h2 id="autors"> Autores ✒️</h2>

_Este proyecto fue desarrollado para un el puesto de Desarrollador Fullstack Sr._

* **Elisa Álvarez Aguilar** - *Desarrolladora fullstack* - [github](https://github.com/elisalvarez) 

<h2 id="feedback"> Agradecimiento por el Feedback 🌟 ✒️</h2>


* Valoro cualquier retroalimentación que puedan ofrecerme sobre mi candidatura y el proceso de selección. Esto me ayudará a mejorar y crecer profesionalmente. 📈🤓.
* ¡Charlemos y tomemos un Café Virtual! ☕️:** ¡Estoy aquí para cualquier pregunta y para compartir ideas! 🍩🎉

---
⌨️ con ❤️ por [Elisa Álvarez](https://elisalvarez.com) 😊🖖