<?php
//creation de l'instance
require_once "../config.php";
//connexion à la db
//manuellement nous importons notre classe de mapping
require "../model/Mapping/Permission.php";

$db = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT.";charset=".DB_CHARSET,
DB_LOGIN,
DB_PWD);
//tableau associatif en fetch
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$perm1 = new Permission(5, "r", "t");

//affichage grace aux getters

echo $perm1->getPermissionId();

var_dump($perm1);