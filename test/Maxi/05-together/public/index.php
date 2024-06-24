<?php



//on indique le chemin vers des class qu'on utilisera

use model\Mapping\PermissionMapping;
use model\Manager\PermissionManager;
// session
session_start();

// Appel de la config
require_once "../config.php";

// our autoload
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require PROJECT_DIRECTORY.'/' .$class . '.php';
});

$dbConnect = new PDO( DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT.";charset=".DB_CHARSET,
DB_LOGIN,
DB_PWD);

$PermissionManager = new PermissionManager($dbConnect);




require PROJECT_DIRECTORY.'/view/permission/permission.homepage.view.php';

var_dump($allPermission, $PermissionManager);