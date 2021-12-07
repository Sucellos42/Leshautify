<?php

spl_autoload_register('autoIncludeClasses');

function autoIncludeClasses ($className) {
    $root = $_SERVER['DOCUMENT_ROOT'];
    //chemin pour aller chercher une classe
    $path = '/back-end/classes/';
    $ext = ".class.php";
    $fullPath = $root . $path . $className . $ext;
    include_once $fullPath;
}


/*spl_autoload_register('autoIncludeClasses');

function autoIncludeClasses($className)
{
    $path = "../classes/";
    $extension = ".class.php";
    $fullPath = $path . $className . $extension;


    if (!file_exists($fullPath)) {
        return false;
    }

    include_once $fullPath;
}*/

