<?php
if (is_array($dm)) {
  extract($dm);
}
?>


<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0">Danh mục</h4>

      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="javascript: void(0);">Danh mục</a></li>
          <li class="breadcrumb-item active">Sửa danh mục</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="card">
  <div class="card-header ">
    <h1 class="font_title">SỬA DANH MỤC</h1>
  </div>
  <div class="card-body">
    <form action="index.php?act=updatedm" method="POST">
      <div class="mb-3">
        <label for="tenDanhmuc" class="form-label">Tên danh mục</label>
        <input type="text" class="form-control" id="tenDanhmuc" name="tenDanhmuc" placeholder="Nhập vào tên danh mục" value='<?php if (isset($name) && ($name != '')) echo $name; ?>'>
      </div>
      <div class="mb-3">
        <label for="trangthai" class="form-label">Trạng thái</label>
        <input type="text" class="form-control" id="trangthai" name="trangthai" placeholder="Trạng thái" disabled value='<?php if ($trang_thai == 0) {
                                                                                                                            echo $trang_thai = "Tồn Tại";
                                                                                                                          } else {
                                                                                                                            echo $trang_thai = "Đã xóa";
                                                                                                                          } ?>'>
      </div>
      <div class="mb-3">
        <input type="hidden" name="id_dm" value="<?php if (isset($id_dm) && ($id_dm > 0)) echo $id_dm; ?>">
        <input class="btn btn-primary me-2" type="submit" name="capnhat" value="CẬP NHẬT">
        <input class="btn btn-secondary me-2" type="reset" value="NHẬP LẠI">
        <a href="index.php?act=listdm" class="btn btn-info">DANH SÁCH</a>
      </div>
      <?php
      if (isset($thongbao) && $thongbao != "") {
        echo $thongbao;
      }
      ?>
    </form>
  </div>

</div>