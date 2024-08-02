<?php
include '../../conn/conect.php';
include '../../_class/model.class.php';
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: ' . $base);
    die();
}
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
            <div class="mb-3">
                <h2 class="fs-2">Cadastro de Usuários</h2>
                <hr>
                <form action="insert.php" method="post">
                    <label class="form-label">Nome</label>
                    <input class="form-control" type="text" name="usr_name">
                    <label class="form-label">E-mail</label>
                    <input class="form-control" type="text" name="usr_email">
                    <label class="form-label">Senha</label>
                    <input class="form-control" type="text" name="usr_pass">
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary m-3">Cadastrar</button>
                    </div>
                </form>
            </div>

            <table class="table table-striped"">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Pass</th>
                        <th scope="col">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    try {
                        $Model = new Model($pdo, 'user');
                        $data = $Model->selectAll();
                        foreach ($data as $registers):
                            extract($registers);
                    ?>
                            <tr>
                                <th scope="row"><?= $id ?></th>
                                <td><?= $name ?></td>
                                <td><?= $email ?></td>
                                <td><?= $pass ?></td>
                                <td> <a href="<?= $base; ?>/admin/user/delete.php?id=<?= $id; ?>"> <i class="bi bi-trash" style="color: red;"></i> </a> </td>
                            </tr>
                    <?php
                        endforeach;
                    } catch (PDOException $e) {
                        echo 'error ' . $e->getMessage();
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</html>