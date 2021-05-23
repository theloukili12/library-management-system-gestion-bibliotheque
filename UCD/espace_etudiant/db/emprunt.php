<?php 

                include "db_conn.php";
                session_start();
                $code = $_POST['codeexp'];
                $cin = $_SESSION['cinetd'];
                $cne = $_SESSION['cne'];
                $date = date('d-m-y h:i:s');
                $sql = "INSERT INTO `emprunt`( `dateemp`, `cin`, `cne`, `codexp`)
                values(NOW(),'$cin','$cne',$code);";

                $result = mysqli_query($conn, $sql);
                        
                if ($result === true) {

                        header("Location: ../index.php");
                        exit();
                }else{
                    header("Location: ../login.php");
                    exit();
                    }
 
?>