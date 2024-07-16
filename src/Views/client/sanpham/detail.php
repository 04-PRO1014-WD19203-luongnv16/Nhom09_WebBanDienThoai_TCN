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
                        <a href="images/menu-2.jpg" class="image-popup"><img src="<?=$sanpham['anh_chinh']?>" class="img-fluid" alt=""></a>
                    </div>
                    <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                        <h3><?= $sanpham['ten_san_pham']?></h3>
                        <div class="rating d-flex">
                            <p class="text-left mr-4">
                                <a href="#" class="mr-2">5.0</a>
                                <a href="#"><span class="ion-ios-star-outline"></span></a>
                                <a href="#"><span class="ion-ios-star-outline"></span></a>
                                <a href="#"><span class="ion-ios-star-outline"></span></a>
                                <a href="#"><span class="ion-ios-star-outline"></span></a>
                                <a href="#"><span class="ion-ios-star-outline"></span></a>
                            </p>
                            <p class="text-left mr-4">
                                <?php foreach ($danhmucs as $danhmuc) :?>
                                    <?php if ($danhmuc['id'] == $sanpham['id_danh_mucs']) :?>
                                        <a href="#" class="mr-2 btn-warning text-center text-light" style="color: #000;padding: 2px 10px;border-radius: 50px;" title="Danh mục">
                                            <?=$danhmuc['ten_danh_muc']?>
                                        </a>
                                    <?php endif?>
                                <?php endforeach?>
                            </p>
                            <p class="text-left mr-4">Số lượng: <?=$sanpham['so_luong_tong']?></p>
                        </div>
                        <p class="price">
                            <span style="font-size: 20px;"><?=$sanpham['gia_thap_nhat']?></span>
                            <span style="font-size: 20px;"> - </span>
                            <span style="font-size: 20px;"><?=$sanpham['gia_cao_nhat']?><span style="font-size: 10px;">₫</span></span>
                        </p>
                        <p><?=$sanpham['mo_ta_ngan']?></p>
                        <p><?=$sanpham['mo_ta']?></p>
                        <div class="row mt-4">
                            <div class="col-md">
                                <div class="form-group d-flex" style="gap: 10px;">
                                    <div class="select-wrap">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                        <select name="" id="" class="form-control">
                                            <option selected value="">Màu Sắc</option>
                                            <?php foreach ($bienthes as $bienthe) :?>
                                                <?php if ($bienthe['id_san_phams'] == $sanpham['id']) :?>
                                                    <option value="<?=$bienthe['id_mau_sacs']?>"><?=$bienthe['ten_mau_sac']?></option>
                                                    <?php endif?>
                                                <?php endforeach?>
                                        </select>
                                    </div>
                                    <div class="select-wrap">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                        <select name="" id="" class="form-control">
                                            <option selected value="">Dung lượng</option>
                                            <?php foreach ($bienthes as $bienthe) :?>
                                                <?php if ($bienthe['id_san_phams'] == $sanpham['id']) :?>
                                                    <option value="<?=$bienthe['id_dung_luongs']?>"><?=$bienthe['ten_dung_luong']?></option>
                                                    <?php endif?>
                                                <?php endforeach?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="input-group col-md-6 d-flex mb-3">
                                <span class="input-group-btn mr-2">
                                    <button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
                                        <i class="ion-ios-remove"></i>
                                    </button>
                                </span>
                                <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
                                <span class="input-group-btn ml-2">
                                    <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                                        <i class="ion-ios-add"></i>
                                    </button>
                                </span>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-12">
                                <br>
                            </div>
                        </div>
                        <p><a href="#" onclick="return validateSanPham()" class="btn btn-black py-3 px-5">Thêm vào giỏ hàng</a></p>
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
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
        </svg>
    </div>

    <!-- Script -->
    <?php include_once "./src/Views/client/components/javascript.php"; ?>
    <script>
        function validateSanPham() {
            return alert('Vui lòng chọn màu sắc và dung lượng của sản phẩm bạn muốn mua');
        }
    </script>

</body>

</html>