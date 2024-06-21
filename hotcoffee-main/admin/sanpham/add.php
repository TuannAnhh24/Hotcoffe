<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0">Sản phẩm</h4>

      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="javascript: void(0);">Sản phẩm</a></li>
          <li class="breadcrumb-item active">Thêm sản phẩm</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="card">
  <div class="card-header">
    <h1 class="font_title">THÊM MỚI SẢN PHẨM</h1>
  </div>
  <div class="card-body">
    <form action="index.php?act=addsp" method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="danhmuc" class="form-label">Danh mục</label>
        <select name="id_dm" class="form-select">
          <?php
          foreach ($listdanhmuc as $danhmuc) {
            extract($danhmuc);
            echo "<option value='" . $id_dm . "'> $name </option>";
          }
          ?>
        </select>
      </div>
      <div class="mb-3">
        <label for="ten_sanpham" class="form-label">Tên Sản Phẩm:</label>
        <input type="text" class="form-control" name="nameSp" placeholder="Nhập tên sản phẩm" required>
      </div>
      <div class="mb-3">
        <label for="gia_goc" class="form-label">Giá Gốc:</label>
        <input type="text" class="form-control" id="gia_Goc" name="gia_Goc" placeholder="Nhập giá gốc sản phẩm" required>
      </div>
      <div class="mb-3">
        <label for="gia_km" class="form-label">Giá khuyến mãi:</label>
        <input type="text" class="form-control" id="gia_Km" name="gia_Km" required>
      </div>
      <div class="mb-3">
        <label for="mo_ta" class="form-label">Mô tả:</label>
        <textarea class="form-control" name="moTa" rows="5" required></textarea>
      </div>
      <div class="mb-3">
        <label for="anh_sp" class="form-label">Ảnh:</label>
        <input type="file" class="form-control" name="anhSp" required>
      </div>
      <div class="mb-3">
        <input class="btn btn-primary me-2" type="submit" name="addSanpham" value="Thêm sản phẩm mới">
        <input class="btn btn-secondary me-2" type="reset" value="NHẬP LẠI">
        <a href="index.php?act=listSp" class="btn btn-info">DANH SÁCH</a>
      </div>
      <?php
      if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
      ?>
    </form>
  </div>
</div>