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
    <div class="content">
        <section class="ftco-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mb-5 ftco-animate">
                        <img src="<?= $sanpham['anh_chinh'] ?>" class="img-fluid" alt="">
                        <div class="mt-3" style="display: grid;grid-template-columns: 1fr 1fr 1fr;gap: 10px;">
                            <img src="<?= $sanpham['anh_phu_1'] ?>" class="img-fluid" alt="">
                            <img src="<?= $sanpham['anh_phu_2'] ?>" class="img-fluid" alt="">
                            <img src="<?= $sanpham['anh_phu_3'] ?>" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                        <form action="" method="POST">
                            <h3><?= $sanpham['ten_san_pham'] ?></h3>
                            <div class="rating">
                                <p class="text-left mt-2 mx-1">
                                    Mã sản phẩm: <?= $sanpham['id'] ?>
                                </p>
                                <input type="text" name="id" value="<?= $sanpham['id'] ?>" readonly hidden
                                    style="display: none;">
                                <p class="text-left mt-2 mx-1">Danh mục:
                                    <?php foreach ($danhmucs as $danhmuc): ?>
                                        <?php if ($danhmuc['id'] == $sanpham['id_danh_mucs']): ?>
                                            <a href="#" class="mr-2 text-center" title="Danh mục">
                                                <?= $danhmuc['ten_danh_muc'] ?>
                                            </a>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </p>
                                <p class="text-left mt-2 mx-1">Số lượng: <?= $sanpham['so_luong_tong'] ?></p>
                            </div>
                            <p class="price">
                                <?php if ($sanpham['gia_thap_nhat'] != $sanpham['gia_cao_nhat']): ?>
                                    <span id="gia_thap" style="font-size: 20px;"><?= $sanpham['gia_thap_nhat'] ?></span>
                                    <span style="font-size: 20px;"> - </span>
                                    <span id="gia_cao" style="font-size: 20px;"><?= $sanpham['gia_cao_nhat'] ?>
                                        <span style="font-size: 10px;">₫</span></span>
                                <?php endif ?>
                                <?php if ($sanpham['gia_thap_nhat'] == $sanpham['gia_cao_nhat']): ?>
                                    <span style="font-size: 20px;"><?= $sanpham['gia_cao_nhat'] ?>
                                        <span style="font-size: 10px;">₫</span></span>
                                <?php endif ?>
                            </p>
                            <p><?= $sanpham['mo_ta_ngan'] ?></p>
                            <p><?= $sanpham['mo_ta'] ?></p>
                            <div class="row mt-4">
                                <div class="col-md">
                                    <div class="form-group d-flex" style="gap: 10px;">
                                        <div class="select-wrap">
                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                            <select name="mau_sac" id="mau_sac" class="form-control">
                                                <option selected value="">Màu Sắc</option>
                                                <?php foreach ($mausacs as $mausac): ?>
                                                    <option value="<?= $mausac['id_mau_sacs'] ?>">
                                                        <?= $mausac['ten_mau_sac'] ?>
                                                    </option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="select-wrap">
                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                            <select name="dung_luong" id="dung_luong" class="form-control">
                                                <option selected value="">Dung lượng</option>
                                                <?php foreach ($dungluongs as $dungluong): ?>
                                                    <option value="<?= $dungluong['id_dung_luongs'] ?>">
                                                        <?= $dungluong['ten_dung_luong'] ?>
                                                    </option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-100"></div>
                                <div class="input-group col-md-6 d-flex mb-3">
                                    <span class="input-group-btn mr-2">
                                        <button type="button" class="quantity-left-minus btn">
                                            <i class="ion-ios-remove"></i>
                                        </button>
                                    </span>
                                    <input type="text" name="so_luong" id="quantity" class="form-control input-number"
                                        value="1" min="1" max="100">

                                    <span class="input-group-btn ml-2">
                                        <button type="button" class="quantity-right-plus btn">
                                            <i class="ion-ios-add"></i>
                                        </button>
                                    </span>
                                </div>
                                <div class="w-100"></div>
                                <div class="error text-danger text-center">
                                    <?php if (isset($error)) {
                                        echo $error;
                                    } ?>
                                </div>
                                <div class="col-md-12">
                                    <br>
                                </div>
                                
                            </div>
                            <input name="submit" onclick="checkSubmit()" class="btn btn-black py-3 px-5 text-light" type="submit" value="Thêm vào giỏ hàng">
                            <?php if (!isset($_SESSION['id']) || !isset($_SESSION['tai_khoan'])) :?>
                                <p class="text">Bạn chưa cần <a href="/login">đăng nhập</a> để dùng giỏ hàng!</p>
                                <?php endif?>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
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

    <script>
        const productColorSelect = document.getElementById('mau_sac');
        const productSizeSelect = document.getElementById('dung_luong');
        function checkSubmit() {
            const selectedColor = productColorSelect.value;
            const selectedSize = productSizeSelect.value;
            if (selectedColor == "" || selectedSize == "") {
                alert("vui lòng chọn màu sắc và dung lượng")
                return false;
            }
        }

    </script>

    <?php
    $jsonString = json_encode($bienthes);

    echo "<script>";
    echo "const javascriptArray = JSON.parse('" . $jsonString . "');";
    echo "</script>";
    ?>
    <script>

        const gia_thap = document.getElementById('gia_thap');
        const gia_cao = document.getElementById('gia_cao');

        productColorSelect.addEventListener('change', updateProductPrice);
        productSizeSelect.addEventListener('change', updateProductPrice);

        function updateProductPrice() {
            const selectedColor = productColorSelect.value;
            const selectedSize = productSizeSelect.value;
            const selectedPrice = getVariantPrice(selectedColor, selectedSize);

            if (selectedPrice) {
                gia_thap.textContent = selectedPrice.min;
                gia_cao.textContent = selectedPrice.max;
            } else {
                gia_thap.textContent = 'Giá không khả dụng';
                gia_cao.textContent = 'Giá không khả dụng';
            }
        }
        function getVariantPrice(selectedColor, selectedSize) {
            const DATA = {};
            javascriptArray.forEach(element => {
                let id_mau_sacs = element.id_mau_sacs;
                let id_dung_luongs = element.id_dung_luongs;
                DATA = {
                    ...{
                        [id_mau_sacs]: {
                            [id_dung_luongs]: {
                                min: element.gia_goc,
                                max: element.gia_ban
                            }
                        }
                    }
                };
                console.log(DATA);
            });
            return DATA[selectedColor][selectedSize];
        }
    </script>
</body>

</html>