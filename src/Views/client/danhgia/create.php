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
        <section class="ftco-section bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-7 p-3">
                        <div class="p-3" style="background-color: white !important;">
                            <h5><strong>Sản phẩm:</strong></h5>
                            <div class="row">
                                <div class="col-5">
                                    <div class="img mx-3 w-100">
                                        <a href="/chi-tiet-san-pham?id=<?=$sanPham['id']?>">
                                            <img class="" width="100%" height="300px" src="<?=$sanPham['anh_chinh']?>" alt="<?=$sanPham['ten_san_pham']?>" style="object-fit: cover;">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-7 p-3">
                                    <a href="/chi-tiet-san-pham?id=<?=$sanPham['id']?>"><h4><?=$sanPham['ten_san_pham']?></h4></a>
                                    <p class="m-0">Phân loại:</p>
                                    <ul>
                                        <li>Màu sắc: <?=$bienThe['ten_mau_sac']?></li>
                                        <li>Dung lượng: <?=$bienThe['ten_dung_luong']?></li>
                                    </ul>
                                    <p>Giá: <span style="text-decoration: line-through;font-size: 20px;"><?=$bienThe['gia_goc']?></span> - <span style="font-size: 20px;"><?=$bienThe['gia_ban']?></span>đ</p>
                                    <p>Đánh giá: <span style="color: #ffa45c;"><?=$diemSo['diem_so'] != null?`<i class="fa-solid fa-star"></i> `.$diemSo['diem_so']:"Chưa có đánh giá nào";?></span></p>
                                </div>                                                                                                                              
                            </div>
                        </div>
                           
                    </div>
                    <div class="col-5 p-3">
                        <div class="p-3" style="background-color: white !important;">
                            <h5><strong>Đánh giá:</strong></h5>
                            <form action="" method="post">
                                <input type="hidden" name="id_Chi_Tiet_Don_Hang" value="<?=$chiTietDonHang['id']?>">
                                <input type="hidden" name="id_san_phams" value="<?=$sanPham['id']?>">
                                <input type="hidden" name="id_bien_the" value="<?=$bienThe['id']?>">
                                <label class="label-control">Điểm số</label>
                                <input type="number" value="<?php if(isset($_POST['diem_so'])){echo $_POST['diem_so'];}?>" name="diem_so" class="form-control" style="height: 39px !important;">
                                <div class="text-danger mb-3"><?php if(isset($valida_Diem_So)){echo $valida_Diem_So;}?></div>
                                <label class="label-control">Nội dung</label>
                                <textarea cols="10" rows="5" name="noi_dung" class="form-control"><?php if(isset($_POST['noi_dung'])){echo $_POST['noi_dung'];}?></textarea>
                                <div class="text-danger mb-3"><?php if(isset($valida_Noi_Dung)){echo $valida_Noi_Dung;}?></div>
                                <div class="text-center">
                                    <button type="submit" name="btn-submit" class="btn btn-info w-25" style="border-radius: 0px;">Gửi</button>
                                    <a href="/danh-gia-user" class="btn btn-danger w-25" style="border-radius: 0px;">Hủy</a>
                                </div>
                            </form>
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
</body>

</html>