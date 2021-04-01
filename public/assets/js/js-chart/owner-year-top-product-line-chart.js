
$.ajax({
    type: 'POST',
    url: "http://localhost/Richway-garment-system/dashbordChartController/loadLastYearTopSalesProduct",
    data: { key: "loadLastYearTopSalesProduct"},
    dataType: 'json',

    success: function (data) {



        for(let i = 0; i < data.length; i++){
            let obj = data[i];
            // let year=parseInt(obj.label)
            // data[i].x =new Date(year,0,1)
            data[i].y =parseInt(obj.y)

        }


        let chart = new CanvasJS.Chart("ownerEmpCountLine", {
            animationEnabled: true,
            theme: "light2", // "light1", "light2", "dark1", "dark2"
            title:{
                text: "Employee Count Per Year"
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



