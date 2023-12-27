<?php


    /**
    *   VALIDAR
    *   1) Que todos los datos vengan
    *   2) Que las contraseñas sean iguales
    *   Si falla la validación regresar al formulario y mostrar un mensaje de los errores
    */

    session_start();
  

     require_once "core/class/User.php";
    // Validación
        $_SESSION['data'] = $_POST;
        if(empty($_POST['name'])){
            $_SESSION['error'] = 'No ha indicado el nombre';
        }else if(empty($_POST['email'])){
            $_SESSION['error'] = 'No has puesto el correo electronico';
        }else if(empty($_POST['password'])){
            $_SESSION['error'] = 'No has puesto la contraseña';
        }else if(empty($_POST['password_repeat'])){
            $_SESSION['error'] = 'No has confirmado la contraseña';
        }else if(empty($_POST['rol'])){
            $_SESSION['error'] = 'No has indicado el tipo de usuario';
        }

        if(!empty($_POST['password']) && strlen($_POST['password'])<6){
            $_SESSION['error'] = 'La contraseña debe ser de minimo 6 caracteres';
        }

        if($_POST['password'] != $_POST['password_repeat']){
            $_SESSION['error'] = 'Las contraseñas no coinciden';
        }

        if(!empty($_SESSION['error'])){
            header('Location: register.php');
            return;
        }
    
    $password = trim($_POST['password']);
    $passwordCrypt = password_hash($password, PASSWORD_DEFAULT);
    //insertar
    $date = date('Y-m-d H:i:s');
    $data = [
        "name" => trim($_POST['name']),
        "email" => trim($_POST['email']),
        "password" => $passwordCrypt,
        "rol" => $_POST['rol'],
        "create" => $date,
        "update" => $date,
    ];
    $user = new User;
    if($user->create($data)){
        $_SESSION['success'] = "Usuario creado de forma exitosa";
        unset($_SESSION['data']);
        header("Location: login.php");
    }else{
        $_SESSION['error'] = "Error, intente nuevamente y si persiste, comuniquese con el WebMaster";
        header("Location: register.php");
    };