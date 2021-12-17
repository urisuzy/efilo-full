<?php
if (empty($_COOKIE['accessToken']) || empty($_COOKIE['role'])) {
    header('Location: /login.php');
} else if (!empty($_COOKIE['role']) && $_COOKIE['role'] == 'member')
    header('Location: /berandaPenyewa.php');
require_once('request.php');
?>

<head>
    <meta charset="UTF-8">
    <title>Kost Efilo</title>
</head>