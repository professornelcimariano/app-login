<?php
include '../../conn/conect.php';
include '../../_class/model.class.php';

$id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
$userModel = new Model($pdo, 'user');
$userModel->delete($id);
header("Location: ".$base."/admin/user");

/*
$sth = $pdo->prepare("DELETE from users where usr_id = :usr_id");
$sth->bindValue("usr_id", $id);
$sth->execute();
*/