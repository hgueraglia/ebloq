


<?php 

$user = "hgueraglia";
$pass = "Sdkfz251";

// echo print_r($_POST); die();

if($_POST['user'] == $user && $_POST['password'] == $pass) {

    session_start();

    $_SESSION['logeado'] = 1;


    echo print_r($_POST);

    header("location: home.php");

} else {
    header("location: index.php?error=validacionError");
}

?>