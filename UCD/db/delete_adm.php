<?php 
            include "db_conn.php";
            session_start();
            $cin = $_SESSION['cin'];
            $sql = "DELETE FROM `administrateur` WHERE cinadm like '$cin'";
            
            $result = mysqli_query($conn, $sql);
    
            if ($result === true) {

                    header("Location: logout.php");
                    exit();
            }else{
                    header("Location: ../index.php");
                    exit();
                }

?>