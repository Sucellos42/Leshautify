<?php

spl_autoload_register('autoIncludeClasses');

function autoIncludeClasses ($className) {
    $root = $_SERVER['DOCUMENT_ROOT'];
    //chemin pour aller chercher une classe
    $path = $root . '/back-end/classes/';
    $ext = ".class.php";
    $fullPath = $path . $className . $ext;
    echo $fullPath;
    include_once $fullPath;
}
