<?php
session_start();
require_once '../validateauth.php';


//Validar que los datos esten completos
$_SESSION['data'] = $_POST;
if (empty($_POST['id'])) {
    $_SESSION['error'] = 'No ha indicado el id';
} else if (empty($_POST['response'])) {
    $_SESSION['error'] = 'No ha indicado La respuesta';
}

if (!empty($_SESSION['error'])) {
    header('Location: detailsticket.php?id=' . $_POST["id"]);
    return;
}



require_once "../core/class/Ticket.php";
require_once "../core/class/TicketDetail.php";
$id = $_POST['id'];
$response = $_POST['response'];
$ticket = new Ticket;
$date = date('Y-m-d H:i:s');
//cambio de estado a Finalizado
if ($ticket->update($id, 'Finalizado')) {
    //Agregamos la respuesta
    $details = new TicketDetail;
    $data = [
        'response' => $_POST['response'],
        'date' => $date
    ];
    if ($details->update($id, $data)) {
        $_SESSION['success'] = "Ticket finalizado con exito";
        header('Location: tickets.php');
    } else {
        $ticket->update($id, 'Pendiente');
        $_SESSION['error'] = 'No pudo guardar detalle del ticket';
        header('Location: detailsticket.php?id=' . $_POST["id"]);
    
    }
} else {
    $_SESSION['error'] = 'No pudo guardar Status del  ticket';
    header('Location: detailsticket.php?id=' . $_POST["id"]);
}
