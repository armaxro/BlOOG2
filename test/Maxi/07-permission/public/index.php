<?php
//creation de l'instance
require_once "../config.php";
// pour indiquer a l'autoload le chemin de notre classe 
use model\Mapping\Permission;

// our autoload qui fonctionne avec le nom des dossiers/fichiers depuis la racine

spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require PROJECT_DIRECTORY.'/' .$class . '.php';
});
//connexion à la db
//manuellement nous importons notre classe de mapping
require "../model/Mapping/Permission.php";

$db = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT.";charset=".DB_CHARSET,
DB_LOGIN,
DB_PWD);
//tableau associatif en fetch
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$perm1 = new Permission(5, "", "");

//affichage grace aux getters

echo $perm1->getPermissionId();

var_dump($perm1);