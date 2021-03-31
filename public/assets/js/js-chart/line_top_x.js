google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ['Year', 'Revenue', 'Target'],
    ['2004',  1000,      900],
    ['2005',  1170,      1460],
    ['2006',  660,       1150],
    ['2007',  1030,      740]
  ]);

  var options = {
    title: 'Revenue',
    curveType: 'function',
    legend: { position: 'bottom' }
  };

  var chart = new google.visualization.LineChart(document.getElementById('curve_chart2'));

  chart.draw(data, options);
}