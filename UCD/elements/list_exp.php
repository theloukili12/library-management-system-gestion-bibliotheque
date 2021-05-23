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
                    <form class="form" id="myform" action="list_exp.php" method="POST">
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
                <h2 class="dash-title" >Liste Des Exemplaires:</h2>
                    <div class="activity-card">
                        <div class="table-responsive">
                            <table>
                                
 
                                <thead>                                                             
                                   <tr>
                                        <th>ISBN LIVRE</th>
                                        <th>TITRE LIVRE</th>
                                        <th>DATE D'EXEMPLAIRE</th>
                                        <th>EDITEUR</th>
                                        <th>LANGUE</th>
                                    </tr>
                                </thead>
                                <?php 
                                if(isset($_POST['isbn'])){
                                include "../db/db_conn.php";
                                $isbn=$_POST['isbn'];
                                $sql = "select e.codliv,l.titreliv,e.dateexp,e.nomedt,e.langue
                                FROM exemplaire e , livre l , ouvrage o
                                where e.etat = 0 and l.codouv=o.codeouv and l.codliv=e.codliv and (l.codliv = '$isbn' OR l.titreliv LIKE '%$isbn%' OR o.intituleouv LIKE '%$isbn%' OR l.nomaut LIKE '%$isbn%')";
                                $result = mysqli_query($conn, $sql);
                                while($row=mysqli_fetch_assoc($result)){ ?>
                                <tbody>
                                        <td> <?php echo strtoupper($row['codliv']); ?></td>
                                        <td><?php echo $row['titreliv'];?></td>
                                        <td><?php echo strtoupper($row['dateexp']) ;?></td>   
                                        <td><?php echo strtoupper($row['nomedt']) ;?></td>   
                                        <td><?php echo strtoupper($row['langue']) ;?></td>   

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
