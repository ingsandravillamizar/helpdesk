<?php
    require_once 'core/class/User.php';

    $user = new User();
    var_dump($user->selectAll());
    echo "<hr>";

    print_r($user->selectById(1));

    echo "<hr>";
    $date = date('Y-m-d H:i:s');

    //     $data = [
    //     'name'      => 'Michael Jackson',
    //     'email'     => 'jackson@test.com', 
    //     'password'  => '123456',
    //     'rol'       => 'Administrador',
    //     'create'    => $date,
    //     'update'    => $date
    // ];
    // if($user->create($data)){
    //     echo "Registro insertado...";
    // }else{
    //     echo "No se pudo realizar el registro";
    // }



    //  if($user->delete(9)){
    //     echo "Registro eliminado...";
    //  }else{
    //      echo "No se pudo eliminar el registro";
    //  }


    // $data = [
    //     'name' => 'Jennifer Lopez',
    //     'email' => 'jlo@test.com', 
    //     'password' => '123456',
    //     'rol' => 'Cliente',
    //     'update' => $date
    // ];
    // if($user->update(3, $data)){
    //     echo "Registro actualizado...";
    // }else{
    //     echo "No se pudo actualizar el registro";
    // }