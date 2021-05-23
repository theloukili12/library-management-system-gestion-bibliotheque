<?php 

                include "db_conn.php";
                session_start();
                $cin = $_SESSION['cin'];
                $emp = $_GET['cod'];
                $exp = $_GET['codeexp'];
                $cne= $_GET['cne'];

                $sql = "INSERT INTO `pret`(`cne_etd`, `codexp`, `cinadm`,dateaccord)
                values('$cne',$exp,'$cin',NOW())";
                $sql1 = "DELETE FROM emprunt where codemp = $emp"; 
                $sql2 = "UPDATE exemplaire SET exemplaire.etat=1 WHERE codexp LIKE $exp"; 
                $result1 = mysqli_query($conn, $sql1);
                $result = mysqli_query($conn, $sql);
                $result2 = mysqli_query($conn, $sql2);

                if ($result === true && $result1 == true && $result2 == true) {

                        header("Location: ../index.php");
                        exit();
                }else{
                        echo $sql;
                        exit();
                        } 
?>