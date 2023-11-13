<?php
  if(is_array($sanpham)){
    extract($sanpham);
  }

  $hinhpath= "../upload/".$img;
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
      <div class="row2 form_content ">
      <form action="index.php?act=adddm" method="POST" enctype="multipart/form-data">
        <div class="row2 mb10 form_content_container">
                    <label> Danh mục </label> <br>
                    <?php 
                        foreach($listdanhmuc as $danhmuc){
                            extract($danhmuc);
                            if($danhmuc['id_dm']==$id_dm){
                                echo "<option value='$id_dm'  selected> $name </option>";
                            }else{
                                echo "<option value='".$id_dm."'> $name </option>";
                            }
                        }
                    ?>
            </div>
          <div class="row2 mb10 form_content_container">
            <label for="ten_sanpham">Tên Sản Phẩm:</label>
            <input type="text" name="nameSp" value="" required ><br>
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
            <input type="text" id="sizeXl" name="sizeXl" required><br>
          </div>
          <div class="row2 mb10 form_content_container">
            <label for="ten_sanpham">Mô tả:</label>
            <textarea name="" id="" cols="250" rows="10"></textarea>
          </div>
          <div class="row2 mb10 form_content_container">
            <label for="ten_sanpham">Ảnh:</label>
            <input type="file" name="anh_sanpham" required> <?=$hinh?><br>
          </div>
          <div class="row mb10 ">
            <input class="mr20" type="submit" name='themmoi' value="THÊM MỚI">
            <input class="mr20" type="reset" value="NHẬP LẠI">
            <a href="index.php?act=listdm"><input class="mr20" type="button" value="DANH SÁCH"></a>
          </div>
          
        </form>  
      </div>
    </div>