<?php
include_once('../classes/Recent.class.php');
include_once('../classes/Dbh.class.php');
include_once('../functions/functions.php');
//header('Content-Type: application/json');

$recent = new Recent();
$result = $recent->checkRecent();
try {
    echo json_encode($recent, JSON_THROW_ON_ERROR);
} catch (JsonException $e) {
    die($e->getMessage());
}

