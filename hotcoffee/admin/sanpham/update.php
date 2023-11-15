<?php
   if(is_array($chitietSanpham)){
    extract($chitietSanpham);
  }

  $hinhpath= "../images/".$img;
  if(is_file($hinhpath)){
    $hinh = "<img src= '".$hinhpath."' height ='100px'>";
  }else {
    $hinh = "Chưa update hình ảnh";
  }

?>

<div class="row2">
      <div class="row2 font_title">
        <h1>CẬP NHẬT SẢN PHẨM </h1>
      </div>
      <script>      
        function updatePrices1() {
                var giaGocInput = document.getElementById('gia_Goc');
                var giaKmInput = document.getElementById('gia_Km');
                var giaMInput = document.getElementById('giaM');
                var giaLInput = document.getElementById('giaL');
                var giaXLInput = document.getElementById('giaXL');

                var giaGoc = parseFloat(giaGocInput.value);

                // Các bước tính toán giá khác
                var giaKm = giaGoc * 0.9;     
                var giaM = giaGoc + 5;
                var giaL = giaGoc + 10;
                var giaXL = giaGoc + 15;


                giaKmInput.value = giaKm.toFixed(2);

            }

                document.addEventListener('DOMContentLoaded', function() {
                    var giaGocInput = document.getElementById('gia_Goc');
                    var discountCheckbox = document.getElementById('discountCheckbox');
                    var giaKmInput = document.getElementById('gia_Km');

                    // Khi giá gốc thay đổi, gọi hàm updatePrices
                    giaGocInput.addEventListener('input', function() {
                        updatePrices();
                    });

                    // Khi ô kiểm thay đổi
                    discountCheckbox.addEventListener('change', function() {
                        // Nếu ô kiểm được đánh dấu, đặt giá trị của ô nhập liệu giá khuyến mãi là 0, ngược lại là rỗng
                        giaKmInput.value = discountCheckbox.checked ? '0' : '';
                    });
                });
          function updatePrices() {
            var giaGocInput = document.getElementById('gia_Goc');
            var giaKmInput = document.getElementById('gia_Km');
         

            var giaGoc = parseFloat(giaGocInput.value);

            // Chỉnh giá các sai
            var giaKm = giaGoc * 0.9;
            var giaM = giaGoc + 5;
            var giaL = giaGoc + 10;
            var giaXL = giaGoc + 15;

            giaKmInput.value = giaKm.toFixed(2);
           
          }

          document.addEventListener('DOMContentLoaded', function() {
            // Khi trang được tải lên, gọi hàm updatePrices() để cập nhật giá trị cho các ô khác
            updatePrices();
          });

      </script>
      <div class="row2 form_content ">
      <form action="index.php?act=updatesp" method="POST" enctype="multipart/form-data">
        <div class="row2 mb10 form_content_container">
        <label> Danh mục </label> <br>
                    <select name="id_dm" >
                    <?php 
                        foreach($listdanhmuc as $danhmuc){
                            extract($danhmuc);
                            if($id_dm==$chitietSanpham['id_dm']){
                                echo "<option value='".$danhmuc['id_dm']."'  selected> $name </option>";
                            }else{
                                echo "<option value='".$danhmuc['id_dm']."'> $name </option>";
                            }
                        }
                    ?>
                    </select>
            </div>
          <div class="row2 mb10 form_content_container">
            <label for="ten_sanpham">Tên Sản Phẩm:</label>
            <input type="text" name="nameSp" value="<?php echo $chitietSanpham['name_sp']?>" required ><br>
          </div>
          <div class="row2 mb10 form_content_container">
            <label for="gia_goc">Giá Gốc:</label>
            <input type="text" id="gia_Goc" name="gia_Goc" value="<?php echo $chitietSanpham['gia_goc']?>" required ><br>
          </div>
          <div class="row2 mb10 form_content_container">
            <label for="discountCheckbox">Sản phẩm không được giảm giá</label>
            <input type="checkbox" id="discountCheckbox" name="discountCheckbox">
          </div>
          <div class="row2 mb10 form_content_container">
            <label for="ten_sanpham">Giá khuyến mãi:</label>
            <input type="text" id="gia_Km" name="gia_Km" required><br>
          </div>
          <!-- <div class="row2 mb10 form_content_container">
            <label for="siteM">Giá size: M </label>
            <input type="text" id="giaM" name="giaM" required ><br>
            
            <label for="siteL"> Giá size: L </label>
            <input type="text" id="giaL" name="giaL" required><br>

            <label for="sizeXL"> Giá size: XL </label>
            <input type="text" id="giaXL" name="giaXL" required><br>
          </div> -->
          <div class="row2 mb10 form_content_container">
            <label for="ten_sanpham">Mô tả:</label>
            <textarea name="moTa" id="" cols="250" rows="10"></textarea>
          </div>
          <div class="row2 mb10 form_content_container">
            <label for="ten_sanpham">Ảnh:</label>
            <input type="file" name="anhSp" > <?=$hinh?><br>
          </div>
          <div class="row mb10 ">
          <input type="hidden" name="id_sp" value="<?=$id_sp?>">
            <input class="mr20" type="submit" name='addSanpham' value="Nhập">
            <input class="mr20" type="reset" value="NHẬP LẠI">
            <a href="index.php?act=listSp"><input class="mr20" type="button" value="DANH SÁCH"></a>
          </div>
          
        </form>  
      </div>
    </div>