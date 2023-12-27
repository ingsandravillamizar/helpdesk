<?php
try {
    $conexion = new mysqli('localhost', 'root', 'svillamizar', 'helpdesk');
    echo ('conexion exitosa');
} catch (\Throwable $th) {
    echo "Error de conexion a la base de datos...." . $th->getMessage();
}
?>


