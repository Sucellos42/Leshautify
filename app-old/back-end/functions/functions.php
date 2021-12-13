<?php


//function pour debug une var propre
//inclue dans le header
function debug ($var) {
    echo '<pre>' . print_r($var) . 'printr' . '</pre>';
    echo '<pre>' . var_dump($var) . "vardump" . '</pre>';
}

/**
 * met une majuscule a chaque début de mot
 * et traite l'input
 * @param string $input
 * @return string
 */
function sanitizeInput (string $input): string {
    // Supprime les espaces (ou d'autres caractères) en début et fin de chaîne
    $input = trim($input);
    //Supprime les balises HTML et PHP d'une chaîne
    $input = strip_tags($input);
    //Convertit les caractères spéciaux en entités HTML
    $sanitize_input = htmlspecialchars($input);
    //Met la première lettre d'un mot en majuscule après avoir mis tout le mot en minuscule
    return ucwords(strtolower($sanitize_input));
}

function sanitizePassword (string $input): string {
    //Convertit les caractères spéciaux en entités HTML
    return htmlspecialchars($input);
}

function sanitize_email(string $email) {
    $sanitize_email= filter_var($email, FILTER_VALIDATE_EMAIL);
    // Renvoie false si l'email n'est pas validé
    if (!$sanitize_email) {
        $sanitize_email  = filter_var($email, FILTER_SANITIZE_EMAIL);
    }
    return $sanitize_email;
}



