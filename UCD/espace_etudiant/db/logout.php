<?php 

    session_start();
    unset($_SESSION['cne']);
    unset($_SESSION['cnietd']);

    header("location: ../login.php")

?>