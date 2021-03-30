
var chart = new CanvasJS.Chart("paymentACGenarateScatter", {
    animationEnabled: true,
    zoomEnabled: true,
    title:{
        text: "payment sheet genarate date"
    },
    axisX: {

        valueFormatString: "MMMM-YYYY",
    },
    axisY:{
        title: "Quntity",

    },
    data: [{
        type: "scatter",
        toolTipContent: "<b>Area: </b>{x} sq.ft<br/><b>Price: </b>${y}k",
        dataPoints: [
            { x: new Date(2017, 1, 6), y: 220 },
            { x: new Date(2018, 1, 7), y: 120 },
            { x: new Date(2018, 1, 7), y: 200 },
            { x: new Date(2019, 1, 8), y: 144 },
            { x: new Date(2020, 1, 9), y: 162 },

        ]
    }]
});
chart.render();