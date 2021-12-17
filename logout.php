<?php
// setcookie('accessToken', time() - 3600);
// setcookie('role', time() - 3600);

unset($_COOKIE['accessToken']);
setcookie('accessToken', null, -1, '/');
unset($_COOKIE['role']);
setcookie('role', null, -1, '/');
header('Location: /index.php');
