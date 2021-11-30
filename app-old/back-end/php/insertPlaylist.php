<?php
session_start();
include_once('../functions/autoIncludeClasses.inc.php');


//1. On récupère les infos grace a fetch
//2. On
//On récupère les infos du formulaires
$data = trim(file_get_contents('php://input'));
$decoded = json_decode($data, true);





session_start();
$user_id = $_SESSION['id'];

