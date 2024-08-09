<?php
include_once '../../conn/config.php';
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: ' . $base);
    die();
}
?>