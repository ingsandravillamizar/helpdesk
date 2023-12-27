<?php 
    //destruir las sesiones
    session_start();
    session_destroy(); //elimina TODAS sesiones

    header("Location: login.php");