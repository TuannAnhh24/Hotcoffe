<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0">Danh mục</h4>

      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="javascript: void(0);">Danh mục</a></li>
          <li class="breadcrumb-item active">Thêm danh mục</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="">
  <div class="card">
    <div class="card-header ">
      <h1 class="font_title">THÊM DANH MỤC</h1>
    </div>
    <div class="card-body">
      <div class="row justify-content-center">
        <div class="col-8">
          <form action="index.php?act=adddm" method="POST">
            <div class="mb-3">
              <label for="tenDanhmuc" class="form-label">Tên danh mục</label>
              <input type="text" class="form-control" id="tenDanhmuc" name="tenDanhmuc" placeholder="Nhập vào tên" required>
            </div>
            <div class="mb-3">
              <label for="trangthai" class="form-label">Trạng thái</label>
              <input type="text" class="form-control" id="trangthai" name="trangthai" placeholder="Trạng thái" disabled>
            </div>
            <div class="mb-3 d-flex justify-content-between">
              <button type="submit" name="themmoi" class="btn btn-primary">THÊM MỚI</button>
              <button type="reset" class="btn btn-secondary">NHẬP LẠI</button>
              <a href="index.php?act=listdm" class="btn btn-info">DANH SÁCH</a>
            </div>
            <?php
            if (isset($thongbao) && $thongbao != "") {
              echo '<div class="alert alert-info mt-3">' . $thongbao . '</div>';
            }
            ?>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>