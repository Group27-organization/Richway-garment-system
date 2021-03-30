
$.ajax({
    type: 'POST',
    url: "http://localhost/Richway-garment-system/dashbordChartController/employeeCountPerType",
    data: { key: "empType"},
    dataType: 'json',

    success: function (data) {
        // console.log("load heeeeeeeeeee :"+data);
       // console.log("emp pie :"+JSON.stringify(data));


        let chart = new CanvasJS.Chart("ownerEmpPie", {
            animationEnabled: true,
            title: {
                text: "Employee Type"
            },
            data: [{
                type: "pie",
                startAngle: 240,
                yValueFormatString: "##0.00\"%\"",
                indexLabel: "{label} {y}",
                dataPoints: data
            }]
        });
        chart.render();




    },
    error: function () {

    }


});

