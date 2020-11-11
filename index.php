<?php
/**
 * DIRECTORY_SEPARATOR --> /-jel
 */
define('DS', DIRECTORY_SEPARATOR);
/**
 * dirname(__FILE__) --> gyökér könyvtár
 */
define('HOME', dirname(__FILE__));

/**
 * Template inc elérésének könnyítése
 */
define('TEMPLATEFOLDER', HOME . DS . 'View' . DS . 'inc' . DS);

/**
 * PROTOCOL HTTP/HTTPS
 */
$protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === 0 ? 'https://' : 'http://';
define('PROTOCOL', $protocol);
/**
 * base href a hostból, a mappaszerkezetből
 */
define('BASE_URL', PROTOCOL . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']));

/**
 * Minden hibát kiiratni
 */
ini_set('display_errors', 1);

/**
 * Gyökérkönyvtár/config.php használata (adatbázishoz csatlakozási adatok)
 */
require_once HOME . DS . 'config.php';
/**
 * Gyökérkönyvtár/Utilities/bootstrap.php (url szétbontása = Controller neve / action neve / paraméterezés)
 */
require_once HOME . DS . 'Utilities' . DS . 'bootstrap.php';

/**
 * Betölti az osztályokat:
 * @param $class
 */
function __autoload($class)
{
    if (file_exists(HOME . DS . 'Utilities' . DS . strtolower($class) . '.php')) {
        require_once HOME . DS . 'Utilities' . DS . strtolower($class) . '.php';
    } else if (file_exists(HOME . DS . 'Model' . DS . strtolower($class) . '.php')) {
        require_once HOME . DS . 'Model' . DS . strtolower($class) . '.php';
    } else if (file_exists(HOME . DS . 'Controller' . DS . strtolower($class) . '.php')) {
        require_once HOME . DS . 'Controller' . DS . strtolower($class) . '.php';
    }
}