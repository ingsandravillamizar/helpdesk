<?php require_once '../validateauth.php' ?>
<?php 
    //Validar si existe el id, si no redirige
    $id = $_GET['id'];
    require_once '../core/class/Ticket.php';
    $ticket = new Ticket;
    $data = $ticket->selectDetails($id);
    // echo json_encode($data);

    // Verifica si la respuesta contiene datos
    if (!empty($data)) {
        $data = $data[0];
          //validar que ese ticket sea mio SOLO SI no es administrador
            if($_SESSION['userrol'] <> "Administrador"){
                if($data['user_id'] != $_SESSION['userid']){
                $_SESSION['error'] = 'No pude Consultar Tickets de otros usuarios';
                header('Location: tickets.php');}
            } 


            
    } else {
        header("Location:  tickets.php");
        die;  
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
                            <h2>Ticket <small>(#<?= $id ?>)</small> | <?= $data['title'] ?></h2>
                        </div>
                        <div class="card-body">
                            <?php if(!empty($_SESSION['error'])): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= $_SESSION['error'] ?>
                                    <?php unset($_SESSION['error']); ?>
                                </div>
                            <?php endif; ?>


                        
                            <p><strong>Estado: </strong><?php if ($data["status"] == "Pendiente"): ?>
                                                    <span class="badge text-bg-danger"><?= $data["status"] ?></span>
                                                    <?php else: ?>
                                                    <span class="badge text-bg-success"><?= $data["status"] ?></span> 
                                                    <?php endif; ?> </p>    



                            <p><strong>Area: </strong><?= $data['area'] ?></p>
                            <p><strong>Usuario: </strong><?= $data['username'] ?></p>
                            <p><strong>Fecha de creación: </strong><?= $data['created_at'] ?></p>
                            <p><strong>Problema: </strong><?= $data['message'] ?></p>
                            <?php if(!empty($data['response'])): ?>
                                <p><strong>Respuesta: </strong><?= $data['response'] ?>
                                <br>
                                <small>(<?= $data['date_response'] ?>)</small>
                                </p>
                            <?php endif; ?>
                            <?php if($data['status'] == 'Pendiente' && $_SESSION['userrol'] == "Administrador"): ?>
                                <hr>
                                <form action="updateticket.php" method="post">
                                    <input type="hidden" name="id" value="<?= $id ?>">
                                    <div class="form group">
                                        <label for="response"><strong>Respuesta</strong></label>
                                        <textarea name="response" cols="30" rows="10" class="form-control"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm mt-3 float-end">Responder</button>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once "../template/copyright.php"; ?>
</div>
<?php require_once "../template/footer.php"; ?>