<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0">Sản phẩm</h4>

      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="javascript: void(0);">Sản phẩm</a></li>
          <li class="breadcrumb-item active">Danh sách sản phẩm</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="font_title mb-0">DANH SÁCH LOẠI SẢN PHẨM</h1>
            </div>
            <div class="col-auto">
                <div class="timkiem">
                    <form action="index.php?act=listSp" method="POST" class="d-flex">
                        <div class="tim_kiem me-2">
                            <input type="text" name="kyw" class="form-control" placeholder="Tìm kiếm...">
                        </div>
                        <div class="tim_kiem me-2">
                            <select name="id_dm" class="form-select">
                                <option value="0">Tất Cả</option>
                                <?php
                                foreach ($tendanhmuc as $danhmuc) {
                                    extract($danhmuc);
                                    echo '<option value="' . $id_dm . '">' . $name . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="go">
                            <input type="submit" name="listok" value="GO" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="#" method="POST">
            <div class="row2 mb-3 formds_loai">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Giá gốc</th>
                            <th>Giá khuyến mãi</th>
                            <th>View</th>
                            <th>Mô tả</th>
                            <th>Ảnh</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($listsanpham as $sanpham) {
                            extract($sanpham);
                            $suasp = 'index.php?act=suasp&id=' . $id_sp;
                            $xoasp = 'index.php?act=deleteSp&id=' . $id_sp;
                            $ctsp = 'index.php?act=ctsp&id=' . $id_sp;
                            $hinhpath = "../images/" . $img;
                            if (is_file($hinhpath)) {
                                $hinh = "<img src= '" . $hinhpath . "' height ='100px'>";
                            } else {
                                $hinh = "Chưa có ảnh";
                            }

                            echo '
                             <tr>
                                <td>' . $name_sp . '</td>
                                <td>' . $gia_goc . '</td>
                                <td>' . $gia_km . '</td>
                                <td>' . $view . '</td>
                                <td>' . substr($mo_ta, 0, 50) . '...</td>
                                <td>' . $hinh . '</td>
                                <td>
                                    <div class="btn-group">
                                        <div class="sua">
                                            <a href="' . $suasp . '" class="btn btn-primary">Sửa</a>
                                        </div>
                                        <div class="xoa">
                                            <a href="' . $xoasp . '" onclick="return confirm(\'Bạn có chắc muốn xóa không?\')" class="btn btn-danger">Xóa</a>
                                        </div>
                                        <div class="ctsp">
                                            <a href="' . $ctsp . '" class="btn btn-secondary">Thêm Chi tiết</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="btn">
                <input class="btn btn-primary me-2" type="button" value="CHỌN TẤT CẢ">
                <input class="btn btn-secondary me-2" type="button" value="BỎ CHỌN TẤT CẢ">
                <a href="index.php?act=addsp" class="btn btn-success">NHẬP THÊM</a>
            </div>
        </form>
        <!----------------------- Phân trang ----------------------->
        <div class="text-center">
            <nav id="pagination" class="pagination_wrap pagination_pages ">
                <ul class="pagination justify-content-center">
                    <?php if ($current_page > 1 && $total_page > 1) : ?>
                        <li class="page-item">
                            <a class="page-link" href="index.php?act=listSp&page=<?= ($current_page - 1) ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $total_page; $i++) : ?>
                        <li class="page-item <?= ($i == $current_page) ? 'active' : '' ?>">
                            <a class="page-link" href="index.php?act=listSp&id_dm=<?= $id_dm ?>&page=<?= $i ?>">
                                <?= $i ?>
                            </a>
                        </li>
                    <?php endfor; ?>

                    <?php if ($current_page < $total_page) : ?>
                        <li class="page-item">
                            <a class="page-link" href="index.php?act=listSp&id_dm=<?= $id_dm ?>&page=<?= ($current_page + 1) ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>
</div>
