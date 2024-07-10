<div class="card">
    <div class="text-title">
        <h3 class="text-center px-5 py-3 bg-secondary text-light"><?= $title ?></h3>
    </div>
    <div class="form mt-3 mb-3 container">
        <form action="" method="post">
            <div class="mb-3">
                <label class="label-control" for="">Mã danh mục</label>
                <input class="form-control" type="text" name="id" value="<?=$danhmuc['id']?>" readonly>
            </div>
            <!-- // -- // -- // -->
            <div class="mb-3">
                <label class="label-control" for="">Tên danh mục</label>
                <input class="form-control" type="text" name="ten_danh_muc" value="<?=$danhmuc['ten_danh_muc']?>">
                <?php if ($check) :?>
                    <div class='form-text text-danger' style='font-size: 15px;'>Vui lòng điền tên danh mục</div>
                    <?php endif?>
                <?php if (!$check) :?>
                        <?php if ($checkForm) :?>
                            <div class='form-text text-danger' style='font-size: 15px;'>Tên danh muc bị trùng lặp</div>
                        <?php endif?>
                    <?php endif?>
            </div>
            <div class="py-3">
                <input class="btn btn-primary" name="submit" type="submit" value="Lưu">
                <a class="btn btn-warning text-light" href="/admin-danhmuc">Quay lại</a>
            </div>
        </form>
    </div>
</div>