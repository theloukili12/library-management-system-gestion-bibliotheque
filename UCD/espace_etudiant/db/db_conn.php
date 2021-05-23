<?php 
    $sname = "localhost";
    $pass = "";
    $uname = "root";
    $db_name="LPABD_Loukili_jaouani";

    $conn = mysqli_connect($sname,$uname,$pass,$db_name);

    if(!$conn){
        echo "Connection failed !";
    }


?>