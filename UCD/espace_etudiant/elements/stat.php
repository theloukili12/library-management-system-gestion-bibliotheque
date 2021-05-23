<?php 

		$sql = "SELECT COUNT(livre.codliv) as nbr from livre";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $nbrp = $row['nbr'];
        }
        $sql1 = "SELECT COUNT(*) as Nbre from exemplaire";
        $result1 = mysqli_query($conn, $sql1);
        if (mysqli_num_rows($result1) == 1) {
            $row1 = mysqli_fetch_assoc($result1);
            $nbre = $row1['Nbre'];
        }
        $cne = $_SESSION['cne'];
        $sql2 = "
        SELECT count(*) as nbr FROM puner WHERE cneetd LIKE '$cne'
        ";
        $result2 = mysqli_query($conn, $sql2);
        if (mysqli_num_rows($result2) == 1) {
            $row2 = mysqli_fetch_assoc($result2);
            $nbrenr = $row2['nbr'];
        }
        $sql3 = "select Count(*) as nbr from pret where  DAY(dateaccord) = DAY(NOW())";
        $result3 = mysqli_query($conn, $sql3);
        if (mysqli_num_rows($result3) == 1) {
            $row3 = mysqli_fetch_assoc($result3);
            $nbrau = $row3['nbr'];
        }     
        $sql4 = "select Count(*) as nbr from pret  where  MONTH(dateaccord) = MONTH(NOW())";
        $result4 = mysqli_query($conn, $sql4);
        if (mysqli_num_rows($result4) == 1) {
            $row4 = mysqli_fetch_assoc($result4);
            $nbrm = $row4['nbr'];
        }    
        $sql5 = "
        Select  oUVRAGE.intituleouv , count(pret.id_emp) as 'Nbr des empruntes'
        FROM pret , exemplaire,livre,ouvrage
        WHERE pret.codexp= exemplaire.codexp and livre.codliv=exemplaire.codliv and 	ouvrage.Codeouv=livre.codouv
        GROUP BY ouvrage.intituleouv
        ORDER BY  count(pret.id_emp) DESC
        LIMIT 1";
        $result5 = mysqli_query($conn, $sql5);
        if (mysqli_num_rows($result4) == 1) {
            $row5 = mysqli_fetch_assoc($result5);
            $nomouv = $row5['intituleouv'];
        }  
?>
<h2 class="dash-title">Statistiques :</h2>

<div class="dash-cards">
    <div class="card-single">
        <div class="card-body">
            <span class="ti-check-box"></span>
            <div>
                <h5>Nombres de livres existants</h5>
                <h4>
                <?php
                        echo $nbrp;
                ?>
                </h4>
            </div>
        </div>
        <div class="card-footer">
            <a class="disabled" href="elements/recherche_livre.php">Voir tous</a>
        </div>
    </div>
    <div class="card-single">
        <div class="card-body">
            <span class="ti-briefcase"></span>
            <div>
                <h5>Nombres d'exemplaires existants</h5>
                <h4>
                <?php
                        echo $nbre;
                ?>
                </h4>
            </div>
        </div>
        <div class="card-footer">
            <a class="disabled" href="elements/demandes.php">Voir tous</a>
        </div>
    </div>
    

    <div class="card-single">
        <div class="card-body">
            <span class="ti-reload"></span>
            <div>
                <h5>Nombre des Reclamations</h5>
                <h4 style="color: red;">
                <?php
                        echo $nbrenr;
                ?>                    
                </h4>
            </div>
        </div>
        <div class="card-footer">
            <a class="disabled" href="elements/livre_nonretourne.php">Voir tous</a>
        </div>
    </div>

    <div class="card-single">
        <div class="card-body">
            <span class="ti-check-box"></span>
            <div>
            <h5>L'ouvrage le <span class="span_" style="font-size: 1.1rem;">plus</span> demandé</h5>
                <h4>
                <?php
                        echo $nomouv;
                ?>
                </h4>
            </div>
        </div>
        <div class="card-footer">
            <a  href="elements/ouvrage_plus_demande.php">Voir tous</a>
        </div>
    </div>
</div>