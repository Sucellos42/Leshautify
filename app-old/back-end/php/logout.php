<?php
session_start();
unset($_SESSION['id']);
header('Location: /public/pages/loginForm.php');