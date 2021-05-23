<?php 
    setlocale(LC_TIME, 'fra_fra');
    include "../db/db_conn.php";
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
                <div class="activity-grid">
                <h2 class="dash-title" >Liste des Livres :</h2>
                    <div class="activity-card">
                        <div class="table-responsive">
                            <table>
                                
 
                                <thead>                                                             
                                   <tr>
                                        <th>ISBN LIVRE</th>
                                        <th>TITRE LIVRE</th>
                                        <th>AUTEUR LIVRE</th>
                                        <th>LANGUE LIVRE</th>
                                        <th>OUVRAGE LIVRE</th>
                                        <th><span class="ti-settings"></span></th>
                                    </tr>
                                </thead>
                                <?php 
                                    if(isset($_POST['isbn'])){
                                   include "../db/db_conn.php";
                                    $isbn=$_POST['isbn'];
                                    $sql = "
                                    SELECT exemplaire.codexp,livre.codliv,livre.titreliv,exemplaire.langue,livre.nomaut,ouvrage.intituleouv
                                    from livre,ouvrage,exemplaire
                                    where ouvrage.Codeouv=livre.codouv 
                                    and (livre.codliv = '$isbn' OR livre.titreliv LIKE '%$isbn%' OR ouvrage.intituleouv LIKE '%$isbn%' OR livre.nomaut LIKE '%$isbn%')
                                    and exemplaire.etat=0 and exemplaire.codliv=livre.codliv
                                    ";
                                    $result = mysqli_query($conn, $sql);
                                    while($row=mysqli_fetch_assoc($result)){ ?>
                                    <tbody>
                                            <td> <?php echo strtoupper($row['codliv']); ?></td>
                                            <td><?php echo $row['titreliv'];?></td>
                                            <td><?php echo strtoupper($row['nomaut']) ;?></td>   
                                            <td><?php echo strtoupper($row['langue']) ;?></td>   
                                            <td><?php echo strtoupper($row['intituleouv']) ;?></td>   
                                            <td>
                                            <button class='badge success' >
                                            <a href="elements/details.php?codeexp=<?php echo $row['codexp']; ?>">AFFICHER</a> 
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