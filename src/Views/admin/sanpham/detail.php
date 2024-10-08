<div class="">
    <h3 class="cart-title text-center px-5 py-3 bg-secondary text-light"><?= $title ?></h3>
</div>
<div class="card">
    <div class="text-center">
        <img style="width: 400px;text-align: center;" src="<?= $sanpham['anh_chinh'] ?>" class="rounded" alt="ảnh chính">
    </div>
    <div class="card-body">
        <p class="card-text"><?= $sanpham['ten_san_pham'] ?></p>
        <p class="card-text"><?= $sanpham['mo_ta_ngan'] ?></p>
        <p class="card-text"><?= $sanpham['mo_ta'] ?></p>
        <div>
            <?php
            foreach ($danhmucs as $key => $danhmuc) {
                if ($sanpham['id_danh_mucs'] == $danhmuc['id']) {
                    echo '<p class="card-text">Danh mục: ' . $danhmuc['ten_danh_muc'] . ' </p>';
                }
            }
            ?></p>
        </div>
        <div class="form-group ">
            <label class="">Sản phẩm hiện có</label>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Màu sắc</th>
                        <th>Dung lượng</th>
                        <th>Số lượng</th>
                        <th>Giá gốc</th>
                        <th>Giá bán</th>
                        <th>Chức năng</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($bienthes as  $bienthe) :
                    ?>
                        <?php if ($bienthe['id_san_phams'] == $sanpham['id']) : ?>
                            <tr>
                                <td>
                                    <?= $bienthe['ten_mau_sac'] ?>
                                </td>
                                <td>
                                    <?= $bienthe['ten_dung_luong'] ?>

                                </td>

                                <td>
                                    <?= $bienthe['so_luong'] ?>
                                </td>

                                <td>
                                    <?= $bienthe['gia_goc'] ?>
                                </td>
                                <td><?= $bienthe['gia_ban'] ?>

                                </td>
                                <form action="" method="post">
                                    <input type="text" name="id" readonly hidden value="<?= $bienthe['id'] ?>">
                                    <td><a class="btn btn-success text-light" href="/update-bien-the?id=<?= $bienthe['id'] ?>">Sửa</a></td>
                                </form>

                            </tr>
                        <?php endif ?>
                    <?php endforeach
                    ?>
                </tbody>
            </table>
        </div>

    </div>

    <div class="text-left mx-3">
        <a class="btn btn-success text-light" href="/admin-san-pham">Quay lại</a>
    </div>
</div>