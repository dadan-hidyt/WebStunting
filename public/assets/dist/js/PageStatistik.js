const chartsByJenisKelamin = function (data){
    var options = {
        series: []
       ,
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



        colors: ["#039dfc", "#fc0313"],


        title: {
            text: 'Statistik Berdasarkan Jenis Kelamin',
        },

    };

    var chart = new ApexCharts(document.querySelector("#byJk"), options);


    fetch(data.url).then(x=>x.json()).then(y=>{
        chart.updateSeries([{
            name : 'Total',
            data : y.data
        }]);
    })
    return chart;
}
