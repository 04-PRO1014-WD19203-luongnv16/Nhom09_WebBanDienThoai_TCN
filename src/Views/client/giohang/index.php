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

    <section class="ftco-section ftco-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>Sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($giohangs as $giohang) :?>
                                <?php foreach ($bienthes as $bienthe) :?>
                                <?php if ($giohang['id_bien_thes'] == $bienthe['id']) :?>
                                <?php foreach ($sanphams as $sanpham) :?>
                                        <?php if ($bienthe['id_san_phams'] == $sanpham['id']) :?>
                                        <tr class="text-center">
                                        <td class="product-remove">
                                            <form action="/xoa-gio-hang" method="post">
                                                <input class="w-25" hidden readonly type="text" name="id" value="<?=$giohang['id']?>">
                                                <button name="submit" type="submit" style="background: none;height:100% !important;outline: none;">
                                                    <a><span class="ion-ios-close"></span></a>
                                                </button>
                                            </form>
                                        </td>

                                        <td class="image-prod">
                                            <div class="img" style="background-image:url(<?=$sanpham['anh_chinh']?>);"></div>
                                        </td>

                                        <td class="product-name">
                                            <h3><?=$sanpham['ten_san_pham']?></h3>
                                            <p>Màu sắc: <?=$bienthe['ten_mau_sac']?> | Dung lượng: <?=$bienthe['ten_dung_luong']?></p>
                                        </td>

                                        <td class="price"><?=$bienthe['gia_ban']?><span style="font-size: 10px;">₫</span></td>

                                        <td class="quantity">
                                            <div class="input-group mb-3">
                                                <input type="text" name="so_luong" class="quantity form-control input-number" value="<?=$giohang['so_luong']?>" min="1" max="100">
                                                <div class="text text-danger"><?php if ($bienthe['so_luong']<$giohang['so_luong']) { echo "Số lượng tồn kho không đủ";}?></div>
                                            </div>
                                        </td>

                                        <td class="total"><?= $bienthe['gia_ban']*$giohang['so_luong']?><span style="font-size: 10px;">₫</span></td>
                                        </tr>
                                        <?php endif?>
                                    <?php endforeach?>
                                    <?php endif?>
                                    <?php endforeach?>
                                    <?php endforeach?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Hóa đơn</h3>
                        <p class="d-flex">
                            <span>Tổng giá</span>
                            <span><input class="border-0 border-bottom border-primary" type="text" name="tong_tien" value="$20.60" readonly style="outline: none;"></span>
                        </p>
                        <p class="d-flex">
                            <span>Vận chuyển</span>
                            <span><input class="border-0 border-bottom border-primary" type="text" name="" value="Miễn phí" style="outline: none;"></span>
                        </p>
                        <p class="d-flex">
                            <span>Mã giảm giá</span>
                            <span><input class="border-0 border-bottom border-primary" type="text" name="shortcode" style="outline: none;" placeholder="CODE vocher"></span>
                        </p>
                        <hr>
                        <p class="d-flex total-price">
                            <span>Tổng đơn</span>
                            <span><input class="border-0 border-bottom border-primary" type="text" name="tong_tien" value="$20.60" readonly style="outline: none;"></span>
                        </p>
                    </div>
                    <p class="text-center"><a href="checkout.html" class="btn btn-primary py-3 px-4">Thực hiện thanh toán</a></p>
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