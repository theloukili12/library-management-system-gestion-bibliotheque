<?php 
    include "db_conn.php";

    if (isset($_GET['del'])) {
        
        $cin = $_GET['del'];
        $sql = "DELETE FROM administrateur WHERE cinadm='$cin'";
        $result = mysqli_query($conn, $sql);
        if ($result === true) {

            header("Location: ../administrateur.php");
            exit();
        }else{
            header("Location: ../login.php");
            exit();
        }
    } 
?>