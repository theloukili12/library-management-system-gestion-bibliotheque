<?php 
    include "db_conn.php";

    if (isset($_POST['update'])) {

        $cin = $_POST['cin'];
        $nom = $_POST['nom'];
        $pre = $_POST['prenom'];;

        $sql = "UPDATE administrateur SET nomadm='$nom',prenomadm='$pre' WHERE cinadm = '$cin'";       
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