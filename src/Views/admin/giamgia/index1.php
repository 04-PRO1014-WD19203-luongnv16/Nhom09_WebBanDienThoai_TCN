<div class="card">
    <div class="">
        <h3 class="cart-title text-center px-5 py-3 bg-secondary text-light"><?= $title ?></h3>
    </div>
    <div class="px-5 py-3 text-center">
        <a class="btn btn-success text-center" href="/add-giam-gia">Thêm mới mã giảm giá</a>
    </div>
    <div class="table-stats order-table ov-h">
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th>STT</th>
                    <th class="">Tên mã giảm giá</th>
                    <th class="">Shortcode</th>
                    <th class="">Mức giảm giá</th>
                    <th class="">Ngày tạo</th>
                    <th class="">Ngày hết hạn</th>
                    <th class="">Trạng thái</th>
                    <th class="text-center">Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($giamgias as $key => $giamgia) : ?>

                    <tr class="text-center">
                        <td><?= $key + 1 ?></td>
                        <td class=""><?= $giamgia['ten_ma'] ?></td>
                        <td class=""><?= $giamgia['shortcode'] ?></td>
                        <td class=""><?= $giamgia['muc_giam'] ?></td>
                        <td class=""><?= $giamgia['ngay_tao'] ?></td>
                        <td class=""><?= $giamgia['ngay_het_han'] ?></td>
                        <td class=""><?php if ($giamgia['trang_thai'] == 1) {
                                            echo "Còn hạn sử dụng";
                                        } else {
                                            echo "Hết hạn sử dụng";
                                        }

                                        ?></td>
                        <td>
                            <form action="/return-giam-gia" method="post">
                                <div class="" style="display: grid;grid-template-columns: 1fr;gap: 2px;">
                                    <input type="text" name="id" value="<?= $giamgia['id'] ?>" readonly hidden>
                                    <input onclick="return confirm('Bạn có chắc muốn khôi phục mã giảm giá id: <?= $giamgia['id'] ?>');" class="btn btn-danger" type="submit" value="Khôi phục">
                                </div>
                            </form>
                        </td>
                    </tr>

                <?php endforeach ?>
            </tbody>
        </table>
        <div class="text-center mx-3">
            <a class="btn btn-info text-light" role="button" href="/admin-giam-gia">Quay Lại</a>
        </div>
    </div>
</div>