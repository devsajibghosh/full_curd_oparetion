<?php
session_start();
include('./config/db.php');
// read from database table

$select_users = "SELECT * FROM users";
$connect_users = mysqli_query($db_connect, $select_users);
$users = mysqli_fetch_assoc($connect_users);

// service active and deactive

$service_query = "SELECT * FROM services WHERE status='active'";
$services = mysqli_query($db_connect, $service_query);

// active and deactive facts

$fact_query = "SELECT * FROM facts WHERE status='active'";
$facts = mysqli_query($db_connect, $fact_query);

// brands select 

$brands_query = "SELECT * FROM brands WHERE status='active'";
$brands = mysqli_query($db_connect, $brands_query);

// portfolios all data select 

$port_query =  "SELECT * FROM portfolios WHERE status='active'";
$portfolios = mysqli_query($db_connect, $port_query);

// testimonials data selet

$testimonial_query =  "SELECT * FROM testimonials WHERE status='active'";
$testimonials = mysqli_query($db_connect, $testimonial_query);

// about section skills and year

$skill_query = "SELECT * FROM skills WHERE status='active'";
$skills = mysqli_query($db_connect, $skill_query);


?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Let's Code_</title>
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="shortcut icon" type="image/x-icon" href="./frontend_assets/img/favicon.png" />
  <!-- Place favicon.ico in the root directory -->

  <!-- CSS here -->
  <link rel="stylesheet" href="./frontend_assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="./frontend_assets/css/animate.min.css" />
  <link rel="stylesheet" href="./frontend_assets/css/magnific-popup.css" />
  <link rel="stylesheet" href="./frontend_assets/css/fontawesome-all.min.css" />
  <link rel="stylesheet" href="./frontend_assets/css/flaticon.css" />
  <link rel="stylesheet" href="./frontend_assets/css/slick.css" />
  <link rel="stylesheet" href="./frontend_assets/css/aos.css" />
  <link rel="stylesheet" href="./frontend_assets/css/default.css" />
  <link rel="stylesheet" href="./frontend_assets/css/style.css" />
  <link rel="stylesheet" href="./frontend_assets/css/responsive.css" />

  <!-- fontawsome cdn -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="theme-bg">
  <!-- preloader -->
  <div id="preloader">
    <div id="loading-center">
      <div id="loading-center-absolute">
        <div class="object" id="object_one"></div>
        <div class="object" id="object_two"></div>
        <div class="object" id="object_three"></div>
      </div>
    </div>
  </div>
  <!-- preloader-end -->

  <!-- header-start -->
  <header>
    <div id="header-sticky" class="transparent-header">
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <div class="main-menu">
              <nav class="navbar navbar-expand-lg">
                <a href="index.html" class="navbar-brand logo-sticky-none"><img src="./frontend_assets/img/logo/logo.png" alt="Logo" /></a>
                <a href="index.html" class="navbar-brand s-logo-none"><img src="./frontend_assets/img/logo/s_logo.png" alt="Logo" /></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                  <span class="navbar-icon"></span>
                  <span class="navbar-icon"></span>
                  <span class="navbar-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#about">about</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#service">service</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#portfolio">portfolio</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#contact">Contact</a>
                    </li>
                  </ul>
                </div>
                <div class="header-btn">
                  <a href="#" class="off-canvas-menu menu-tigger"><i class="flaticon-menu"></i></a>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- offcanvas-start -->
    <div class="extra-info">
      <div class="close-icon menu-close">
        <button>
          <i class="far fa-window-close"></i>
        </button>
      </div>
      <div class="logo-side mb-30">
        <a href="index-2.html">
          <img src="./frontend_assets/img/logo/logo.png" alt="" />
        </a>
      </div>
      <div class="side-info mb-30">
        <div class="contact-list mb-30">
          <h4>Office Address</h4>
          <p>123/A, Miranda City Likaoli Prikano, Dope</p>
        </div>
        <div class="contact-list mb-30">
          <h4>Phone Number</h4>
          <p>+0989 7876 9865 9</p>
        </div>
        <div class="contact-list mb-30">
          <h4>Email Address</h4>
          <p>info@example.com</p>
        </div>
      </div>
      <div class="social-icon-right mt-20">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-google-plus-g"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
    <div class="offcanvas-overly"></div>
    <!-- offcanvas-end -->
  </header>
  <!-- header-end -->

  <!-- main-area -->
  <main>
    <!-- banner-area -->
    <section id="home" class="banner-area banner-bg fix">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-xl-7 col-lg-6">
            <div class="banner-content">
              <h6 class="wow fadeInUp" data-wow-delay="0.2s">HELLO!</h6>
              <h2 class="wow fadeInUp" data-wow-delay="0.4s">
                I am <?= $users['name']; ?>
              </h2>
              <p class="wow fadeInUp" data-wow-delay="0.6s">
                I'm Will Smith, professional web developer with long time
                experience in this field​.
              </p>
              <div class="banner-social wow fadeInUp" data-wow-delay="0.8s">
                <ul>
                  <li>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fab fa-pinterest"></i></a>
                  </li>
                </ul>
              </div>
              <a href="#" class="btn wow fadeInUp" data-wow-delay="1s">SEE PORTFOLIOS</a>
            </div>
          </div>
          <div class="col-xl-5 col-lg-6 d-none d-lg-block">
            <div class="banner-img text-right">
              <img style="width: 600px; height:800px;" src="./images/profile/<?= $users['image']; ?>" alt="user_img" />
            </div>
          </div>
        </div>
      </div>
      <div class="banner-shape">
        <img src="./frontend_assets/img/shape/dot_circle.png" class="rotateme" alt="img" />
      </div>
    </section>
    <!-- banner-area-end -->

    <!-- about-area-->
    <section id="about" class="about-area primary-bg pt-120 pb-120">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="about-img">
              <img src="./frontend_assets/img/banner/banner_img2.png" title="me-01" alt="me-01" />
            </div>
          </div>
          <div class="col-lg-6 pr-90">
            <div class="section-title mb-25">
              <span>Introduction</span>
              <h2>About Me</h2>
            </div>
            <div class="about-content">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Rerum, sed repudiandae odit deserunt, quas quibusdam
                necessitatibus nesciunt eligendi esse sit non reprehenderit
                quisquam asperiores maxime blanditiis culpa vitae velit.
                Numquam!
              </p>
              <h3>Education:</h3>
            </div>
            <!-- Education Item -->
            <?php foreach ($skills as $skill) : ?>
              <div class="education">
                <div class="year"><?= $skill['year'] ?></div>
                <div class="line"></div>
                <div class="location">
                  <span><?= $skill['title'] ?></span>
                  <div class="progressWrapper">
                    <div class="progress">
                      <div class="progress-bar wow slideInLefts" data-wow-delay="0.2s" data-wow-duration="2s" role="progressbar" style="width: <?= $skill['skill_percentage'] ?>%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
            <!-- End Education Item -->


          </div>
        </div>
      </div>
    </section>
    <!-- about-area-end -->

    <!-- Services-area -->
    <section id="service" class="services-area pt-120 pb-50">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-6 col-lg-8">
            <div class="section-title text-center mb-70">
              <span>WHAT WE DO</span>
              <h2>Services and Solutions</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <?php foreach ($services as $service) : ?>
            <div class="col-lg-4 col-md-6">
              <div class="icon_box_01 wow fadeInLeft" data-wow-delay="0.2s">
                <i class="<?= $service['icon'] ?>"></i>
                <h3><?= $service['title'] ?></h3>
                <p>
                  <?= $service['description'] ?>
                </p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
    <!-- Services-area-end -->

    <!-- Portfolios-area -->

    <section id="portfolio" class="portfolio-area primary-bg pt-120 pb-90">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-6 col-lg-8">
            <div class="section-title text-center mb-70">
              <span>Portfolio Showcase</span>
              <h2>My Recent Best Works</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <?php foreach ($portfolios as $port) : ?>
            <div class="col-lg-4 col-md-6 pitem">
              <div class="speaker-box">
                <div class="speaker-thumb">
                  <img style="width: 400px;height:450px; border: 2px solid #fff; border-radius: 5px;margin:5px" src="./images/portfolio/<?= $port['image'] ?>" alt="">
                </div>
                <div class="speaker-overlay">
                  <span><?= $port['description'] ?></span>
                  <h4><a href="portfolio-single.html"><?= $port['title'] ?></a></h4>
                  <a href="portfolio-single.html" class="arrow-btn">More information <span></span></a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <!-- portfolio area end -->

    <!-- services-area-end -->


    <!-- fact-area -->
    <section class="fact-area">
      <div class="container">
        <div class="fact-wrap">
          <div class="row justify-content-between">

            <?php foreach ($facts as $fact) : ?>
              <div class="col-xl-2 col-lg-3 col-sm-6">
                <div class="fact-box text-center mb-50">
                  <div class="fact-icon">
                    <i class="<?= $fact['icon'] ?>"></i>
                  </div>
                  <div class="fact-content">
                    <h2><span><?= $fact['number'] ?></span></h2>
                    <span><?= $fact['description'] ?></span>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>

          </div>
        </div>
      </div>
    </section>
    <!-- fact-area-end -->


    <!-- testimonial-area -->
    <section class="testimonial-area primary-bg pt-115 pb-115">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-6 col-lg-8">
            <div class="section-title text-center mb-70">
              <span>testimonial</span>
              <h2>happy customer quotes</h2>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-xl-9 col-lg-10">
            <div class="testimonial-active">

              <?php foreach ($testimonials as $tests) : ?>
                <div class="single-testimonial text-center">
                  <div class="testi-avatar">
                    <img style="width: 60px; height:60px;border: 2px solid #fff; border-radius: 50%;" src="./images/testimonial/<?= $tests['image']; ?>" alt="user_img" />
                  </div>
                  <div class="testi-content">
                    <h4>
                      <span>“</span>
                      <?= $tests['description'] ?>
                      <span>”</span>
                    </h4>
                    <div class="testi-avatar-info">
                      <h5><?= $tests['name'] ?></h5>
                      <span><?= $tests['title'] ?></span>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>

            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- testimonial-area-end -->


    <!-- brand-area -->
    <div class="barnd-area pt-100 pb-100">
      <div class="container">
        <div class="row brand-active">
          <?php foreach ($brands as $brand) : ?>
            <div class="col-xl-2">
              <div class="single-brand">
                <img style="width: 130px;height:130px; border: 1px solid #fff;border-radius:20px;" src="./images/brand/<?= $brand['image'] ?>" alt="img" />
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
    <!-- brand-area-end -->

    <!-- contact-area -->
    <section id="contact" class="contact-area primary-bg pt-120 pb-120">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="section-title mb-20">
              <span>information</span>
              <h2>Contact Information</h2>
            </div>
            <div class="contact-content">
              <p>
                Event definition is - somthing that happens occurre How evesnt
                sentence. Synonym when an unknown printer took a galley.
              </p>
              <h5>OFFICE IN <span>NEW YORK</span></h5>
              <div class="contact-list">
                <ul>
                  <li>
                    <i class="fas fa-map-marker"></i><span>Address :</span>Event Center park WT 22 New York
                  </li>
                  <li>
                    <i class="fas fa-headphones"></i><span>Phone :</span>+9
                    125 645 8654
                  </li>
                  <li>
                    <i class="fas fa-globe-asia"></i><span>e-mail :</span>info@exemple.com
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-6">


            <form action="./dashboard/mail_post.php" method="POST">
              <div class="mb-3">
                <!-- name data -->
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input name="name" type="name" class="form-control" placeholder="enter your name...">
                <!-- email data -->
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input name="email" type="email" class="form-control" placeholder="enter your email">
              </div>
              <!-- message data -->
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Feedback</label>
                <textarea class="form-control" placeholder="enter your feedback..." name="message"></textarea>
              </div>
              <!-- sent success start -->
              <?php if (isset($_SESSION['mail_success'])) : ?>
                <div id="emailHelp" class="form-text m-b-md text-primary"><?= $_SESSION['mail_success']; ?></div>
              <?php endif;
              unset($_SESSION['mail_success']); ?>
              <!-- sent success end -->
              <button type="submit" name="send_btn" class="btn">SEND</button>
            </form>

          </div>
        </div>
      </div>
    </section>
    <!-- contact-area-end -->
  </main>
  <!-- main-area-end -->

  <!-- footer -->
  <footer>
    <div class="copyright-wrap">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12">
            <div class="copyright-text text-center">
              <p>Copyright© <span>NexT_Mission</span> | All Rights Reserved</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- footer-end -->

  <!-- JS here -->
  <script src="./frontend_assets/js/vendor/jquery-1.12.4.min.js"></script>
  <script src="./frontend_assets/js/popper.min.js"></script>
  <script src="./frontend_assets/js/bootstrap.min.js"></script>
  <script src="./frontend_assets/js/isotope.pkgd.min.js"></script>
  <script src="./frontend_assets/js/one-page-nav-min.js"></script>
  <script src="./frontend_assets/js/slick.min.js"></script>
  <script src="./frontend_assets/js/ajax-form.js"></script>
  <script src="./frontend_assets/js/wow.min.js"></script>
  <script src="./frontend_assets/js/aos.js"></script>
  <script src="./frontend_assets/js/jquery.waypoints.min.js"></script>
  <script src="./frontend_assets/js/jquery.counterup.min.js"></script>
  <script src="./frontend_assets/js/jquery.scrollUp.min.js"></script>
  <script src="./frontend_assets/js/imagesloaded.pkgd.min.js"></script>
  <script src="./frontend_assets/js/jquery.magnific-popup.min.js"></script>
  <script src="./frontend_assets/js/plugins.js"></script>
  <script src="./frontend_assets/js/main.js"></script>
</body>

</html>