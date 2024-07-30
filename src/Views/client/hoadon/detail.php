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
                <div class="px-3">
                    <div style="display: flex;justify-content: space-between;">
                        <h2 class="font-italic">Chi Tiết hóa đơn:</h2>  
                        <a class="btn btn-info" style="border-radius:0px;max-height: 39px;" href="/tai-khoan">Quay lại<<</a>
                    </div>
                </div>
                <div class="py-5 px-3" style="background-color: white !important;">
                    <h6 class="mb-3">#1. Chi tiết Đơn Hàng</h6>
                    <div class="row mb-3">
                        <div class="mx-5 col-6">
                            <label for="" class="form-label">ID Hóa Đơn</label>
                            <input class="w-100 form-control" style="height: 30px !important;font-size: 15px;" readonly type="text" value="<?=$hoadons['id']?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mx-5 col-6 d-flex">
                        <?php foreach ($trangthais as $trangthai) :?>
                            <?php if($trangthai['id'] == $hoadons['trang_thai']) :?>
                                <div class="mb-3 w-100 col-12" style="padding: 0px;">
                                    <label for="" class="form-lable">Trạng thái đơn:</label>
                                    <div class="d-flex w-100 ">
                                    <input type="text" class="w-100 col-12 form-control" name="" style="height: 30px !important;font-size: 15px;" readonly value="<?=$trangthai['ten_trang_thai']?>">
                                    <div class="mb-3 col-4">
                                            <?php if($hoadons['trang_thai'] == 1) :?>
                                                <form action="" method="post" onsubmit="return confirm('Bạn có chắc muốn hủy đơn hàng!')">
                                                    <input type="text" name="id" hidden readonly value="<?=$hoadons['id']?>">
                                                    <button class="w-100 bg-danger text-light" style="border: none;border-radius: 0;height: 30px !important;font-size: 15px;" type="submit" name="btn-submit">Hủy đơn</button>
                                                </form>
                                                <?php endif?>
                                        </div>
                                    </div>
                                </div>
                                <?php endif?>
                            <?php endforeach?>
                        </div>
                    </div>

                    <div>
                        <hr style="border: 1.5px gray solid;">
                        <h6 class="mb-3">#2. Thông tin người nhận</h6>
                        <div class="row mx-3">
                            <div class="col-12">
                                <label for="" class="form-lable">Tên người nhận:</label>
                                <input class="form-control mb-3" style="font-size: 15px;height: 30px !important;" type="text" value="<?=$hoadons['ten_nguoi_nhan']?>">
                            </div>
                            <div class="col-12">
                                <label for="" class="form-lable">Địa chỉ người nhận:</label>
                                <input class="form-control mb-3" style="font-size: 15px;height: 30px !important;" type="text" value="<?=$hoadons['dia_chi']?>">
                            </div>
                            <div class="col-12">
                                <label for="" class="form-lable">Email người nhận:</label>
                                <input class="form-control mb-3" style="font-size: 15px;height: 30px !important;" type="text" value="<?=$hoadons['email']?>">
                            </div>
                            <div class="col-12">
                                <label for="" class="form-lable">SĐT người nhận:</label>
                                <input class="form-control mb-3" style="font-size: 15px;height: 30px !important;" type="text" value="<?=$hoadons['so_dien_thoai']?>">
                            </div>
                        </div>
                    </div>

                    <div>
                        <hr style="border: 1.5px gray solid;">
                        <h6 class="mb-3">#3. Thông tin sản phẩm</h6>
                        <div class="row mx-3">
                            <table class="table table-hover text-center">
                                <thead>
                                    <th>STT</th>
                                    <th>Ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                </thead>
                                <tbody>
                                    <?php foreach ($chiTietDonHangs as $key => $chiTietDonHang) :?>
                                    <?php foreach ($sanphams as $sanpham) :?>
                                    <?php foreach ($bienthes as $bienthe) :?>
                                    <?php if($sanpham['id'] == $chiTietDonHang['id_san_phams']) :?>
                                    <?php if($bienthe['id'] == $chiTietDonHang['id_bien_thes']) :?>
                                    <tr>
                                        <td><?=$key+1?></td>
                                        <td class=""><a href="/chi-tiet-san-pham?id=<?=$sanpham['id']?>">
                                            <img style="width: 100px;" src="<?=$sanpham['anh_chinh']?>" alt="Ảnh sản phẩm">
                                        </a></td>
                                        <td>
                                            <div>
                                                <h6><a href="/chi-tiet-san-pham?id=<?=$sanpham['id']?>"><?=$sanpham['ten_san_pham']?></a></h6>
                                                <div>
                                                    <p>Màu sắc: <?=$bienthe['ten_mau_sac']?> | Dung lượng: <?=$bienthe['ten_dung_luong']?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?=$chiTietDonHang['gia_san_pham']?></span><span style="font-size: 10px;">₫</span></td>
                                        <td><?=$chiTietDonHang['so_luong']?></td>
                                        <td><?=$chiTietDonHang['gia_san_pham']*$chiTietDonHang['so_luong']?></span><span style="font-size: 10px;">₫</span></td>
                                    </tr>
                                    <?php endif?>
                                    <?php endif?>
                                    <?php endforeach?>
                                    <?php endforeach?>
                                    <?php endforeach?>
                                </tbody>
                            </table>
                            <div class="w-100" style="text-align: end;">
                                <h5><strong>Tổng tiền:</strong> <?=$hoadons['tong_tien']?><span style="font-size: 10px;">₫</span></h5>
                            </div>
                        </div>
                    </div>
                    <div>

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