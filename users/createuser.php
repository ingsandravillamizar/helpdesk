
<?php $miRuta = $_SERVER['DOCUMENT_ROOT'] . "/helpdesk/"; ?>
<?php require_once($miRuta . "template/header.php"); ?>
<?php require_once($miRuta . "/validateadmin.php");  ?>
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
                            <h2>Nuevo Usuario</h2>
                        </div>
                        <div class="card-body">
                            <?php if(!empty($_SESSION['error'])): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= $_SESSION['error'] ?>
                                    <?php unset($_SESSION['error']); ?>
                                </div>
                            <?php endif; ?>
                            <form action="storeuser.php" method="post">
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input type="text" name="name" class="form-control" placeholder="Ingrese su nombre completo" value="<?= (!empty($_SESSION['data']['name'])) ? $_SESSION['data']['name'] : null ?>">
                                </div>
                                <div class="form-group mt-4">
                                    <label for="email">Correo electornico</label>
                                    <input type="email" name="email" class="form-control" placeholder="Ingrese su correo electronico" value="<?= (!empty($_SESSION['data']['email'])) ? $_SESSION['data']['email'] : null ?>">
                                </div>
                                <div class="form-group mt-4">
                                    <label for="password">Contraseña</label>
                                    <input type="password" name="password" class="form-control" placeholder="Ingrese contraseña de minimo 6 caracteres">
                                </div>
                                <div class="form-group mt-4">
                                    <label for="password_repeat">Repetir contraseña</label>
                                    <input type="password" name="password_repeat" class="form-control" placeholder="Repita su contraseña">
                                </div>
                                <div class="form-group mt-4">
                                    <label for="rol">Tipo de usuario</label>
                                    <select name="rol" class="form-control">
                                        <option value="Administrador" <?= (!empty($_SESSION['data']['rol']) && $_SESSION['data']['rol'] == "Administrador") ? 'selected' : null ?>>Administrador</option>
                                        <option value="Cliente" <?= (!empty($_SESSION['data']['rol']) && $_SESSION['data']['rol'] == "Cliente") ? 'selected' : null ?>>Cliente</option>
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