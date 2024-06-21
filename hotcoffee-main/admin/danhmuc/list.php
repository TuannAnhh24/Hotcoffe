<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0">Danh mục</h4>

      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="javascript: void(0);">Danh mục</a></li>
          <li class="breadcrumb-item active">Danh sách danh mục</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="card">
    <div class="card-header ">
        <h1 class="font_title">Danh sách danh mục</h1>
    </div>

    <div class="">
        <div class="col-12">
            <form action="#" method="POST">
                <div class="mb-3">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">Mã danh mục</th>
                                <th scope="col">Tên danh mục</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listdanhmuc as $danhmuc) : ?>
                                <?php extract($danhmuc); ?>
                                <?php $trang_thai = ($trang_thai == 0) ? "Tồn Tại" : "Đã xóa"; ?>
                                <?php $suadm = 'index.php?act=suadm&id_dm=' . $id_dm; ?>
                                <?php $xoadm = 'index.php?act=xoadm&id_dm=' . $id_dm; ?>
                                <?php $kpdm = 'index.php?act=kpdm&id_dm=' . $id_dm; ?>
                                <tr>
                                    <td class="fw-bold fs-5"><?= $id_dm ?></td>
                                    <td class="fw-bold fs-5"><?= $name ?></td>
                                    <td class="fw-bold fs-5"><?= $trang_thai ?></td>
                                    <td >
                                        <?php if ($trang_thai == "Tồn Tại") : ?>
                                            <a href="<?= $suadm ?>" class="btn btn-primary btn-sm">Sửa</a>
                                            <a href="<?= $xoadm ?>" onclick="return confirm('Bạn có chắc muốn xóa danh mục này không?')" class="btn btn-danger btn-sm">Xóa</a>
                                        <?php else : ?>
                                            <a href="<?= $kpdm ?>" onclick="return confirm('Bạn có chắc muốn khôi phục danh mục này không?')" class="btn btn-success btn-sm">Khôi phục</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="mb-3">

                    <a href="index.php?act=adddm" class="btn btn-success">NHẬP THÊM</a>
                </div>
            </form>
        </div>
    </div>
</div>
</div>