
    <div class="row2">
         <div class="row2 font_title">
          <h1>THÊM MỚI SẢN PHẨM</h1>
        </div>
    <div class="row2 form_content ">
        <form action="index.php?act=addsp" method="POST" enctype="multipart/form-data">
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
            <input type="text" name="nameSp" placeholder="Nhập tên sản phẩm" required ><br>
          </div>
          <div class="row2 mb10 form_content_container">
            <label for="gia_goc">Giá Gốc:</label>
            <input type="text" id="gia_Goc" name="gia_Goc" placeholder="Nhập giá gốc sản phẩm" required ><br>
          </div>
          <div class="row2 mb10 form_content_container">
            <label for="discountCheckbox">Sản phẩm không được giảm giá</label>
            <input type="checkbox" id="discountCheckbox" name="discountCheckbox">
          </div>
          <div class="row2 mb10 form_content_container">
            <label for="ten_sanpham">Giá khuyến mãi:</label>
            <input type="text" id="gia_Km" name="gia_Km" required><br>
          </div>
          <div class="row2 mb10 form_content_container">
            <label for="siteM">Giá size: M </label>
            <input type="text" id="sizeM" name="sizeM" required value=""><br>
            <label for="siteL"> Giá size: L </label>
            <input type="text" id="sizeL" name="sizeL" required><br>
            <label for="sizeXL"> Giá size: XL </label>
            <input type="text" id="sizeXL" name="sizeXL" required><br>
          </div>
          <div class="row2 mb10 form_content_container">
            <label for="ten_sanpham">Mô tả:</label>
            <textarea name="moTa" id="" cols="250" rows="10"></textarea>
          </div>
          <div class="row2 mb10 form_content_container">
            <label for="ten_sanpham">Ảnh:</label>
            <input type="file" name="anhSp" ><br>
          </div>
          <div class="row mb10 ">
            <input class="mr20" type="submit" name='addSanpham' value="Thêm sản phẩm mới">
            <input class="mr20" type="reset" value="NHẬP LẠI">
            <a href="index.php?act=listdm"><input class="mr20" type="button" value="DANH SÁCH"></a>
          </div>
          <?php 
              if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
              ?>
        </form>  
        </div>
    </div>
  