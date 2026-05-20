<?php
// login.php - alias to auth/login.php for root-level login links
$redirect = $_SERVER['QUERY_STRING'] ?? '';
$target = 'auth/login.php';
if ($redirect !== '') {
    $target .= '?' . $redirect;
}
header('Location: ' . $target);
exit;
