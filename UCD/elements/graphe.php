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


</head>

<body>
<?php include_once 'sidbar_element.php'; ?>

    <div class="main-content">

        <main>
            

            <section class="recent">
                <div class="activity-grid">
                <h2 class="dash-title" >GRAPHE POUR LE NOMBRE DES LIVRES DANS CHAQUE OUVRAGE</h2>
                    <div class="summary">
                    <div class="summary-card" style="background: none;">

                        <center>
                            <div id="chart-container" style="width: 100%;">FusionCharts will render here</div>

                        </center>
                    </div>
                    </div>

                    <div class="summary" >
                         <div class="summary-card" style="background: none;">
                                <button class='badge success' >
                                    <a target="blank" href="chart.php">IMPRIMMER LE GRAPHE</a>
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
    <script >$(function() {
    $.ajax({
        url: "../db/chart_data.php",
        type: "GET",
        success: function(data) {
            chartData = data;
            var chartProperties = {
                caption: "Le Nombre des livres dans chaque ouvrage",
                xAxisName: "Ouvrage",
                yAxisName: "Nombres de livres",
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
});</script>


</body>




</html>