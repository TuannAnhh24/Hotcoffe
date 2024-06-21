<?php
   if(is_array($chitietSanpham)){
    extract($chitietSanpham);
  }
?>
<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0">Sản phẩm</h4>

      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="javascript: void(0);">Sản phẩm</a></li>
          <li class="breadcrumb-item active"><?$chitietSanpham['name_sp']?></li>
          <li class="breadcrumb-item active">Thêm chi tiết sản phẩm</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="row2">
         <div class="row2 font_title">
          <h1>THÊM MỚI CHI TIẾT SẢN PHẨM  </h1>
        </div>
    <div class="row2 form_content ">
      
        <form action="index.php?act=addctsp" method="POST" enctype="multipart/form-data">
        <div class="row2 mb10 form_content_container">
                    <label> Danh mục </label> <br>
                    <select name="id_dm" >
                        <?php 
                            foreach($listdanhmuc as $danhmuc){
                                extract($danhmuc);
                            echo "<option value='".$id_dm."'> $name </option>";
                            }
                        ?>
                    </select>
            </div>
       
          <div class="row2 mb10 form_content_container">
            <label for="ten_sanpham">Tên Sản Phẩm:</label>
            <input type="text" name="nameSp" value="<?php echo $chitietSanpham['name_sp']?>" ><br>
          </div>
          <div class="row2 mb10 form_content_container">
            <label for="gia_goc">Giá Gốc:</label>
            <input type="text" id="gia_Goc" name="gia_Goc" value="<?php echo $chitietSanpham['gia_goc']?>" oninput="updatePrices()" ><br>
          </div>
         
          
          <div class="row mb10 ">
          <input type="hidden" name="idSp" id="" value="<?php echo $chitietSanpham['id_sp']?>">
            <input class="mr20" type="submit" name='addCtsp' value="Thêm Chi Tiết SP">
            <input class="mr20" type="reset" value="NHẬP LẠI">
            <a href="index.php?act=listSp"><input class="mr20" type="button" value="DANH SÁCH"></a>
          </div>
        </form>  
        </div>
    </div>
   <!-- JS tự chỉnh giá  -->
    <script>
          function updatePrices() {
            var giaGocInput = document.getElementById('gia_Goc');
            var giaKmInput = document.getElementById('gia_Km');
            var giaMInput = document.getElementById('giaM');
            var giaLInput = document.getElementById('giaL');
            var giaXLInput = document.getElementById('giaXL');

            var giaGoc = parseFloat(giaGocInput.value);
            var giaKm = parseFloat(giaKmInput.value);

            // Chỉnh giá các sai
            
            var giaM = giaKm + giaKm*10/100;
            var giaL = giaKm + giaKm*15/100;
            var giaXL = giaKm + giaKm*20/100;

            
            giaMInput.value = giaM.toFixed(2);
            giaLInput.value = giaL.toFixed(2);
            giaXLInput.value = giaXL.toFixed(2);
          }

          document.addEventListener('DOMContentLoaded', function() {
            // Khi trang được tải lên, gọi hàm updatePrices() để cập nhật giá trị cho các ô khác
            updatePrices();
          });
</script>