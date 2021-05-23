<?php 
    setlocale(LC_TIME, 'fra_fra');
    include "db/db_conn.php";
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
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css" />
    <script src="JsBarcode.all.min.js"></script>

</head>

<body>
    <?php include_once 'elements/sidbar.php'; ?>

    <div class="main-content">
        <?php include_once 'elements/header.php'; ?>

        <main>
            <?php include_once 'elements/statistique.php'; ?>


            <section class="recent">
                <div class="activity-grid">
                    <!-- <div class="activity-card">
                        <h3>Liste des Utilisateurs</h3>
                        <div class="table-responsive">
                        <table>
                                
 
                                <thead>                                                             
                                   <tr>
                                        <th>CIN Administrateur</th>
                                        <th>Nom Administrateur</th>
                                        <th>Prenom Administrateur</th>
                                        <th>Statuts</th>
                                    </tr>
                                </thead>
                                <?php 

                                include "db/db_conn.php";
                                $sql = "SELECT * FROM administrateur";
                                $result = mysqli_query($conn, $sql);
                                while($row=mysqli_fetch_assoc($result)){ 
                                echo "<tbody>";

                                        echo "<td>{$row['cinadm']}</td>";
                                        echo "<td>{$row['prenomadm']}</td>";
                                        echo "<td>{$row['nomadm']}</td>";
                                        echo "
                                        <td>
                                            <button class='badge success'>Update</button>
                                            <button class='badge warning'>
                                            <a href='db/logout.php' style='color: #fff;'>Se deconnecter</a> 

                                            </button>
                                        </td>";
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div> -->

                    </div>

                    <div class="summary">

                        <div class="summary-card">
                            <div class="summary-single">
                                <span class="ti-id-badge"></span>
                                <div>
                                    <?php 
                                        include "db/db_conn.php";
                                        $sql = "SELECT count(*) as nbr from administrateur";
                                        $result2 = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result2) == 1) {
                                            $row2 = mysqli_fetch_assoc($result2);
                                            $nbradm = $row2['nbr'];
                                        }

                                    ?>
                                    <h5><?php echo $nbradm; ?></h5>
                                    <small>Nombre des Administrateurs</small>
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
                                        $cin = $_SESSION['cin'];
                                        $sql1 = "select COUNT(pret.cinadm) as nbr from pret WHERE pret.cinadm = '$cin' ";
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
                        <?php include_once 'elements/logout.php'; ?>


                        </div>
                    </div>
                </div>

            </section>




        </main>

    </div>



</body>


</html>
