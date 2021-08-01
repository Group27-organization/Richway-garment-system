$.ajax({
    type: 'POST',
    url: "http://localhost/Richway-garment-system/dashbordChartController/NoolQuantity",
    data: { key: "noolCount"},
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
        // console.log(JSON.stringify(data, null, 2));
        //  console.log("colum chart scusss this :"+JSON.stringify(data));

        var chart = new CanvasJS.Chart("stockNoolCount", {
            animationEnabled: true,
            theme: "light2", // "light1", "light2", "dark1", "dark2"
            title:{
                text: "Thread"
            },
            axisY: {

            },
            data: [{
                type: "column",
                showInLegend: true,
                legendMarkerColor: "grey",
                legendText: "",
                dataPoints: data
            }]
        });
        chart.render();



    },
    error: function () {

    }


});





