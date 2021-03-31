
$.ajax({
    type: 'POST',
    url: "http://localhost/Richway-garment-system/dashbordChartController/loadLastYearTopSalesProduct",
    data: { key: "loadLastYearTopSalesProduct"},
    dataType: 'json',

    success: function (data) {
        // console.log("load xxxxx :"+data);


        for(let i = 0; i < data.length; i++){
            let obj = data[i];
            // let year=parseInt(obj.label)
             data[i].label ="PID"+obj.label;
            data[i].y =parseInt(obj.y)

        }
        console.log("emp pie :"+JSON.stringify(data));


        let chart = new CanvasJS.Chart("loadLastYearTopSalesProduct", {
            animationEnabled: true,
            theme: "light2", // "light1", "light2", "dark1", "dark2"
            title:{
                text: "Last Year Top Sales Product"
            },
            axisY: {
                title: "Count"
            },
            data: [{
                type: "column",
                showInLegend: true,
                legendMarkerColor: "grey",

                dataPoints: data
            }]
        });
        chart.render();




    },
    error: function () {

    }


});



