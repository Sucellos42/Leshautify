<?php
//define('ROOT' . "/");

spl_autoload_register('autoIncludeClasses');
function autoIncludeClasses ($className) {
    //chemin pour aller chercher une classe
    $path = "../classes";
    $ext = ".class.php";
    $fullPath = $path . $className . $ext;

    include_once $fullPath;



}

?>