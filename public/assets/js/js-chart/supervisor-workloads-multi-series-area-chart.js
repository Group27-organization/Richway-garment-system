
$.ajax({
    type: 'POST',
    url: "http://localhost/Richway-garment-system/dashbordChartController/supDailyWorkload",
    data: { key: "workloadMulti"},
    dataType: 'json',

    success: function (data) {

        // let complete=data;
        // let target =data(1);
        //  console.log("load heeeeeeeeeee :"+data.length);
        // console.log("load complete :"+complete);
        // console.log("load target :"+target);
        let a=data[0] ;
        let b=data[1];

        for(let i = 0; i < a.length; i++){
            let date =a[i].x;
            let year =date.substring(0, 4);
            let month =date.substring(5, 7);
            let day =date.substring(8, 10)
            a[i].y =parseInt(a[i].y);
            a[i].x = new Date(parseInt(year), parseInt(month), parseInt(day));

        }

        for(let i = 0; i < b.length; i++){
            // b[i].y =parseInt(b[i].y);
            // b[i].x = new Date(b[i].x);
            let date =b[i].x;
            let year =date.substring(0, 4);
            let month =date.substring(5, 7);
            let day =date.substring(8, 10)
            b[i].y =parseInt(b[i].y);
            b[i].x = new Date(parseInt(year), parseInt(month), parseInt(day));

        }


        var chart = new CanvasJS.Chart("workloadSuper", {
            animationEnabled: true,
            title: {
                text: "Daily Workloads"
            },
            axisX: {
                valueFormatString: "DDD",


            },
            axisY: {
                title: "Item Count"
            },
            legend: {
                verticalAlign: "top",
                horizontalAlign: "right",
                dockInsidePlotArea: true
            },
            toolTip: {
                shared: true
            },
            data: [{
                name: "target",
                showInLegend: true,
                legendMarkerType: "square",
                type: "area",
                color: "rgba(40,175,101,0.6)",
                markerSize: 0,
                dataPoints: b
            },
                {
                    name: "done",
                    showInLegend: true,
                    legendMarkerType: "square",
                    type: "area",
                    color: "rgba(0,75,141,0.7)",
                    markerSize: 0,
                    dataPoints: a
                }]
        });
        chart.render();




    },
    error: function () {

    }


});

