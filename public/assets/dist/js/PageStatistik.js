const chartsByJenisKelamin = function (data){
    var options = {
        series: [],
        dataLables : {
            enabled : false,
        },
        noData : {
            text : 'Loading...'
        },
        chart: {
            type: 'bar',
            height: 380
        },
        plotOptions: {
            bar: {
                borderRadius: 5,
                horizontal: false,
                columnWidth: "40%"
            }
        },
      
      
        fill: {
            opacity: 1
        },
        colors: ["#039dfc", "#fc0313"],
        legend: {
            show: false
        },

        title: {
            text: 'Statistik Berdasarkan Jenis Kelamin',
        },

    };

    var chart = new ApexCharts(document.querySelector("#byJk"), options);

    const getData = async function(){
        const response = await fetch(data.url);
        const jsonData = await response.json();
        chart.updateSeries([{
            name : 'Total',
            data : jsonData.data
        }])
    }
    getData();
    return chart;
}