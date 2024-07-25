<div class="card">
    <div class="text-title">
        <h3 class="text-center px-5 py-3 bg-secondary text-light"><?= $title ?></h3>
    </div>
    <div class="form mt-3 mb-3 container">
        <form action="" method="post">
            <div class="mb-3">
                <label class="label-control" for="">Mã đơn hàng</label>
                <input class="form-control" type="text" name="id" value="DH_<?= $donhang['id'] ?>" readonly>
            </div>
            <div class="py-3">
                <input class="btn btn-primary" name="submit" type="submit" value="Lưu">
                <a class="btn btn-warning text-light" href="/admin-danhmuc">Quay lại</a>
            </div>
        </form>
    </div>
</div>