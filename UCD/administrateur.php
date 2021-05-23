<?php 
    include "db/db_conn.php";
    session_start();
    if(!$_SESSION['cin']){
        header("location:login.php");
    }
    $cin = $_SESSION['cin'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-
    scale=1" />
    <title>UCD</title>
    <script src="js/JsBarcode.js"></script>

    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css" />


</head>

<body>
<?php include_once 'elements/sidbar.php'; ?>

    <div class="main-content">
    <?php include_once 'elements/header.php'; ?>

        <main>
            	
            <?php include_once 'elements/statistique.php'; ?>

        <section class="recent">
            <div class="activity-grid">
                <h2 class="dash-title" >Liste des Administrateurs :</h2>
                    <div class="activity-card">
                        <div class="table-responsive">
                            <table>
                                
 
                                <thead>                                                             
                                   <tr>
                                        <th>QR</th>
                                        <th>CIN Administrateur</th>
                                        <th>Nom Administrateur</th>
                                        <th>Prenom Administrateur</th>
                                        <th><span class="ti-settings"></span></th>
                                    </tr>
                                </thead>
                                <?php 
                                
                                include "db/db_conn.php";
                                $sql = "SELECT * FROM administrateur";
                                $result = mysqli_query($conn, $sql);
                                while($row=mysqli_fetch_assoc($result)){ ?>
                                <tbody>
                                        <td style="width: 2px;">
                                            <svg class="barcode"
                                                jsbarcode-format="CODE128"
                                                jsbarcode-value=<?php echo  $row['codbar']; ?>
                                                jsbarcode-width="1"
                                                jsbarcode-height="30"
                                                jsbarcode-fontSize="10"
                                            >
                                            </svg>
                                        </td> 
                                        <td id="in"> <?php echo $row['cinadm']; ?></td>
                                        <td><?php echo $row['prenomadm'];?></td>
                                        <td><?php echo $row['nomadm'] ;?></td>   
                                        <td>
                                            <button class='badge success' >
                                            <a href="elements/update_adm.php?edit=<?php echo $row['cinadm']; ?>">Modifier</a> 
                                            </button>

                                            <button class='badge success' >
                                            <a target="blank" href="db/generer_carte_adm.php?adm=<?php echo $row['codbar']; ?>">Genérer La carte</a> 
                                            </button>

                                        </td>
                                    	<?php } ?>


                                    

                                </tbody>
                            </table>
                        </div>  
                    </div>
                    

  
                </div>
                <div class="summary" >
                         <div class="summary-card" style="background: none;">
                                <button class='badge success' >
                                <a href="elements/ajout_adm.php">Ajoutez-vous nouveau admin</a>
                                </button>
                        </div>
                </div>
                    <?php include_once 'elements/logout.php'; ?>

            </section>




        </main>

    </div>
    <script>
        JsBarcode(".barcode").init();
   
    </script>


</body>




</html>
