<?php 
    $sname = "localhost";
    $pass = "";
    $uname = "root";
    $db_name="LPABD_LOUKILI_JAOUANI";

    $conn = mysqli_connect($sname,$uname,$pass,$db_name);

    if(!$conn){
        echo "Connection failed !";
    }


?>