google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawVisualization);

function drawVisualization() {
    // Some raw data (not necessarily accurate)
    var data = google.visualization.arrayToDataTable([
        ['Month', 'Salesmanajor', 'SockKeeper', 'accountant', 'Production Manajor', 'Tailer','supervisor' ,'avarage'],
        ['June',  165,            938,         522,             998,           450,           998,         614.6],
        ['July',  135,            1120,        599,             1268,          288,          658,            682],
        ['August',  157,            1167,        587,             807,           397,           498,           623]

    ]);

    var options = {
        title : '',
        vAxis: {title: 'Payment'},
        hAxis: {title: 'Month'},
        seriesType: 'bars',
        series: {5: {type: 'line'}}
    };

    var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
    chart.draw(data, options);
}