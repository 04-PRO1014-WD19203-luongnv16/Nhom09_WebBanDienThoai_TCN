<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <!-- Head -->
    <?php include_once "./src/Views/client/components/head.php"; ?>
</head>
<body>
    <!-- Header -->
    <?php include_once "./src/Views/client/components/header.php"; ?>
    <!-- NAV -->
    <?php include_once "./src/Views/client/components/navbar.php"; ?>
    <!-- Content -->
    <section class="ftco-section contact-section bg-light pb-0">
        <div class="container">
            <div class="row block-9">
                <div class="col-md-6 order-md-last d-flex">
                    <div class="bg-white p-5 contact-form">
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="tai_khoan" placeholder="Tài khoản">
                                <?php if ($validate['tai_khoan']) : ?>
                                    <div class="form-text validate-text">Vui lòng điền tài khoản</div>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="mat_khau" placeholder="Mật khẩu">
                                <?php if ($validate['mat_khau']) : ?>
                                    <div class="form-text validate-text">Vui lòng điền mật khẩu</div>
                                <?php endif ?>
                                <?php if (!$validate['mat_khau'] || !$validate['tai_khoan']) : ?>
                                    <?php if ($checkForm) : ?>
                                        <div class="form-text validate-text">Tài khoản hoặc mật khẩu không chính xác</div>
                                    <?php endif ?>
                                <?php endif ?>
                            </div>
                            <div class="form-group text-center">
                                <input name="btn-submit" style="border-radius: 0px;" type="submit" value="Đăng nhập" class="btn btn-primary py-3 px-5 w-50">
                            </div>
                        </form>
                        <div class="form-group text-center">
                            <input style="border-radius: 0px;" type="submit" value="Đăng ký" class="bg-light text-primary btn btn-primary py-3 px-5 w-100">
                        </div>
                        <div class="form-group text-center text-start">
                            <div style="display: block;text-align: end;">
                                <a style="text-decoration: underline;" href="text">Quên mật khẩu</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 d-flex">
                    /////
                </div>
            </div>
        </div>

    </section>
    <!-- Footer -->
    <?php include_once "./src/Views/client/components/footer.php"; ?>
    <!-- Script -->
    <?php include_once "./src/Views/client/components/javascript.php"; ?>
</body>

</html>