<?php 

    session_start();
    unset($_SESSION['cin']);
    unset($_SESSION['nc']);
    header("location:../login.php")

?>