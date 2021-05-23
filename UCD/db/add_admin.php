<?php 

                include "db_conn.php";
                $sql = "SELECT count(*) as nbr from administrateur";
                $result2 = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result2) == 1) {
                    $row2 = mysqli_fetch_assoc($result2);
                    $nbradm = $row2['nbr']+1;
                }
                $cin = strtoupper($_POST['cin']);
                $nom = strtoupper($_POST['nom']);
                $prenom =strtoupper($_POST['prenom']);
                $codbar = $nbradm.date("mdy");
                $sql = "INSERT INTO administrateur 
                values('$cin','$nom','$prenom',concat('FSE00','$codbar'))";
                echo $sql;
               $result = mysqli_query($conn, $sql);
        
               if ($result === true) {

                        header("Location: ../administrateur.php");
                        exit();
                }else{
                        header("Location: ../login.php");
                        exit();
                        } 
 
?>