<?php
if (empty($_COOKIE['accessToken']) || empty($_COOKIE['role'])) {
    header('Location: /login.php');
} else if (!empty($_COOKIE['role']) && $_COOKIE['role'] == 'admin')
    header('Location: /berandaPemilik.php');
require_once('request.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Kost Efilo</title>
    <link rel="stylesheet" href="CSS/style.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<body>
    <main>