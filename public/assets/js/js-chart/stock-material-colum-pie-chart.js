$.ajax({
    type: 'POST',
    url: "http://localhost/Richway-garment-system/dashbordChartController/fabricTypePie",
    data: { key: "pieFabric"},
    dataType: 'json',

    success: function (data) {

        for(let i = 0; i < data.length; i++){
            let obj = data[i];
            for(let prop in obj){
                if(obj.hasOwnProperty(prop) && obj[prop] !== null && !isNaN(obj[prop])){
                    obj[prop] = +obj[prop];
                }
            }
        }


        let chart = new CanvasJS.Chart("fabricTypePie", {
            animationEnabled: true,
            title: {
                text: "Fabric"
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





