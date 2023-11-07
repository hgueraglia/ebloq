<?php 
    
    require_once("seguridad.php");

    include("conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emails bloqueados Zimbra</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body class="container pt-4">

<?php

$fecha_actual = getdate();
    echo "FECHA ACTUAL: " . $fecha_actual . "<br>";

    echo "<div class='text-primary'><strong> Año actual: " . $anioActual . "</strong></div>";

    $condicion = strval($_GET["op"]);

?>

<div class="container p-3 my-3 bg-primary text-white"><p class="text-center"><strong>Sistema de registro de emails bloqueados en Zimbra</strong></div></div>

<form action="op.php" method="POST">
<font class="text-muted">Listado completo de </font><font class="text-primary"><strong>emailsBloqueados</strong></font><br>    
    <table class="table table-striped">
    
    <?php
        $contador = 1;
        
        //echo "<td bgcolor=ff9999><div class='p-3'></strong></div></td>";
        
        if($condicion == 117){
            //$consulta = mysqli_query($datos_conexion, "SELECT * FROM `emailsBloqueados`");
            //$consulta = mysqli_query($datos_conexion, "SELECT * FROM `emailsBloqueados` INNER JOIN `usuarios` ON usuarios.idUsuario =  emailsBloqueados.idUsuarioQueBloqueo ORDER BY fechaBloqueo DESC");   
            //$consulta = mysqli_query($datos_conexion, "SELECT * FROM `emailsBloqueados`");
            $consulta = mysqli_query($datos_conexion, "SELECT * FROM `emailsBloqueados` INNER JOIN `usuarios` ON usuarios.idUsuario = emailsBloqueados.idUsuarioQueBloqueo ORDER BY fechaBloqueo DESC");
            
        }
        else{
            //$consulta = mysqli_query($datos_conexion, "SELECT * FROM `emailsBloqueados`");
            //$consulta = mysqli_query($datos_conexion, "SELECT * FROM `emailsBloqueados` INNER JOIN `usuarios` ON usuarios.idUsuario = emailsBloqueados.idUsuarioQueBloqueo WHERE emailsBloqueados.quitadoDeLaLista = 0 ORDER BY fechaBloqueo DESC");

            //$consulta = mysqli_query($datos_conexion, "SELECT * FROM `emailsBloqueados`");
            $consulta = mysqli_query($datos_conexion, "SELECT * FROM `emailsBloqueados` INNER JOIN `usuarios` ON usuarios.idUsuario = emailsBloqueados.idUsuarioQueBloqueo WHERE emailsBloqueados.quitadoDeLaLista = 0 ORDER BY fechaBloqueo DESC");

        }
        

        while ($listar = mysqli_fetch_assoc($consulta)) {// 
            echo "<tr  class='table-info'>";
            echo "<td>&nbsp;&nbsp;</td>";
            echo "<td>";
            echo "<td>" . $contador . "</td>";
            echo "<td>";
            
            //echo "<a href='desbloquear_email.php?param=" . $listar['idEmailsBloqueados'] . "' class='btn btn-danger'>Desbloquear </a> ->> " . $listar['emailBloqueado'] . "<strong> / </strong>" . $listar['motivoBloqueo'] . " <strong> / </strong> <font class='text-success'>" . $listar['fechaBloqueo'] . "</font> <strong> / </strong> Bloqueado por: <font class='text-primary'>" . $listar['nombreDeUsuario'] . "</font>";
            
            
            if($listar['quitadoDeLaLista']==0){
                echo "<a href='desbloquear_email.php?param=";
                echo $listar['idEmailsBloqueados'] . "' class='btn btn-danger'>Desbloquear</a>";
                
            }
            else{
                echo "<a href='#";
                echo $listar['idEmailsBloqueados'] . "' class='btn btn-success'>Desbloqueado</a>";
            }

            echo " ->> " . $listar['emailBloqueado'] . "<strong> / </strong>" . $listar['motivoBloqueo'] . " <strong> / </strong> <font class='text-success'>" . $listar['fechaBloqueo'] . "</font> <strong> / </strong> Bloqueado por: <font class='text-primary'>" . $listar['nombreDeUsuario'] . "</font>";

            echo "</td>";
            $contador++;
        }
        
        //echo "<tr><td></td>";
        /*
        echo "<tr>";
        //echo "<td bgcolor=00ff00><div></strong></div></td>";

        $consulta = mysqli_query($datos_conexion, "SELECT * FROM `mailing` WHERE enviado = 0 ");
    
        echo "<td>";

        while ($listar = mysqli_fetch_assoc($consulta)) {// 
            echo " <font color=ff0000><strong>->> </strong></font> " . $listar['nombre'] . " <font color=FF0000><strong>/</strong></font> " . $listar['apellido'] . " <strong>/ " . $listar['email'] . "</strong> /</strong> " . $listar['asunto'] .  " <font color=FF0000><strong>/</strong></font> " . $listar['parrafo1'] .  " <font color=FF0000><strong>/</strong></font> " . $listar['parrafo2'] . " <font color=FF0000><strong>/</strong></font> " . $listar['nota'] . " <font color=FF0000><strong>/</strong></font> " . $listar['firma'] . "<br>";
        }
        echo "</td>";
        echo "</tr>";
        */
    ?>

    </table>
    <div class="container mt-3">
        <h2>Menú</h2>
        
        <table class="table table-borderless">
            <thead>
            <tr>
                <td width=20px>Nº</td>
                <td>Acción</td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td width=20px>1</td>
                <td><a href="home.php" class="btn btn-primary">Volver.</a></td>
            </tr>
            
            </tbody>
        </table>
    </div>

   
    <?php 
    /*
    <form action="envio.php" method="POST">
    <table>
    <tr>
        <td>Contenido de la tabla <strong>mailing</strong>:</td>
        <td></td>
        <td></td>


        echo "<tr><td></td>";
        echo "<td bgcolor=ff9999><div class='p-3'>Enviado = 1</strong></div></td>";

        $consulta = mysqli_query($datos_conexion, "SELECT * FROM `mailing` WHERE enviado = 1 ");
    
        echo "<td bgcolor=ff9999>";

        while ($listar = mysqli_fetch_assoc($consulta)) {// 
            echo " <font color=ff0000><strong>->> </strong></font> " . $listar['nombre'] . " " . $listar['apellido'] . " <strong>/</strong> " . $listar['email'] . "<br>";
        
        }
        echo "</td>";
        
        echo "<tr><td></td>";
        echo "<td bgcolor=00ff00><div>Enviado = 0</strong></div></td>";

        $consulta = mysqli_query($datos_conexion, "SELECT * FROM `mailing` WHERE enviado = 0 ");
    
        echo "<td>";

        while ($listar = mysqli_fetch_assoc($consulta)) {// 
            echo " <font color=ff0000><strong>->> </strong></font> " . $listar['nombre'] . " <font color=FF0000><strong>/</strong></font> " . $listar['apellido'] . " <strong>/ " . $listar['email'] . "</strong> /</strong> " . $listar['asunto'] .  " <font color=FF0000><strong>/</strong></font> " . $listar['parrafo1'] .  " <font color=FF0000><strong>/</strong></font> " . $listar['parrafo2'] . " <font color=FF0000><strong>/</strong></font> " . $listar['nota'] . " <font color=FF0000><strong>/</strong></font> " . $listar['firma'] . "<br>";
        
        }
        echo "</td>";

    */
        
    
    /*
    </table>
    <div class="text-danger"><br><br><strong>ATENCIÓN !!!! >>> si continúa se realizará un envío masivo de correos electrónicos <<<</strong><br><br><br></div>
    <a href="importar.php" class="btn btn-secondary">Importar Destinatarios desde Excel</a><br><br>
    <a href="excel.php" class="btn btn-info">Exportar tabla mailing a Excel</a><br><br>
    <button type="submit" class="btn btn-primary">Realizar envio de correos electrónicos</button>

    </form>
*/
?> 
<br>
<?php 
    
    //<a href=tablero_control.php>Ver Tablero de Control de Tablas</a>

?>

<!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>
</html>