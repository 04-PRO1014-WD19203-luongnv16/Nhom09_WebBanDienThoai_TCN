<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container" style="align-items: center;">
        <!-- <a class="navbar-brand" href="/">Winkel</a> -->
        <a href="/" class="logo"><img class="logo-img" src="/public/Remove-bg.ai_1720090322958.png" alt="Logo" srcset=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto" style="align-items: center;">
                <li class="nav-item active"><a href="/" class="nav-link">Trang chủ</a></li>
                <li class="nav-item"><a href="/" class="nav-link">Cửa hàng</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="/" id="dropdown04" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Danh mục</a>
                    <div class="dropdown-menu" aria-labelledby="/">
                        <a class="dropdown-item" href="/">Cửa hàng</a>
                        <a class="dropdown-item" href="/">Single Product</a>
                        <a class="dropdown-item" href="/">Cart</a>
                        <a class="dropdown-item" href="/">Checkout</a>
                    </div>
                </li>
                <li class="nav-item"><a href="/" class="nav-link">Liên hệ</a></li>
                <?php if (isset($_SESSION['tai_khoan'])) :?>
                    <li class="nav-item"><a href="/" class="nav-link">Tài khoản</a></li>
                    <li class="nav-item"><a href="/logout" class="nav-link">Đăng xuất</a></li>
                    <?php endif?>
                <?php if (!isset($_SESSION['tai_khoan'])) :?>
                    <li class="nav-item"><span class="nav-link">
                    <a href="/login" class="text-dark">Đăng nhâp</a> | <a href="/" class="text-dark">Đăng nhâp</a>
                </span></li>
                    <?php endif?>
                <li class="nav-item cta cta-colored"><a href="/" class="nav-link"><span
                            class="icon-shopping_cart"></span>[0]</a></li>

            </ul>
        </div>
    </div>
</nav>