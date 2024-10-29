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
    <li>Instalar las dependencias de composer: composer install --no-dev --optimize-autoloader</li>
    <li>
        Editar el archivo .env:
        <ol>
            <li>APP_URL=http://[host_instalacion]/luiszagaceta/public</li>
            <li>DB_HOST=[ip_host_bd]</li>
            <li>DB_PORT=[port_host_bd]</li>
            <li>DB_DATABASE=[nombre_basedatos]</li>
            <li>DB_USERNAME=[usuario_basedatos]</li>
            <li>DB_PASSWORD=[password_basedatos]</li>
        </ol>
    </li>
</ul>