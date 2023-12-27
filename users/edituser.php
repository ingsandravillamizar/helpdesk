<?php require_once '../validateadmin.php' ?>
<?php 
    require_once "../core/class/User.php";
    $id = $_GET['id'];
    $user = new User;
    $reponse = $user->selectById($id);
    $data = $reponse[0];
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
                            <h2>Editar Usuario</h2>
                        </div>
                        <div class="card-body">
                            <form action="updateuser.php" method="post">
                                <input type="hidden" name="id" value="<?= $id ?>">
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input type="text" name="name" class="form-control" placeholder="Ingrese su nombre completo" value="<?= $data['name'] ?>">
                                </div>
                                <div class="form-group mt-4">
                                    <label for="email">Correo electornico</label>
                                    <input type="email" name="email" class="form-control" placeholder="Ingrese su correo electronico" value="<?= $data['email'] ?>">
                                </div>
                                <div class="form-group mt-4">
                                    <label for="rol">Tipo de usuario</label>
                                    <select name="rol" class="form-control">
                                        <option value="Administrador" <?= ($data['rol'] == 'Administrador') ? 'selected' : '' ?>>Administrador</option>
                                        <option value="Cliente" <?= ($data['rol'] == 'Cliente') ? 'selected' : '' ?>>Cliente</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm mt-4">Guardar</button>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <?php include_once "../template/copyright.php"; ?>
</div>
<?php require_once "../template/footer.php"; ?>