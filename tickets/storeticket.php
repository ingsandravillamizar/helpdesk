<?php
    session_start();
    require_once '../validateauth.php';
    require_once "../core/class/Ticket.php";
    require_once "../core/class/TicketDetail.php";

    // Validación
        $_SESSION['data'] = $_POST;
        if(empty($_POST['area'])){
            $_SESSION['error'] = 'No ha indicado el area';
        }else if(empty($_POST['title'])){
            $_SESSION['error'] = 'No ha escrito el titulo';
        }else if(empty($_POST['message'])){
            $_SESSION['error'] = 'No ha indicado el detalle del problema';
        }

        if(!empty($_SESSION['error'])){
            header('Location: createticket.php');
            return;
        }
    
    //insertar
    $date = date('Y-m-d H:i:s');
    $data = [
        "area" => trim($_POST['area']),
        "title" => trim($_POST['title']),
        "create" => $date,
        "status" => 'Pendiente',
        "user_id" => $_SESSION['userid'],
    ];
    $ticket = new Ticket;
    $ticket_id = $ticket->create($data);
    if($ticket_id){
        // insertar en la tabla TicketDetails
        $data = [
            'message' =>$_POST['message'],
            'date_message' => $date,
            'ticket_id' => $ticket_id
        ];

        $details = new TicketDetail;
        if($details->create($data)){
            $_SESSION['success'] = "Ticket creado. A la brevedad daremos atención a su solicitud";
            unset($_SESSION['data']);
            header("Location: tickets.php");
        }else{
            // 1. eliminar el ticket general
            // 2. Mensaje
            // 3. Redirección
        }
    }else{
        $_SESSION['error'] = "Error, intente nuevamente y si persiste, comuniquese con el WebMaster";
        header("Location: createticket.php");
    }