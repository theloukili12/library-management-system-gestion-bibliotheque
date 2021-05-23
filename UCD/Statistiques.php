<?php 
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


</head>

<body>
<?php include_once 'elements/sidbar.php'; ?>

    <div class="main-content">
    <?php include_once 'elements/header.php'; ?>

        <main>
            <?php include_once 'elements/statistique.php'; ?>

            <section class="recent">
                    <div class="summary" >
                         <div class="summary-card" style="background: none;">
                                <button class='badge success' >
                                    <a href="elements/graphe5.php">POURCENTAGE DES EMPRUNTES POUR CHAQUE OUVRAGE </a>
                                </button>
                        </div>
                        <div class="summary-card" style="background: none;">
                                <button class='badge success' >
                                    <a href="elements/graphe2.php">GRAPHE POUR LE NOMBRE DES LIVRES EMPRUNTES POUR CHAQUE MOIS </a>
                                </button>
                        </div>
                        <div class="summary-card" style="background: none;">
                            <button class='badge success' >
                                    <a href="elements/graphe1.php">GRAPHE POUR LE NOMBRE DES LIVRES EMPRUNTES DANS LE DERNIER SEMAINE </a>
                                    </button>
                            </div>
                     
                        <?php include_once 'elements/logout.php'; ?>
            

                    </div>
                </div>

            </section>




        </main>

    </div>



</body>




</html>
