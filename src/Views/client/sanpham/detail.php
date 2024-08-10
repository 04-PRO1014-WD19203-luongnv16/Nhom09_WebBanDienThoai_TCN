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
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger">
                        <p><?= $error ?></p>
                    </div>
                <?php endif ?>
                <?php if (isset($success)): ?>
                    <div class="alert alert-success">
                        <p><?= $success ?></p>
                    </div>
                <?php endif ?>
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
                                <span id="gia_goc" style="font-size: 20px;"><?= $sanpham['gia_thap_nhat'] ?></span>
                                <span style="font-size: 20px;"> - </span>
                                <span id="gia_ban" style="font-size: 20px;"><?= $sanpham['gia_cao_nhat'] ?>
                                </span><span style="font-size: 10px;">₫</span>
                            </p>
                            <p><?= $sanpham['mo_ta_ngan'] ?></p>
                            <p><?= $sanpham['mo_ta'] ?></p>
                            <div class="row mt-4">
                                <div class="col-md">
                                    <div class="form-group d-flex" style="gap: 10px;">
                                        <div class="select-wrap">
                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                            <select onchange="loadPrice()" name="mau_sac" id="mau_sac"
                                                class="form-control">
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
                                            <select onchange="loadPrice()" name="dung_luong" id="dung_luong"
                                                class="form-control">
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
                            <input name="submit" <?php if (!isset($_SESSION['id']) || !isset($_SESSION['tai_khoan'])) {
                                echo "disabled";
                            } ?> onclick="checkSubmit()" class="btn btn-black py-3 px-5 text-light"
                                type="submit" value="Thêm vào giỏ hàng">
                            <?php if (!isset($_SESSION['id']) || !isset($_SESSION['tai_khoan'])): ?>
                                <p class="text">Bạn chưa cần <a href="/login">đăng nhập</a> để dùng giỏ hàng!</p>
                            <?php endif ?>
                        </form>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="pt-5" style="border-bottom: 3px solid #ffa45c;">
                    <span style="display:block;width: 100px;" class="bg-primary text-light px-3 m-0">Đánh giá</span>
                </div>
                <?php foreach ($danhGias as $danhGia): ?>
                    <?php foreach ($taiKhoans as $taiKhoan): ?>
                        <?php if ($danhGia['id_tai_khoans'] == $taiKhoan['id']): ?>
                            <?php foreach ($bienTheS as $bienThe): ?>
                                <?php if ($bienThe['id'] == $danhGia['id_bien_thes'] && $bienThe['id_san_phams'] == $_GET['id'] && $danhGia['id_san_phams'] == $_GET['id']): ?>
                                    <div class="user px-5 py-3" style="display: flex;gap: 10px;">
                                        <?php if ($taiKhoan['hinh_anh'] == NULL): ?>
                                            <div class="img" style="border-radius: 50%;">
                                                <img src="/public/user-profile-icon-free-vector.jpg"
                                                    style="width: 80px;object-fit: cover;height: 80px;" alt="" style="border-radius: 50%;">
                                            </div>
                                        <?php else: ?>
                                            <div class="img" style="border-radius: 50%;">
                                                <img src="<?= $taiKhoan['hinh_anh'] ?>"
                                                    style="width: 80px;object-fit: cover;height: 80px;border-radius: 50%;" alt="">
                                            </div>
                                        <?php endif ?>
                                        <div class="py-3 w-100">
                                            <h6><strong><?= $taiKhoan['tai_khoan'] ?></strong></h6>
                                            <a class="text-primary"><i class="fa-solid fa-star"></i> <?= $danhGia['diem_so'] ?></a>
                                            <p><i><?= $danhGia['ngay_danh_gia'] ?></i></p>

                                            <p>Dung lượng: <?= $bienThe['ten_dung_luong'] ?></p>
                                            <p>Màu sắc: <?= $bienThe['ten_mau_sac'] ?></p>

                                            <label for="" class="form-lable">Nội dung: </label><span> <?= $danhGia['noi_dung'] ?></span>
                                        </div>
                                    </div>
                                <?php endif ?>
                            <?php endforeach ?>
                        <?php endif ?>
                    <?php endforeach ?>
                <?php endforeach ?>
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
    ?>
    <script>

        var jsonString = '<?php echo $jsonString; ?>';
        var myObject = JSON.parse(jsonString);
        function loadPrice() {
            const selectMau_sac = document.getElementById('mau_sac');
            const optionMau_sac = selectMau_sac.options[selectMau_sac.selectedIndex];
            const valueMau_sac = optionMau_sac.value;
            const selectDung_luong = document.getElementById('dung_luong');
            const optionDung_luong = selectDung_luong.options[selectDung_luong.selectedIndex];
            const valueDung_luong = optionDung_luong.value;
            myObject.forEach(element => {
                if (element.id_mau_sacs == valueMau_sac && element.id_dung_luongs == valueDung_luong) {
                    document.getElementById('gia_ban').innerHTML = element.gia_ban;
                    document.getElementById('gia_goc').innerHTML = element.gia_goc;
                    document.getElementById('gia_goc').style.textDecoration = "line-through";
                    document.getElementById('gia_goc').style.color = "gray";
                }
            });
        }

    </script>
    <script>
        const quantityInput = document.getElementById('quantity');
        const quantityMinus = document.querySelector('.quantity-left-minus');
        const quantityPlus = document.querySelector('.quantity-right-plus');

        quantityMinus.addEventListener('click', () => {
            let value = parseInt(quantityInput.value);
            value = Math.max(value - 1, 1); // Giới hạn giá trị tối thiểu là 1
            quantityInput.value = value;
        });

        quantityPlus.addEventListener('click', () => {
            let value = parseInt(quantityInput.value);
            value = Math.min(value + 1, 100); // Giới hạn giá trị tối đa là 100
            quantityInput.value = value;
        });

    </script>

</body>

</html>