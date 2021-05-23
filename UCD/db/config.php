<?php 
include "db_conn.php";
session_start(); 

if(isset( $_POST['user'])){
        $name = $_POST['user'];
		echo $name;
		$sql = "SELECT * FROM administrateur WHERE (cinadm LIKE '$name') OR (codbar LIKE '$name')";
        
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) == 1) {

			$row = mysqli_fetch_assoc($result);
            
            if(isset( $_POST['user'])){
                $name = $_POST['user'];

            if ($row['cinadm'] == $name  || $row['codbar']==$name) {
                $_SESSION['cin'] = $row['cinadm'];
                $_SESSION['nc'] = $row['nomadm'] .' '. $row['prenomadm'];
            	header("Location: ../index.php");
		        exit();
            }else{
				header("Location: ../login.php#sign-in?error=Incorect User name or ");
		        exit();
				}
        }
		}else{
			header("Location: ../login.php?error=Incorect User name or password ");
	        exit();
		
	    }
        function phpAlert($msg)
        {
            echo '<script type="text/javascript">alert("' . $msg . '")</script>';
        }
}
    
