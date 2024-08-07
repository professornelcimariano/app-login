<?php
include '../../conn/conect.php';
include '../../_class/model.class.php';
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: ' . $base);
    die();
}
$id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
$Model = new Model($pdo, 'car');
$data = $Model->selectOne($id);
extract($data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <?php
    include '../inc/menu.php';
    ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="fs-2"><i class="bi bi-bar-chart-fill"></i> Edição de Carros </h2>
                <hr>
                <form action="update.php" method="post" enctype="multipart/form-data" class="d-flex flex-column">
                    <div class="form-group">
                        <label class="form-label"> <i class="bi bi-bar-chart-fill"></i> Nome</label>
                        <input class="form-control" type="text" name="name" value="<?= $name ?>">
                    </div>
                    <div class="form-group">
                        <label class="form-label"> <i class="bi bi-envelope-plus"></i> Descrição </label>
                        <input class="form-control" type="text" name="description" value="<?= $description ?>">
                    </div>

                    <div class="d-flex justify-content-end mt-3">
                        <button type="submit" class="btn btn-success m-2">Atualizar</button>
                        <a href="<?= $base; ?>/admin/car" class="btn btn-danger m-2">Cancelar</a>

                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</html>