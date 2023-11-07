<?php
//$datos_conexion = mysqli_connect("localhost", "root", "admin", "base de datos") or die("ERROR en la conexión a la DB");
$datos_conexion = mysqli_connect("localhost", "root", "admin", "dbEmailsBloqueados") or die("ERROR en la conexión a la DB");

$consulta = mysqli_query($datos_conexion, "SELECT * FROM variablesDeEntorno");
 
 while ($listar = mysqli_fetch_assoc($consulta)) {// 
    $anioActual =   $listar['anioActual'];
    $idAnioActual = $listar['idAnioActual'];
}
?>