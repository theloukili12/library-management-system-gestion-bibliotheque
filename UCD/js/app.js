$(function() {
    $.ajax({
        url: ".db/chart_data.php",
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
});