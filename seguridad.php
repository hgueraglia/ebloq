<?php

session_start();

if($_SESSION['logeado'] != 1) {

    header("location: index.php?error=sesionTerminada");

    session_destroy();

}