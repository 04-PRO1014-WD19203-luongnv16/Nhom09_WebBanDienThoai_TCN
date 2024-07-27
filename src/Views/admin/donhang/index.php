<div class="card">
    <div class="">
        <h3 class="cart-title text-center px-5 py-3 bg-secondary text-light"><?= $title ?></h3>
    </div>
    <!-- <div class="px-5 py-3 text-center">
        <a class="btn btn-success text-center" href="/add-danh-muc">Thêm mới danh muc ++</a>
    </div> -->
    <div class="table-stats order-table ov-h">
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th>STT</th>
                    <th class="w-25">Mã đơn hàng</th>
                    <th class="w-25">Tài khoản đặt</th>
                    <th class="w-25">Ngày đặt hàng</th>
                    <th class="w-25">Tổng tiền</th>
                    <th class="w-25">Trạng Thái</th>
                    <th class="w-25">Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($donhangs as $key => $donhang) : ?>
                    <tr class="text-center">
                        <td><?= $key + 1 ?></td>
                        <td class="w-25">DH_<?= $donhang['id'] ?></td>
                        <?php foreach ($taikhoans as $key => $taikhoan) : ?>
                            <?php
                            if ($donhang['id_tai_khoans'] == $taikhoan['id']) : ?>
                                <td class="w-25">
                                    <?= $taikhoan['tai_khoan'] ?>
                                </td>
                            <?php endif ?>
                        <?php endforeach ?>
                        <td class="w-25">
                            <?= $donhang['ngay_dat_hang'] ?>
                        </td>
                        <td class="w-25">
                            <?= $donhang['tong_tien'] ?>
                        </td>
                        <?php foreach ($ttdonhang as $key => $ttdh) : ?>
                            <?php if ($donhang['trang_thai'] == $ttdh['id']) : ?>
                                <td class="w-25">
                                    <?= $ttdh['ten_trang_thai'] ?>
                                </td>
                            <?php endif ?>
                        <?php endforeach ?>
                        <td class="w-25">
                            <form action="" method="post">
                                <a class="btn btn-success text-light" href="/detail-don-hang?id=<?= $donhang['id'] ?>">Chi tiết</a>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>