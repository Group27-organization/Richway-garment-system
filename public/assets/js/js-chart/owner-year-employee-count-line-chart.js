
$.ajax({
    type: 'POST',
    url: "http://localhost/Richway-garment-system/dashbordChartController/empCountPerYear",
    data: { key: "countPerYear"},
    dataType: 'json',

    success: function (data) {
        // console.log("load xxxxx :"+data);


        for(let i = 0; i < data.length; i++){
            let obj = data[i];
            // let year=parseInt(obj.label)
            // data[i].x =new Date(year,0,1)
            data[i].y =parseInt(obj.y)

        }
        // console.log("emp pie :"+JSON.stringify(data));

        // let chart = new CanvasJS.Chart("ownerEmpCountLine", {
        //     animationEnabled: true,
        //     theme: "light",
        //     title:{
        //         text: "Employee Count Per Year"
        //     },
        //
        //     axisX:{
        //
        //         valueFormatString: "YYYY",
        //
        //     },
        //
        //     axisY: {
        //
        //     },
        //     data: [{
        //         type: "line",
        //         lineThickness: 4,
        //         dataPoints: data
        //     }]
        // });
        // chart.render();

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



