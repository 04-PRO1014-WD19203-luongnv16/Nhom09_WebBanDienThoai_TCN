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
                                            src="<?=$taiKhoan['hinh_anh']?>" alt="">
                                    <?php endif ?>
                                </div>
                                <div class="col-12" style="text-align: center;">
                                    <div style="font-size: 15px;"><strong><?= $taiKhoan['tai_khoan'] ?></strong></div>
                                </div>
                            </div>

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
                                <?php if ($checkPass): ?>
                                    <div class="check-password">
                                        <form action="" class="px-5 py-3" method="post">
                                            <label for="" class="form-label">Mật khẩu của bạn: </label>
                                            <input type="password" name="password" class="form-control mb-3">
                                            <div class="text-center">
                                                <button class="btn btn-success w-25 text-center" type="submit"
                                                    name="btn-check">Gửi</button>
                                            </div>
                                        </form>
                                    </div>
                                <?php endif ?>
                                <?php if (!$checkPass): ?>
                                <?php if(isset($taiKhoan)) :?>
                                    <div class="update-form">
                                        <form action="" class="px-5 py-3" method="post" enctype="multipart/form-data">
                                            <label for="" class="form-label">Tên đăng nhập</label>
                                            <input type="text" class="form-control mb-3" name="tai_khoan" value="<?= $taiKhoan['tai_khoan']?>">
                                            <label for="" class="form-label">Mật khẩu</label>
                                            <input type="password" class="form-control mb-3" name="mat_khau" value="">
                                            <label for="" class="form-label">Ảnh chính</label><br>
                                            <input type="file" class="mb-3" id="imageUpload" name="anh_chinh" accept="image/*">
                                            <img class="w-25 rounded mx-auto" id="imagePreview" src="" alt="Image preview"><br>
                                            <label for="" class="form-label">Email</label>
                                            <input type="email" class="form-control mb-3" name="email" value="<?=$taiKhoan['email']?>">
                                            <label for="" class="form-label">SĐT</label>
                                            <input type="tel" class="form-control mb-3" name="so_dien_thoai" value="<?=$taiKhoan['so_dien_thoai']?>">
                                            <label for="" class="form-label">Địa chỉ</label>
                                            <input type="text" class="form-control mb-3" name="dia_chi" value="<?=$taiKhoan['dia_chi']?>">
                                            <label for="" class="form-label">Giới tính</label>
                                            <select name="gioi_tinh" class="w-100 mb-3">
                                                <option <?php if($taiKhoan["gioi_tinh"]==1){echo "selected";}?> value="1">Nam</option>
                                                <option <?php if($taiKhoan["gioi_tinh"]==0){echo "selected";}?> value="0">Nữ</option>
                                            </select>
                                            <div class="text-center">
                                                <button class="w-25 btn btn-info" type="submit" name="btn-update">Lưu <i class="fa-solid fa-cloud"></i></button>
                                                <a class="w-25 btn btn-warning text-light" href="/tai-khoan">Quay lại <i class="fa-solid fa-arrow-left"></i></a>
                                            </div>
                                        </form>
                                    </div>
                                <?php endif?>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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