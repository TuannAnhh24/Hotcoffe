<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Đơn hàng</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Đơn hàng</a></li>
                    <li class="breadcrumb-item active">Danh sách đơn hàng</li>
                    <li class="breadcrumb-item active">Chi tiết đơn hàng</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col">
                <h1 class="font_title">CHI TIẾT HÓA ĐƠN</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="row mb-3">
                    <table class="table table-bordered table-striped table-hover ">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">Mã đơn</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Size</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Lượng đá</th>
                                <th scope="col">Lượng đường</th>
                                <th scope="col">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($xem_hd as $ct) :
                                extract($ct);
                                $ttien = 0;
                            ?>
                                <tr>
                                    <td><?= $id_hd ?></td>
                                    <td><?= $name_sp ?></td>
                                    <td><?= $size ?></td>
                                    <td><?= $so_luong ?></td>
                                    <td><?= $luong_da ?></td>
                                    <td><?= $luong_duong ?></td>
                                    <td><?= number_format($tien, 0, '.', ',') ?> VNĐ</td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div >
                        <a href="index.php?act=dsdh" class="btn btn-secondary">Trở lại</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>