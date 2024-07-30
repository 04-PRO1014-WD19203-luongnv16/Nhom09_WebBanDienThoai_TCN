<div class="card">
    <div class="text-title">
        <h3 class="text-center px-5 py-3 bg-secondary text-light"><?= $title ?></h3>
    </div>
    <div class="form mt-3 mb-3 container">
        <form action="" method="post">
            <div class="mb-3">

                <input class="form-control" type="text" name="id" value="<?= $taikhoan['id'] ?>" readonly hidden>
            </div>
            <div class="mb-3">
                <label class="label-control" for="">Tên đăng nhập</label>
                <input class="form-control" type="text" name="tai_khoan" value="<?= $taikhoan['tai_khoan'] ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="label-control" for="">Mật Khẩu</label>
                <input class="form-control" type="text" name="mat_khau" value="<?= $taikhoan['mat_khau'] ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="label-control" for="">Email</label>
                <input class="form-control" type="text" name="mat_khau" value="<?= $taikhoan['email'] ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="label-control" for="">Số điện thoại</label>
                <input class="form-control" type="text" name="so_dien_thoai" value="<?= $taikhoan['so_dien_thoai'] ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="label-control" for="">Địa Chỉ</label>
                <input class="form-control" type="text" name="mat_khau" value="<?= $taikhoan['dia_chi'] ?>" readonly>
            </div>
            <div class="mb-3">

                <select class="form-select" name="trang_thai" aria-label="Thay đổi trạng thái">
                    <option value="1">User</option>
                    <option value="2">Admin</option>
                    <option value="3">Block</option>
                </select>

            </div>
            <div class="py-3">
                <input class="btn btn-primary" name="submit" type="submit" value="Lưu">
                <a class="btn btn-warning text-light" href="/admin-tai-khoan">Quay lại</a>
            </div>
        </form>
    </div>
</div>