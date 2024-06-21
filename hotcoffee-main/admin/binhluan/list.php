<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Bình luận</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Bình luận</a></li>
                    <li class="breadcrumb-item active">Danh sách bình luận</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="row">
        <div class="col-12">
            <div class="font_title">
                <h1 class="mb-0">DANH SÁCH BÌNH LUẬN</h1>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <form class="row g-3 align-items-center" action="" method="POST">
                <div class="col-md-auto">
                    <label for="ngayBatDau" class="form-label">Từ ngày:</label>
                    <input type="date" class="form-control" id="ngayBatDau" name="ngayBatDau">
                </div>
                <div class="col-md-auto">
                    <label for="ngayKetThuc" class="form-label">Đến ngày:</label>
                    <input type="date" class="form-control" id="ngayKetThuc" name="ngayKetThuc">
                </div>
                <div class="col-md-auto">
                    <button type="submit" name="filter" class="btn btn-primary">Lọc</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Sản phẩm</th>
                            <th scope="col">Tài Khoản</th>
                            <th scope="col">Nội dung</th>
                            <th scope="col">Ngày bình luận</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listbl as $bl) : ?>
                            <tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><?= $bl['id_sp'] ?></td>
                                <td><?= $bl['id_tk'] ?></td>
                                <td><?= $bl['noi_dung'] ?></td>
                                <td><?= date("d/m/Y ~ H:ia", strtotime($bl['ngay_bl'])) ?></td>
                                <td>
                                    <a href="index.php?act=xoabl&id_bl=<?= $bl['id_bl'] ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa danh mục này không?')">Xóa</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <div class="pagination d-flex justify-content-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <?php if ($current_page > 1 && $total_page > 1) : ?>
                            <li class="page-item">
                                <a class="page-link" href="index.php?act=dsbl&page=<?= ($current_page - 1) ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php for ($i = 1; $i <= $total_page; $i++) : ?>
                            <li class="page-item <?= ($i == $current_page) ? 'active' : '' ?>">
                                <a class="page-link" href="index.php?act=dsbl&page=<?= $i ?>">
                                    <?= $i ?>
                                </a>
                            </li>
                        <?php endfor; ?>

                        <?php if ($current_page < $total_page) : ?>
                            <li class="page-item">
                                <a class="page-link" href="index.php?act=dsbl&page=<?= ($current_page + 1) ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <div class="text-center">
                <input class="btn btn-secondary mr-2" type="button" value="CHỌN TẤT CẢ">
                <input class="btn btn-secondary" type="button" value="BỎ CHỌN TẤT CẢ">
            </div>
        </div>
    </div>
</div>