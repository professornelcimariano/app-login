<?php
include_once '../../conn/config.php';
include_once '../../conn/conect.php';
include_once '../../_class/model.class.php';
include_once '../../_class/user/user.class.php';
include_once '../inc/validate-session.php';

$model = 'user'; // Variável $model contém o nome do model
$dir = 'user'; // Variável $dir contém o nome do diretório para redirecionamento
$id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT); // Captura o id na url
$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$Data = [
    'name' => $data['name'],
    'email' => $data['email'],
    // 'pass' => MD5($data['pass'])
];

// Classe Model Padrão (insert, delete, update, selectAll, selectOne, count)
$model = new Model($pdo, $model);
$result = $model->update($id, $Data);
if ($result) {
    header("Location: " . $base . "/admin/" . $dir . "/form-update.php?id=" . $id . "&update=success");
    // exit;
} else {
    echo "Erro na atualização";
}
?>