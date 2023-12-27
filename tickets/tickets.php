<?php require_once '../validateauth.php' ?>
<?php
    require_once "../core/class/Ticket.php";

    
    $ticket = new Ticket;
    if($_SESSION['userrol'] == "Administrador"){
        $tickets = $ticket->selectAll();
    }else {
        $tickets = $ticket->myTickets($_SESSION['userid']);
    }

   
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
                            <h2>Mis Tickets</h2>
                        </div>
                        <div class="card-body">
                            <?php if (!empty($_SESSION['success'])) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?= $_SESSION['success'] ?>
                                    <?php unset($_SESSION['success']); ?>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($_SESSION['error'])) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= $_SESSION['error'] ?>
                                    <?php unset($_SESSION['error']); ?>
                                </div>
                            <?php endif; ?>
                            <a href="createticket.php" class="btn btn-primary btn-sm mb-4">Nuevo ticket</a>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Titulo</th>
                                        <th>Estado</th>
                                        <th>Area</th>
                                        <th>Fecha</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($tickets as $row) { ?>
                                        <tr>
                                            <td><?= $row["id"] ?></td>
                                            <td><?= $row["title"] ?></td>
                                            <td><?php if ($row["status"] == "Pendiente"): ?>
                                                    <span class="badge text-bg-danger"><?= $row["status"] ?></span>
                                                    <?php else: ?>
                                                    <span class="badge text-bg-success"><?= $row["status"] ?></span> 
                                                    <?php endif; ?> </td>
                                            
                                            <td><?= $row["area"] ?></td>
                                            <td><?= $row["created_at"] ?></td>
                                            <td>
                                                <a href="detailsticket.php?id=<?= $row["id"] ?>" class="btn btn-success btn-sm text-white">
                                                    <i class="icon icon-2xl cil-indent-increase"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <?php if($_SESSION['userrol'] == "Administrador"): ?>
                                                    <form action="destroyticket.php" method="post">
                                                        <input type="hidden" name="id" value="<?= $row["id"] ?>">
                                                        <button type="submit" class="btn btn-danger btn-sm text-white"><i class="icon icon-2xl cil-trash"></i></button>
                                                    </form>
                                                <?php endif; ?>
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