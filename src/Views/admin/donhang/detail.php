<div class="card">
    <div class="text-title">
        <h3 class="text-center px-5 py-3 bg-secondary text-light"><?= $title ?></h3>
    </div>
    <div class="form mt-3 mb-3 container">
        <h3>Thông tin đơn hàng</h3>
        <form action="" method="post">
            <div class="mb-3">
                <label class="label-control" for="">Mã đơn hàng</label>
                <input class="form-control" type="text" name="id" value="<?= $donhang['id'] ?>" readonly>
            </div>
            <div class="mb-3">

                <select class="form-select" name="trang_thai" aria-label="Thay đổi trạng thái">
                    <?php
                    foreach ($ttdonhang as $key => $ttdh) {
                        if ($donhang['trang_thai'] == $ttdh['id']) {
                            echo '<option value=" ' . $ttdh['id'] . '"selected>' . $ttdh['ten_trang_thai'] . ' </option>';
                        } else {
                            echo '<option value=" ' . $ttdh['id'] . '">' . $ttdh['ten_trang_thai'] . ' </option>';
                        }
                    }
                    ?>

                </select>

            </div>
            <div class="mb-3">
                <label class="label-control" for="">Tên người nhận</label>
                <input class="form-control" type="text" name="ten_nguoi_nhan" value="<?= $donhang['ten_nguoi_nhan'] ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="label-control" for="">Địa chỉ</label>
                <input class="form-control" type="text" name="dia_chi" value="<?= $donhang['dia_chi'] ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="label-control" for="">Email</label>
                <input class="form-control" type="text" name="email" value="<?= $donhang['email'] ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="label-control" for="">Số điện thoại</label>
                <input class="form-control" type="text" name="so_dien_thoai" value="<?= $donhang['so_dien_thoai'] ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="label-control" for="">Tổng tiền</label>
                <input class="form-control" type="text" name="tong_tien" value="<?= $donhang['tong_tien'] ?> VNĐ" readonly>
            </div>
            <div class="mb-3">
                <label class="label-control" for="">Ngày đặt hàng</label>
                <input class="form-control" type="datetime" name="ngay_dat_hang" value="<?= $donhang['ngay_dat_hang'] ?>" readonly>
            </div>
            <?php foreach ($thanhtoans as $key => $thanhtoan) : ?>
                <div class="mb-3">
                    <label class="label-control" for="">Hình thức thanh toán</label>
                    <?php if ($donhang['id_thanh_toans'] == $thanhtoan['id']) : ?>
                        <input class="form-control" type="text" name="id_thanh_toans" value="<?= $thanhtoan['ten_thanh_toan'] ?>" readonly>
                    <?php endif ?>
                </div>
            <?php endforeach ?>
            <div class="py-3">
                <input class="btn btn-primary" name="submit" type="submit" value="Lưu">
                <a class="btn btn-warning text-light" href="/admin-don-hang">Quay lại</a>
            </div>
        </form>
    </div>
    <div class="table-stats order-table ov-h">
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th>Stt</th>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh đại diện</th>
                    <th>Màu Sắc</th>
                    <th>Dung lượng</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành Tiền</th>
                </tr>

            </thead>
            <tbody class="text-center">
                <?php foreach ($ctdonhangs as $key => $ctdonhang) : ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $ctdonhang['ten_san_pham'] ?></td>
                        <td><img style="width: 100%;" src="<?= $ctdonhang['anh_chinh'] ?>"></td>
                        <td><?= $ctdonhang['ten_mau_sac'] ?></td>
                        <td><?= $ctdonhang['ten_dung_luong'] ?></td>
                        <td><?= $ctdonhang['gia_ban'] ?></td>
                        <td><?= $ctdonhang['so_luong'] ?></td>
                        <td id="gia"><?= $ctdonhang['gia_ban'] * $ctdonhang['so_luong'] ?></td>
                    </tr>
                <?php endforeach ?>

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Tổng</td>
                    <td><?= $ctdonhang['tong_tien'] ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>