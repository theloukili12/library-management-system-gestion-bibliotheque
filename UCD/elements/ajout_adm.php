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
        box-shadow: 4px 4px 2px rgba(2,72,129, 0.8); 
        }

        .wrapper h2{
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 25px;
            color: var(--main-color);
            text-transform: uppercase;
            text-align: center;
        }

        .wrapper .input_field{
        margin-bottom: 10px;
        }

        .wrapper .input_field input[type="text"]{
            width: 100%;
            outline: none;
            border: 1px solid var(--main-color-trans);
            font-size: 15px;
            padding: 8px 10px;
            border-radius: 20px;
            transition: all 0.3s ease;
            text-align: center;
        }


        .wrapper .btn input[type="submit"]{
                border: 0px;
                margin-top: 15px;
                padding: 10px;
                text-align: center;
                width: 100%;
                background: var(--main-color-trans);
                color: var(--main-color);
                text-transform: uppercase;
                letter-spacing: 5px;
                font-weight: bold;
                border-radius: 25px;
                cursor: pointer;
            }
    </style>

</head>


<body>
<?php include_once 'sidbar_element.php'; ?>

    <div class="main-content">

        <main>
        <div class="wrapper">
                <h2>NOUVEAU ADMIN</h2>
                <div id="error_message"></div>
                <form class="form" id="myform" action="../db/add_admin.php" method="POST">
                    <div class="input_field">
                        <input type="text" placeholder="CIN ADMIN" name="cin" required>
                    </div>
                    <div class="input_field">
                        <input type="text" placeholder="NOM ADMIN" name="nom" required>
                    </div>
                    <div class="input_field">
                        <input type="text" placeholder="PRENOM ADMIN" name="prenom" required>
                    </div>

                    <div class="btn">
                        <input type="submit" Value="ENREGISTRER">
                    </div>
                 </form>
            </div>

        </main>

    </div>



</body>




</html>
