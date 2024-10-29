<h1>Luis Zagaceta</h1>
<p>Requerimiento:</p>
<ul>
    <li>PHP 8.1+</li>
    <li>APACHE 2.4</li>
    <li>BD MySQL / MariaDB</li>
</ul>
<hr>
<p>Instalacion:</p>
<ul>
    <li>Clonar el proyecto como HTTPS: git clone https://github.com/LuisZagaceta/test-externa.git luiszagaceta/</li>
    <li>Ingresar a la carpeta: > cd luiszagaceta</li>
    <li>Instalar las dependencias de composer: composer install</li>
    <li>Cambiar de nombre el archivo: .env.example -> .env</li>
    <li>
        Editar las variables del archivo .env:
        <ol>
            <li>APP_URL=http://[host_instalacion]/luiszagaceta/public</li>
            <li>DB_HOST=[ip_host_bd]</li>
            <li>DB_PORT=[port_host_bd]</li>
            <li>DB_DATABASE=[nombre_basedatos]</li>
            <li>DB_USERNAME=[usuario_basedatos]</li>
            <li>DB_PASSWORD=[password_basedatos]</li>
        </ol>
    </li>
    <li>Ejecutar el migrate: php artisan migrate --force</li>
    <li>Ejecutar el optimize: php artisan optimize:clear</li>
    <li>Por ultimo, cree un usuario para el inicio de sesion:
        <ol>
            <li>php artisan tinker</li>
            <li>User::factory()->create(['email' => '[correo@evaluador]']);</li>
            <li>Para iniciar sesion use el correo que registro con la contraseña: password</li>
        </ol>
    </li>
</ul>