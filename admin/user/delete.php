<?php
include_once '../inc/validation-session.php';
$model = 'user';
$dir = 'user';

$id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT); // Captura o id na url
$model = new Model($pdo, $model); // Instância da class Model
$model->delete($id); // Método delete da class Model
header("Location: ".$base."/admin/".$dir); // Redireciona para a url informada
