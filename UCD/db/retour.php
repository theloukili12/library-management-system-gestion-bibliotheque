<?php 

                include "db_conn.php";
                session_start();
                $emp = $_GET['emp'];
                $exp = $_GET['codeexp'];
                $cne= $_GET['cne'];
                
                $sql = "UPDATE pret SET dateretour = NOW() where id_emp=$emp";
                $sql1= "UPDATE exemplaire SET etat = 0 Where codexp=$exp";
                $sql2 = "
                SELECT IF(NOW() >DATE_ADD(dateaccord,INTERVAL 2 DAY), 'YES','NO') as n FROM pret 
                where pret.cne_etd = '$cne' and pret.id_emp = $emp
                ";
                $result2 = mysqli_query($conn, $sql2);
                $row=mysqli_fetch_assoc($result2);
                echo $row['n'];
                if($row['n']=='YES'){
                        
                        $sql3 = "INSERT INTO puner(cneetd) VALUE( '$cne')";
                        echo $sql3;
                        $sql4 = "SELECT count(*) as nbr from puner where cneetd Like '$cne'";
                        $result3 = mysqli_query($conn, $sql3);
                        $result4 = mysqli_query($conn, $sql4);
                        $row1=mysqli_fetch_assoc($result4);
                        if($row1['nbr'] >= 3){
                                $sql5 = "DELETE FROM etudiant where cne_etd like '$cne'";
                                $result5 = mysqli_query($conn, $sql5);
                                if ($result5 == true) {
                                        $sql6 = "DELETE FROM puner where cneetd like '$cne'";
                                        $result6 = mysqli_query($conn, $sql6);
                                        $message='L\'étudiant '.$cne .'ne peut plus avoir recours à l\'emprunt de livres.';
                                        echo '<script type="text/javascript">window.alert("'.$message.'");</script>'; 
                                       
                                }
                                
                        } 

                }

                $result1 = mysqli_query($conn, $sql1);
                $result = mysqli_query($conn, $sql);
                if ($result === true && $result1 == true) {
                               
                                header("Location: ../index.php");
                                exit();
                        

                }else{
                        echo $sql;
                        exit();
                        } 

?>