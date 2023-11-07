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
    $cuentaemail = strval($_POST["cuentaemail"]);
    $motivo = strval($_POST["motivo"]);
    $fecha = strval($_POST["fecha"]);
    $usuario = strval($_POST["usuario"]);

    //echo $fecha;
    // Consulta para insertar un email bloqueado a la tabla emailsBloqueados:
    // INSERT INTO `emailsBloqueados` (`idEmailsBloqueados`, `emailBloqueado`, `motivoBloqueo`, `fechaBloqueo`, `idUsuarioQueBloqueo`, `quitadoDeLaLista`) VALUES (NULL, 'BORRAR', 'BORRAR', '2022-11-23', '2', '0');
    $consulta = mysqli_query($datos_conexion, "INSERT INTO `emailsBloqueados` (`idEmailsBloqueados`, `emailBloqueado`, `motivoBloqueo`, `fechaBloqueo`, `idUsuarioQueBloqueo`, `quitadoDeLaLista`) VALUES (NULL, '$cuentaemail', '$motivo', '$fecha', 2, 0)");
    //echo "INSERT INTO `emailsBloqueados` (`idEmailsBloqueados`, `emailBloqueado`, `motivoBloqueo`, `fechaBloqueo`, `idUsuarioQueBloqueo`, `quitadoDeLaLista`) VALUES (NULL, '$cuentaemail', '$motivo', '$fecha', 2, 0;)";
    //echo "INSERT INTO `emailsBloqueados` (`idEmailsBloqueados`, `emailBloqueado`, `motivoBloqueo`, `fechaBloqueo`, `idUsuarioQueBloqueo`, `quitadoDeLaLista`) VALUES (NULL, '$cuentaemail', '$motivo', '$fecha', 2, 0)";
    
?>

<div class="container p-3 my-3 bg-primary text-white"><p class="text-center"><strong>Sistema de registro de emails bloqueados en Zimbra</strong></div></div>

<font class="text-primary"><strong> </strong></font><br>    
        
    <?php
        
           
        // ************************************************************************
        // ************************************************************************
        // ************** Completar en la tabla HISTORIAL lo realizado ************
        // ************************************************************************
        // ************************************************************************
        
        //$consulta = mysqli_query($datos_conexion, "INSERT INTO `historial` (`idHistorial`, `idEmailsBloqueados`, `fecha`, `alta_1_O_baja_0`, `motivo`, `idUsuario`) VALUES (NULL, '" . $id . "', '" . date("Y-m-d") . "', '0', ' ', '" . $idu . "')");
        // ************************************************************************
        // ************************************************************************
        // ************** /Completar en la tabla HISTORIAL lo realizado ***********
        // ************************************************************************
        // ************************************************************************
    ?>

    <h4><p class="text-primary">Se ha agregado la cuenta de correo electrónico </p><p class="text-success"><?php echo $cuentaemail ?>@frro.utn.edu.ar</p><p class="text-primary"> a la base de datos de emails bloqueados</p></h4>   

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
 
?> 
<br>
<?php 
    
    //<a href=tablero_control.php>Ver Tablero de Control de Tablas</a>

?>

<!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>
</html>