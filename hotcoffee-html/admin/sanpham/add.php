<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Sản Phẩm</title>
</head>

<body>
    <h2>Thêm Sản Phẩm  </h2>
    <form action="process_data.php" method="post">
        <!-- Thông tin Sản Phẩm -->
        <label for="ten_sanpham">Tên Sản Phẩm:</label>
        <input type="text" name="ten_sanpham" required><br>

        <label for="gia_goc">Giá Gốc:</label>
        <input type="number" name="gia_goc" required><br>

        <label for="ten_sanpham">Giá khuyến mãi:</label>
        <input type="text" name="gia_khuyenmai" required><br>

        <label for="ten_sanpham">size: </label>
        <input type="text" name="size" required><br>

        <label for="ten_sanpham">Số lượng:</label>
        <input type="text" name="soluong_sanpham" required><br>

        <label for="ten_sanpham">Mô tả:</label>
        <input type="text" name="mota_sanpham" required><br>

        <label for="ten_sanpham">Ảnh:</label>
        <input type="file" name="ảnh_sanpham" required><br>
        <h2>Chi Tiết Sản Phẩm</h2>
        <!-- Thông tin Chi Tiết Sản Phẩm -->
        <label for="gia">Giá Chi Tiết:</label>
        <input type="number" name="gia" required><br>

        <label for="so_luong_ctsp">Số Lượng Chi Tiết:</label>
        <input type="number" name="so_luong_ctsp" required><br>

        <input type="submit" value="Thêm Sản Phẩm và Chi Tiết Sản Phẩm">
    </form>
</body>

</html>