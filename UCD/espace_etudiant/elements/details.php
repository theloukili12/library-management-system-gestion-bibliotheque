<?php 

setlocale(LC_TIME, 'fra_fra');
    include "../db/db_conn.php";
    session_start();
    if(!$_SESSION['cne'] ){
    header("location:../login.php");
    }else if (isset($_GET['codeexp']) ) {
        
        $code= $_GET['codeexp'];
		$sql = "SELECT exemplaire.nomedt,exemplaire.codexp,livre.codliv,livre.titreliv,
                    exemplaire.langue,livre.nomaut,ouvrage.intituleouv,livre.nbrpages,livre.nomaut
                from livre,ouvrage,exemplaire 
                where ouvrage.Codeouv=livre.codouv and exemplaire.etat=0 
                    and exemplaire.codliv=livre.codliv and exemplaire.codexp = '$code'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $isbn = $row['codliv'];
            $titre = $row['titreliv'];
            $nbr = $row['nbrpages'];
            $ouv = $row['intituleouv'];
            $aut = $row['nomaut'];
            $nbrexp = $row['nomedt'];
            $lang = $row['langue'];

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
    <link rel="stylesheet" type="text/css" href="../css/style_.css" />
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
      .disabled{
        cursor: default;
        pointer-events: none;        
        text-decoration: none;
        color: grey;
      }
    </style>

</head>


<body>
<?php include_once 'sidbar_etd.php'; ?>

    <div class="main-content">
        <?php include_once 'header.php'; ?>

        <main>
        <div class="wrapper">
            <div class="title">
            DETAILS DE LIVRE 
            </div>
            <div class="form">
                <form  action="../db/emprunt.php" method="POST">
                    <div class="inputfield">
                        <label>CODE EXEMPLAIRE</label>
                        <input  type="text" name="codeexp" class="input"  value="<?php echo $code; ?> ">
                    </div>  
                    <div class="inputfield">
                        <label>ISBN LIVRE</label>
                        <input disabled type="text" class="input"  value="<?php echo $isbn; ?> ">
                    </div>  
                    <div class="inputfield">
                        <label>TITRE LIVRE</label>
                        <input disabled type="text" class="input"  value="<?php echo $titre; ?> " >
                    </div>  
                    <div class="inputfield">
                        <label>OUVRAGE</label>
                        <input   disabled type="text" class="input" value="<?php echo $ouv; ?> ">
                    </div> 
                    <div class="inputfield">
                        <label>LANGUE</label>
                        <input   disabled type="text" class="input" value="<?php echo $lang; ?> ">
                    </div> 
                    <div class="inputfield">
                        <label>AUTEUR</label>
                        <input disabled type="text"  class="input" value="<?php echo $aut; ?> ">
                    </div>   
                    <div class="inputfield">
                        <label>EDITEUR </label>
                        <input disabled type="text"  class="input" value="<?php echo $nbrexp; ?> ">
                    </div>  
                    <div class="inputfield">
                        <label>NOMBRE DE PAGES</label>
                        <input   disabled type="text" class="input" value="<?php echo $nbr; ?> ">
                    </div>
                    <div class="btn">
                            <input type="submit" value="DEMANDER">
                    </div>
                </form>
            </div>
        </div>	

        </main>

    </div>



</body>




</html>
