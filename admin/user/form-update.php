<?php
include_once '../inc/header.php';
?>
</head>

<body>
    <?php
    $model = 'user';
    $dir = 'user';
    $namePage = 'Edição de Usuários';

    $id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
    $Model = new Model($pdo, $model);
    $data = $Model->selectOne($id);
    extract($data);
    include '../inc/menu.php';
    ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="fs-2"><i class="bi bi-bar-chart-fill"></i> <?= $namePage ?> </h2>
                <hr>
                <form action="update.php?id=<?= $id ?>" method="post" enctype="multipart/form-data" class="d-flex flex-column">
                    <div class="form-group">
                        <label class="form-label"> Nome</label>
                        <input class="form-control" type="text" name="name" value="<?= $name ?>">
                    </div>
                    <div class="form-group">
                        <label class="form-label"> Descrição </label>
                        <input class="form-control" type="text" name="email" value="<?= $email ?>">
                    </div>

                    <div class="d-flex justify-content-end mt-3">
                        <button type="submit" class="btn btn-success m-2">Atualizar</button>
                        <a href="<?= $base; ?>/admin/<?= $dir ?>" class="btn btn-secondary m-2">Voltar</a>
                    </div>
                </form>
                <?php
                $update = filter_input(INPUT_GET, 'update', FILTER_DEFAULT);
                if (isset($update)) {
                    if ($update == 'success') {
                        echo "<hr><h4> Registro Atualizado com Sucesso </h4>";
                    }
                }
                ?>
            </div>
        </div>
    </div>





</body>
<?php
include '../inc/footer.php';
?>