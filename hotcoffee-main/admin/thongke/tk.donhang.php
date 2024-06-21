<html>
  <head>
    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        padding: 20px;
      }
      #top_x_div {
        width: 800px;
        height: 600px;
        margin: 0 auto; /* Center the chart */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.15); /* Add a shadow for a little depth */
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
      }
    </style>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = google.visualization.arrayToDataTable([
          ['Tháng', 'Số lượng đơn hàng'],
          <?php
                foreach($thongke_donhang as $donhang){
                    echo "['Tháng ".$donhang['Thang']."', ".$donhang['SoDonHang']."],";
                }
            ?>
        ]);

        var options = {
          width: 800,
          legend: { position: 'none' },
          chart: {
            title: 'Thống kê đơn hàng theo tháng',
            subtitle: 'Số lượng đơn hàng' },
          axes: {
            x: {
              0: { side: 'top', label: 'Tháng'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
    </script>
  </head>
  <body>
    <div id="top_x_div"></div>
  </body>
</html>
