<?php

// session
session_start();

// Appel de la config
require_once "../config.php";

// our autoload
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require PROJECT_DIRECTORY.'/' .$class . '.php';
});
$tag1 = new \model\Mapping\MappingTag([
    'tag_id' => 7,
    'tag_slug' => 'php-8',
]);
