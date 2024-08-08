<?php
include '../../conn/conect.php';
include '../../_class/model.class.php';
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: ' . $base);
    die();
}
?>