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
                    <form class="form" id="myform" action="dem.php" method="POST">
                        <div class="search-wrapper">
                            <span class="ti-search"></span>
                            <input type="search" 
                            placeholder="Traiter une demande d'emprunte" 
                            name="cne">
                        </div>
                    </form>
                    <div class="social-icons">
                        <div></div>
                    </div>
        </header>
        <main>
        <section class="recent">
                <h2 class="dash-title" >Les demandes actuelles :</h2>
                <div class="activity-grid">
                    <div class="activity-card">
                        <div class="table-responsive">
                            <table>
                                
 
                                <thead>                                                             
                                   <tr>
                                        <th>Titre Livre</th>
                                        <th>Cin Admin</th>
                                        <th>CNE Etudiant</th>
                                        <th>Date Emprunt</th>
                                        <th><span class="ti-settings"></span></th>
                                    </tr>
                                </thead>
                                <?php 
                                    if (isset($_POST['cne']) ) {
                                $cne = $_POST['cne'];
                                $sql = "SELECT exemplaire.codliv,livre.titreliv,emprunt.cne,emprunt.dateemp
                                FROM emprunt,exemplaire,livre
                                WHERE exemplaire.codexp=emprunt.codexp 
                                AND exemplaire.codliv=livre.codliv and emprunt.cne='$cne'";
                                $result = mysqli_query($conn, $sql);
                                while($row=mysqli_fetch_assoc($result)){ ?>
                                <tbody>

                                        <td> <?php echo $row['codliv']; ?></td>
                                        <td><?php echo $row['titreliv'];?></td>
                                        <td><?php echo $row['cne'] ;?></td>
                                        <td><?php echo $row['dateemp'] ;?></td>
                                        <td>
                                        <button class='badge success'>
                                        <a href="../db/accorde.php?cod=<?php echo $row['codemp']; ?>&amp;cin=<?php echo $row['cin']; ?>&amp;codeexp=<?php echo $row['codexp']; ?>&amp;">Valider</a> 
                                            </button>
                                        </td>
                                        

                                    	<?php } }?>

                                    

                                </tbody>
                            </table>
                        </div>
                    </div>



            </section>

        </main>

    </div>



</body>




</html>
