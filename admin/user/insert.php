<?php
include '../../conn/conect.php';
$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

// insert into users (usr_email, usr_name, usr_pass) values ('maria@maria.com', 'Maria', 'Senac#123')
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
