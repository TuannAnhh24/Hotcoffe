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
          <?php
                foreach($thongke_sp_banchay as $best){
                    echo "['".$best['name']."', ".$best['count']."],";
                }
            ?>
        ]);

        var options = {
          title: 'Thống kê loại đồ uống theo doanh thu',
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
