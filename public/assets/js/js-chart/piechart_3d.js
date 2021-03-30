
$.ajax({
    type: 'POST',
    url: "http://localhost/Richway-garment-system/eventCalenderController/employeeGender",
    data: { key: "gender"},
    dataType: 'json',

    success: function (data) {
        // console.log("scusss this :"+JSON.stringify(data));

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            title: {
                text: "Desktop Search Engine Market Share - 2016"
            },
            data: [{
                type: "pie",
                startAngle: 240,
                yValueFormatString: "##0.00\"%\"",
                indexLabel: "{label} {y}",
                dataPoints:data



            }]
        });
        chart.render();



    },
    error: function () {

    }


});





