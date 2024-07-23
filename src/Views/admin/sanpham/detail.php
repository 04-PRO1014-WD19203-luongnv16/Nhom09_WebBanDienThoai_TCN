<div class="">
    <h3 class="cart-title text-center px-5 py-3 bg-secondary text-light"><?= $title ?></h3>
</div>
<div class="card" style="width: 100%;">
    <img src="<?= $sanpham['anh_chinh'] ?>" class="img-fluid" alt="...">
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

            // <p class="card-text">Danh mục: <?= $danhmuc['ten_danh_muc']  
            ?></p>
        </div>

    </div>
    <div class="text-right">
        <a class="btn btn-info" href="/admin-san-pham">Quay lại</a>
    </div>
</div>