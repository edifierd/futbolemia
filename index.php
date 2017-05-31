<?PHP

ini_set('display_errors', 1);

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__)) . DS);
define('APP_PATH', ROOT . 'application' . DS);
define('MANTENIMIENTO', false);
define('USOLOCAL', true);


if (MANTENIMIENTO){
	
	header('Location: http://www.pananabe.com.ar/Mantenimiento/default.php');

} else {
	
	try{
   		require_once APP_PATH . 'Autoload.php';
    	require_once APP_PATH . 'Config.php';

    	Session::init();
    
    	$registry = Registry::getInstancia();
    	$registry->_request = new Request();
    	$registry->_db = new Database(DB_HOST, DB_NAME, DB_USER, DB_PASS, DB_CHAR);
    	$registry->_acl = new ACL();

    	Bootstrap::run($registry->_request);
	}
	catch(Exception $e){
    	echo $e->getMessage();
	}
	
}







?>