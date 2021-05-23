<?php 
    include "../db/db_conn.php";

    session_start();
    if(!$_SESSION['cin']){
        header("location:login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-
    scale=1" />
    <title>UCD</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css" />


</head>

<body>
<?php include_once 'sidbar_element.php'; ?>

    <div class="main-content">

        <main>
            

            <section class="recent">
                <div class="activity-grid">
                <h2 class="dash-title" >Les etudiants avec le plus nombres d'emprunts</h2>
                    <div class="activity-card">
                        <div class="table-responsive">
                            <table>
                                
 
                                <thead>                                                             
                                   <tr>
                                        <th>NOM COMPLET D'ETUDIANT</th>
                                        <th>NOMBRES D'EMPRUNTS</th>

                                    </tr>
                                </thead>
                                <?php 
                                
                                include "../db/db_conn.php";
                                $sql = "SELECT  CONCAT( etudiant.nometd,' ',etudiant.prenometd) as nc,COUNT(pret.id_emp) as nbr FROM pret,etudiant WHERE pret.cne_etd = etudiant.cne_etd  GROUP BY etudiant.nometd ORDER BY COUNT(pret.id_emp) LIMIT 10";
                                $result = mysqli_query($conn, $sql);
                                while($row=mysqli_fetch_assoc($result)){ ?>
                                <tbody>
                                        <td> <?php echo strtoupper($row['nc']); ?></td>
                                        <td><?php echo $row['nbr'];?></td>
                                        

                                    	<?php }?>

                                    

                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="summary" >
                         <div class="summary-card" style="background: none;">
                                <button class='badge success' >
                                <a href="../db/etd_plus_activ.php" target="_blank">Imprimmer les donneés</a>
                                </button>
                        </div>
                    </div>
                </div>

            </section>




        </main>

    </div>



</body>




</html>