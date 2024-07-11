<div class="card">
    <div class="">
        <h3 class="cart-title text-center px-5 py-3 bg-secondary text-light"><?= $title ?></h3>
    </div>
    <div class="container my-3">
        <div class="form">
            <form action="" method="post">
                <div class="mb-3">
                    <label class="lable-control" for="">Tên danh mục</label>
                    <input class="form-control" type="text" name="ten_danh_muc" id="">
                    <?php if ($check) :?>
                    <div class='form-text text-danger' style='font-size: 15px;'>Vui lòng điền tên danh mục</div>
                    <?php endif?>
                    <?php if (!$check) :?>
                        <?php if ($checkForm) :?>
                            <div class='form-text text-danger' style='font-size: 15px;'>Danh mục đã tồn tại</div>
                        <?php endif?>
                    <?php endif?>
                </div>
                <div class="text-center">
                    <input name="submit" class="btn btn-success" type="submit" value="Thêm mới ++">
                    <input class="btn btn-danger" type="reset" value="Xóa">
                    <a class="btn btn-info" href="/admin-danhmuc">Quay lại</a>
                </div>
            </form>

        </div>
    </div>
</div>