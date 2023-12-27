<?php
    session_start();
    require_once '../validateauth.php';
    require_once "../core/class/Ticket.php";
    
    $id = $_POST['id'];
    $reg = new Ticket;
    if($reg->delete($id)){
        $_SESSION['success'] = "Registro eliminado de forma exitosa";
    }else{
        $_SESSION['error'] = "Error, intente nuevamente y si persiste, comuniquese con el WebMaster";
    }
    header('Location: tickets.php');