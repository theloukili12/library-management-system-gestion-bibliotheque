<?php 
    include "../db/db_conn.php";
    setlocale(LC_TIME, 'fra_fra');
    date_default_timezone_set('Europe/Paris');
    session_start();
    if(!$_SESSION['cin']){
        header("location:login.php");
    }
?>
<?php
if (false !== setlocale(LC_ALL, 'fr_FR@euro')) {
    $locale_info = localeconv();
    print_r($locale_info);
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-
    scale=1" />
    <title>UCD</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css" />


</head>

<body>
<?php include_once 'sidbar_element.php'; ?>

    <div class="main-content">

        <main>
            

            <section class="recent">
                <div class="activity-grid">
                <h2 class="dash-title" >GRAPHE POUR LE NOMBRE DES LIVRES EMPRUNTES POUR CHAQUE MOIS </h2>
                    <div class="summary">
                    <div class="summary-card" style="background: none;">

                        <center>
                            <div id="chart-container" style="width: 100%;"></div>

                        </center>
                    </div>
                    </div>

                    <div class="summary" >
                         <div class="summary-card" style="background: none;">
                                <button class='badge success' >
                                    <a target="_blank" href="chart2.php">IMPRIMMER LE GRAPHE</a>
                                </button>
                                </div>
                    </div>
                </div>

            </section>




        </main>

    </div>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/fusioncharts.js"></script>
    <script src="../js/fusioncharts.charts.js"></script>
    <script src="../js/themes/fusioncharts.theme.zune.js"></script>
    <script >
    $(function() {
    $.ajax({
        url: "../db/chart_data2.php",
        type: "GET",
        success: function(data) {
            chartData = data;
            var chartProperties = {
                caption: "Le Nombre des empruntes dans chaque mois",
                xAxisName: "MOIS",
                yAxisName: "Nombres des empruntes",
                rotatevalues: "1",
                theme: "fusion"
            };
            apiChart = new FusionCharts({
                type: "column3d",
                renderAt: "chart-container",
                width: "550",
                height: "350",
                dataFormat: "json",
                dataSource: {
                    chart: chartProperties,
                    data: chartData
                }
            });
            apiChart.render();
        }
    });
});
    </script>


</body>




</html>