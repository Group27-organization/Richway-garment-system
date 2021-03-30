$.ajax({
    type: 'POST',
    url: "http://localhost/Richway-garment-system/eventCalenderController/employeeGender",
    data: { key: "gender"},
    dataType: 'json',

    success: function (data) {

        for(let i = 0; i < data.length; i++){
            let obj = data[i];
            for(var prop in obj){
                if(obj.hasOwnProperty(prop) && obj[prop] !== null && !isNaN(obj[prop])){
                    obj[prop] = +obj[prop];
                }
            }
        }
        // console.log(JSON.stringify(data, null, 2));
        // console.log("colum chart scusss this :"+JSON.stringify(data));

        var chart = new CanvasJS.Chart("columChartContainer", {
            animationEnabled: true,
            theme: "light2", // "light1", "light2", "dark1", "dark2"
            title:{
                text: "Top Oil Reserves"
            },
            axisY: {
                maximum: 100
            },
            data: [{
                type: "column",
                showInLegend: true,
                legendMarkerColor: "grey",
                legendText: "MMbbl = one million barrels",
                dataPoints: data
            }]
        });
        chart.render();



    },
    error: function () {

    }


});





