<?php 
    setlocale(LC_TIME, 'fra_fra');
    date_default_timezone_set('Europe/Paris');
    include "../db/db_conn.php";
    session_start();
    if(!$_SESSION['cin']){
       header("location:login.php");
    }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>GRAPHE POUR LE NOMBRE DE LIVRE POUR CHAQUE OUVRAGE </title>
  </head>

  <body >
    <img src="../img/ucd1.png" width="150px" height="150px">
    <div  style="float: right; margin:30px;">
    <strong>Universite Chouaib Doukkali</strong>   <br>
    <p> Avenue Jabran Khalil Jabrani <br>
    B.P 299-24000 <br>
    El jadida Grand-Casablanca Maroc <br></p>
    </div>
    <hr style="width: 100%;">
    <center>
      <div id="chart-container" style="margin-top: 100px;" >GRAPHE POUR LE NOMBRE DE LIVRE POUR CHAQUE OUVRAGE </div>
    </center>
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
                xAxisName: "Mois",
                yAxisName: "Nombres des emprunts",
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
    </script>  </body>
<script>

 setTimeout(fonctionAExecuter, 1000); //On attend 5 secondes avant d'exécuter la fonction

function fonctionAExecuter()
{
window.print();
}
</script>
</html>