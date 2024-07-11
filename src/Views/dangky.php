<!DOCTYPE html>
<html lang="en">
<style>
    .error {
        color: red;
    }
</style>

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
    <section class="ftco-section contact-section bg-light">
        <div class="container">
            <div class="row block-9">
                <div class="col-md-6 order-md-last d-flex">
                    <div class="bg-white p-5 contact-form">
                        <H2>Đăng ký tài khoản</H2>
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="tai_khoan" placeholder="Tài khoản">
                                <div class="error">
                                    <?php if (isset($errors) && isset($errors['tai_khoan'])) {
                                        echo "không được để trống";
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="mat_khau" placeholder="Mật khẩu">
                                <div class="error">
                                    <?php if (isset($errors) && isset($errors['mat_khau'])) {
                                        echo "không được để trống";
                                    }

                                    ?>
                                </div>

                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email">
                                <div class="error">
                                    <?php if (isset($errors) && isset($errors['email'])) {
                                        echo "không được để trống";
                                    }

                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="diachi" class="form-control" name="dia_chi" placeholder="Địa chỉ">
                                <div class="error">
                                    <?php
                                    if (isset($errors) && isset($errors['dia_chi'])) {
                                        echo "không được để trống";
                                    }

                                    ?>
                                </div>
                            </div>
                            <div class="form-controls">
                                <label>Giới tính</label>
                                <div class="controls">
                                    <label class="radio-ctn">
                                        <input type="radio" name="gioi_tinh" value="1" checked>
                                        <span><strong>Nam</strong></span>
                                    </label>
                                    <label class="radio-ctn">
                                        <input type="radio" name="gioi_tinh" value="0">
                                        <span><strong>Nữ</strong></span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="so_dien_thoai"
                                    placeholder="Số điện thoại">
                                <div class="error">
                                    <?php
                                    if (isset($errors) && isset($errors['so_dien_thoai'])) {
                                        echo "không được để trống";
                                    }

                                    ?>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <input style="border-radius: 0px;" type="submit" value="Đăng ký"
                                    class="bg-light text-primary btn btn-primary py-3 px-5 w-100" name="submit">
                            </div>
                        </form>


                    </div>
                </div>

                <div class="col-md-6 d-flex">
                    <img src="public/images/admin.jpg" alt="">
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