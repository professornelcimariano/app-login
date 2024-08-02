<?php
include '../../conn/conect.php';
$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$user = new User($pdo);
$data = [
    'usr_email' => $data['usr_name'],
    'usr_name' => $data['usr_email'],
    'usr_pass' => MD5($data['usr_pass'])
];
$userManager->insert($userData);

/*
$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
try {
    $sth = $pdo->prepare('insert into users (usr_name, usr_email, usr_pass) 
    values (:usr_email, :usr_name, :usr_pass)');
    $sth->bindValue('usr_email', $data['usr_name']);
    $sth->bindValue('usr_name', $data['usr_email']);
    $sth->bindValue('usr_pass', MD5($data['usr_pass']));
    $sth->execute();
    header("Location: ".$base."/admin/user/form.php");
} catch (PDOException $e) {
    echo $e->getMessage();
}
*/