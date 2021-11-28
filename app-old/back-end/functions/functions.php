<?php


//function pour debug une var propre
//inclue dans le header
function debug ($var) {
    echo '<pre>' . print_r($var) . '</pre>';
    echo '<pre>' . var_dump($var) . '</pre>';
}

/**
 * met une majuscule a chaque début de mot
 * @param string $input
 * @return string
 */
function sanitize_input (string $input): string {
    $sanitize_input = htmlspecialchars($input);
    return ucwords(strtolower($sanitize_input));
}

function sanitize_email(string $email) {
    $sanitize_email= filter_var($email, FILTER_VALIDATE_EMAIL);
    // Renvoie false si l'email n'est pas validé
    if (!$sanitize_email) {
        $sanitize_email  = filter_var($email, FILTER_SANITIZE_EMAIL);
    }

    return $sanitize_email;
}

