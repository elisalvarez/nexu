<h1 align="center" style="font-weight: bold;">Nexu Backend Coding Exercise 💻</h1>

<p align="center">
 <a href="#tech">Technologies</a> • 
 <a href="#started">Getting Started</a> • 
  <a href="#routes">API Endpoints</a> •
 <a href="#colab">Collaborators</a> •
 <a href="#contribute">Contribute</a>
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
cd nombre-proyecto
npm some-command-to-run
```

<h2 id="routes">📍 API Endpoints</h2>

Here you can list the main routes of your API, and what are their expected request bodies.
​
| route               | description                                          
|----------------------|-----------------------------------------------------
| <kbd>GET /authenticate</kbd>     | retrieves user info see [response details](#get-auth-detail)
| <kbd>POST /authenticate</kbd>     | authenticate user into the api see [request details](#post-auth-detail)

<h3 id="get-auth-detail">GET /authenticate</h3>

**RESPONSE**
```json
{
  "name": "Fernanda Kipper",
  "age": 20,
  "email": "her-email@gmail.com"
}
```

<h3 id="post-auth-detail">POST /authenticate</h3>

**REQUEST**
```json
{
  "username": "fernandakipper",
  "password": "4444444"
}
```

**RESPONSE**
```json
{
  "token": "OwoMRHsaQwyAgVoc3OXmL1JhMVUYXGGBbCTK0GBgiYitwQwjf0gVoBmkbuyy0pSi"
}
```

<h2 id="colab">🤝 Collaborators</h2>

Special thank you for all people that contributed for this project.

<table>
  <tr>
    <td align="center">
      <a href="#">
        <img src="https://avatars.githubusercontent.com/u/61896274?v=4" width="100px;" alt="Fernanda Kipper Profile Picture"/><br>
        <sub>
          <b>Fernanda Kipper</b>
        </sub>
      </a>
    </td>
    <td align="center">
      <a href="#">
        <img src="https://t.ctcdn.com.br/n7eZ74KAcU3iYwnQ89-ul9txVxc=/400x400/smart/filters:format(webp)/i490769.jpeg" width="100px;" alt="Elon Musk Picture"/><br>
        <sub>
          <b>Elon Musk</b>
        </sub>
      </a>
    </td>
    <td align="center">
      <a href="#">
        <img src="https://miro.medium.com/max/360/0*1SkS3mSorArvY9kS.jpg" width="100px;" alt="Foto do Steve Jobs"/><br>
        <sub>
          <b>Steve Jobs</b>
        </sub>
      </a>
    </td>
  </tr>
</table>

<h2 id="contribute">📫 Contribute</h2>

Here you will explain how other developers can contribute to your project. For example, explaining how can create their branches, which patterns to follow and how to open an pull request

1. `git clone https://github.com/Fernanda-Kipper/text-editor.git`
2. `git checkout -b feature/NAME`
3. Follow commit patterns
4. Open a Pull Request explaining the problem solved or feature made, if exists, append screenshot of visual modifications and wait for the review!

<h3>Documentations that might help</h3>

[📝 How to create a Pull Request](https://www.atlassian.com/br/git/tutorials/making-a-pull-request)

[💾 Commit pattern](https://gist.github.com/joshbuchea/6f47e86d2510bce28f8e7f42ae84c716)

🖖