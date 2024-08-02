<?php
include '../../conn/conect.php';

$id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
echo $id;

$sth = $pdo->prepare("DELETE from users where usr_id = :usr_id");
$sth->bindValue("usr_id", $id);
$sth->execute();
header("Location: ".$base."/admin/user/form.php");