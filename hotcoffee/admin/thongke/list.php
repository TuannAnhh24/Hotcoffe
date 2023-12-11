<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .statistics {
            width: 80%;
            margin: auto;
        }
        .statistic-item {
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .statistic-item:hover {
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
        }
        h2 {
            margin: 0;
        }
        p {
            font-size: 24px;
            color: #5031eb;
        }
    </style>
</head>
<body>
    <div class="row2 font_title">
        <h1 style="margin-bottom: 40px; margin-top: 20px;">THỐNG KÊ</h1>
        <div class="statistics">
            <div class="statistic-item">
                <h2>Tổng số đơn hàng</h2>
                <p id="total_orders"><?= $total_orders ?></p>
                <a href="index.php?act=oder_list">Xem tất cả đơn hàng</a>
                <a style="margin-left: 20px;" href="index.php?act=tk-donhang">Xem thống kê</a>
            </div>
            <div class="statistic-item">
                <h2>Doanh thu</h2>
                <p id="revenue"><?= $revenue ?> VNĐ</p>
                <a href="index.php?act=tk-doanhthu">Xem thống kê</a>
            </div>
            <div class="statistic-item">
                <h2>Loại đồ uống bán chạy nhất</h2>
                <p id="best_selling_product"><?= $best_selling_product ?></p>
                <a href="index.php?act=banchay">Xem thống kê </a>
            </div>
            <div class="statistic-item">
                <h2>Tỉ lệ hủy đơn</h2>
                <p id="cancellation_rate"><?= $cancellation_rate ?>%</p>
                <a href="index.php?act=tk-huydon">Xem thống kê </a>
            </div>
        </div>
    </div> 
    
</body>
</html>
