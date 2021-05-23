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
    <script src="JsBarcode.all.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css" />


</head>

<body>

    <?php include_once 'elements/sidbar.php'; ?>

    <div class="main-content">
    
    <header>
                    <form class="form" id="myform" action="elements/info_etd.php" method="POST">
                        <div class="search-wrapper">
                            <span class="ti-search"></span>
                            <input type="search" placeholder="search" name="cne">
                        </div>
                    </form>
                    <div class="social-icons">
                        <div></div>
                    </div>
        </header>
        <main>
            <?php include_once 'elements/stat_etd.php'; ?>

            <section class="recent">

                <div class="summary" >
                         <div class="summary-card" style="background: none;">
                                <button class='badge success' >
                                <a href="elements/graphe3.php">GRAPHE POUR LE NOMBRE DE EMPRUNTES POUR CHAQUE FILIERE</a>
                                </button>
                        </div>
                </div>
                <div class="summary" >
                         <div class="summary-card" style="background: none;">
                                <button class='badge success' >
                                <a href="elements/graphe4.php">GRAPHE POUR LE NOMBRE DE ETUDIANTS POUR CHAQUE FILIERE</a>
                                </button>
                        </div>
                </div>
                <?php include_once 'elements/logout.php'; ?>

            </section>




        </main>

    </div>



</body>




</html>
