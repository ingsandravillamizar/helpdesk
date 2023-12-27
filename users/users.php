
<?php require_once '../validateadmin.php' ?>
<?php 
    require_once "../core/class/User.php";
    $user = new User;
    $users = $user->selectAll();
    // var_dump($user->selectAll());
?>

<?php require_once "../template/header.php"; ?>
<?php require_once "../template/sidebar.php"; ?>

<div class="wrapper d-flex flex-column min-vh-100 bg-light">
    <?php include_once "../template/topbar.php"; ?>

    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-info text-white">
                            <h2>Listado de Usuarios</h2>
                        </div>
                        <div class="card-body">
                            <a href="createuser.php" class="btn btn-primary btn-sm mb-4">Nuevo usuario</a>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th>Rol</th>
                                        <th colspan="2"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $row) { ?>
                                        <tr>
                                            <td><?= $row["id"] ?></td>
                                            <td><?= $row["name"] ?></td>
                                            <td><?= $row["email"] ?></td>
                                            <td><?= $row["rol"] ?></td>
                                            <td>
                                                <a href="edituser.php?id=<?= $row["id"] ?>" class="btn btn-info btn-sm text-white"><i class="icon icon-2xl cil-pencil"></i></a>
                                            </td>
                                            <td>
                                                <form action="destroyuser.php" method="post">
                                                    <input type="hidden" name="id" value="<?= $row["id"] ?>">
                                                    <button type="submit" class="btn btn-danger btn-sm text-white"><i class="icon icon-2xl cil-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>    
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <?php include_once "../template/copyright.php"; ?>
</div>
<?php require_once "../template/footer.php"; ?>