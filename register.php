<?php 
    $miRuta = $_SERVER['DOCUMENT_ROOT'] . "/helpdesk/";
    session_start();
    if (!empty($_SESSION['logged'])) {
        header('Location: index.php');
        return;
    }
?>
<?php require_once($miRuta . "template/header.php"); ?>

<div class="bg-light min-vh-100 d-flex flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card-group d-block d-md-flex row">
                    <div class="card col-md-7 p-4 mb-0">
                        <div class="card-body">
                            <h1>Registro</h1>
                            <p class="text-medium-emphasis">Crear tu cuenta</p>
                            
                            <?php if(!empty($_SESSION['error'])): ?>
                            <div class="alert alert-danger" role="alert">
                                <?= $_SESSION['error'] ?>
                                <?php unset($_SESSION['error']); ?>
                            </div>
                            <?php endif; ?>
                            <form action=   "storeregister.php"    method="post">
                                <div class="input-group mb-3"><span class="input-group-text">
                                    <svg class="icon">
                                    <use xlink:href="<?= RESOURCES ?>/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                                    </svg></span>
                                    <input class="form-control" type="text" name = "name" placeholder="Nombre de Usuario">
                                </div>
                                <div class="input-group mb-3"><span class="input-group-text">
                                        <svg class="icon">
                                            <use xlink:href="<?= RESOURCES ?>/vendors/@coreui/icons/svg/free.svg#cil-paper-plane"></use>
                                        </svg></span>
                                    <input class="form-control" type="email" name="email" placeholder="Correo electronico">
                                </div>
                                <div class="input-group mb-4"><span class="input-group-text">
                                        <svg class="icon">
                                            <use xlink:href="<?= RESOURCES ?>/vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                                        </svg></span>
                                    <input class="form-control" type="password" name="password" placeholder="Contraseña">
                                </div>
                                <div class="input-group mb-4"><span class="input-group-text">
                                        <svg class="icon">
                                            <use xlink:href="<?= RESOURCES ?>/vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                                        </svg></span>
                                    <input class="form-control" type="password" name="password_repeat" placeholder="Repita la Contraseña">
                                </div>
                                <input type="hidden" name="rol" value="Cliente">
                                <div class="row">
                                    <div class="col-6">
                                        <button class="btn btn-primary px-4" type="submit">Registrarme</button>
                                    </div>
                                   
                                </div>
                            </form>
                        </div>
                    </div>
       
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once($miRuta . "template/footer.php"); ?>
