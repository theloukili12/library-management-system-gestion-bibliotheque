
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/log_style.css" />
    <title>UCD</title>
</head>

<body>
    <!-- Container -->
    <div class="container" id="container">
        <!-- Row -->
        <div class="row">
            <!-- page de connexion pour les etudiants -->
            <div id="sign-in" class="col align-center flex-col sign-up">
                <div class="form-wrapper align-center">
                    <form class="form sign-up"  action="db/config.php" method="POST">
                        <div class="input-group">
                            <i class="bx bxs-user"></i>
                            <input type="password" placeholder="Scanner votre code-barres ou saisir votre CIN" name="user" required/>
                        </div>
                    </form>

                </div>


            </div>
            <!-- fin de page de connexion pour les etudiants -->
            <!-- page de connexion pour les administrateurs-->
            <div class="col align-center flex-col sign-in">
                <div class="form-wrapper align-center" >

                        <button id="sign-up">Connectez-Vous</button>
                </div>

            </div>
            <!-- fin page de connexion pour les administrateurs -->
        </div>
        <!-- End Row -->

        <!-- Script -->
        <script src="js/log.js"></script>
</body>

</html>