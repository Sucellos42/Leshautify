<?php
//1. On récupère les infos grace a fetch
//2. On

$data = trim(file_get_contents('php://input'));


try {
    $decoded = json_decode($data, true, 512, JSON_THROW_ON_ERROR);
} catch (JsonException $e) {
    die($e->getMessage());
}


session_start();
$user_id = $_SESSION['id'];

