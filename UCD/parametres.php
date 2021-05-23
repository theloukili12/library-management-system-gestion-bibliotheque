
<?php 
    include "db/db_conn.php";
    session_start();
    if(!$_SESSION['cin']){
        header("location:login.php");
    }else{
        
        $name=$_SESSION['cin'];
		$sql = "SELECT * FROM administrateur WHERE cinadm LIKE '$name'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $cin = $row['cinadm'];
            $nom = $row['nomadm'];
            $pre = $row['prenomadm'];
        }
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
<?php include_once 'elements/sidbar.php'; ?>

    <div class="main-content">
        <main>
        <div class="wrapper">
            <div class="title">
            Informations d'administrateur
        </div>
            <div class="form">
                <form  action="db/delete_adm.php" method="POST">


                        <div class="inputfield">
                        <label>CIN D'ADMINISTRATEUR</label>
                        <input type="text" class="input" name="cin"  value="<?php echo $cin;?>" disabled>
                    </div>  
                    <div class="inputfield">
                        <label>NOM D'ADMINISTRATEUR</label>
                        <input type="text" class="input" name="nom" value="<?php echo $nom; ?>" disabled>
                    </div>  
                    <div class="inputfield">
                        <label>PRENOM D'ADMINISTRATEUR</label>
                        <input type="text" class="input" name="prenom" value="<?php echo $pre; ?>" disabled>
                    </div>  
                    <div class="inputfield">
                    <?php 
                                        $cin = $_SESSION['cin'];
                                        $sql1 = "select COUNT(pret.cinadm) as nbr from pret where pret.dateretour is NULL and pret.cinadm like '$cin' ";
                                        $result = mysqli_query($conn, $sql1);
                                        if (mysqli_num_rows($result) == 1) {
                                            $row = mysqli_fetch_assoc($result);
                                            $nbr = $row['nbr'];
                                        }

                    ?>
                        <label>NOMBRES D'EMPRUNTE ACCORDE </label>
                        <input type="text" class="input" name="nbr"  value="<?php echo $nbr; ?>" disabled>
                    </div>  

                    <div class="btn">
                            <input type="submit" value="DESACTIVER">
                    </div>
                </form>
            </div>
        </div>	

        </main>

    </div>



</body>




</html>
