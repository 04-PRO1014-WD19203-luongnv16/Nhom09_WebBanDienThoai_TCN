<!DOCTYPE html>
<html lang="en">

<head>
  <title>Winkel - Free Bootstrap 4 Template by Colorlib</title>
  <!-- Head -->
  <?php include_once "./src/Views/client/components/head.php"; ?>
</head>

<body class="goto-here">
  <!-- Header -->
  <?php include_once "./src/Views/client/components/header.php"; ?>
  <!-- Nav -->
  <?php include_once "./src/Views/client/components/navbar.php"; ?>
  <!-- Content -->

  <section id="home-section" class="hero">
    <div class="home-slider js-fullheight owl-carousel">
      <div class="slider-item js-fullheight">
        <div class="overlay"></div>
        <div class="container-fluid p-0">
          <div class="row d-md-flex no-gutters slider-text js-fullheight align-items-center justify-content-end"
            data-scrollax-parent="true">
            <div class="one-third order-md-last img js-fullheight"
              style="background-image:url(public/images/blackpinkSamSung.jpg);">
            </div>
            <div class="one-forth d-flex js-fullheight align-items-center ftco-animate"
              data-scrollax=" properties: { translateY: '70%' }">
              <div class="text">
                <h2>Khám Phá Những Chiếc Điện Thoại Thời Thượng</h2>
                <span class="subheading">Thương Mại điện tử</span>
                <div class="horizontal">
                  <h3 class="vr" style="background-image: url(images/divider.jpg);">Thành Lập Từ Năm
                    2024</h3>
                  <h1 class="mb-4 mt-3">Bắt Lấy Phong Cách <br><span>Và Đẳng Cấp Riêng </span></h1>
                  <p>Camera Đỉnh Cao: Camera với độ phân giải cao, nhiều tính năng chụp ảnh chuyên
                    nghiệp, cho ra những bức ảnh sắc nét và sống động.</p>

                  <p><a href="/cua-hang" class="btn btn-primary px-5 py-3 mt-3">Xem ngay</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="slider-item js-fullheight">
        <div class="overlay"></div>
        <div class="container-fluid p-0">
          <div class="row d-flex no-gutters slider-text js-fullheight align-items-center justify-content-end"
            data-scrollax-parent="true">
            <div class="one-third order-md-last img js-fullheight"
              style="background-image:url(public/images/selfie-la-gi.jpg);">
            </div>
            <div class="one-forth d-flex js-fullheight align-items-center ftco-animate"
              data-scrollax=" properties: { translateY: '70%' }">
              <div class="text">
                <span class="subheading">Thương mại điện tử TCN</span>
                <div class="horizontal">
                  <h3 class="vr" style="background-image: url(images/divider.jpg);">Cửa Hàng Trực
                    Tuyến Tốt Nhất</h3>
                  <h1 class="mb-4 mt-3">Những chiếc điện thoại hiện đại <span>SANG TRỌNG</span> và
                    hoàn hảo</h1>
                  <p>Điện thoại tầm trung là sự lựa chọn hoàn hảo cho những ai muốn sở hữu một chiếc
                    smartphone với giá cả phải chăng nhưng vẫn đảm bảo chất lượng.</p>

                  <p><a href="/cua-hang" class="btn btn-primary px-5 py-3 mt-3">Mua Ngay</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- Sản phẩm hiển thị -->
  <section class="ftco-section bg-light">
    <div class="container">
      <div class="row justify-content-center mb-3 pb-3">
        <div class="col-md-12 heading-section text-center ftco-animate">
          <h2 class="mb-4">Sản Phẩm Mới</h2>
          <!-- <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p> -->
        </div>
      </div>
    </div>


    <div class="container">

      <div class="row">
        <?php
        foreach ($trangchu as $h) {

          echo '<div class="col-sm col-md-6 col-lg ftco-animate">
                    <div class="product">
                        <a href="/detail-san-pham?id=' . $h['id'] . '" class="img-prod"><img class="img-fluid" src="' . $h['anh_chinh'] . '" width="1000px" height="900px" alt="Colorlib Template">                 
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 px-3">
                            <h3><a href="#">' . $h['ten_san_pham'] . '</a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price"><span class="mr-2 price-dc"></span><span></p>
                                </div>
                                <div class="rating">
                                    <p class="text-right">
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                    </p>
                                </div>
                            </div>
                            <p class="bottom-area d-flex px-3">
                                <a href="#" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i
                                            class="ion-ios-add ml-1"></i></span></a>
                                <a href="#" class="buy-now text-center py-2">Buy now<span><i
                                            class="ion-ios-cart ml-1"></i></span></a>
                            </p>
                        </div>
                    </div>
                </div>';
        }
        ?>

      </div>
    </div>
  </section>

  <section class="ftco-section ftco-counter img" id="section-counter"
    style="background-image: url(public/images/selfie-la-gi.jpg);">
    <div class="container">
      <div class="row justify-content-center py-5">
        <div class="col-md-10">
          <div class="row">
            <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
              <div class="block-18 text-center">
                <div class="text">
                  <strong class="number" data-number="10000">0</strong>
                  <span>Khách hàng hài lòng</span>
                </div>
              </div>
            </div>
            <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
              <div class="block-18 text-center">
                <div class="text">
                  <strong class="number" data-number="100">0</strong>
                  <span>Chi nhánh</span>
                </div>
              </div>
            </div>
            <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
              <div class="block-18 text-center">
                <div class="text">
                  <strong class="number" data-number="1000">0</strong>
                  <span>Cộng sự</span>
                </div>
              </div>
            </div>
            <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
              <div class="block-18 text-center">
                <div class="text">
                  <strong class="number" data-number="100">0</strong>
                  <span>Giải thưởng</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <?php include_once "./src/Views/client/components/footer.php"; ?>

  <?php include_once "./src/Views/client/components/footer.php"; ?>
  <?php include_once "./src/Views/client/components/footer.php"; ?>
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