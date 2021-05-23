<?php 
            include "db_conn.php";
            session_start();
            $isbn = strtoupper($_POST['isbn']);
            $titre = strtoupper($_POST['titre']);
            $nbr = strtoupper($_POST['nbr']);
            $aut = strtoupper($_POST['aut']);
            $ouv = strtoupper($_POST['ouv']);            
            $sql = "INSERT INTO livre(`codliv`, `titreliv`, `nbrpages`, `codouv`, `nomaut`) 
                        values('$isbn','$titre',$nbr,$ouv,'$aut')";
            
            $result = mysqli_query($conn, $sql);
    
            if ($result === true) {

                    header("Location: ../livres.php");
                    exit();
            }else{
                header("Location: ../login.php");
                exit();
                }

?>