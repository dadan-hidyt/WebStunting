
function barChart(params) {
    google.charts.load('current', {
        'packages': ['corechart', 'bar']
    });
    google.charts.setOnLoadCallback(drawStuff);

    function drawStuff() {

        var chartDiv = document.getElementById(params.element ?? null);

        var data = google.visualization.arrayToDataTable(params.data);

        function buatChart() {
            var classicChart = new google.visualization.ColumnChart(chartDiv);
            classicChart.draw(data, {
                width : params.width ?? '100%',
                bar: { groupWidth: '25%' },

                is3D : true,
                series: {
                    0: {
                        targetAxisIndex: 0
                    },
                    1: {
                        targetAxisIndex: 1
                    }
                },
                title: params.title ?? '',
                vAxes: {
                    // Adds titles to each axis.
                    0: {
                        title: 'Grafik'
                    },
                }
            });
        }

        buatChart();
    };
}


function donutCharts(params) {
    google.charts.load("current", { packages: ["corechart"] });
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable(params.data ?? '');
        var options = {
            width : params.width ?? '100%',
            is3D : true,
            legend: 'none',
            pieSliceText: 'label',
            title: params.title ?? '',
            pieStartAngle: 100,
        };
        var chart = new google.visualization.PieChart(document.getElementById(params.element));
        chart.draw(data, options);
    }
}
