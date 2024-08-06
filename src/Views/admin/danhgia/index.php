<div class="card">
    <div class="">
        <h3 class="cart-title text-center px-5 py-3 bg-secondary text-light"><?= $title ?></h3>
    </div>
    <div class="px-5 py-3 text-center">
        <a class="btn btn-success text-end" href="/admin-thong-ke">Thông kê sản phẩm</a>
    </div>
    <div class="table-stats order-table ov-h">
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th>STT</th>
                    <th class="w-15">Điểm số</th>
                    <th class="w-30">Nội dung</th>
                    <th class="w-20">Ngày đánh giá</th>
                    <th class="w-20">Tài khoản</th>
                    <th class="w-15">Biến thể</th>
                    <th class="w-15">Sản phẩm</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($danhgia as $key => $dg): ?>
                    <tr class="text-center">
                        <td class="w-10">DG_<?= $dg['id'] ?></td>
                        <td class="w-15"><?= $dg['diem_so'] ?></td>
                        <td class="w-30"><?= $dg['noi_dung'] ?></td>
                        <td class="w-20"><?= $dg['ngay_danh_gia'] ?></td>
                        <td class="w-15"><?= $dg['id_tai_khoans'] ?></td>
                        <td class="w-20"><?= $dg['id_bien_thes'] ?></td>
                        <td class="w-20"><?= $dg['id_san_phams'] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>