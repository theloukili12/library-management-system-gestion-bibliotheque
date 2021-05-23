<?php 

                include "db_conn.php";
                $sql = "SELECT count(*) as nbr from etudiant";
                $result2 = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result2) == 1) {
                    $row2 = mysqli_fetch_assoc($result2);
                    $nbradm = $row2['nbr']+1;
                }
                $cin = strtoupper($_POST['cin']);
                $cne = strtoupper($_POST['cne']);
                $nom = strtoupper($_POST['nom']);
                $pre = strtoupper($_POST['pre']);
                $fil= strtoupper($_POST['ouv']);
                $codbar = $nbradm.date("mdy");

                $sql = "INSERT INTO etudiant
                values('$cne','$cin','$nom','$pre',$fil,concat('FSE00','$codbar'));";
                $result = mysqli_query($conn, $sql);
                if ($result === true) {

                        header("Location: ../administrateur.php");
                        exit();
                }else{
                        header("Location: ../login.php");
                        exit();
                        } 
 
?>