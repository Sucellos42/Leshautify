<?php


class FlashMessage {

    public static function render(): ?string
    {
        if (!isset($_SESSION['messages'])) {
            return null;
        }
        $messages = $_SESSION['messages'];
        unset($_SESSION['messages']);
        return implode('<br/>', $messages);
    }

    public static function add($message): void
    {
        if (!isset($_SESSION['messages'])) {
            $_SESSION['messages'] = array();
        }
        $_SESSION['messages'][] = $message;
    }

}