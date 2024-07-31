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
                                    <a href="/tai-khoan-update" class="text" style="color: gray;font-size: 12px;">Chỉnh
                                        sửa hồ sơ <i class="fa-solid fa-pen"></i></a>
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
                            <div class="">
                                <div class="head-btn px-3 mb-3" style="background-color: white !important;">
                                    <div class="navbar navbar-expand-lg bg-body-tertiary">
                                        <div class="container-fluid">
                                            <div class="collapse navbar-collapse" id="navbarNav">
                                                <ul class="nav navbar-nav">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-bs-toggle="tab" href="#home">Tất
                                                            cả</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#menu1">Chờ xác
                                                            nhận</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#menu5">Đã xác
                                                            nhận</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#menu2">Đang
                                                            giao</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#menu3">Đã
                                                            giao</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#menu4">Đã
                                                            hủy</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <form action="" method="get">
                                    <div class="input-group flex-nowrap px-3 mb-3" style="height: 30px !important;">

                                        <input type="text" name="search" class="form-control"
                                            placeholder="Nhập mã đơn bạn cần tìm..."
                                            style="height: 30px !important;font-size: 14px;">
                                        <button style="height: 30px !important;" name="btn-search"
                                            class="input-group-text" id="addon-wrapping"><i
                                                class="fa-solid fa-magnifying-glass"></i></button>
                                    </div>
                                </form>

                                <div class="p-3 mb-3" style="background-color: white !important;">
                                    <h5 class="mb-5">Đơn hàng: </h5>
                                    <div class="tab-content">
                                        <div class="tab-pane container active" id="home">
                                            <?php foreach ($donhangs as $key => $donhang): ?>
                                                <div class="w-100 px-5 py-3" style="background-color: <?php if ($donhang['trang_thai'] == 5) {
                                                    echo '#F8D7DA !important';
                                                } elseif ($donhang['trang_thai'] == 4) {
                                                    echo '#D1E7DD !important';
                                                } ?>;">
                                                    <div class="align-items-center"
                                                        style="justify-content: space-between;display: flex;">
                                                        <div class="w-50">
                                                            <div class="row">
                                                                <div class="col-2 text-center">
                                                                    <?= $key + 1 ?>
                                                                </div>
                                                                <div class="col-9">
                                                                    <div style="align-content: center;">
                                                                        <h6><strong>Mã đơn: <?= $donhang['id'] ?></strong>
                                                                        </h6>
                                                                        <p class="px-2" style="font-size: 12px;">Ngày đặt:
                                                                            <?= $donhang['ngay_dat_hang'] ?>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <div class="row" style="gap: 20px;align-items: center;">
                                                                <p class="text p-1" style="display: contents;">
                                                                    <span><?= $donhang['tong_tien'] ?><span
                                                                            style="font-size: 10px;">₫</span></span>
                                                                </p>
                                                                <?php if ($donhang['trang_thai'] == 1): ?>
                                                                    <p class="text-secondary p-1" style="display: contents;">
                                                                        <strong>Chờ duyệt...</strong>
                                                                    </p>
                                                                <?php endif ?>
                                                                <?php if ($donhang['trang_thai'] == 2): ?>
                                                                    <p class="text-primary p-1" style="display: contents;">
                                                                        <strong>Đã xác nhận</strong>
                                                                    </p>
                                                                <?php endif ?>
                                                                <?php if ($donhang['trang_thai'] == 3): ?>
                                                                    <p class="text-info p-1" style="display: contents;">
                                                                        <strong>Đang giao</strong>
                                                                    </p>
                                                                <?php endif ?>
                                                                <?php if ($donhang['trang_thai'] == 4): ?>
                                                                    <p class="text-success p-1" style="display: contents;">
                                                                        <strong>Đã giao</strong>
                                                                    </p>
                                                                <?php endif ?>
                                                                <?php if ($donhang['trang_thai'] == 5): ?>
                                                                    <p class="text-danger p-1" style="display: contents;">
                                                                        <strong>Đã hủy</strong>
                                                                    </p>
                                                                <?php endif ?>
                                                                <div>
                                                                    <a class="btn btn-warning text-light"
                                                                        style="border-radius: 0;"
                                                                        href="/chi-tiet-don-hang?id=<?= $donhang['id'] ?>">Chi
                                                                        tiết hóa đơn</a>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach ?>
                                        </div>
                                        <div class="tab-pane container fade" id="menu1">
                                            <?php foreach ($donhangs as $key => $donhang): ?>
                                                <?php if ($donhang['trang_thai'] == 1): ?>
                                                    <div class="w-100 px-5 py-3" style="background-color: <?php if ($donhang['trang_thai'] == 5) {
                                                        echo '#F8D7DA !important';
                                                    } elseif ($donhang['trang_thai'] == 4) {
                                                        echo '#D1E7DD !important';
                                                    } ?>;">
                                                        <div class="align-items-center"
                                                            style="justify-content: space-between;display: flex;">
                                                            <div class="w-50">
                                                                <div class="row">
                                                                    <div class="col-2 text-center">
                                                                        <?= $key + 1 ?>
                                                                    </div>
                                                                    <div class="col-9">
                                                                        <div style="align-content: center;">
                                                                            <h6><strong>Mã đơn: <?= $donhang['id'] ?></strong>
                                                                            </h6>
                                                                            <p class="px-2" style="font-size: 12px;">Ngày đặt:
                                                                                <?= $donhang['ngay_dat_hang'] ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="text-center">
                                                                <div class="row" style="gap: 20px;align-items: center;">
                                                                    <p class="text p-1" style="display: contents;">
                                                                        <span><?= $donhang['tong_tien'] ?><span
                                                                                style="font-size: 10px;">₫</span></span>
                                                                    </p>
                                                                    <?php if ($donhang['trang_thai'] == 1): ?>
                                                                        <p class="text-secondary p-1" style="display: contents;">
                                                                            <strong>Chờ duyệt...</strong>
                                                                        </p>
                                                                    <?php endif ?>
                                                                    <?php if ($donhang['trang_thai'] == 2): ?>
                                                                        <p class="text-primary p-1" style="display: contents;">
                                                                            <strong>Đã xác nhận</strong>
                                                                        </p>
                                                                    <?php endif ?>
                                                                    <?php if ($donhang['trang_thai'] == 3): ?>
                                                                        <p class="text-info p-1" style="display: contents;">
                                                                            <strong>Đang giao</strong>
                                                                        </p>
                                                                    <?php endif ?>
                                                                    <?php if ($donhang['trang_thai'] == 4): ?>
                                                                        <p class="text-success p-1" style="display: contents;">
                                                                            <strong>Đã giao</strong>
                                                                        </p>
                                                                    <?php endif ?>
                                                                    <?php if ($donhang['trang_thai'] == 5): ?>
                                                                        <p class="text-danger p-1" style="display: contents;">
                                                                            <strong>Đã hủy</strong>
                                                                        </p>
                                                                    <?php endif ?>
                                                                    <div>
                                                                        <a class="btn btn-warning text-light"
                                                                            style="border-radius: 0;"
                                                                            href="/chi-tiet-don-hang?id=<?= $donhang['id'] ?>">Chi
                                                                            tiết hóa đơn</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        </div>
                                        <div class="tab-pane container fade" id="menu2">
                                            <?php foreach ($donhangs as $key => $donhang): ?>
                                                <?php if ($donhang['trang_thai'] == 3): ?>
                                                    <div class="w-100 px-5 py-3" style="background-color: <?php if ($donhang['trang_thai'] == 5) {
                                                        echo '#F8D7DA !important';
                                                    } elseif ($donhang['trang_thai'] == 4) {
                                                        echo '#D1E7DD !important';
                                                    } ?>;">
                                                        <div class="align-items-center"
                                                            style="justify-content: space-between;display: flex;">
                                                            <div class="w-50">
                                                                <div class="row">
                                                                    <div class="col-2 text-center">
                                                                        <?= $key + 1 ?>
                                                                    </div>
                                                                    <div class="col-9">
                                                                        <div style="align-content: center;">
                                                                            <h6><strong>Mã đơn: <?= $donhang['id'] ?></strong>
                                                                            </h6>
                                                                            <p class="px-2" style="font-size: 12px;">Ngày đặt:
                                                                                <?= $donhang['ngay_dat_hang'] ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="text-center">
                                                                <div class="row" style="gap: 20px;align-items: center;">
                                                                    <p class="text p-1" style="display: contents;">
                                                                        <span><?= $donhang['tong_tien'] ?><span
                                                                                style="font-size: 10px;">₫</span></span>
                                                                    </p>
                                                                    <?php if ($donhang['trang_thai'] == 1): ?>
                                                                        <p class="text-secondary p-1" style="display: contents;">
                                                                            <strong>Chờ duyệt...</strong>
                                                                        </p>
                                                                    <?php endif ?>
                                                                    <?php if ($donhang['trang_thai'] == 2): ?>
                                                                        <p class="text-primary p-1" style="display: contents;">
                                                                            <strong>Đã xác nhận</strong>
                                                                        </p>
                                                                    <?php endif ?>
                                                                    <?php if ($donhang['trang_thai'] == 3): ?>
                                                                        <p class="text-info p-1" style="display: contents;">
                                                                            <strong>Đang giao</strong>
                                                                        </p>
                                                                    <?php endif ?>
                                                                    <?php if ($donhang['trang_thai'] == 4): ?>
                                                                        <p class="text-success p-1" style="display: contents;">
                                                                            <strong>Đã giao</strong>
                                                                        </p>
                                                                    <?php endif ?>
                                                                    <?php if ($donhang['trang_thai'] == 5): ?>
                                                                        <p class="text-danger p-1" style="display: contents;">
                                                                            <strong>Đã hủy</strong>
                                                                        </p>
                                                                    <?php endif ?>
                                                                    <div>
                                                                        <a class="btn btn-warning text-light"
                                                                            style="border-radius: 0;"
                                                                            href="/chi-tiet-don-hang?id=<?= $donhang['id'] ?>">Chi
                                                                            tiết hóa đơn</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        </div>
                                        <div class="tab-pane container fade" id="menu3">
                                            <?php foreach ($donhangs as $key => $donhang): ?>
                                                <?php if ($donhang['trang_thai'] == 4): ?>
                                                    <div class="w-100 px-5 py-3" style="background-color: <?php if ($donhang['trang_thai'] == 5) {
                                                        echo '#F8D7DA !important';
                                                    } elseif ($donhang['trang_thai'] == 4) {
                                                        echo '#D1E7DD !important';
                                                    } ?>;">
                                                        <div class="align-items-center"
                                                            style="justify-content: space-between;display: flex;">
                                                            <div class="w-50">
                                                                <div class="row">
                                                                    <div class="col-2 text-center">
                                                                        <?= $key + 1 ?>
                                                                    </div>
                                                                    <div class="col-9">
                                                                        <div style="align-content: center;">
                                                                            <h6><strong>Mã đơn: <?= $donhang['id'] ?></strong>
                                                                            </h6>
                                                                            <p class="px-2" style="font-size: 12px;">Ngày đặt:
                                                                                <?= $donhang['ngay_dat_hang'] ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="text-center">
                                                                <div class="row" style="gap: 20px;align-items: center;">
                                                                    <p class="text p-1" style="display: contents;">
                                                                        <span><?= $donhang['tong_tien'] ?><span
                                                                                style="font-size: 10px;">₫</span></span>
                                                                    </p>
                                                                    <?php if ($donhang['trang_thai'] == 1): ?>
                                                                        <p class="text-secondary p-1" style="display: contents;">
                                                                            <strong>Chờ duyệt...</strong>
                                                                        </p>
                                                                    <?php endif ?>
                                                                    <?php if ($donhang['trang_thai'] == 2): ?>
                                                                        <p class="text-primary p-1" style="display: contents;">
                                                                            <strong>Đã xác nhận</strong>
                                                                        </p>
                                                                    <?php endif ?>
                                                                    <?php if ($donhang['trang_thai'] == 3): ?>
                                                                        <p class="text-info p-1" style="display: contents;">
                                                                            <strong>Đang giao</strong>
                                                                        </p>
                                                                    <?php endif ?>
                                                                    <?php if ($donhang['trang_thai'] == 4): ?>
                                                                        <p class="text-success p-1" style="display: contents;">
                                                                            <strong>Đã giao</strong>
                                                                        </p>
                                                                    <?php endif ?>
                                                                    <?php if ($donhang['trang_thai'] == 5): ?>
                                                                        <p class="text-danger p-1" style="display: contents;">
                                                                            <strong>Đã hủy</strong>
                                                                        </p>
                                                                    <?php endif ?>
                                                                    <div>
                                                                        <a class="btn btn-warning text-light"
                                                                            style="border-radius: 0;"
                                                                            href="/chi-tiet-don-hang?id=<?= $donhang['id'] ?>">Chi
                                                                            tiết hóa đơn</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        </div>
                                        <div class="tab-pane container fade" id="menu4">
                                            <?php foreach ($donhangs as $key => $donhang): ?>
                                                <?php if ($donhang['trang_thai'] == 5): ?>
                                                    <div class="w-100 px-5 py-3" style="background-color: <?php if ($donhang['trang_thai'] == 5) {
                                                        echo '#F8D7DA !important';
                                                    } elseif ($donhang['trang_thai'] == 4) {
                                                        echo '#D1E7DD !important';
                                                    } ?>;">
                                                        <div class="align-items-center"
                                                            style="justify-content: space-between;display: flex;">
                                                            <div class="w-50">
                                                                <div class="row">
                                                                    <div class="col-2 text-center">
                                                                        <?= $key + 1 ?>
                                                                    </div>
                                                                    <div class="col-9">
                                                                        <div style="align-content: center;">
                                                                            <h6><strong>Mã đơn: <?= $donhang['id'] ?></strong>
                                                                            </h6>
                                                                            <p class="px-2" style="font-size: 12px;">Ngày đặt:
                                                                                <?= $donhang['ngay_dat_hang'] ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="text-center">
                                                                <div class="row" style="gap: 20px;align-items: center;">
                                                                    <p class="text p-1" style="display: contents;">
                                                                        <span><?= $donhang['tong_tien'] ?><span
                                                                                style="font-size: 10px;">₫</span></span>
                                                                    </p>
                                                                    <?php if ($donhang['trang_thai'] == 1): ?>
                                                                        <p class="text-secondary p-1" style="display: contents;">
                                                                            <strong>Chờ duyệt...</strong>
                                                                        </p>
                                                                    <?php endif ?>
                                                                    <?php if ($donhang['trang_thai'] == 2): ?>
                                                                        <p class="text-primary p-1" style="display: contents;">
                                                                            <strong>Đã xác nhận</strong>
                                                                        </p>
                                                                    <?php endif ?>
                                                                    <?php if ($donhang['trang_thai'] == 3): ?>
                                                                        <p class="text-info p-1" style="display: contents;">
                                                                            <strong>Đang giao</strong>
                                                                        </p>
                                                                    <?php endif ?>
                                                                    <?php if ($donhang['trang_thai'] == 4): ?>
                                                                        <p class="text-success p-1" style="display: contents;">
                                                                            <strong>Đã giao</strong>
                                                                        </p>
                                                                    <?php endif ?>
                                                                    <?php if ($donhang['trang_thai'] == 5): ?>
                                                                        <p class="text-danger p-1" style="display: contents;">
                                                                            <strong>Đã hủy</strong>
                                                                        </p>
                                                                    <?php endif ?>
                                                                    <div>
                                                                        <a class="btn btn-warning text-light"
                                                                            style="border-radius: 0;"
                                                                            href="/chi-tiet-don-hang?id=<?= $donhang['id'] ?>">Chi
                                                                            tiết hóa đơn</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        </div>
                                        <div class="tab-pane container fade" id="menu5">
                                            <?php foreach ($donhangs as $key => $donhang): ?>
                                                <?php if ($donhang['trang_thai'] == 2): ?>
                                                    <div class="w-100 px-5 py-3" style="background-color: <?php if ($donhang['trang_thai'] == 5) {
                                                        echo '#F8D7DA !important';
                                                    } elseif ($donhang['trang_thai'] == 4) {
                                                        echo '#D1E7DD !important';
                                                    } ?>;">
                                                        <div class="align-items-center"
                                                            style="justify-content: space-between;display: flex;">
                                                            <div class="w-50">
                                                                <div class="row">
                                                                    <div class="col-2 text-center">
                                                                        <?= $key + 1 ?>
                                                                    </div>
                                                                    <div class="col-9">
                                                                        <div style="align-content: center;">
                                                                            <h6><strong>Mã đơn: <?= $donhang['id'] ?></strong>
                                                                            </h6>
                                                                            <p class="px-2" style="font-size: 12px;">Ngày đặt:
                                                                                <?= $donhang['ngay_dat_hang'] ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="text-center">
                                                                <div class="row" style="gap: 20px;align-items: center;">
                                                                    <p class="text p-1" style="display: contents;">
                                                                        <span><?= $donhang['tong_tien'] ?><span
                                                                                style="font-size: 10px;">₫</span></span>
                                                                    </p>
                                                                    <?php if ($donhang['trang_thai'] == 1): ?>
                                                                        <p class="text-secondary p-1" style="display: contents;">
                                                                            <strong>Chờ duyệt...</strong>
                                                                        </p>
                                                                    <?php endif ?>
                                                                    <?php if ($donhang['trang_thai'] == 2): ?>
                                                                        <p class="text-primary p-1" style="display: contents;">
                                                                            <strong>Đã xác nhận</strong>
                                                                        </p>
                                                                    <?php endif ?>
                                                                    <?php if ($donhang['trang_thai'] == 3): ?>
                                                                        <p class="text-info p-1" style="display: contents;">
                                                                            <strong>Đang giao</strong>
                                                                        </p>
                                                                    <?php endif ?>
                                                                    <?php if ($donhang['trang_thai'] == 4): ?>
                                                                        <p class="text-success p-1" style="display: contents;">
                                                                            <strong>Đã giao</strong>
                                                                        </p>
                                                                    <?php endif ?>
                                                                    <?php if ($donhang['trang_thai'] == 5): ?>
                                                                        <p class="text-danger p-1" style="display: contents;">
                                                                            <strong>Đã hủy</strong>
                                                                        </p>
                                                                    <?php endif ?>
                                                                    <div>
                                                                        <a class="btn btn-warning text-light"
                                                                            style="border-radius: 0;"
                                                                            href="/chi-tiet-don-hang?id=<?= $donhang['id'] ?>">Chi
                                                                            tiết hóa đơn</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                </div>
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


</body>

</html>