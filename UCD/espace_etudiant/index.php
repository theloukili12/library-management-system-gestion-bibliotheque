<?php 
    setlocale(LC_TIME, 'fra_fra');
    include "db/db_conn.php";
    session_start();
    if(!$_SESSION['cne'] ){
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
    <link rel="stylesheet" type="text/css" href="css/style_.css" />
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
            <section class="recent">
                <?php include_once 'elements/stat.php'; ?>

                <div class="activity-grid">
                    <h2 class="dash-title" >Les livres emprutés</h2>

                    <div class="activity-card">

                        <div class="table-responsive" style="margin-bottom: 50px;">
                            <table>
                                
 
                                <thead>                                                             
                                   <tr>
                                        <th>TITRE LIVRE</th>
                                        <th>OUVRAGE LIVRE</th>
                                        <th>LANGUE LIVRE</th>
                                        <th>Date EMPRUNT</th>
                                        <th>DATE RETOUR</th>
                                    </tr>
                                </thead>
                                <?php 
                                include 'db/db_conn.php';
                                $cne = $_SESSION['cne'];
                                $sql = "
                                SELECT livre.titreliv,ouvrage.intituleouv,exemplaire.langue,pret.dateaccord, DATE_ADD(pret.dateaccord, INTERVAL 2 DAY) as dt
                                FROM pret ,exemplaire,livre,ouvrage
                                WHERE pret.codexp=exemplaire.codexp AND exemplaire.codliv = livre.codliv AND ouvrage.Codeouv=livre.codouv and pret.cne_etd= '$cne' and pret.dateretour is null
                                ";
                                $result = mysqli_query($conn, $sql);
                                while($row=mysqli_fetch_assoc($result)){ ?>
                                <tbody>

                                        <td> <?php echo $row['titreliv']; ?></td>
                                        <td><?php echo $row['intituleouv'];?></td>
                                        <td><?php echo $row['langue'] ;?></td>
                                        <td><?php echo $row['dateaccord'] ;?></td>
                                        <td><?php echo $row['dt'] ;?></td>

                                    	<?php } ?>

                                    

                                </tbody>
                            </table>
                        </div>
                        </div>

                    <div class="activity-card">

                    <div class="summary" >
                        <div class="summary-card">
                            <div class="summary-single">
                                <span class="ti-id-badge"></span>
                                <div>
                                <?php 
                                        $cne= $_SESSION['cne'];
                                        $sql1 = "SELECT COUNT(*) as nbr
                                        FROM pret WHERE cne_etd LIKE '$cne' and dateretour is NULL";
                                        $result = mysqli_query($conn, $sql1);
                                        if (mysqli_num_rows($result) == 1) {
                                            $row = mysqli_fetch_assoc($result);
                                            $nbr = $row['nbr'];
                                        }

                                    ?>
                                    <h5><?php echo $nbr; ?></h5>
                                    <small>Nombre des Livres deja empruntées</small>
                                </div>
                            </div>
                            <div class="summary-single">
                                <span class="ti-calendar"></span>
                                <div>
                                    <h5><?php echo strftime('%A %d %B %Y, %H:%M');?></h5>
                                    <small>Date D'Aujourd'hui</small>
                                </div>
                            </div>
                            <div class="summary-single">
                                <span class="ti-check-box"></span>
                                <div>
                                <?php 
                                        $cne = $_SESSION['cne'];
                                        $sql1 = "select COUNT(*) as nbr from pret WHERE pret.cne_etd = '$cne' and pret.dateretour is NOT NULL ";
                                        $result = mysqli_query($conn, $sql1);
                                        if (mysqli_num_rows($result) == 1) {
                                            $row = mysqli_fetch_assoc($result);
                                            $nbr = $row['nbr'];
                                        }

                                    ?>
                                    <h5><?php echo $nbr; ?></h5>
                                    <small>Nombre de livres accordés</small>
                                </div>
                            </div>
                        </div>


                        </div>
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
