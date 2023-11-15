<?php
  if(is_array($dm)){
      extract($dm);
  }
?>

<div class="row2">
  <div class="row2 font_title">
    <h1>CẬP NHẬT DANH MỤC</h1>
  </div>
  <div class="row2 form_content ">
    <form action="index.php?act=updatedm" method="POST">
      <div class="row2 mb10 form_content_container">
        <label> Tên danh mục </label> <br>
        <input type="text" name="tenDanhmuc" placeholder="nhập vào tên danh mục" value ='<?php if(isset($name) && ($name != '')) echo $name; ?>'>
      </div>
      <div class="row2 mb10">
        <label>Trạng thái </label> <br>
        <input type="text" name="trangthai" placeholder="Trạng thái" disabled value ='<?php if( $trang_thai == 0){echo $trang_thai = "Tồn Tại";}else{echo $trang_thai = "Đã xóa";} ?>'>
      </div>
      <div class="row mb10 ">
        <input type="hidden" name = "id_dm" value="<?php if(isset($id_dm) && ($id_dm >0)) echo $id_dm; ?>">
        <input class="mr20" type="submit" name='capnhat' value="CẬP NHẬT">
        <input class="mr20" type="reset" value="NHẬP LẠI">

        <a href="index.php?act=listdm"><input class="mr20" type="button" value="DANH SÁCH"></a>
      </div>
      <?php 
      if(isset($thongbao) && $thongbao != ""){
        echo $thongbao;
      }
        
      ?>
    </form>
  </div>
</div>