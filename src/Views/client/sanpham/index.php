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
        <div class="hero-wrap hero-bread" style="background-color:whitesmoke;">
            <div class="container">
                <div class="row no-gutters slider-text align-items-center justify-content-center">
                    <div class="col-md-9 ftco-animate text-center">
                        <p class="breadcrumbs"><span class="mr-2"></span> <span>Cửa hàng</span></p>
                        <h1 class="mb-0 bread">sản phẩm</h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="ftco-section bg-light">
            <div class="container">
                <div>
                    <div class="search" style="width: 25%;margin-left: 75%;">
                        <form action="" method="get">
                            <div class="form-group" style="display: flex;">
                                <input class="form-control" type="search" name="search" id=""
                                    placeholder="Bạn tìm gì...">
                                <input class="bg-primary btn-primary text-center"
                                    style="border-color: #ffa45c;width: 100px;" name="btn-search" type="submit" value="Tìm">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md col-lg order-md-last">
                        <div class="row">
                            <?php foreach ($sanphams as $sanpham): ?>
                                <div class="col-sm-3 col-md-3 col-lg-3 ftco-animate">
                                    <div class="product">
                                        <a href="/chi-tiet-san-pham?id=<?= $sanpham['id'] ?>" class="img-prod"><img
                                                style="min-height: 250px;object-fit: cover;" class="img-fluid"
                                                src="<?= $sanpham['anh_chinh'] ?>"
                                                alt="<?= $sanpham['ten_san_pham'] ?>"></a>
                                        <div class="text py-3 px-3" style="height: 150px;">
                                            <h3 style="height: 50px;"><a href="/chi-tiet-san-pham?id=<?= $sanpham['id'] ?>"><?= $sanpham['ten_san_pham'] ?></a>
                                            </h3>
                                            <div class="">
                                                <div class="mb-3">
                                                    <p class="price"><span
                                                            class="mr-2 price-sale"><?= $sanpham['gia_thap_nhat']; ?><span
                                                                style="font-size: 10px;">₫</span></span>
                                                </div>
                                                <div class="rating" style="float: right;">
                                                    <p class="text-right">
                                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                                    </p>
                                                </div>
                                            </div>
                                            <p class="bottom-area d-flex px-3">

                                                <a href="/chi-tiet-san-pham?id=<?= $sanpham['id'] ?>"
                                                    class="buy-now text-center py-2">Mua sản phẩm<span><i
                                                            class="ion-ios-cart ml-1"></i></span></a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>

                    </div>

                    <div class="col-md-4 col-lg-2 sidebar">
                        <div class="sidebar-box-2">
                            <h2 class="heading mb-4"><a href="#">Hãng</a></h2>
                            <ul>
                                <form action="" method="post" >
                                    <select name="id_danhmuc" class="form-control">
                                        <option value="" selected>Tất cả</option>
                                        <?php foreach ($danhmucs as $danhmuc): ?>
                                            <option value="<?= $danhmuc['id'] ?>" 
                                            <?php 
                                                if ($danhmuc['id'] == $sanphams[0]['id_danh_mucs']) {
                                                  echo "";
                                                } 
                                            ?>>
                                                <?= $danhmuc['ten_danh_muc'] ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                    <input type="submit" name="submit" class="form-control" value="Tìm">
                                    <!-- <button type="submit">Tìm</button> -->
                                </form>
                            </ul>
                        </div>
                        
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


</body>

</html>