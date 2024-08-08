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
    <!-- sweetalert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

</head>

<body>
    <?php
    include '../inc/menu.php';
    ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="fs-2"><i class="bi bi-bar-chart-fill"></i> Cadastro de Carros</h2>
                <hr>
                <form action="insert.php" method="post" enctype="multipart/form-data" class="d-flex flex-column">
                    <div class="form-group">
                        <label class="form-label"> <i class="bi bi-bar-chart-fill"></i> Nome</label>
                        <input class="form-control" type="text" name="name">
                    </div>
                    <div class="form-group">
                        <label class="form-label"> <i class="bi bi-envelope-plus"></i> Descrição </label>
                        <input class="form-control" type="text" name="description">
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
                        <th scope="col" class="d-none d-md-table-cell">Descrição</th>
                        <th scope="col">Edição</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    try {
                        $Model = new Model($pdo, 'car');
                        $data = $Model->selectAll();
                        foreach ($data as $registers) :
                            extract($registers);
                    ?>
                            <tr>
                                <th scope="row"><?= $id ?></th>
                                <td><?= $name ?></td>
                                <td class="d-none d-md-table-cell"><?= $description ?></td>
                                <td>

                                    <!-- <a href="<?= $base; ?>/admin/car/delete.php?id=<?= $id; ?>"> <i class="bi bi-trash" style="color: red;"></i> </a> -->
                                    <!-- Substitua o link de exclusão por um botão -->
                                    <button class="btn btn-danger m-2 btn-delete" data-id="<?= $id; ?>">Excluir</button>
                                    <a class="btn btn-primary m-2" href="<?= $base; ?>/admin/car/form-update.php?id=<?= $id; ?>"> Editar </a>


                                </td>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.btn-delete').forEach(function(button) {
            button.addEventListener('click', function() {
                var itemId = this.getAttribute('data-id');
                var base = '<?= $base; ?>'; // Obtém a URL base do PHP

                Swal.fire({
                    title: 'Você tem certeza?',
                    text: "Essa ação não pode ser desfeita!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim, excluir!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redireciona para a URL de exclusão
                        window.location.href = base + '/admin/car/delete.php?id=' + itemId;
                    }
                });
            });
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>


</html>