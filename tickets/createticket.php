<?php require_once '../validateauth.php' ?>
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
                            <h2>Nuevo Ticket</h2>
                        </div>
                        <div class="card-body">
                            <?php if(!empty($_SESSION['error'])): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= $_SESSION['error'] ?>
                                    <?php unset($_SESSION['error']); ?>
                                </div>
                            <?php endif; ?>
                            <form action="storeticket.php" method="post">
                                <div class="form-group">
                                    <label for="area">Area</label>
                                    <select name="area" id="" class="form-control">
                                        <option value="Soporte">Soporte</option>
                                        <option value="Ventas">Ventas</option>
                                        <option value="Facturación">Facturación</option>
                                    </select>
                                </div>
                                <div class="form-group mt-4">
                                    <label for="title">Titulo</label>
                                    <input type="text" name="title" class="form-control" placeholder="Ingrese titulo" value="<?= (!empty($_SESSION['data']['title'])) ? $_SESSION['data']['title'] : null ?>">
                                <div class="form-group mt-4">
                                    <label for="message">Mensaje</label>
                                    <textarea name="message" id="" cols="30" rows="10" class="form-control" placeholder="Detalle el problema"><?= (!empty($_SESSION['data']['message'])) ? $_SESSION['data']['message'] : null ?></textarea>
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