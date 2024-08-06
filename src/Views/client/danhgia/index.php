<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $title ?></title>
    <!-- Head -->
    <?php include_once "./src/Views/client/components/head.php"; ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T9q7T1NY9uqNm02Omfidt2J8Dar4eamYXkQ1g6MQb065ITLqGYw9Uq7wgp60j3ySJ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C8Av4tbNPzY8Gxq000/0h+p3C7l75jOAp/wJwcdVBy7XLI48VES6AMXFkp4UdQ6"
        crossorigin="anonymous"></script>
</head>

<body class="goto-here">
    <!-- Header -->
    <?php include_once "./src/Views/client/components/header.php"; ?>
    <!-- Nav -->
    <?php include_once "./src/Views/client/components/navbar.php"; ?>
    <!-- Content -->
    <div class="content">
        <!-- <div class="hero-wrap hero-bread" style="background-color:whitesmoke;">
            <div class="container">
            </div>
        </div>   -->
        <section class="ftco-section bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-3 p-3">
                        <div class="p-3" style="background-color: white !important;">
                            <div class="row">
                                <div class="col-6 img m-auto" style="border-radius: 50%;">
                                    <?php if ($taiKhoan['hinh_anh'] == ""): ?>
                                        <img class="w-100" style="border-radius: 50%;height: 100px;object-fit: cover;"
                                            src="/public/user-profile-icon-free-vector.jpg" alt="">
                                    <?php endif ?>
                                    <?php if ($taiKhoan['hinh_anh'] != ""): ?>
                                        <img class="w-100" style="border-radius: 50%;height: 100px;object-fit: cover;"
                                            src="<?= $taiKhoan['hinh_anh'] ?>" alt="">
                                    <?php endif ?>
                                </div>
                                <div class="col-12" style="text-align: center;">
                                    <div style="font-size: 15px;"><strong><?= $taiKhoan['tai_khoan'] ?></strong></div>
                                </div>
                            </div>
                        </div>
                        <div class="p-3 mt-3" style="background-color: white !important;">
                            <a href="/tai-khoan">Đơn hàng</a>
                        </div>
                    </div>
                    <div class="col-9 py-3">
                        <div class="">
                            <?php if (isset($error)): ?>
                                <div class="alert alert-danger"><?= $error ?></div>
                            <?php endif ?>
                            <?php if (isset($success)): ?>
                                <div class="alert alert-success"><?= $success ?></div>
                            <?php endif ?>
                            <div class="content">
                                <?php if(!empty($donHangs)) :?>
                                    <div class="head-btn" >
                                        <table class="table p-3 mb-3 text-center" style="background-color: white !important;">
                                            <thead>
                                                <th>STT</th>
                                                <th>Mã đơn hàng</th>
                                                <th>Ảnh sản phẩm</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Ngày mua</th>
                                                <th>Thực hiện</th>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($donHangs as $donHang) :?>
                                                <?php foreach ($chiTietDonHangs as $chiTietDonHang) :?>
                                                <?php foreach ($sanPhams as $sanPham) :?>
                                                <?php foreach ($bienThes as $bienThe) :?>
                                                <?php if($taiKhoan['id'] == $donHang['id_tai_khoans']) :?>
                                                <?php if($donHang['trang_thai'] == 4) :?>
                                                <?php if($chiTietDonHang['id_don_hangs'] == $donHang['id']) :?>
                                                <?php if($chiTietDonHang['id_san_phams'] == $sanPham['id']) :?>
                                                <?php if($chiTietDonHang['id_bien_thes'] == $bienThe['id']) :?>
                                                <?php if($chiTietDonHang['danh_gia'] == NULL) :?>    
                                                    <tr>
                                                        <td><?=$chiTietDonHang['id']?></td>
                                                        <td><?=$donHang['id']?></td>
                                                        <td style="width: 150px;"><img class="w-100" src="<?=$sanPham['anh_chinh']?>" alt=""></td>
                                                        <td>
                                                            <a href="/chi-tiet-san-pham?id=<?=$sanPham['id']?>"><h5><?=$sanPham['ten_san_pham']?></h5></a>
                                                            <p>Màu sắc: <?=$bienThe['ten_mau_sac']?> | Dung lương: <?=$bienThe['ten_dung_luong']?></p>
                                                        </td>
                                                        <td><?=$donHang['ngay_dat_hang']?></td>
                                                        <td>
                                                            <form action="/viet-danh-gia" method="POST">
                                                                <input type="hidden" name="id_Chi_Tiet_Don_Hang" value="<?=$chiTietDonHang['id']?>">
                                                                <button class="btn btn-primary" style="border-radius: 0px !important;" type="submit">Đánh giá</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php endif?>
                                                <?php endif?>
                                                <?php endif?>
                                                <?php endif?>
                                                <?php endif?>
                                                <?php endif?>
                                                <?php endforeach?>                                                  
                                                <?php endforeach?>                                                  
                                                <?php endforeach?>
                                                <?php endforeach?>
                                                </tbody>
                                        </table>
                                    </div>
                                <?php endif?>
                                <?php if(empty($donHangs)) :?>
                                    <div class="head-btn p-5 mb-3 text-center" style="background-color: white !important;">
                                        <div class="text-center mt-5 text-danger" style="font-size: 40px;"><i class="fa-solid fa-circle-exclamation"></i></div>
                                        <h3><i>Bạn chưa mua sản phẩm nào!</i></h3>
                                        <p class="title mb-5">Hãy <a href="/cua-hang">mua hàng</a> để sử dụng chức năng này nhé^_^</p>
                                    </div>
                                <?php endif?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
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
        const imageUpload = document.getElementById('imageUpload');
        const imagePreview = document.getElementById('imagePreview');
        imagePreview.style.display = "none";
        imageUpload.addEventListener('change', function () {
            const file = imageUpload.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = "block";
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.src = "";
                imagePreview.style.display = "none";
            }
        });
    </script>
</body>

</html>