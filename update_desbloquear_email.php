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
    echo "<div class='text-primary'><strong> Año actual: " . $anioActual . "</strong></div>";
    $idEmailsBloqueados = $_GET["param"];
    //echo "<div class='text-primary'><strong> idEmailsBloqueados: " . $idEmailsBloqueados . "</strong></div>";
    $id = intval($idEmailsBloqueados);
    //var_dump(is_int($id));
    $idUsuario = $_GET["idusuario"];
    $idu = intval($idUsuario);
    var_dump(is_int($idu));
    
?>

<div class="container p-3 my-3 bg-primary text-white"><p class="text-center"><strong>Sistema de registro de emails bloqueados en Zimbra</strong></div></div>

<font class="text-primary"><strong>Desbloquear Email: </strong></font><br>    
        
    <?php
        
        //$consulta = mysqli_query($datos_conexion, "SELECT * FROM `emailsBloqueados`");
        $consulta = mysqli_query($datos_conexion, "UPDATE emailsBloqueados SET quitadoDeLaLista = 1 WHERE emailsBloqueados.idEmailsBloqueados = $id");

        //echo $consulta . "<br>";

        //while ($listar = mysqli_fetch_assoc($consulta)) {// 
        //}

/*        while ($listar = mysqli_fetch_assoc($consulta)) {// 
            echo "<p  class='text-primary'> Email Bloqueado: <font class='text-dark'>" . $listar['emailBloqueado'] . "</font></p>";
            echo "<p  class='text-primary'> Fecha de Bloqueo: <font class='text-dark'>" . $listar['fechaBloqueo'] . "</font></p>";
            echo "<p  class='text-primary'> Motivo del Bloqueo: <font class='text-dark'>" . $listar['motivoBloqueo'] . "</font></p>";
            echo "<p  class='text-primary'> id de Email Bloqueo: <font class='text-dark'>" . $listar['idEmailsBloqueados'] . "</font></p>";
            echo "<p  class='text-primary'> Usuario que Bloqueó el email: <font class='text-dark'>" . $listar['nombreUsuario'] . "&nbsp;" . $listar['apellidoUsuario'] . "</font></p>";
            echo "<p  class='text-primary'> id de Usuario: <font class='text-dark'>" . $listar['idUsuario'] . "</font></p>";
            echo "<p  class='text-primary'> Fecha de desbloqueo: <font class='text-dark'>" . date("Y-m-d") . "</font></p>";
            echo "<p  class='text-primary'> Motivo por el cual se desbloquea la cuenta: <font class='text-dark'><input type='text'  id='motivoDesbloqueo' name='motivoDesbloqueo' size='45' maxlength='130''></font></p>";

        }
*/      
        // ************** Completar en la tabla HISTORIAL lo realizado ************
        
        $consulta = mysqli_query($datos_conexion, "INSERT INTO `historial` (`idHistorial`, `idEmailsBloqueados`, `fecha`, `alta_1_O_baja_0`, `motivo`, `idUsuario`) VALUES (NULL, '" . $id . "', '" . date("Y-m-d") . "', '0', ' ', '" . $idu . "')");
        // ************** /Completar en la tabla HISTORIAL lo realizado ************
    ?>

    <h4><p class="text-primary">Se ha desbloqueado la cuenta de correo electrónico</p></h4>   

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