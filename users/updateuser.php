<?php
    session_start();
    require_once '../validateadmin.php';
    require_once "../core/class/User.php";
    // Validación
        if(empty($_POST['name'])){
            $_SESSION['error'] = 'No ha indicado el nombre';
        }else if(empty($_POST['email'])){
            $_SESSION['error'] = 'No has puesto el correo electronico';
        }else if(empty($_POST['rol'])){
            $_SESSION['error'] = 'No has indicado el tipo de usuario';
        }

        if(!empty($_SESSION['error'])){
            header('Location: edituser.php');
            return;
        }

        //editar
        $date = date('Y-m-d H:i:s');
        $id = $_POST['id'];
        $data = [
            "name" => trim($_POST['name']),
            "email" => trim($_POST['email']),
            "rol" => $_POST['rol'],
            "update" => $date,
        ];
        $user = new User;
        
        if($user->update($id, $data)){
            $_SESSION['success'] = "Usuario actualizado de forma exitosa";
            unset($_SESSION['data']);
        }else{
            $_SESSION['error'] = "Error, intente nuevamente y si persiste, comuniquese con el WebMaster";
        };
        header("Location: users.php");