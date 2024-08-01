<div class="card">
    <div class="">
        <h3 class="cart-title text-center px-5 py-3 bg-secondary text-light"><?= $title ?></h3>
    </div>
    <div class="px-5 py-3 text-center">
        <a class="btn btn-success text-center" href="/add-san-pham">Thêm mới sản phẩm</a>
    </div>
    <div class="table-stats order-table ov-h">
        <table class="table">
            <thead>
                <tr class="text-center">

                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh đại diện</th>
                    <th>Ngày đăng</th>
                    <th>Danh mục</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php foreach ($sanphams as $key => $sanpham) : ?>
                    <tr>
                        <td><?= $sanpham['id'] ?></td>
                        <td><?= $sanpham['ten_san_pham'] ?></td>
                        <td><img style="width: 100px;" src="<?= $sanpham['anh_chinh'] ?>" alt="ảnh chính"></td>
                        <td><?= $sanpham['ngay_tao'] ?></td>
                        <td><?= $sanpham['id_danh_mucs'] ?></td>
                        <td>
                            <form action="/delete-san-pham" method="post">
                                <div class="" style="display: grid;grid-template-columns: 1fr 1fr;gap: 10px;">
                                    <input type="text" name="id" value="<?= $sanpham['id'] ?>" readonly hidden>
                                    <input onclick="return confirm('Bạn có chắc muốn xóa sản phẩm id: <?= $sanpham['id'] ?>');" class="btn btn-danger" type="submit" value="Xóa">
                                    <a class="btn btn-warning text-light" href="/sua-san-pham?id=<?= $sanpham['id'] ?>">Sửa</a>
                                    <a class="btn btn-success text-light" href="/detail-san-pham?id=<?= $sanpham['id'] ?>">Chi tiết</a>
                                </div>
                            </form>
                            <!-- <button type="submit" class="btn btn-danger m-1">Xóa</button>
                            <button type="submit" class="btn btn-warning m-1">Sửa</button> -->
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>