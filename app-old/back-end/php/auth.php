<?php
//on veut bloquer l'accès au dashboard si l'user n'est pas connecté
function isConnect(): bool {
    //on regarde si la session existe
    if (session_status() === PHP_SESSION_NONE) {
        //si elle n'existe pas on la démarre
        session_start();
    }
    //sinon on renvoie false
    return !empty($_SESSION['id']);
}


function userConnected(): void {
    if(!isConnect()) {
        header('Location: ../../public/pages/loginForm.php');
        exit();
<<<<<<< HEAD
=======

>>>>>>> 9777994198099688be76fba46c22a4f4757c9b18
    }
}

