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
            <div class="col-12">
                <h2 class="fs-2"><i class="bi bi-person-fill"></i> Cadastro de Usuários</h2>
                <hr>
                <form action="insert.php" method="post" class="d-flex flex-column">
                    <div class="form-group">
                        <label class="form-label"> <i class="bi bi-bar-chart-fill"></i> Nome</label>
                        <input class="form-control" type="text" name="name">
                    </div>
                    <div class="form-group">
                        <label class="form-label"> <i class="bi bi-envelope-plus"></i> E-mail</label>
                        <input class="form-control" type="text" name="email">
                    </div>
                    <div class="form-group">
                        <label class="form-label"> <i class="bi bi-lock-fill"></i> Senha</label>
                        <input class="form-control" type="text" name="pass">
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <button type="submit" class="btn btn-success m-2">Cadastrar</button>
                        <button type="reset" class="btn btn-secondary m-2">Limpar</button>
                    </div>
                </form>
            </div>
            <hr>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col" class="d-none d-md-table-cell">E-mail</th>
                        <th scope="col" class="d-none d-md-table-cell">Pass</th>
                        <th scope="col">Edição</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    try {
                        $Model = new Model($pdo, 'user');
                        $data = $Model->selectAll();
                        foreach ($data as $registers) :
                            extract($registers);
                    ?>
                            <tr>
                                <th scope="row"><?= $id ?></th>
                                <td><?= $name ?></td>
                                <td class="d-none d-md-table-cell"><?= $email ?></td>
                                <td class="d-none d-md-table-cell"><?= $pass ?></td>
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