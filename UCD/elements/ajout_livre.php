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
            max-width: 500px;
            width: 100%;
            background: #fff;
            margin: 20px auto;
            border-radius: 5px;
            box-shadow: 4px 4px 2px rgba(2,72,129, 0.8);
            padding: 30px;
            }

            .wrapper .title{
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 25px;
            color: var(--main-color);
            text-transform: uppercase;
            text-align: center;
            }

            .wrapper .form{
            width: 100%;
            }

            .wrapper .form .inputfield{
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            }

            .wrapper .form .inputfield label{
            width: 200px;
            color: #757575;
            margin-right: 10px;
            font-size: 14px;
            }
            .wrapper .form .inputfield .input{
            width: 100%;
            outline: none;
            border: 1px solid var(--main-color-trans);
            font-size: 15px;
            padding: 8px 10px;
            border-radius: 3px;
            transition: all 0.3s ease;
            }


            .wrapper .form .inputfield .custom_select{
            position: relative;
            width: 100%;
            height: 37px;
            }

            .wrapper .form .inputfield .custom_select:before{
            content: "";
            position: absolute;
            top: 12px;
            right: 10px;
            border: 8px solid;
            border-color: var(--main-color-trans) transparent transparent transparent;
            pointer-events: none;
            }

            .wrapper .form .inputfield .custom_select select{
            -webkit-appearance: none;
            -moz-appearance:   none;
            appearance:        none;
            outline: none;
            width: 100%;
            height: 100%;
            border: 0px;
            padding: 8px 10px;
            font-size: 15px;
            border: 1px solid var(--main-color-trans);
            border-radius: 3px;
            }


            .wrapper .form .inputfield .input:focus,
            .wrapper .form .inputfield .custom_select select:focus{
            border: 1px solid var(--main-color);
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
            @media (max-width:420px) {
            .wrapper .form .inputfield{
                flex-direction: column;
                align-items: flex-start;
            }
            .wrapper .form .inputfield label{
                margin-bottom: 5px;
            }
            .wrapper .form .inputfield.terms{
                flex-direction: row;
            }
            }
    </style>

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
        <div class="wrapper">
            <div class="title">
            NOUVEAU LIVRE
            </div>
            <div class="form">
                <form  action="../db/add_livre.php" method="POST">


                        <div class="inputfield">
                        <label>TITRE LIVRE</label>
                        <input type="text" class="input" name="titre" required>
                    </div>  
                    <div class="inputfield">
                        <label>NOMBRE DE PAGES</label>
                        <input type="text" class="input" name="nbr" required>
                    </div>  
                    <div class="inputfield">
                        <label>NOM COMPLET D'AUTEUR</label>
                        <input type="text" class="input" name="aut" required>
                    </div>  
                        <div class="inputfield">
                        <label>Ouvrage</label>
                        <div class="custom_select">
                        <select name="ouv">
                                    <?php 

                                    include "db/db_conn.php";
                                    $sql = "SELECT * FROM ouvrage order by intituleouv";
                                    $result = mysqli_query($conn, $sql);
                                    while($row=mysqli_fetch_assoc($result)){ ?>
                                    <option value="<?php echo $row['Codeouv']; ?>"><?php echo $row['intituleouv']; ?></option>
                                    <?php } ?>
                            </select>
                        </div>
                    </div> 
                    <div class="inputfield">
                        <label>ISBN LIVRE</label>
                        <input type="text" class="input" name="isbn" required>
                    </div>  

                    <div class="btn">
                            <input type="submit" value="ENREGISTRER">
                    </div>
                </form>
            </div>
        </div>	

        </main>

    </div>



</body>




</html>
