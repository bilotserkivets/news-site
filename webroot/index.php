<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);




define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));

require_once(ROOT.'/components/Router.php');
require_once(ROOT.'/components/Db.php');
require_once(ROOT .'/components/Autoload.php');



session_start();

$router = new Router();
$router->run();



