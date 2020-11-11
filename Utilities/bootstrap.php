<?php
//Alap controller név:
$controller = "IndexLink";
//Alap függvény név:
$action = "index_links";
//alap sql query paraméter:
$query = null;

/**
 * A htaccess-ben átadott load paramétert szedem ki a get-el.
 * Szétbontom controllerre, függvényre és paraméterre.
 */
if (isset($_GET['load']))
{
    $params = array();
    $params = explode("/", $_GET['load']);

    $controller = ucwords($params[0]);

    if (isset($params[1]) && !empty($params[1]))
    {
        $action = $params[1];
    }

    if (isset($params[2]) && !empty($params[2]))
    {
        $query = $params[2];
    }
}

$modelName = $controller;
//A controller nevéhez a szót hozzáadom:
$controller .= 'Controller';
$load = new $controller($modelName, $action);

if (method_exists($load, $action))
{
    $load->$action($query);
}
else
{
    die('Invalid method. Please check the URL.');
}