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
    <header>
                    <form class="form" id="myform" action="etd.php" method="POST">
                        <div class="search-wrapper">
                            <span class="ti-search"></span>
                            <input type="search" 
                            placeholder="Rechercher un emprunte " 
                            name="cne">
                        </div>
                    </form>
                    <div class="social-icons">
                        <div></div>
                    </div>
        </header>
        <main>
            

            <section class="recent">
                <div class="activity-grid">
                <h2 class="dash-title" >Liste des Livres empruntee:</h2>
                    <div class="activity-card">
                        <div class="table-responsive">
                            <table>
                                
 
                                <thead>                                                             
                                   <tr>
                                        <th>ISBN LIVRE</th>
                                        <th>TITRE LIVRE</th>
                                        <th>CNE ETUDIANT</th>
                                        <th>OUVRAGE</th>
                                        <th>DATE D'EMPRUNT</th>
                                        <th><div class="ti-settings"></div></th>

                                    </tr>
                                </thead>
                                <?php 
                                    if(isset($_POST['cne'])){
                                   include "../db/db_conn.php";
                                    $cne=$_POST['cne'];
                                    $sql = "
                                    SELECT pret.codexp,pret.id_emp ,livre.codliv,livre.titreliv,pret.dateaccord, DATE_ADD(pret.dateaccord,INTERVAL 2 DAY) as dt ,livre.titreliv,exemplaire.langue ,ouvrage.intituleouv 
                                    FROM ouvrage,pret,exemplaire,livre WHERE pret.dateretour is NULL  and (ouvrage.intituleouv LIKE '$cne' OR
                                    pret.cne_etd like '%$cne%' or livre.codliv like '%$cne%' or livre.titreliv like '%$cne%' ) AND pret.codexp = exemplaire.codexp AND livre.codliv=exemplaire.codliv and ouvrage.Codeouv = livre.codouv";
                                    $result = mysqli_query($conn, $sql);
                                    while($row=mysqli_fetch_assoc($result)){ ?>
                                    <tbody>
                                            <td> <?php echo strtoupper($row['codliv']); ?></td>
                                            <td> <?php echo strtoupper($row['titreliv']); ?></td>
                                            <td><?php echo $cne;?></td>
                                            <td><?php echo strtoupper($row['intituleouv']) ;?></td>   
                                            <td><?php echo strtoupper($row['dateaccord']) ;?></td>   
                                            <td>
                                        <button class='badge success'>
                                            <a href="../db/retour.php?cne=<?php echo $cne; ?>&amp;codeexp=<?php echo $row['codexp']; ?>&amp;emp=<?php echo $row['id_emp']; ?>">Valider</a> 
                                            </button>
                                        </td>
                                            <?php } }?>
                                
                                
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>

            </section>




        </main>

    </div>



</body>




</html>