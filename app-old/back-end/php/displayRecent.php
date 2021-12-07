<?php
session_start();
require ($_SERVER['DOCUMENT_ROOT'] . '/back-end/functions/autoIncludeClasses.inc.php');
require ($_SERVER['DOCUMENT_ROOT'] . '/back-end/functions/functions.php');

//header('Content-Type: application/json');
$user_id = $_SESSION['id'];
$recent = new Recent();
$recent->checkRecent($user_id);
try {
    echo json_encode($recent, JSON_THROW_ON_ERROR);
} catch (JsonException $e) {
    die($e->getMessage());
}

