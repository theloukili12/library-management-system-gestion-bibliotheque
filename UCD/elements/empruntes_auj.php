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
                    <h2 class="dash-title" >Livre empruntee aujourd'hui</h2>

                    <div class="activity-card">

                        <div class="table-responsive">
                            <table>
                                
 
                                <thead>                                                             
                                   <tr>
                                        <th>Titre Livre</th>
                                        <th>Cin Admin</th>
                                        <th>CNE Etudiant</th>
                                        <th>Date Emprunt</th>
                                        <th>Date Retour</th>

                                    </tr>
                                </thead>
                                <?php 

                                $sql = "
                                Select l.titreliv ,p.cinadm , etd.cne_etd ,p.dateretour, p.dateaccord from pret p , exemplaire e , livre l ,etudiant etd where p.codexp = e.codexp && l.codliv = e.codliv AND DAY(p.dateaccord) = DAY(NOW())AND MONTH(p.dateaccord) = MONTH(NOW())AND YEAR(p.dateaccord) = YEAR(NOW())  AND p.cne_etd = etd.cne_etd              ";
                                $result = mysqli_query($conn, $sql);
                                while($row=mysqli_fetch_assoc($result)){ ?>
                                <tbody>

                                        <td> <?php echo $row['titreliv']; ?></td>
                                        <td><?php echo $row['cinadm'];?></td>
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
                                <a href="../db/empruntes_auj.php" target="_blank">Imprimmer les donneés</a>
                                </button>
                        </div>
                    </div>
                    </div>



            </section>

        </main>

    </div>



</body>




</html>
