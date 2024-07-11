<div class="card">
    <div class="">
        <h3 class="cart-title text-center px-5 py-3 bg-secondary text-light"><?= $title?></h3>
    </div>
    <div class="table-stats order-table ov-h">
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th>STT</th>
                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh đại diện</th>
                    <th>Mô tả ngắn gọn</th>
                    <th>Mô tả</th>
                    <th>Ngày đăng</th>
                    <th>Danh mục</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sanphams as $key=>$sanpham) :?>
                    <tr>
                        <td><?=$key+1?></td>
                        <td><?=$sanpham['id']?></td>
                        <td><?=$sanpham['ten_san_pham']?></td>
                        <td><img src="<?=$sanpham['anh_chinh']?>" alt="ảnh chính"></td>
                        <td><?=$sanpham['mo_ta_ngan']?></td>
                        <td><?=$sanpham['mo_ta']?></td>
                        <td><?=$sanpham['ngay_tao']?></td>
                        <td><?=$sanpham['id_danh_mucs']?></td>
                        <td>
                            <button type="submit" class="btn btn-danger m-1">Xóa</button>
                            <button type="submit" class="btn btn-warning m-1">Sửa</button>
                        </td>
                    </tr>   
                <?php endforeach?>
            </tbody>
        </table>
    </div>
</div>