<?php 
    session_start();
    
    if (!isset($_SESSION['logged']) || $_SESSION['logged'] != true) {
        header('Location: /helpdesk/login.php');
        return;
    }

    if($_SESSION['userrol']!= "Administrador"){
        header('Location: /helpdesk/index.php');
        return;
    }



 

?>