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
                            <h1>Login</h1>
                            <p class="text-medium-emphasis">Iniciar Sesión</p>
                            
                            <?php if(!empty($_SESSION['error'])): ?>
                            <div class="alert alert-danger" role="alert">
                                <?= $_SESSION['error'] ?>
                                <?php unset($_SESSION['error']); ?>
                            </div>
                            <?php endif; ?>
                            <form action="auth.php" method="post">
                                <div class="input-group mb-3"><span class="input-group-text">
                                        <svg class="icon">
                                            <use xlink:href="<?= RESOURCES ?>/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                                        </svg></span>
                                    <input class="form-control" type="email" name="email" placeholder="Correo electronico">
                                </div>
                                <div class="input-group mb-4"><span class="input-group-text">
                                        <svg class="icon">
                                            <use xlink:href="<?= RESOURCES ?>/vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                                        </svg></span>
                                    <input class="form-control" type="password" name="password" placeholder="Contraseña">
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <button class="btn btn-primary px-4" type="submit">Iniciar sesión</button>
                                    </div>
                                    <!-- <div class="col-6 text-end">
                                        <button class="btn btn-link px-0" type="button">Forgot password?</button>
                                    </div> -->
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card col-md-5 text-white bg-primary py-5">
                        <div class="card-body text-center">
                            <div>
                                <h2>Registrarme en Helpdesk</h2>
                                <br>
                                <p>Optimiza tus solicitudes, agiliza la asistencia y eleva la calidad de tus experiencias. ¡Hazlo fácil, hazlo rápido, hazlo con HelpDesk</p>
                                <a  href="register.php"  class="btn btn-lg btn-outline-light mt-3" type="button">Quiero Registrarme</a>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once "template/footer.php"; ?>