<?php 
            include "db_conn.php";
            session_start();
            $isbn = strtoupper($_POST['isbn']);
            $edt = strtoupper($_POST['edt']);
            $date = strtoupper($_POST['date']);
            $lan = strtoupper($_POST['lan']);
            $sql = "INSERT INTO exemplaire( dateexp, codliv, nomedt, langue)
            values('$date','$isbn','$edt','$lan');";
            
            $result = mysqli_query($conn, $sql);
    
            if ($result === true) {

                    header("Location: ../livres.php");
                    exit();
            }else{
                header("Location: ../login.php");
                exit();
                }

?>