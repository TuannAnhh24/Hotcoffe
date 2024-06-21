<?php
if (is_array($chitietSanpham)) {
  extract($chitietSanpham);
}

$hinhpath = "../images/" . $img;
if (is_file($hinhpath)) {
  $hinh = "<img src= '" . $hinhpath . "' height ='100px'>";
} else {
  $hinh = "Chưa update hình ảnh";
}

?>
<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0">Sản phẩm</h4>

      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="javascript: void(0);">Sản phẩm</a></li>
          
          <li class="breadcrumb-item active">Sửa sản phẩm</li>
          <li class="breadcrumb-item active"><?php echo $chitietSanpham['name_sp'] ?></li>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="card">

    <div class="">
      <h1 class="">Sửa sản phẩm <?php echo $chitietSanpham['name_sp'] ?></h1>
    </div>

  <div class="card-body">
    <div class="col-12">
      <form action="index.php?act=updatesp" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="id_dm" class="form-label">Danh mục</label>
          <select name="id_dm" class="form-select">
            <?php
            foreach ($listdanhmuc as $danhmuc) {
              extract($danhmuc);
              if ($id_dm == $chitietSanpham['id_dm']) {
                echo "<option value='" . $danhmuc['id_dm'] . "' selected> $name </option>";
              } else {
                echo "<option value='" . $danhmuc['id_dm'] . "'> $name </option>";
              }
            }
            ?>
          </select>
        </div>
        <div class="mb-3">
          <label for="nameSp" class="form-label">Tên sản phẩm:</label>
          <input type="text" name="nameSp" class="form-control" value="<?php echo $chitietSanpham['name_sp'] ?>" required>
        </div>
        <div class="mb-3">
          <label for="gia_Goc" class="form-label">Giá gốc:</label>
          <input type="text" id="gia_Goc" name="gia_Goc" class="form-control" value="<?php echo $chitietSanpham['gia_goc'] ?>" required>
        </div>
        <div class="mb-3">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="discountCheckbox" name="discountCheckbox">
            <label class="form-check-label" for="discountCheckbox">Sản phẩm không được giảm giá</label>
          </div>
        </div>
        <div class="mb-3">
          <label for="gia_Km" class="form-label">Giá khuyến mãi:</label>
          <input type="text" id="gia_Km" name="gia_Km" class="form-control" >
        </div>
        <div class="mb-3">
          <label for="moTa" class="form-label">Mô tả:</label>
          <textarea name="moTa" id="moTa" class="form-control" rows="5"><?php echo $chitietSanpham['mo_ta'] ?></textarea>
        </div>
        <div class="mb-3">
          <label for="anhSp" class="form-label">Ảnh:</label>
          <input type="file" name="anhSp" class="form-control"><?= $hinh ?><br>
        </div>
        <div class="mb-3">
          <input type="hidden" name="id_sp" value="<?= $id_sp ?>">
          <input class="btn btn-primary" type="submit" name='Sua' value="Cập nhật">
          <input class="btn btn-secondary" type="reset" value="Nhập lại">
          <a href="index.php?act=listSp" class="btn btn-info">Danh sách</a>
        </div>
      </form>
    </div>
  </div>
</div>