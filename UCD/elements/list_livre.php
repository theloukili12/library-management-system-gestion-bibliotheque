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
                    <form class="form" id="myform" action="list_livre.php" method="POST">
                        <div class="search-wrapper">
                            <span class="ti-search"></span>
                            <input type="search" placeholder="search" name="isbn">
                        </div>
                    </form>
                    <div class="social-icons">

                        <div></div>
                    </div>
        </header>
        <main>
            

            <section class="recent">
                <div class="activity-grid">
                <h2 class="dash-title" >Liste des Livres :</h2>
                    <div class="activity-card">
                        <div class="table-responsive">
                            <table>
                                
 
                                <thead>                                                             
                                   <tr>
                                        <th>ISBN LIVRE</th>
                                        <th>TITRE LIVRE</th>
                                        <th>NOMBRE DE PAGES</th>
                                        <th>OUVRAGE</th>
                                        <th>AUTEUR</th>
                                    </tr>
                                </thead>
                                <?php 
                                    if(isset($_POST['isbn'])){
                                   include "../db/db_conn.php";
                                    $isbn=$_POST['isbn'];
                                    $sql = "SELECT livre.codliv,livre.titreliv,livre.nbrpages,livre.nomaut,ouvrage.intituleouv
                                    from livre,ouvrage
                                    where ouvrage.Codeouv=livre.codouv and(livre.codliv = '$isbn' OR livre.titreliv LIKE '%$isbn%' OR ouvrage.intituleouv LIKE '%$isbn%' OR livre.nomaut LIKE '%$isbn%')";
                                    $result = mysqli_query($conn, $sql);
                                    while($row=mysqli_fetch_assoc($result)){ ?>
                                    <tbody>
                                            <td> <?php echo strtoupper($row['codliv']); ?></td>
                                            <td><?php echo $row['titreliv'];?></td>
                                            <td><?php echo strtoupper($row['nbrpages']) ;?></td>   
                                            <td><?php echo strtoupper($row['intituleouv']) ;?></td>   
                                            <td><?php echo strtoupper($row['nomaut']) ;?></td>   
                                           
                                            <?php } }?>
                                
                                
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div class="summary" >
                         <div class="summary-card" style="background: none;">
                                <button class='badge success' >
                                    <a href="details_livre.php?isbn=<?php echo $isbn; ?>">PLUS DE DETAILS</a>
                                </button>
                        </div>
                    </div>
                </div>

            </section>




        </main>

    </div>



</body>




</html>