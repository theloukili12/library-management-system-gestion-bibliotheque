<?php 

		$sql = "SELECT COUNT(*) as nbr from etudiant";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $nbrp = $row['nbr'];
        }
        $sql2 = "SELECT  CONCAT( etudiant.nometd,' ',etudiant.prenometd) as nc,COUNT(pret.id_emp) FROM pret,etudiant WHERE pret.cne_etd = etudiant.cne_etd  GROUP BY etudiant.nometd ORDER BY COUNT(pret.id_emp) LIMIT 1";
        $result2 = mysqli_query($conn, $sql2);
        if (mysqli_num_rows($result2) == 1) {
            $row2 = mysqli_fetch_assoc($result2);
            $nbre = $row2['nc'];
        }
        else{
            $nbre='';
        }
?>
<h2 class="dash-title">Statistiques :</h2>

<div class="dash-cards">
    <div class="card-single">
        <div class="card-body">
            <span class="ti-check-box"></span>
            <div>
                <h5>Nombre des etudiants existants</h5>
                <h4 style="color: black;">
                <?php
                        echo $nbrp;
                ?>
                </h4>
            </div>
        </div>
        <div class="card-footer">
            <a href="elements/ajout_etd.php">Nouveau Etudiant</a>
        </div>
    </div>
    <div class="card-single">
        <div class="card-body">
            <span class="ti-briefcase"></span>
            <div>
                <h5>L'etudiant avec le <span class="span_">plus</span> nombres d'emprunts</h5>
                <h4>
                <?php
                                if($nbre == ""){
                                        echo 0 ;
                                }else{
                                    echo $nbre;
                                }
                ?>
                </h4>
            </div>
        </div>
        <div class="card-footer">
            <a href="elements/list_etd.php">Voir tous</a>
        </div>
    </div>
    

</div>