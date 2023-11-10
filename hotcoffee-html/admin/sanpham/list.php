<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>sản phẩm</title>
</head>

<body>
    <div class="product-list">
        <div class="product-item">
            <img src="hotcoffee-html/images/123.jpg" alt="Coffee Product">
            <h3>Cà Phê Robusta</h3>
            <p>Giá: $5.99</p>
            <p>Số Lượng Tồn Kho: 50</p>
            <button class="edit-product">Chỉnh Sửa</button>
            <button class="delete-product">Xóa</button>
        </div>
        <!-- Thêm các sản phẩm khác vào danh sách -->
      
        <div class="product-filter">
            <label for="category-filter">Lọc theo Danh Mục:</label>
            <select id="category-filter">
                <option value="all">Tất Cả</option>
                <option value="brewed">Cà Phê Pha</option>
                <option value="espresso">Espresso</option>
                <option value="beans">Hạt Cà Phê</option>
            </select>

            <input type="text" id="search-product" placeholder="Tìm kiếm...">
            <button id="search-button">Tìm Kiếm</button>
        </div>


    </div>

</body>

</html>