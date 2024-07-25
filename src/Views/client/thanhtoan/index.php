<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $title ?></title>
    <!-- Head -->
    <?php include_once "./src/Views/client/components/head.php"; ?>
</head>

<body class="goto-here">
    <!-- Header -->
    <?php include_once "./src/Views/client/components/header.php"; ?>
    <!-- Nav -->
    <?php include_once "./src/Views/client/components/navbar.php"; ?>
    <!-- Content -->

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 ftco-animate">
                    <form action="/thanh-toan" class="billing-form" method="POST">
                        <h3 class="mb-4 billing-heading text-center">Thông tin đơn hàng</h3>
                        <div class="row align-items-end">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstname">Tên người nhận</label>
                                    <input type="text" name="ten_nguoi_nhan" class="form-control" value="<?=$tai_khoan['tai_khoan']?>" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastname">Địa chỉ nhận hàng</label>
                                    <input type="text" name="dia_chi" class="form-control" value="<?=$tai_khoan['dia_chi']?>" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="streetaddress">Email</label>
                                    <input type="text" name="email" class="form-control" value="<?=$tai_khoan['email']?>" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="streetaddress">Số điện thoại</label>
                                    <input type="text" name="so_dien_thoai" class="form-control" value="<?=$tai_khoan['so_dien_thoai']?>" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5 pt-3 d-flex">
                            <div class="col-md-6 d-flex">
                                <div class="cart-detail cart-total bg-light p-3 p-md-4">
                                    <h3 class="billing-heading mb-4">Hóa đơn</h3>
                                    <p class="d-flex">
                                        <span>Tổng giá</span>
                                        <span><?= $_POST['tong_tien'] ?>₫</span>
                                    </p>
                                    <p class="d-flex">
                                        <span>Vận chuyển</span>
                                        <span>Miễn phí</span>
                                    </p>
                                    <p class="d-flex">
                                        <span>Giảm giá</span>
                                        <span><input readonly hidden class="d-none" name="id_ma_giam_gias" type="text" value="<?=$id_ma_giam_gias?>"><?=$giam_gia?></span>
                                    </p>
                                    <hr>
                                    <p class="d-flex total-price">
                                        <span>Thành tiền</span>
                                        <span><input class="border-0 border-bottom border-primary bg-light" type="text" value="<?= $_POST['tong_tien']-$giam_gia?>" name="tong_tien" readonly style="outline: none;background-color: ;"></span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cart-detail bg-light p-3 p-md-4">
                                    <h3 class="billing-heading mb-4">Hình thức thanh toán</h3>
                                    <div class="form-group">
                                        <?php foreach ($trang_thais as $trang_thai) :?>
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <label><input type="radio" name="thanh_toan" value="<?=$trang_thai['id']?>" class="mr-2"><?=$trang_thai['ten_thanh_toan']?></label>
                                            </div>
                                        </div>
                                        <?php endforeach?>
                                    </div>
                                    <p><button type="submit" name="btn-submit" class="btn btn-primary py-3 px-4">Đặt hàng</button></p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include_once "./src/Views/client/components/footer.php" ?>


    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00" />
        </svg>
    </div>

    <!-- Script -->
    <?php include_once "./src/Views/client/components/javascript.php"; ?>

</body>

</html>