<!doctype html>
<html class="no-js" lang="">

    <!-- Head -->
    <?php include_once "./src/Views/admin/components/head.php"?>
    <body>
    <!-- Header -->
    <?php include_once "./src/Views/admin/components/navbar.php"?>
    <div id="right-panel" class="right-panel">
        <!-- Header-->
    <?php include_once "./src/Views/admin/components/header.php";?>

        <!-- Content -->
        <div class="content">
            <div class="animated fadeIn">
                <?php
                    if (isset($view) && $view != "") {
                        include_once $view.".php";
                    }
                ?>
            </div>
        </div>
        <div class="clearfix"></div>
        <!-- Footer -->
    <?php include_once "./src/Views/admin/components/footer.php";?>
    </div>

    <!-- Scripts -->
    <?php include_once "./src/Views/admin/components/javascript.php";?>
</body>
</html>
