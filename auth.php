<?php
session_start();
require_once 'core/class/User.php';

if (empty($_POST['email']) || empty($_POST['password'])) {
    $_SESSION['error'] = "Datos incompletos";
    header("Location: login.php");
    return;
}

$user = new User;
$response = $user->searchEmail($_POST['email']);

if (!$response) {
    $_SESSION['error'] = "Correo y/o contraseña inválido ";
    header("Location: login.php");
    return;
}

$inputPassword = trim($_POST['password']);
$hashedPasswordInDatabase = $response[0]['password'];

if (!password_verify($inputPassword, $hashedPasswordInDatabase)) {
    $_SESSION['error'] = "Correo y/o contraseña inválido "  ;
    header("Location: login.php");
    return;
}

// Las contraseñas coinciden, establecer las variables de sesión
$_SESSION['userid'] = $response[0]['id'];
$_SESSION['username'] = $response[0]['name'];
$_SESSION['userrol'] = $response[0]['rol'];
$_SESSION['logged'] = true;

header("Location: index.php");
