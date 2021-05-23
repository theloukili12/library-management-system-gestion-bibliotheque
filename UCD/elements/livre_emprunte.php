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
                    <h2 class="dash-title" >Liste Des Livres Empruntes</h2>

                    <div class="activity-card">

                        <div class="table-responsive">
                            <table>
                                
 
                                <thead>                                                             
                                   <tr>
                                        <th>Titre Livre</th>
                                        <th>Cin Admin</th>
                                        <th>CNE Etudiant</th>
                                        <th>Date Emprunt</th>
                                        <th>Date de Retour</th>
                                    </tr>
                                </thead>
                                <?php 

                                $sql = "Select l.titreliv as 'Titre Livre',p.cinadm as 'Cin Admin', etd.cne_etd as ' CNE Etudiant',p.dateretour, p.dateaccord as 'Date Emprunt' 
                                from pret p , exemplaire e , livre l ,etudiant etd
                                where p.codexp = e.codexp and etd.cne_etd = p.cne_etd  &&  l.codliv = e.codliv ";
                                $result = mysqli_query($conn, $sql);
                                while($row=mysqli_fetch_assoc($result)){ ?>
                                    <tbody>

                                        <td> <?php echo $row['Titre Livre']; ?></td>
                                        <td><?php echo $row['Cin Admin'];?></td>
                                        <td><?php echo $row['CNE Etudiant'] ;?></td>
                                        <td><?php echo $row['Date Emprunt'] ;?></td>
                                        <?php if ($row['dateretour'] == ""){?>
                                        <td><?php echo "PAS ENCORE";?></td>
                                        <?php }else{ ?>
                                            <td style="color: red;"><?php echo $row['dateretour'] ;?></td>

                                    	<?php }} ?>

                                    

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="summary" >
                         <div class="summary-card" style="background: none;">
                                <button class='badge success' >
                                    <a href="../db/export_listeemp.php" target="_blank">Imprimmer les donneés</a>
                                </button>
                        </div>
                    </div>




            </section>

        </main>

    </div>



</body>




</html>
