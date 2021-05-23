<?php 
    include "db/db_conn.php";
    session_start();
    $cin = $_SESSION['cin'];
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
    <script src="JsBarcode.all.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css" />
    <style>
          .disabled{
        cursor: default;
        pointer-events: none;        
        text-decoration: none;
        color: grey;
      }
    </style>
</head>

<body>
    <?php include_once 'elements/sidbar.php'; ?>

    <div class="main-content">
        <?php include_once 'elements/header.php'; ?>

        <main>
            <?php include_once 'elements/statiques_livre.php'; ?>


        <section class="recent">
        <div class="activity-grid">

        <h2 class="dash-title" >Livre empruntee aujourd'hui</h2>

        <div class="activity-card">

            <div class="table-responsive">
                <table>
                    

                    <thead>                                                             
                       <tr>
                            <th>ISBN LIVRE</th>
                            <th>TITRE LIVRE</th>
                            <th>CNE Etudiant</th>
                            <th>DATE EMPRUNT</th>
                            <th>DATE RETOUR</th>

                        </tr>
                    </thead>
                    <?php 

                    $sql = "
                    Select l.codliv,l.titreliv , etd.cne_etd ,p.dateretour, p.dateaccord
                    from pret p , exemplaire e , livre l ,etudiant etd
                    where p.codexp = e.codexp && l.codliv = e.codliv 
                    AND DAY(p.dateaccord) = DAY(NOW())
                    AND MONTH(p.dateaccord) = MONTH(NOW())
                    AND YEAR(p.dateaccord) = YEAR(NOW())
                    AND p.cne_etd = etd.cne_etd
                    and p.cinadm LIKE '$cin'        
                    ";
                    $result = mysqli_query($conn, $sql);
                    while($row=mysqli_fetch_assoc($result)){ ?>
                    <tbody>

                            <td> <?php echo strtoupper($row['codliv']) ; ?></td>
                            <td><?php echo strtoupper($row['titreliv']);?></td>
                            <td><?php echo $row['cne_etd'] ;?></td>
                            <td><?php echo $row['dateaccord'] ;?></td>
                            <?php if ($row['dateretour'] == ""){?>
                            <td><?php echo "PAS ENCORE";?></td>
                            <?php }else{ ?>
                                <td><?php echo $row['dateretour'] ;?></td>

                            <?php }} ?>

                        

                    </tbody>
                </table>
            </div>
            

        </div>
                    <div class="summary" >
                         <div class="summary-card" style="background: none;">
                                <button class='badge success' >
                                    <a href="elements/ajout_livre.php">Ajoutez-vous un nouveau livre</a>
                                </button>
                        </div>
                        <div class="summary-card" style="background: none;">
                            <button class='badge success' >
                                    <a href="elements/ajout_exp.php">Ajoutez-vous un nouveau exemplaire</a>
                                    </button>
                            </div>
                            <div class="summary-card" style="background: none;">
                                <button class='badge success' >
                                    <a href="elements/graphe.php">GRAPHE POUR LE NOMBRE DES LIVRES DANS CHAQUE OUVRAGE </a>
                                </button>
                        </div>
                     
                        <?php include_once 'elements/logout.php'; ?>
            

                    </div>

                    </div>
                </div>

            </section>




        </main>

    </div>



</body>


</html>
