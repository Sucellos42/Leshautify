<?php
if (session_status() === PHP_SESSION_NONE) {
    //si elle n'existe pas on la démarre
    session_start();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link href="public/assets/css/nav-right.css" rel="stylesheet">
    <link href="public/assets/css/nav-left.css" rel="stylesheet">
    <link href="public/assets/css/recent.css" rel="stylesheet">
    <link href="public/assets/css/song-list.css" rel="stylesheet">
    <link href="public/assets/css/modal.css" rel="stylesheet">
    <link href="public/assets/css/playlistNav.css" rel="stylesheet">
    <link href="public/assets/css/playlistPage.css" rel="stylesheet">
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/eeb6c15f81.js"></script>
    <!-- <link rel="stylesheet" href="assets/font.css"> -->

    <script src="public/JS/createTag.js" defer></script>
    <script defer src="public/JS/displayRecent.js"></script>
    <script defer src="public/JS/recentModal.js"></script>
    <script src="public/JS/playlist.js" defer></script>
<!--    <script src="public/JS/openPlaylist.js" defer></script>-->
    <script src="public/JS/removeRightNav.js" defer></script>
    <script src="public/JS/createPlaylistPage.js" defer></script>

</head>
<body>
