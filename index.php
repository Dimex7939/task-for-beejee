<?
	//============MVC============
	//MVC - Model View Conroller

	session_start();

	ini_set('display_errors', 1);
	error_reporting(E_ERROR);

	define('ROOT', dirname(__FILE__));
	define('URI', explode('?', $_SERVER['REQUEST_URI'])[0]);

	require_once(ROOT.'/components/Autoload.php');
	

	$router = new Router();
	$router->run();

?>