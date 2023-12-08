<html>
  <head>
    <style>
      body {
        font-family: Arial, sans-serif;
      }
      #piechart {
        width: 900px;
        height: 500px;
        margin: 0 auto; /* Center the chart */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.15); /* Add a shadow for a little depth */
      }
    </style>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Danh mục', 'Số lượng'],
          ['Hủy đơn', <?php echo $cancellation_rate ?>],
          ['Không hủy', <?php echo 100 - $cancellation_rate ?>]
        ]);

        var options = {
          title: 'Thống kê tỷ lệ hủy đơn',
          colors: ['#e0440e', '#e6693e'], // Customize the colors
          pieHole: 0.4, // Make it a donut chart
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart"></div>
  </body>
</html>
