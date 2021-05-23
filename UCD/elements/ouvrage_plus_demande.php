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
    <style>

        .wrapper{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        max-width: 350px;
        width: 100%;
        background: #fff;
        padding: 25px;
        border-radius: 5px;
        box-shadow: 4px 4px 2px rgba(2,117,129, 0.8); 
        }

        .wrapper h2{
        text-align: center;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 3px;
        color: #332902;
        }

        .wrapper .input_field{
        margin-bottom: 10px;
        }

        .wrapper .input_field input[type="text"],
        .wrapper textarea{
        border: 1px solid #e0e0e0;
        width: 100%;
        padding: 10px;
        }

        .wrapper textarea{
        resize: none;
        height: 80px;
        }

        .wrapper .btn input[type="submit"]{
        border: 0px;
        margin-top: 15px;
        padding: 10px;
        text-align: center;
        width: 100%;
        background: var(--main-color);
        color: var(--color-dark);
        text-transform: uppercase;
        letter-spacing: 5px;
        font-weight: bold;
        border-radius: 25px;
        cursor: pointer;
        }

        #error_message{
        margin-bottom: 20px;
        background: #fe8b8e;
        padding: 0px;
        text-align: center;
        font-size: 14px;
        transition: all 0.5s ease;
        }

    </style>

</head>


<body>
<?php include_once 'sidbar_element.php'; ?>

    <div class="main-content">

        <main>
        <section class="recent">

                <div class="activity-grid">
                    <h2 class="dash-title" >Liste des ouvrages le <span style="color: rgb(19, 195, 22);"> plus </span>demandés :</h2>

                    <div class="activity-card">

                        <div class="table-responsive">
                            <table>
                                
 
                                <thead>                                                             
                                   <tr>
                                        <th>Code Ouvrage</th>
                                        <th>Intitule d'Ouvrage</th>
                                        <th>Le nombre des Empruntes </th>
                                    </tr>
                                </thead>
                                <?php 

                                $sql = "Select  ouvrage.codeouv,ouvrage.intituleouv,count(pret.codexp) as nbr
                                FROM pret , exemplaire,livre,ouvrage
                                WHERE pret.codexp= exemplaire.codexp and 					livre.codliv=exemplaire.codliv and 			  ouvrage.Codeouv=livre.codouv
                                GROUP BY ouvrage.intituleouv
                                ORDER by nbr
                                ";
                                $result = mysqli_query($conn, $sql);
                                while($row=mysqli_fetch_assoc($result)){ ?>
                                <tbody>
                                        <td> <?php echo $row['codeouv']; ?></td>
                                        <td> <?php echo $row['intituleouv']; ?></td>
                                        <td><?php echo $row['nbr'];?></td>


                                    	<?php } ?>

                                    

                                </tbody>
                            </table>
                        </div>


                        
            

                    </div>
                    <div class="summary" >
                         <div class="summary-card" style="background: none;">
                                <button class='badge success' >
                                <a href="../db/ouvrage_plus_demande.php" target="_blank">Imprimmer les donneés</a>
                                </button>
                        </div>
                    </div>
                    </div>



            </section>

        </main>

    </div>



</body>




</html>
