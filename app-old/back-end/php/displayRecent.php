<?php
include_once('../classes/Recent.class.php');
include_once('../classes/Dbh.class.php');
include_once('../functions/functions.php');
//header('Content-Type: application/json');

$recent = new Recent();
$recent->checkRecent();
echo json_encode($recent);



?>
