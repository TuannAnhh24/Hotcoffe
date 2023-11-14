<div class="row2">
      <div class="row2 font_title">
        <h1>THÊM DANH MỤC</h1>
      </div>
      <div class="row2 form_content ">
        <form action="index.php?act=adddm" method="POST">
          <div class="row2 mb10 form_content_container">
            <label> Tên danh mục </label> <br>
            <input type="text" name="tenDanhmuc" placeholder="nhập vào tên" >
          </div>
          <div class="row2 mb10">
            <label>Trạng thái </label> <br>
            <input type="text" name="trangthai" placeholder="Trạng thái" disabled>
          </div>
          <div class="row mb10 ">
            <input class="mr20" type="submit" name='themmoi' value="THÊM MỚI">
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