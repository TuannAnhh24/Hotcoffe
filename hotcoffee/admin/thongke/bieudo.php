<div
    id="myChart" style="width:100%; max-width:600px; height:500px;">
</div>

<script>
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

    // Set Data
    const data = google.visualization.arrayToDataTable([
    ['Danh muc', 'Số lượng sản phẩm'],
<?php 
    foreach($listthongke as $tk){
        extract($tk);
        echo '["'.$tendm.'",'.$countsp.'],';
    }
 ?>
 
    ]);

    // Set Options
    const options = {
    title:'Thống kÊ theo danh mục'
    };

    // Draw
    const chart = new google.visualization.PieChart(document.getElementById('myChart'));
    chart.draw(data, options);

    }
</script>