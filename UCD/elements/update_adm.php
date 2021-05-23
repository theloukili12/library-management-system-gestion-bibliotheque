<?php 
    include "../db/db_conn.php";
    session_start();
    if(!$_SESSION['cin']){
        header("location:login.php");
    }
    if (isset($_GET['edit'])) {
        
        $name= $_GET['edit'];
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
        <div class="wrapper">
                <h2>MODIFIER LES INFORMATIONS</h2>
                <div id="error_message"></div>
                <form id="myform" action="../db/update_admin.php" method="POST">
                    <div class="input_field">
                        <input disabled type="text" placeholder="CIN ADMIN" name="cin" value="<?php echo $cin; ?>" >
                    </div>
                    <div class="input_field">
                        <input type="text" placeholder="NOM ADMIN" name="nom" value="<?php echo $nom; ?>">
                    </div>
                    <div class="input_field">
                        <input type="text" placeholder="PRENOM ADMIN" name="prenom" value="<?php echo $pre; ?>">
                    </div>

                    <div class="btn">
                        <input type="submit" name="update">
                    </div>
                 </form>
            </div>

        </main>

    </div>



</body>




</html>
