<?php
function isConnect(): bool {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    //si $_SESSION connecte est vide on renvoie false
    return !empty($_SESSION['connecte']);
}
//oooooooo

function userConnected (): void {
    if(!isConnect()){
        header('Location: public/pages/loginForm.php');
    }
}