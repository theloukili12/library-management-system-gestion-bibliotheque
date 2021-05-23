<?php 
		include "db_conn.php";
		session_start();

        $cne = $_POST['user'];
		$sql = "SELECT * FROM etudiant WHERE cne_etd LIKE '$cne' OR codbar LIKE '$cne'";
        
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) == 1) {
				$row = mysqli_fetch_assoc($result);
                $_SESSION['cinetd'] = $row['CIN'];
                $_SESSION['cne'] = $row['cne_etd'];
                $_SESSION['nc'] = $row['nometd'] .' '. $row['prenometd'];
            	header("Location: ../index.php");
		        exit();
		}
	    
    
