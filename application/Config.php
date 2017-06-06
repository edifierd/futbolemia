<?php

/*
 * -------------------------------------
 * Fremework de Jaisiel Delance modificado por Tubaro Federico
 * framework mvc basico
 * Config.php
 * -------------------------------------
 */

//INFORMACION SOBRE LA EMPRESA
define('APP_NAME', 'Futbolemia');
define('APP_SLOGAN', 'Futbolemia Company');
define('APP_COMPANY', 'www.futbolemia.com.ar');

//DATOS DE CONFIGURACION
define('SESSION_TIME', 10);
define('HASH_KEY', '4f6a6d832be79');
define('USER_TYPE', 'profesor');

if (USOLOCAL){

define('BASE_URL', 'http://localhost/futbolemia/');
define('DEFAULT_CONTROLLER', 'index');
define('DEFAULT_LAYOUT', 'default');
define('ADMIN_LAYOUT', 'administrador');

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '1234');
define('DB_NAME', 'futbolemia');
define('DB_CHAR', 'utf8');

} else {

define('BASE_URL', 'http://www.futbolemia.com.ar/');
define('DEFAULT_CONTROLLER', 'index');
define('DEFAULT_LAYOUT', 'default');
define('ADMIN_LAYOUT', 'administrador');

define('DB_HOST', 'localhost');
define('DB_USER', 'id950513_user_futbolemia');
define('DB_PASS', 'nigth1raven');
define('DB_NAME', 'id950513_futbolemia');
define('DB_CHAR', 'utf8');


}


?>
