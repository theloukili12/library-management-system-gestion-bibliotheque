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
    <script src="../js/JsBarcode.js"></script>


</head>

<body>
<?php include_once 'sidbar_element.php'; ?>

    <div class="main-content">
    <header>
                    <form class="form" id="myform" action="info_etd.php" method="POST">
                        <div class="search-wrapper">
                            <span class="ti-search"></span>
                            <input type="search" placeholder="search" name="cne">
                        </div>
                    </form>
                    <div class="social-icons">
                        <div></div>
                    </div>
        </header>
        <main>
            

            <section class="recent">
                <div class="activity-grid">
                <h2 class="dash-title" >Liste des etudiants :</h2>
                    <div class="activity-card">
                        <div class="table-responsive">
                            <table>
                                
 
                                <thead>                                                             
                                   <tr>
                                        <th>CODE BARRE</th>
                                        <th>CNE ETUDIANT</th>
                                        <th>CIN ETUDIANT</th>
                                        <th>NOM COMPLET</th>
                                        <th>Filiere</th>
                                        <th><div class="ti-settings"></div></th>

                                    </tr>
                                </thead>
                                <?php 
                                
                                
                                if(isset($_POST['cne'])){
                                    $cne = $_POST['cne'];
                                    $sql = "SELECT etudiant.*,filiere.intitulefil
                                FROM etudiant ,filiere 
                                WHERE etudiant.codfil = filiere.Codfil and (etudiant.cne_etd like '%$cne%' or filiere.intitulefil like '%$cne%' or etudiant.nometd like '%$cne%' or etudiant.prenometd like '%$cne%' )";
                                $result = mysqli_query($conn, $sql);
                                while($row=mysqli_fetch_assoc($result)){ ?>
                                
                                <tbody>
                                        <td>
                                            <svg class="barcode"
                                                jsbarcode-format="CODE128"
                                                jsbarcode-value=<?php echo $row['codbar']; ?>
                                                jsbarcode-width="1"
                                                jsbarcode-height="30"
                                                jsbarcode-fontSize="10"
                                            >
                                            </svg>
                                        </td>
                                        <td> <?php echo $row['cne_etd']; ?></td>
                                        <td><?php echo $row['CIN'];?></td>
                                        <td><?php echo $row['nometd'].' '.$row['prenometd'] ;?></td>   
                                        <td><?php echo $row['intitulefil'];?></td>   
                                        <td>
                                            <button class='badge success' >
                                                <a target="_blank" href="../db/generer_carte_etd.php?etd=<?php echo $row['codbar']; ?>">Genérer LA CARTE ETUDIANT</a> 
                                            </button>
                                            <button class='badge success' >
                                                <a href="../elements/details_etd.php?etd=<?php echo $row['cne_etd']; ?>">Plus d'informations</a> 
                                            </button>
                                        </td>
                                    	<?php }  }?>
                                
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </section>




        </main>

    </div>

    <script>
        JsBarcode(".barcode").init();
   
    </script>

</body>




</html>