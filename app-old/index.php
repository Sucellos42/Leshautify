<?php
require ($_SERVER['DOCUMENT_ROOT'] . '/back-end/php/auth.php');
userConnected();
require_once'public/pages/header.php';
require_once'public/pages/dashboard.php';
require_once'public/pages/footer.php';