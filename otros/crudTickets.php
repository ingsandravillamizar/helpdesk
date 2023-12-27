<?php
require_once 'core/class/Ticket.php';

$ticket = new Ticket();
var_dump($ticket->selectAll());
echo "<hr>";

print_r($ticket->selectById(1));

echo "<hr>";
$date = date('Y-m-d H:i:s');

// $data = [
//     'area'      => 'contabilidad',
//     'title'     => 'mantenimiento de equipos',
//     'status'  => 'pendiente',
//     'create'    => $date,
//     'user_id'    => 1
// ];
// if ($ticket->create($data)) {
//     echo "Registro insertado...";
// } else {
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