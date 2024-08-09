<?php
$user = 'root';
$pass = '';
$testConnection = false;

try {
    $pdo = new PDO('mysql:host=localhost;dbname=app-blog', $user, $pass);
    // echo 'Conexão Efetuada';
    $testConnection = true;
} catch (PDOException $e) {
    echo $e->getMessage();
    die();
}
