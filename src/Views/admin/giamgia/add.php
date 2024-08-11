<div class="card">
    <div class="">
        <h3 class="cart-title text-center px-5 py-3 bg-secondary text-light"><?= $title ?></h3>
    </div>
    <div class="container my-3">
        <div class="form">
            <form action="" method="post">
                <div class="mb-3">
                    <label class="lable-control" for="">Tên mã</label>
                    <input class="form-control" type="text" name="ten_ma" id="">
                    <?php if ($check) : ?>
                        <div class='form-text text-danger' style='font-size: 15px;'>Vui lòng điền tên mã</div>
                    <?php endif ?>
                    <?php if (!$check) : ?>
                        <?php if ($checkForm) : ?>
                            <div class='form-text text-danger' style='font-size: 15px;'>Đã tồn tại</div>
                        <?php endif ?>
                    <?php endif ?>
                </div>
                <div class="mb-3">
                    <label class="lable-control" for="">Shortcode</label>
                    <input class="form-control" type="text" name="shortcode" id="">
                    <?php if ($check) : ?>
                        <div class='form-text text-danger' style='font-size: 15px;'>Không được để trống</div>
                    <?php endif ?>
                    <?php if (!$check) : ?>
                        <?php if ($checkForm) : ?>
                            <div class='form-text text-danger' style='font-size: 15px;'>Đã tồn tại</div>
                        <?php endif ?>
                    <?php endif ?>
                </div>
                <div class="mb-3">
                    <label class="lable-control" for="">Mức Giảm</label>
                    <input class="form-control" type="text" name="muc_giam" id="">
                    <?php if ($check) : ?>
                        <div class='form-text text-danger' style='font-size: 15px;'>Không được để trống</div>
                    <?php endif ?>
                    <?php if (!$check) : ?>
                        <?php if ($checkForm) : ?>
                            <div class='form-text text-danger' style='font-size: 15px;'>Đã tồn tại</div>
                        <?php endif ?>
                    <?php endif ?>
                </div>
                <div class="mb-3">
                    <label class="lable-control" for="">Ngày bắt đầu</label>
                    <input class="form-control" type="datetime-local" name="ngay_tao" id="">
                    <?php if ($check) : ?>
                        <div class='form-text text-danger' style='font-size: 15px;'>Vui lòng điền tên mã</div>
                    <?php endif ?>
                    <?php if (!$check) : ?>
                        <?php if ($checkForm) : ?>
                            <div class='form-text text-danger' style='font-size: 15px;'>Đã tồn tại</div>
                        <?php endif ?>
                    <?php endif ?>
                </div>
                <div class="mb-3">
                    <label class="lable-control" for="">Ngày hết hạn</label>
                    <input class="form-control" type="datetime-local" name="ngay_het_han" id="">
                    <?php if ($check) : ?>
                        <div class='form-text text-danger' style='font-size: 15px;'>Vui lòng điền tên mã</div>
                    <?php endif ?>
                    <?php if (!$check) : ?>
                        <?php if ($checkForm) : ?>
                            <div class='form-text text-danger' style='font-size: 15px;'>Đã tồn tại</div>
                        <?php endif ?>
                    <?php endif ?>
                </div>
                <div class="text-center">
                    <input name="submit" class="btn btn-success" type="submit" value="Thêm mới">
                    <a class="btn btn-info text-light" href="/admin-giam-gia">Quay lại</a>
                </div>
            </form>

        </div>
    </div>
</div>