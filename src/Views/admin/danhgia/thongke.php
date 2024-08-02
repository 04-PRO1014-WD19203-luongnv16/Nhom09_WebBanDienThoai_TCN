<div class="card">
    <div class="">
        <h3 class="cart-title text-center px-5 py-3 bg-secondary text-light"><?= $title ?></h3>
    </div>
    <div class="px-5 py-3 text-center">
        <a class="btn btn-primary text-end" href="/admin-danh-gia">Quay lại</a>
    </div>
    <div class="table-stats order-table ov-h">
        <table class="table">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Điểm số trung bình</th>
                    <th>Số lần đánh giá</th>
                    <th>Chỉnh sửa</th>
                </tr>
            </thead>
            <tbody>
                <?php  foreach ($thongke as $tk) { 
                    ?>  
                    <tr>
                        <td><?= $tk['ten_san_pham'] ?> </td>
                        <td><img src="<?= $tk['anh_chinh'] ?>"></td>
                        <td><?= $tk['danh_gia_trung_binh'] ?></td>
                        <td><?= $tk['tong_trung_binh'] ?></td>  
                        <td><button class="btn btn-warning">Sửa</button></td>
                    </tr>            
                           
                <?php } ?>

            </tbody>
        </table>
    </div>
</div>