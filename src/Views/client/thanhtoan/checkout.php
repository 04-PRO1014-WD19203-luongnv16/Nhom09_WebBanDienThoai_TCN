<!DOCTYPE html>
<html lang="en">

<head>
    <title><?=$title?></title>
    <!-- Head -->
    <?php include_once "./src/Views/client/components/head.php"; ?>
</head>

<body class="goto-here">
    <!-- Header -->
    <?php include_once "./src/Views/client/components/header.php"; ?>
    <!-- Nav -->
    <?php include_once "./src/Views/client/components/navbar.php"; ?>
    <!-- Content -->

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 ftco-animate">
                    <div>
                        <div class="text-success text-center mb-3">
                            <i class="fa-solid fa-circle-check" style="font-size: 50px;"></i>
                        </div>
                        <div class="mb-3">
                            <h2 class="text-center text-secondary">Đặt hàng thành công!</h2>
                            <p class="text-center">Đơn hàng sẽ sớm được giao đến tay bạn. Cảm ơn bạn đã đặt hàng ^-^.</p>
                        </div>
                        <div class="row" style="gap: 20px;">
                            <a class="col btn btn-secondary" href="#">Chi tiết đơn hàng</a>
                            <a class="col btn btn-success" href="/">Tiếp tục mua săm</a>
                        </div>
                    </div>
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