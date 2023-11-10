<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Sản Phẩm</title>
</head>
<body>
    <h2>Thêm Sản Phẩm và Chi Tiết Sản Phẩm</h2>
    <form action="process_data.php" method="post">
        <!-- Thông tin Sản Phẩm -->
        <label for="ten_sanpham">Tên Sản Phẩm:</label>
        <input type="text" name="ten_sanpham" required><br>

        <label for="gia_goc">Giá Gốc:</label>
        <input type="number" name="gia_goc" required><br>

        <!-- Thông tin Chi Tiết Sản Phẩm -->
        <label for="gia">Giá Chi Tiết:</label>
        <input type="number" name="gia" required><br>

        <label for="so_luong_ctsp">Số Lượng Chi Tiết:</label>
        <input type="number" name="so_luong_ctsp" required><br>

        <input type="submit" value="Thêm Sản Phẩm và Chi Tiết Sản Phẩm">
    </form>
</body>
</html>
=======
<div class="row2">
  <div class="row2 font_title">
    <h1>THÊM MỚI SẢN PHẨM </h1>
  </div>
  <div class="row2 form_content ">
    <form action="index.php?act=addsp" method="POST" enctype="multipart/form-data">
      <div class="row2 mb10 form_content_container">
        <label> Danh mục  </label> <br>
        <select name="iddm">
          <?php foreach($listdanhmuc as $danhmuc){
            extract($danhmuc);
            echo '<option value="'.$id.'">'.$name.'</option>';
          } 
          ?>
        </select>
      </div>
      <div class="row2 mb10">
        <label>Tên sản phẩm </label> <br>
        <input type="text" name="tensp">
      </div>
      <div class="row2 mb10">
        <label>Giá </label> <br>
        <input type="text" name="giasp">
      </div>
      <div class="row2 mb10">
        <label>Hình </label> <br>
        <input type="file" name="hinhsp">
      </div>
      <div class="row2 mb10">
        <label>Mô tả </label> <br>
        <textarea name="mota" cols="30" rows="10"></textarea>
      </div>
      <div class="row mb10 ">
        <input class="mr20" type="submit" name='themmoi' value="THÊM MỚI">
        <input class="mr20" type="reset" value="NHẬP LẠI">

        <a href="index.php?act=listsp"><input class="mr20" type="button" value="DANH SÁCH"></a>
      </div>
      <?php 
      if(isset($thongbao) && $thongbao != ""){
        echo $thongbao;
      }
        
      ?>
    </form>
  </div>
</div>
>>>>>>> bffc6ef77877d00b0064566f1939b4c65e8ce537
