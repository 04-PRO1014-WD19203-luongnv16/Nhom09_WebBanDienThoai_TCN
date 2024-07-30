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
                                    <img class="w-100" style="border-radius: 50%;"
                                        src="/public/user-profile-icon-free-vector.jpg" alt="">
                                </div>
                                <div class="col-12" style="text-align: center;">
                                    <div style="font-size: 15px;"><strong><?= $_SESSION['tai_khoan'] ?></strong></div>
                                    <a href="" class="text" style="color: gray;font-size: 12px;">Chỉnh sửa hồ sơ <i
                                            class="fa-solid fa-pen"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-9 py-3">
                        <div class="">
                            <?php if(isset($error)) :?>
                                <div class="alert alert-danger"><?=$error?></div>
                                <?php endif?>
                            <?php if(isset($success)) :?>
                                <div class="alert alert-success"><?=$success?></div>
                                <?php endif?>
                            <div class="content">
                                    
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