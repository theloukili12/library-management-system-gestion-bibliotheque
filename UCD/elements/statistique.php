<?php 

		$sql = "select count(*) as Nbrp from pret";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $nbrp = $row['Nbrp'];
        }
        $sql1 = "select count(*) as Nbre from emprunt";
        $result1 = mysqli_query($conn, $sql1);
        if (mysqli_num_rows($result1) == 1) {
            $row1 = mysqli_fetch_assoc($result1);
            $nbre = $row1['Nbre'];
        }
        $sql2 = "Select count(*) as nbrenr FROM pret WHERE dateretour is NULL AND DATE_ADD(dateaccord, INTERVAL 2 DAY) < DATE(NOW())";
        $result2 = mysqli_query($conn, $sql2);
        if (mysqli_num_rows($result2) == 1) {
            $row2 = mysqli_fetch_assoc($result2);
            $nbrenr = $row2['nbrenr'];
        }
        $sql3 = "select Count(*) as nbr from pret p 
         where  DAY(p.dateaccord) = DAY(NOW()) 
         and MONTH(p.dateaccord)=MONTH(NOW())
         and YEAR(dateaccord) = YEAR(NOW())";
        $result3 = mysqli_query($conn, $sql3);
        if (mysqli_num_rows($result3) == 1) {
            $row3 = mysqli_fetch_assoc($result3);
            $nbrau = $row3['nbr'];
        }     
        $sql4 = "select Count(*) as nbr from pret 
         where  MONTH(dateaccord) = MONTH(NOW())
         and YEAR(dateaccord) = YEAR(NOW())";
        $result4 = mysqli_query($conn, $sql4);
        if (mysqli_num_rows($result4) == 1) {
            $row4 = mysqli_fetch_assoc($result4);
            $nbrm = $row4['nbr'];
        }    
        $sql5 = "
        Select  ouvrage.intituleouv,count(pret.codexp) as nbr
        FROM pret , exemplaire,livre,ouvrage
        WHERE pret.codexp= exemplaire.codexp and livre.codliv=exemplaire.codliv and 			  ouvrage.Codeouv=livre.codouv
        GROUP BY ouvrage.intituleouv
        ORDER by nbr
        LIMIT 1;
        ";
        $result5 = mysqli_query($conn, $sql5);
        if (mysqli_num_rows($result4) == 1) {
            $row5 = mysqli_fetch_assoc($result5);
            $nomouv = $row5['intituleouv'];
        }
?>
<h2 class="dash-title">Statistiques  :</h2>

<div class="dash-cards">
    <div class="card-single">
        <div class="card-body">
            <span class="ti-check-box"></span>
            <div>
                <h5>Nombres des livres empruntés</h5>
                <h4 style='color: black;' >
                <?php
                        echo $nbrp;
                ?>
                </h4>
            </div>
        </div>
        <div class="card-footer">
            <a target="blank" href="db/export_listeemp.php">Voir tous</a>
        </div>
    </div>
    <div class="card-single">
        <div class="card-body">

                <?php
                        if($nbre == 0 )
                        {
                            echo "
                            <span class='ti-bell'  ></span>
                            <div>
                            <h5>Nombres de demandes actuelles </h5>";
                           echo "<h4 style='color: black;'>".$nbre."</h4>" ;

                        }else{
                            echo "
                            <span class='ti-bell'style='color: rgb(19, 195, 22);' ></span>
                            <div>
                            <h5>Nombres de demandes actuelles </h5>";
                            echo "<h4 style='color: rgb(19, 195, 22);'>".$nbre."</h4>";
                        }                ?>
            </div>
        </div>
        <div class="card-footer">
            <a href="elements/demandes.php">Voir tous</a>
        </div>
    </div>


    <div class="card-single">
        <div class="card-body">
            <span class="ti-check-box"></span>
            <div>
                <h5>Nombres de Empruntes Aujourd'hui</h5>
                <?php
                        if($nbre == 0 )
                        {
                           echo "<h4 style='color: black;'>".$nbrau."</h4>" ;

                        }else{
                            echo "<h4 style='color: black;'>".$nbrau."</h4>";
                        }                ?>             
            </div>
        </div>
        <div class="card-footer">
            <a target="blank" href="db/empruntes_auj.php">Voir tous</a>
        </div>
    </div>

    <div class="card-single">
        <div class="card-body">
            <span class="ti-check-box"></span>
            <div>
                <h5>Nombres de Emprunts du mois actuelle</h5>
                <?php
                        if($nbrm == 0 )
                        {
                           echo "<h4 style='color: black;'>".$nbrm."</h4>" ;

                        }else{
                            echo "<h4 style='color: black;'>".$nbrm."</h4>";
                        }                ?>                                  
            </div>
        </div>
        <div class="card-footer">
            <a  target="blank" href="db/empruntes_mois.php">Voir tous</a>
        </div>
    </div>
    <div class="card-single">
        <div class="card-body">
            <span class="ti-reload"></span>
            <div>
                <h5>Les emprunts <span class="span__" style="font-size: 1.1rem;">non</span> retournées</h5>
                <?php
                        if($nbrenr == 0 )
                        {
                           echo "<h4 style='color: black;'>".$nbrenr."</h4>" ;

                        }else{
                            echo "<h4 style='color: red;'>".$nbrenr."</h4>";
                        }                ?>    
            </div>
        </div>
        <div class="card-footer">
            <a  href="elements/livre_nonretourne.php">Voir tous</a>
        </div>
    </div>
    <div class="card-single">
        <div class="card-body">
            <span class="ti-info"></span>
            <div>
                <h5>L'ouvrage le <span class="span_" style="font-size: 1.1rem;">plus</span> demandé</h5>
                <h4 style="color: rgb(19, 195, 22);">
                <?php
                    
                        echo $nomouv;
                ?>
                </h4>
            </div>
        </div>
        <div class="card-footer">
            <a href="elements/ouvrage_plus_demande.php">Voir tous</a>
        </div>
    </div>
</div>