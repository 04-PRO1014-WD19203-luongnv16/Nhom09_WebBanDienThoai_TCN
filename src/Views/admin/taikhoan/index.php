<div class="card">
    <div class="">
        <h3 class="cart-title text-center px-5 py-3 bg-secondary text-light"><?= $title ?></h3>
    </div>
    <div class="table-stats order-table ov-h">
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th>STT</th>
                    <th class="w-25">Tên đăng nhập</th>
                    <th class="w-25">Mật khẩu</th>

                    <th class="w-25">Email</th>
                    <th class="w-25">Số điện thoại</th>
                    <th class="w-25">Địa Chỉ</th>

                    <th class="w-25">Vai Trò</th>
                    <th class="text-center">Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($taikhoans as $key => $taikhoan) : ?>
                    <tr class="text-center">
                        <td><?= $key + 1 ?></td>
                        <td class="w-25"><?= $taikhoan['tai_khoan'] ?></td>
                        <td class="w-25"><?= $taikhoan['mat_khau'] ?></td>

                        <td class="w-25"><?= $taikhoan['email'] ?></td>
                        <td class="w-25"><?= $taikhoan['so_dien_thoai'] ?></td>
                        <td class="w-25"><?= $taikhoan['dia_chi'] ?></td>

                        <td class="w-25"><?php
                                            if ($taikhoan['trang_thai'] == 1) {
                                                echo 'User';
                                            } elseif ($taikhoan['trang_thai'] == 2) {
                                                echo 'Admin';
                                            } else {
                                                echo 'Block';
                                            }
                                            ?></td>

                        <td>
                            <form action="/delete-tai-khoan" method="post">
                                <div class="" style="display: grid;grid-template-columns: 1fr 1fr;gap: 10px;">
                                    <input type="text" name="id" value="<?= $taikhoan['id'] ?>" readonly hidden>
                                    <a class="btn btn-warning text-light" href="/sua-tai-khoan?id=<?= $taikhoan['id'] ?>">Sửa</a>
                                </div>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>